<?php

/* @var $modelClassName string related model class name */
$modelFullClassName = $className;

$ns=ltrim($generator->ns,"\\");
$modelFullClassName = $ns. '\\' . $modelFullClassName;

$revert=strrev(rtrim($generator->dataModelClass,'\\'));
$dataClass=strrev(substr($revert,0,strpos($revert,'\\')));


echo "<?php\n";
?>
namespace <?= $generator->dataModelClass ?>;

use Yii;

/**
* This is the data class for [[<?= $modelFullClassName ?>]].
*
* @see \<?= $modelFullClassName . "\n" ?>
*/
class <?= $dataClass?> extends \<?= $modelFullClassName?>

{

<?php if($generator->behaviorCode):?>
<?php
    $behaviorCodes=$generator->behaviorCode;
    $behaviorCodes=explode(',',$behaviorCodes);
    ?>
<?php foreach ($behaviorCodes as $bcode ):?>
    public static $<?=$bcode?>_code = [0=>'',1=>'',2=>''];
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

    <?php if($generator->behaviorTimeUpdate||$generator->behaviorTimeAdd|| $generator->behaviorCode):?>
public function behaviors()
    {
        return [
<?php if($generator->behaviorTimeUpdate||$generator->behaviorTimeAdd):?>
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
<?php if($generator->behaviorTimeAdd):?>
<?php
            $timeAdd=explode(',',$generator->behaviorTimeAdd);
            $timeAdd=implode('\',\'',$timeAdd);
            ?>
                    self::EVENT_BEFORE_INSERT => ['<?=$timeAdd ?>'],
<?php endif;?>
<?php if($generator->behaviorTimeUpdate):?>
<?php
            $timeUpdate=explode(',',$generator->behaviorTimeUpdate);
            $timeUpdate=implode('\',\'',$timeUpdate);
            ?>
                    self::EVENT_BEFORE_UPDATE => ['<?=$timeUpdate?>'],
<?php endif;?>
                ],
            ],
<?php endif;?>
<?php if($generator->behaviorTimeUpdate):?>
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
<?php endif;?>
        ];
    }
<?php endif;?>
}
