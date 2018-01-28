<?php
namespace common\models\user;

use Yii;
use yii\base\Model;
use yii\caching\TagDependency;

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
    private $_valid;

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
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app','请输入正确的密码！'));
                $cache=Yii::$app->cache;
                $key=['error','ip'=>\Yii::$app->request->userIP];
                $error=$cache->get($key);

                if($error>5){
                    $this->_valid=false;
                    $cache->set($key,$error+1,3600*24,(new TagDependency(['tags'=>self::CHACHE_TAG])));
                }else{

                }

            }
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

    public function varifyCode(){

    }

}
