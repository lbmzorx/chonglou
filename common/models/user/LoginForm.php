<?php
namespace common\models\user;

use common\models\data\UserLoginLog;
use Yii;
use yii\base\Model;
use yii\caching\FileCache;
use yii\caching\TagDependency;
use yii\helpers\ArrayHelper;

/**
 * Login form
 */
class LoginForm extends Model
{
    const CHACHE_TAG='LOGIN.ERROR';

    public $username;
    public $password;
    public $rememberMe = true;
    public $varify;
    private $_user;
    private $_userLog;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            ['varify','varifyCode'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', '用户名'),
            'email' => Yii::t('app', '邮箱'),
            'varify' => Yii::t('app', '验证码'),
            'password' => Yii::t('app', '密码'),
        ];
    }


    /**
     * 检测是否输入的错误是否过多
     * @param \yii\caching\FileCache $cache
     * @param $key
     * @return bool
     */
    public function checkPasswordCache($cache,$key){

        $error=$cache->get($key);

        $emptyTotalErr   = empty($error[0]);
        $totalErrNumLimit= (isset($error[0]) && $error[0]<20);
        $userErrNum      = isset($error[$this->username]['num']);
        $userErrNumLimit = ($userErrNum) && $error[$this->username]['num']<5;
        $userErrNumOver  = ($userErrNum) && $error[$this->username]['num']>=5;
        $userErrTimeLimit= isset($error[$this->username]['lock'])&& time()>$error[$this->username]['lock'];

        return $emptyTotalErr || ($totalErrNumLimit && $userErrNumLimit) || ($totalErrNumLimit  && $userErrNumOver && $userErrTimeLimit);

    }

    /**
     * 添加缓存用户输入错误缓存
     * @param \yii\caching\FileCache $cache
     * @param $key
     */
    public function addErrorPassworCache($cache,$key){

        $error=$cache->get($key);
        $errornum=empty($error[$this->username]['num'])?1:($error[$this->username]['num']+1);
        $error[0]=isset($error[0])?($error[0]+1):1;

        $lockTime=intval(1+('1E'.($errornum-6)));
        $error[$this->username]=[
            'num'=>$errornum,
            'lock'=>(time()+30*($errornum-5)*($errornum-5)*($errornum-5)+$lockTime),
        ];

        $cache->set($key,$error,3600*24,(new TagDependency(['tags'=>self::CHACHE_TAG])));
    }



    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * if tring errored more than 5 times ,user can try again before 24 hours later.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $cache=new FileCache();

            $key=['type'=>'login-error','ip'=>\yii::$app->request->userIP];
            $error=$cache->get($key);

            if( $this->checkPasswordCache($cache,$key) ){
                if ($user){
                    if( $user->status==User::STATUS_LOGINERROR && (time()-$user->edit_time)>72*3600){
                        $this->addError($attribute, Yii::t('app','还有'.(($user->edit_time)*72*3600-time()).'秒才可重新登录'));
                    }elseif(!$user->validatePassword($this->password)){
                        $this->addError($attribute, Yii::t('app','请输入正确的密码！'));
                        $this->addErrorPassworCache($cache,$key);
                    }else{
                        if($user->status==User::STATUS_LOGINERROR){
                            $user->status=User::STATUS_ACTIVE;
                            $user->save();
                        }
                        return true;
                    }
                }else{
                    $this->addError($attribute, Yii::t('app','请输入正确的密码！'));
                    $this->addErrorPassworCache($cache,$key);
                }
            }else{
                if(isset($error[$this->username]['num']) && $error[$this->username]['num']>10){
                    if($user){
                        $user->status=User::STATUS_LOGINERROR;
                        $user->save();
                        $this->addErrolog(['user_id'=>$user->id]);
                    }else{
                        $this->addErrolog();
                    }
                }

                if($error[0]>=20){
                    $this->addError($attribute, Yii::t('app','输入错误过多，非法操作，请联系管理员'));
                    if(empty($error[1])){
                        $this->addErrolog([
                            'ip'=>\yii::$app->request->userIP,
                            'user_name'=>implode(',',array_keys($error)),
                        ]);
                        $error[1]=1;
                        $cache->set($key,$error,3600*24,(new TagDependency(['tags'=>self::CHACHE_TAG])));
                    }
                }else{
                    $this->addError($attribute, Yii::t('app','输入错误过多，账号锁定！请等待倒计时，或者联系管理员'));
                }
            }
            return false;
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    protected function getUserLog(){
        if ($this->_userLog === null) {
            $user=$this->getUser();
            if($user){
                $this->_userLog = UserLoginLog::findOne($this->getUser()->id);
            }else{
                $this->_userLog=new UserLoginLog();
            }
        }

        return $this->_userLog;
    }

    /**
     * 添加错误日志
     * @param array $attributes
     */
    protected function addErrolog($attributes=[]){
        $log=$this->getUserLog();
        ArrayHelper::merge([
            'ip'=>\yii::$app->request->userIP,
            'user_name'=>$this->username,
            'password'=>$this->password,
        ],$attributes);
        $log->load($attributes,'');
        if(!$log->save()){
            var_dump($log->getFirstErrors());
        };
    }

    /**
     * 验证验证码
     */
    public function varifyCode(){

    }

}
