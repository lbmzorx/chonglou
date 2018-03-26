<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/26
 * Time: 22:47
 */

namespace common\config;


use Yii;
use Yii\base\Component;
use common\models\data\Options;
use yii\base\Event;
use yii\caching\FileDependency;
use yii\db\BaseActiveRecord;
use yii\web\Response;
use common\components\events\AdminLog;
class WebSets extends Component
{
    private $_config=[];

    public function __set($name, $value)
    {
        $this->_config[$name] = $value;
    }

    public function __get($name)
    {
        return isset($this->_config[$name])?$this->_config[$name]:false;
    }

    public function init()
    {
        parent::init();

        $cache = Yii::$app->getCache();
        $key = 'options';
        if (($data = $cache->get($key)) === false) {
            $data = Options::find()->select('name,value')->where(['type' => Options::OPTIONS_TYPE_SYSTEM])->orwhere([
                'type' => Options::OPTIONS_TYPE_SELF,
                'autoload' => Options::OPTIONS_AUTOLOAD_YES,
            ])->asArray()->indexBy("name")->all();
            Options::removeBackendMenuCache();
            $cache->set($key, $data, 360000*24, new FileDependency(['fileName' => Options::$depency_filename]));
        }

        foreach ($data as $v) {
            $this->{$v['name']} = $v['value'];
        }
    }


    private static function configInit()
    {
        if (! empty(Yii::$app->webSets->website_url)) {
            Yii::$app->params['site']['url'] = Yii::$app->webSets->website_url;
        }
        if (substr(Yii::$app->params['site']['url'], -1, 1) != '/') {
            Yii::$app->params['site']['url'] .= '/';
        }
        if (stripos(Yii::$app->params['site']['url'], 'http://') !== 0 && stripos(Yii::$app->params['site']['url'], 'https://') !== 0 && stripos(Yii::$app->params['site']['url'], '//')) {
            Yii::$app->params['site']['url'] = ( Yii::$app->getRequest()->getIsSecureConnection() ? "https://" : "http://" ) . Yii::$app->params['site']['url'];
        }

        if (isset(Yii::$app->session['language'])) {
            Yii::$app->language = Yii::$app->session['language'];
        }
        if (Yii::$app->getRequest()->getIsAjax()) {
            Yii::$app->getResponse()->format = Response::FORMAT_JSON;
        } else {
            Yii::$app->getResponse()->format = Response::FORMAT_HTML;
        }

        if (! empty(Yii::$app->webSets->smtp_host) && ! empty(Yii::$app->webSets->smtp_username)) {
            Yii::configure(Yii::$app->mailer, [
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => Yii::$app->webSets->smtp_host,  //每种邮箱的host配置不一样
                    'username' => Yii::$app->webSets->smtp_username,
                    'password' => Yii::$app->webSets->smtp_password,
                    'port' => Yii::$app->webSets->smtp_port,
                    'encryption' => Yii::$app->webSets->smtp_encryption,
                ],
                'messageConfig' => [
                    'charset' => 'UTF-8',
                    'from' => [Yii::$app->webSets->smtp_username => Yii::$app->webSets->smtp_nickname]
                ],
            ]);
        }
    }

    public static function frontendInit()
    {
        if (! Yii::$app->webSets->website_status) {
            Yii::$app->catchAll = ['site/offline'];
        }
        Yii::$app->language = Yii::$app->webSets->website_language;
        Yii::$app->timeZone = Yii::$app->webSets->website_timezone;
        if (! isset(Yii::$app->params['site']['url']) || empty(Yii::$app->params['site']['url'])) {
            Yii::$app->params['site']['url'] = Yii::$app->request->getHostInfo();
        }
        if(isset(Yii::$app->session['view'])) Yii::$app->viewPath = Yii::getAlias('@frontend/view') . Yii::$app->session['view'];
        self::configInit();
    }

    public static function backendInit()
    {
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_INSERT, [
            AdminLog::className(),
            'create'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_UPDATE, [
            AdminLog::className(),
            'update'
        ]);
        Event::on(BaseActiveRecord::className(), BaseActiveRecord::EVENT_AFTER_DELETE, [
            AdminLog::className(),
            'delete'
        ]);
        self::configInit();
    }
}