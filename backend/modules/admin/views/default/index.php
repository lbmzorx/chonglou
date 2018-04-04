<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\behaviors\StatusCode;

/**
 * @var $model \common\models\data\AdminInfo
 */

?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
        <div class="admin-message-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'to_admin_id')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'from_admin_id')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'spread_type')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$spread_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'level')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'read')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$read_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <?= $form->field($model, 'from_type')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$from_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<form id="w0" action="/backend/sys/manager/personal.html" method="post">
    <??>
    <input type="hidden" name="_csrf-backend" value="RFw45gKei3RRDFVTlDZ3iMLpUHj1q8kAAgMcPLhLySMQKnuCMcfKBiFpBiakbBXM74wyHJiGhHgwVlJ54DOIEw==">    <div class="row">
        <div class="col-sm-3">
            <div class="ibox-content text-center">
                <div class="m-b-md">
                    <img class="img-circle circle-border" alt="image" src="/attachment/images/2018/03/13/image_EZDTE46a7W.jpg">
                </div>
                <p class="font-bold"></p><h3><i class="fa fa-mars"></i> 毛毛</h3><p></p>
                <div class="text-center">
                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#avatar-modal"> <i class="fa fa-upload"></i>  头像上传</a>
                </div>
            </div>
            <div class="ibox-content">
                <p><i class="fa fa-map-marker"></i> 安徽省·亳州市·涡阳县</p>
                <p><i class="fa fa-mobile"></i> 17700001978 </p>
                <p>E-MAIL： ～</p>
                <p>最后登陆IP： 116.8.94.154</p>
                <p>最后登陆时间： 2018-04-04 23:04:38</p>
            </div>
            <div class="ibox-content">
                <h5>详细地址</h5>
                <p></p>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>资料编辑</h5>
                </div>
                <div class="ibox-content">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group field-manager-head_portrait">

                                <input type="hidden" id="manager-head_portrait" class="form-control" name="Manager[head_portrait]" value="/attachment/images/2018/03/13/image_EZDTE46a7W.jpg">

                                <div class="help-block"></div>
                            </div>                        </div>
                        <div class="form-group field-manager-realname">
                            <label class="control-label" for="manager-realname">真实姓名</label>
                            <input type="text" id="manager-realname" class="form-control" name="Manager[realname]" value="毛毛">

                            <div class="help-block"></div>
                        </div>                        <div class="form-group field-manager-sex">
                            <label class="control-label">性别</label>
                            <input type="hidden" name="Manager[sex]" value=""><div id="manager-sex"><label><input type="radio" name="Manager[sex]" value="1" checked=""> 男</label>
                                <label><input type="radio" name="Manager[sex]" value="2"> 女</label></div>

                            <div class="help-block"></div>
                        </div>                        <div class="form-group field-manager-mobile_phone">
                            <label class="control-label" for="manager-mobile_phone">手机号码</label>
                            <input type="text" id="manager-mobile_phone" class="form-control" name="Manager[mobile_phone]" value="17700001978">

                            <div class="help-block"></div>
                        </div>                        <div class="form-group field-manager-email">
                            <label class="control-label" for="manager-email">邮箱</label>
                            <input type="text" id="manager-email" class="form-control" name="Manager[email]" value="">

                            <div class="help-block"></div>
                        </div>                        <div class="form-group field-manager-birthday">
                            <label class="control-label" for="manager-birthday">出生日期</label>
                            <div id="manager-birthday-kvdate" class="input-group  date"><span class="input-group-addon kv-date-calendar" title="选择日期"><i class="glyphicon glyphicon-calendar"></i></span><input type="text" id="manager-birthday" class="form-control no_bor krajee-datepicker" name="Manager[birthday]" value="2017-09-13" readonly="readonly" data-datepicker-source="manager-birthday-kvdate" data-datepicker-type="2" data-krajee-kvdatepicker="kvDatepicker_294bd8a3"></div>

                            <div class="help-block"></div>
                        </div>                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group field-manager-provinces">
                                    <label class="control-label" for="manager-provinces">省份</label>
                                    <select id="manager-provinces" class="form-control" name="Manager[provinces]" onchange="widget_provinces(this,1,&quot;manager-city&quot;,&quot;manager-area&quot;)">
                                        <option value="">--请选择省--</option>
                                        <option value="110000">北京</option>
                                        <option value="120000">天津</option>
                                        <option value="130000">河北省</option>
                                        <option value="140000">山西省</option>
                                        <option value="150000">内蒙古自治区</option>
                                        <option value="210000">辽宁省</option>
                                        <option value="220000">吉林省</option>
                                        <option value="230000">黑龙江省</option>
                                        <option value="310000">上海</option>
                                        <option value="320000">江苏省</option>
                                        <option value="330000">浙江省</option>
                                        <option value="340000" selected="">安徽省</option>
                                        <option value="350000">福建省</option>
                                        <option value="360000">江西省</option>
                                        <option value="370000">山东省</option>
                                        <option value="410000">河南省</option>
                                        <option value="420000">湖北省</option>
                                        <option value="430000">湖南省</option>
                                        <option value="440000">广东省</option>
                                        <option value="450000">广西壮族自治区</option>
                                        <option value="460000">海南省</option>
                                        <option value="500000">重庆</option>
                                        <option value="510000">四川省</option>
                                        <option value="520000">贵州省</option>
                                        <option value="530000">云南省</option>
                                        <option value="540000">西藏自治区</option>
                                        <option value="610000">陕西省</option>
                                        <option value="620000">甘肃省</option>
                                        <option value="630000">青海省</option>
                                        <option value="640000">宁夏回族自治区</option>
                                        <option value="650000">新疆维吾尔自治区</option>
                                        <option value="710000">台湾</option>
                                        <option value="810000">香港特别行政区</option>
                                        <option value="820000">澳门特别行政区</option>
                                    </select>

                                    <div class="help-block"></div>
                                </div>    </div>
                            <div class="col-md-4">
                                <div class="form-group field-manager-city">
                                    <label class="control-label" for="manager-city">城市</label>
                                    <select id="manager-city" class="form-control" name="Manager[city]" onchange="widget_provinces(this,2,&quot;manager-area&quot;,&quot;manager-area&quot;)">
                                        <option value="">--请选择市--</option>
                                        <option value="340100">合肥市</option>
                                        <option value="340200">芜湖市</option>
                                        <option value="340300">蚌埠市</option>
                                        <option value="340400">淮南市</option>
                                        <option value="340500">马鞍山市</option>
                                        <option value="340600">淮北市</option>
                                        <option value="340700">铜陵市</option>
                                        <option value="340800">安庆市</option>
                                        <option value="341000">黄山市</option>
                                        <option value="341100">滁州市</option>
                                        <option value="341200">阜阳市</option>
                                        <option value="341300">宿州市</option>
                                        <option value="341500">六安市</option>
                                        <option value="341600" selected="">亳州市</option>
                                        <option value="341700">池州市</option>
                                        <option value="341800">宣城市</option>
                                    </select>

                                    <div class="help-block"></div>
                                </div>    </div>
                            <div class="col-md-4">
                                <div class="form-group field-manager-area">
                                    <label class="control-label" for="manager-area">区</label>
                                    <select id="manager-area" class="form-control" name="Manager[area]">
                                        <option value="">--请选择区--</option>
                                        <option value="341602">谯城区</option>
                                        <option value="341621" selected="">涡阳县</option>
                                        <option value="341622">蒙城县</option>
                                        <option value="341623">利辛县</option>
                                    </select>

                                    <div class="help-block"></div>
                                </div>    </div>
                        </div>

                        <script>
                            function widget_provinces(obj,type_id,cityId,areaId) {
                                $(".form-group.field-"+areaId).hide();
                                var pid = $(obj).val();
                                $.ajax({
                                    type     :"get",
                                    url      : "/backend/sys/provinces/index.html",
                                    dataType : "json",
                                    data     : {type_id:type_id,pid:pid},
                                    success: function(data){
                                        if(type_id == 2){
                                            $(".form-group.field-"+areaId).show();
                                        }

                                        $("select#"+cityId+"").html(data);
                                    }
                                });
                            }
                        </script>                        <div class="form-group field-manager-address">
                            <label class="control-label" for="manager-address">详细地址</label>
                            <textarea id="manager-address" class="form-control" name="Manager[address]"></textarea>

                            <div class="help-block"></div>
                        </div>                        <div class="hr-line-dashed"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit" onclick="SendForm()">保存内容</button>
                        </div>
                    </div>　
                </div>
            </div>
        </div>
    </div></form>