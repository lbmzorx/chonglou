<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2018/3/2
 * Time: 10:35
 */
?>
<?=$this->beginPage()?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>缓存列表</title>
        <meta name="keywords" content="">
        <meta name="description" content="">

        <link href="/public/h/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
        <link href="/public/h/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
        <link href="/public/h/css/plugins/jsTree/style.min.css">
        <link href="/public/h/css/style.min862f.css?v=4.1.0" rel="stylesheet">
        <link href="/public/admin/css/style.css" rel="stylesheet">
        <script type="text/javascript">var CSRF='<?=Yii::$app->request->csrfToken?>'</script>
        <script src="/public/h/js/jquery.min.js?v=2.1.4"></script>
        <script src="/public/h/js/bootstrap.min.js?v=3.3.6"></script>
        <!--<script src="/public/h/js/content.min.js?v=1.0.0"></script>-->
        <script src="/public/h/js/plugins/layer/layer.min.js"></script>
        <script src="/public/admin/js/common.js"></script>
        <script src="/public/h/js/plugins/jsTree/jstree.min.js"></script>
        <style>
            .panel-body{ padding: 15px!important;}
            .panel-body a{margin: 0px 15px; font-size: 16px; color: #676a6c;}
            .btn {color: #fff!important;}
            .table,th {text-align: center;}
            .col-sm-2{width: 300px;}
        </style>
    </head>
    <?=$this->beginBody()?>
    <body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>缓存 目录结构 缓存类型：<?=$cacheType['name']?>
                        </h5>
                        <a class="pull-right" onclick="post_url('<?=\yii\helpers\Url::to(['del-all'])?>',{})" href="javascript:void(0)">
                            <i class="fa fa-trash-o fa-lg"></i>删除所有</a>
                    </div>
                    <div class="ibox-content">
                        <div id="jstree1" class="jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_25" aria-busy="false">
                            <?=$this->render($cacheType['type'],['data'=>$data])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            解析内容<small></small>
                        </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="analysis_content" class="jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_25" aria-busy="false">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>缓存原生内容：
                            <small></small>
                        </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="origin_content" class="jstree jstree-1 jstree-default">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="analysis">
    </div>
    <?=$this->endBody()?>
    <script type="text/javascript">
        $(function () {
            $('form').submit(function () {
                alert('提交');
                $.ajax('<?=\yii\helpers\Url::to([''])?>',{
                    type:'get',
                    data:{a:11},
                    success:function (res) {
                        if(res.status==true){
                            alert('成功');
                        }
                    },
                    dataType:'json'
                });
                return false;
            });

            $("#jstree1").jstree({
                "core": {"check_callback": true},
                "plugins": ["types", "dnd"],
                "types": {
                    "default": {"icon": "fa fa-folder"},
                    "html": {"icon": "fa fa-file-code-o"},
                    "svg": {"icon": "fa fa-file-picture-o"},
                    "css": {"icon": "fa fa-file-code-o"},
                    "bin": {"icon": "fa fa-file-code-o"},
                    "img": {"icon": "fa fa-file-image-o"},
                    "js": {"icon": "fa fa-file-text-o"}
                }
            });
        });

        function post_url(url,data) {
            $.post(url,data,function (res) {
                if(!res.status){
                    layer.alert(res.msg);
                }else{
                    layer.msg(res.msg,{time:1000},function () {
                        location.reload();
                    });
                }
            },'json');
        }

        function getInfo(url) {
            $.get(url,{},function (res) {
                if(!res.status){
                    layer.alert(res.msg);
                }else{
                    $("#origin_content").text(res.data.origin);
                    $("#analysis_content").html(res.data.analysis);
                }
            },'json');
        }

        function delKey(url,data) {
            data._csrf=CSRF;
            $.post(url,data,function (res) {
                if(!res.status){
                    layer.alert(res.msg);
                }else{
                    $("#origin_content").text('');
                    $("#analysis_content").html('');
                    layer.msg(res.msg,{time:1000},function () {
                        location.reload();
                    });
                }
            },'json');
        }

    </script>
    </body>
    </html>
<?=$this->endPage()?>