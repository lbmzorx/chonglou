<?php
namespace common\models\admin;


use common\components\behaviors\LimitLogin;
use Yii;
use yii\base\Model;
use common\components\behaviors\RsaAttribute;
use common\components\events\LoginEvent;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $name;
    public $password;

    /**
     * @var Admin
     */
    private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'password'], 'required',],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function behaviors()
    {
        return [
            'bs_rsa'=>[
                'class'=>RsaAttribute::className(),
                'rsaAtAttributes'=>'password',
            ],
            'check_login'=>[
                'class'=>LimitLogin::className(),
            ],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, \Yii::t('model','Incorrect username or password!'));
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
        $loginEvent =new LoginEvent();
        $this->trigger(LoginEvent::EVENT_BEFORE_LOGIN,$loginEvent);
        if ($this->validate()) {
            $status = Yii::$app->user->login($this->getUser(),0);
            $this->trigger(LoginEvent::EVENT_BEFORE_LOGIN,$loginEvent);
            return $status;
        } else {
            $this->trigger(LoginEvent::EVENT_FAILED_LOGIN,$loginEvent);
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return Admin User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->name);
        }
        return $this->_user;
    }
}
