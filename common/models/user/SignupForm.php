<?php
namespace common\models\user;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $mobile;
    public $password;
    public $password_confirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\user\User','targetAttribute'=>'name','message' => '用户名已经被注册'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\user\User', 'message' => '邮箱已经被注册'],

//            ['mobile', 'trim'],
//            ['mobile', 'required'],
//            ['mobile', 'mobile'],
//            ['mobile', 'string', 'max' => 20],
//            ['mobile', 'unique', 'targetClass' => '\common\models\user\User', 'message' => '手机号已经被注册'],

            [['password','password_confirm'], 'required'],
            [['password','password_confirm'], 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', '用户名'),
            'email' => Yii::t('app', '邮箱'),
            'mobile' => Yii::t('app', '手机号'),
            'password' => Yii::t('app', '密码'),
            'password_confirm' => Yii::t('app', '确认密码'),
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->name = $this->username;
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
