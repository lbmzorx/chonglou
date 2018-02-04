<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26
 * Time: 23:53
 */
$this->title='文章';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCss(<<<STYLE
    .readme-button:hover{cursor:pointer}
    .media-right .media-additional-info{
    width:40px;
}
    
STYLE
);
?>
<div class="row">
    <!--main body-->
    <div class="col-lg-12 col-md-12" id="home-main">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="panel panel-warning" id="side-article-teaching">
            <div class="panel-heading " id="readme-click">
                <h3 class="panel-title">
                    <i class="fa fa-comments-o"></i>&nbsp;发布须知...
                   <span class="pull-right readme-button" ><span class="glyphicon glyphicon-chevron-down"></span>点击阅读</span>
                </h3>
            </div>
            <div class="panel-body" id="readme-attention" style="display: none">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                        <li class="list-group-item">
                            1
                        </li>
                        <li class="list-group-item">
                            2
                        </li>
                        <li class="list-group-item">
                            3
                        </li>
                        <li class="list-group-item">4</li>
                        <li class="list-group-item">5</li>
                        <li class="list-group-item">
                           6
                        </li>
                        <li class="list-group-item">7</li>
                        <li class="list-group-item">
                        8
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default" >
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <input type="hidden" name="FormArticle[publish]" value="1">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <?= $form->field($model, 'cate_id')->dropDownList(\common\models\crud\ArticleCate::find()
                            ->select(['name','id'])->indexBy('id')->column(),['prompt'=>'请选择状态'])?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'tags')->input(['maxlength'=>true])?>
                    </div>
                </div>
                <?= $form->field($model, 'content',[
                    'class'=>\common\component\widget\EditorMdField::className(),
                    'mdJsOptions'=>[
                        'placeholder'=>'请输入内容',
                    ],
                ])->textarea();?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', '发布'),['class'=>'btn btn-primary','id'=>'submit-publish']) ?>
                    <?= Html::button(Yii::t('app', '存草稿'),['class'=>'btn btn-info save-as-script','id'=>'submit-as-script']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <!--/mian body-->

</div>
<?=$this->registerJs(<<<SCRIPT
    $('#readme-click').click(function(){
        $('#readme-attention').toggle('fast');
    });    
    $('#submit-as-script').click(function(){
        $('#$form->id').find('input[name="FormArticle[publish]"]').val(0);
    });
SCRIPT
)?>