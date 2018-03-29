<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2018/2/26
 * Time: 10:35
 */
use \yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
    <title>清除缓存</title>
    <link href="/public/h/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/public/h/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/public/h/css/animate.min.css" rel="stylesheet">
    <link href="/public/h/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>清理缓存</h5>
            </div>
            <div class="ibox-content" style="display: block;">
                <div class="row">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="checkbox-inline i-checks">清理cache缓存</label>
                                <?=Html::beginForm('','post')?>
                                <input type="hidden" name="name" value="cache">
                                <?=Html::submitButton('清理所有缓存',['class'=>'btn btn-primary'])?>
                                <?=Html::endForm()?>
                                <div class="ibox-content">
                                    runtime文件夹下的所有文件都会清理
                                    清理页面缓存
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline i-checks">清理数据库缓存</label>
                                <?=Html::beginForm('','post')?>
                                <input type="hidden" name="name" value="enableSchemaCache">
                                <?=Html::submitButton('清理所有',['class'=>'btn btn-primary'])?>
                                <?=Html::endForm()?>
                                <div class="ibox-content">
                                    <p>
                                        当开启了数据库的表结构缓存之后,需要改动或执行一些改变表结构的sql语句的时候,就会出现表结构被缓存了无法立即修复BUG或故障。
                                        这个时候就需要刷新或者清除数据库表结构的缓存信息。
                                    </p>
                                    <p>
                                        也就是更新表结构，需要清理一下数据库缓存
                                    </p>
                                </div>
                                <div></div>
                            </div>
                            <div class="col-sm-3">
                                <label class="checkbox-inline i-checks">清理redis缓存</label>
                                <?=Html::beginForm('','post')?>
                                <input type="hidden" name="name" value="redis0">
                                <?=Html::submitButton('清理redis 0',['class'=>'btn btn-primary'])?>
                                <?=Html::endForm()?>
                                <?=Html::beginForm('','post')?>
                                <input type="hidden" name="name" value="redis1">
                                <?=Html::submitButton('清理redis cache',['class'=>'btn btn-primary'])?>
                                <?=Html::endForm()?>
                                <?=Html::beginForm('','post')?>
                                <input type="hidden" name="name" value="redis2">
                                <?=Html::submitButton('清理redis session',['class'=>'btn btn-primary'])?>
                                <?=Html::endForm()?>
                                <div class="ibox-content">
                                    清理redis缓存，需要redis连接。<br>
                                    redis 0 是redis 0号数据库;<br>
                                    reids cache 是保存在redis中的rutime cache文件夹数据;<br>
                                    redis session 是保存在redis中的session数据，清理之后所有用户将重新登录;<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public/h/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/h/js/plugins/layer/layer.min.js"></script>
<script>
    $('form').submit(function () {
        var form=$(this);
        layer.confirm('您确定要清理改缓存吗？清理之前请看清楚说明',function () {
            $.post($(this).action,form.serialize(),function (res) {
                if(res.status){
                    layer.msg(res.msg);
                }else{
                    layer.alert(res.msg);
                }
            },'json');
        });
        return false;
    });
</script>
</body>
</html>

