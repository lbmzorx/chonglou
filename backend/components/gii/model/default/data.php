<?php

/* @var $modelClassName string related model class name */
$modelFullClassName = $className;

$ns=ltrim($generator->ns,"\\");
$modelFullClassName = $ns. '\\' . $modelFullClassName;

$revert=strrev(rtrim($generator->dataModelClass,'\\'));
$dataClass=strrev(substr($revert,0,strpos($revert,'\\')));

$namespace=rtrim(str_replace($dataClass,'',ltrim($generator->dataModelClass ,'\\')),'\\');

echo "<?php\n";
?>
namespace <?= $namespace ?>;

use Yii;

/**
* This is the data class for [[<?= $modelFullClassName ?>]].
*
* @see \<?= $modelFullClassName . "\n" ?>
*/
class <?= $dataClass?> extends \<?= $modelFullClassName?>

{

<?php if($generator->statusCode):?>
<?php
    $statusCodes=$generator->statusCode;
    $statusCodes=explode(',',$statusCodes);
    $generator->statusCodeArray;
    ?>
<?php foreach ($statusCodes as $bcode ):?>
<?php if($generator->keysExist($bcode,array_keys($labels))):?>
        <?php $msg='';foreach ($generator->statusCodeArray[$bcode] as $k=>$v)
            $msg.=(is_numeric($k)?$k:"'".$k."'")."=>'".($v)."',";
            ?>

    public static $<?=$bcode?>_code = [<?=$msg?>];
<?php endif;?>
<?php endforeach;?>
<?php endif;?>

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[

        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[

        ]);
    }

    <?php if($generator->timeUpdate||$generator->timeAdd|| $generator->statusCode):?>
public function behaviors()
    {
        return [
<?php if($generator->timeUpdate||$generator->timeAdd):?>
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
<?php if($generator->timeAdd):?>
<?php if($generator->keysExist($generator->timeUpdate,array_keys($labels))):?>
<?php
            $timeAdd=explode(',',$generator->timeAdd);
            $timeAdd=implode('\',\'',$timeAdd);
            ?>
                    self::EVENT_BEFORE_INSERT => ['<?=$timeAdd ?>'],
<?php endif;?><?php endif;?>
<?php if($generator->timeUpdate):?>
<?php if($generator->keysExist($generator->timeUpdate,array_keys($labels))):?>
<?php
            $timeUpdate=explode(',',$generator->timeUpdate);
            $timeUpdate=implode('\',\'',$timeUpdate);
            ?>
                    self::EVENT_BEFORE_UPDATE => ['<?=$timeUpdate?>'],
<?php endif;?>
<?php endif;?>
                ],
            ],
<?php endif;?>
<?php if($generator->statusCode):?>
<?php if($generator->keysExist($generator->statusCode,array_keys($labels))):?>
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
<?php endif;?>
<?php endif;?>
<?php if($generator->withOneUser):?>
<?php if(array_key_exists('user_id',$labels)):?>
        'withOneUser'=>[
                'class' => \common\components\behaviors\WithOneUser::className(),
            ],
<?php endif;?>
<?php endif;?>
        ];
    }
<?php endif;?>
}