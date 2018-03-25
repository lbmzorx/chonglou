<?php
namespace common\models\data;

use Yii;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;

/**
* This is the data class for [[common\models\database\Options]].
*
* @see \common\models\database\Options
*/
class Options extends \common\models\database\Options
{

    public static $depency_filename='@common/runtime/depency/backend_options.txt';

    const OPTIONS_SITE_STATUS_CLOSE = 1;
    const OPTIONS_SITE_STATUS_OPEN = 0;
    /**
     * @var array $site_status_code 0 网站状态, 0关闭,1开放
     */
    public static $site_status_code=[0=>'close',1=>'open'];

    const OPTIONS_TYPE_SYSTEM = 0;
    const OPTIONS_TYPE_SELF = 1;
    const OPTIONS_TYPE_BANNER = 2;
    const OPTIONS_TYPE_AD = 3;
    /**
     * @var array $type_code 类型.0系统,1自定义,2banner,3广告
     */
    public static $type_code = [0=>'system',1=>'self',2=>'banner',3=>'ad',];

    const OPTIONS_INPUT_TYPE_INPUT = 0;
    const OPTIONS_INPUT_TYPE_TEXTEARE = 1;
    const OPTIONS_INPUT_TYPE_IMG = 2;
    const OPTIONS_INPUT_TYPE_MARKDOWN = 3;
    /**
     * @var array $input_type_code 输入框类型
     */
    public static $input_type_code = [0=>'input',1=>'texteare',2=>'img',3=>'markdown',];

    const OPTIONS_AUTOLOAD_NO = 0;
    const OPTIONS_AUTOLOAD_YES = 1;
    /**
     * @var array $autoload_code 自动加载.0否,1是
     */
    public static $autoload_code = [0=>'no',1=>'yes',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['type'], 'in', 'range' => [0,1,2,3,],],
            [['input_type'], 'in', 'range' => [0,1,2,3,],],
            [['autoload'], 'in', 'range' => [0,1,],],
            [['type'], 'default', 'value' =>'0',],
            [['input_type'], 'default', 'value' =>1,],
            [['autoload'], 'default', 'value' =>1,],
            [['tips'], 'default', 'value' =>'',],
            [['sort'], 'default', 'value' =>'0',],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'search' => [
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'frontend' => [
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'custom'=>[
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[

        ]);
    }

    public function behaviors()
    {
        return [
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }

    /**
     * @return array
     */
    public function getNames()
    {
        return array_keys($this->attributeLabels());
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        $this->removeBackendMenuCache();
        parent::afterSave($insert, $changedAttributes);
    }

    public function beforeSave($insert)
    {
        if(!$insert){
            if( $this->input_type == self::OPTIONS_INPUT_TYPE_IMG ) {
                $temp = explode('\\', self::className());
                $modelName = end( $temp );
                $key = "{$modelName}[{$this->id}][value]";

            }
        }
        return true;
    }

    public static function getBannersByType($name)
    {
        $model = Options::findOne(['type'=>self::OPTIONS_TYPE_BANNER, 'name'=>$name, 'autoload'=>self::OPTIONS_AUTOLOAD_YES]);
        if( $model == null ) throw new NotFoundHttpException("None banner type named $name");
        if( $model->value == '' ) $model->value = '[]';
        $banners = json_decode($model->value, true);
        ArrayHelper::multisort($banners, 'sort');

        try{
            /** @var $cdn \feehi\cdn\TargetInterface */
            $cdn = yii::$app->get('cdn');
            if($cdn){
                foreach ($banners as $k => &$banner){
                    if( $banner['status'] == self::OPTIONS_SITE_STATUS_OPEN ) unset($banners[$k]);
                    $banner['img'] = $cdn->getCdnUrl($banner['img']);
                }
            }
        }catch (Exception $e){
        }
        return $banners;
    }

    public static function getAdByName($name)
    {
        return AdForm::findOne(['type'=>self::OPTIONS_TYPE_AD, 'name'=>$name]);
    }

    /**
     * 站点缓存失效
     */
    public function removeBackendMenuCache()
    {
        $path=self::$depency_filename;
        $file=\yii::getAlias($path);
        $path=pathinfo($file);
        if (file_exists($file)) {
            file_put_contents($file, date("Y-m-d H:i:s").'-'.microtime(true));
        }else{
            FileHelper::createDirectory($path['dirname']);
            try{
                $depanceFile=fopen($file,'w');
                fwrite($depanceFile, date("Y-m-d H:i:s").'-'.microtime(true));
                fclose($depanceFile);
            }catch (Exception $e){
            }
        }
    }

}
