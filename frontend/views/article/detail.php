<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26
 * Time: 23:53
 */
$this->title='文章';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!--main body-->
    <div class="col-lg-9 col-md-9" id="home-main">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="panel panel-default" >
            <div class="panel-body">
                <div class="article-title">
                    <h1><?=$article['title']?></h1>

                </div>
                <div class="article-tag-title">
                    <span><?=date('Y-m-d H:i:s',$article['add_time'])?></span>
                    <span class="pull-right addtional-o"><i class="fa fa-folder "></i>&nbsp;<?=$article['collection']?></span>
                    <span class="pull-right addtional-o"><i class="fa fa-thumbs-o-up "></i>&nbsp;<?=$article['thumbup']?></span>
                    <span class="pull-right addtional-o"><i class="fa fa-thumbs-o-up "></i>&nbsp;<?=$article['thumbup']?></span>
                    <span class="pull-right addtional-o"><i class="fa fa-commenting-o "></i>&nbsp;<?=$article['commit']?></span>
                </div>
                <hr>
                <div class="article-main">
                    <?=$article['content']?>
                </div>
                <div class="article-commit" style="margin-top: 20px;">
                    <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1517751597870">
                        <a href="#" class="bds_more" data-cmd="more">分享到：</a>
                        <a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone">QQ空间</a>
                        <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina">新浪微博</a>
                    </div>
                    <div class="page-header">
                        <h4>评论<em><?=$article['commit']?></em>条</h4>
                        <ul class="nav nav-tabs nav-sub">
                            <li role="presentation" class="active"><a href="#">Home</a></li>
                            <li role="presentation"><a href="#">Profile</a></li>
                            <li role="presentation"><a href="#">Messages</a></li>
                        </ul>
                    </div>
                    <ul class="media-list" id="article-commit-list">
                        <li class="media" data-key="6882">
                            <div class="media-left">
                                <a href="/user/44032" rel="author"><img class="media-object" src="/uploads/avatar/000/04/40/32_avatar_small.jpg" alt="lbmzorx"></a></div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="/user/44032" rel="author">lbmzorx</a> 评论于 2018-01-24 18:37        <span class="pull-right">
            <a class="report" data-type="comment" data-id="6882" href="javascript:void(0);"><i class="fa fa-flag-checkered"></i> 举报</a>
                                </span>
                                </div>
                                <div class="media-content">
                                    <p>加密方法都是 php 函数 password_hash()</p>
                                    <div class="hint">共 <em>1</em> 条回复</div>
                                </div>
                                <div class="media-action">
                                    <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i> 回复</a>
                                    <span class="pull-right"><a class="vote up" href="javascript:void(0);" title="" data-type="comment" data-id="6882" data-toggle="tooltip" data-original-title="顶"><i class="fa fa-thumbs-o-up"></i> 0</a><a class="vote down" href="javascript:void(0);" title="" data-type="comment" data-id="6882" data-toggle="tooltip" data-original-title="踩"><i class="fa fa-thumbs-o-down"></i> 0</a></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">图像的数量</li>
                        <li class="list-group-item">24*7 支持</li>
                        <li class="list-group-item">每年更新成本</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/mian body-->
    <!--side body-->
    <div class="col-lg-3 col-md-3" id="home-right">

        <div class="panel panel-default" id="side-article-news">
            <div class="panel-body">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">

                    </ul>
                </div>
            </div>
        </div>

        <!--教程-->
        <div class="panel panel-default" id="side-article-teaching">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;教程...</h3>
            </div>
            <div class="panel-body">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                        <li class="list-group-item">
                            safsad
                        </li>
                        <li class="list-group-item">
                            asdfsadf
                        </li>
                        <li class="list-group-item">
                            asdfsadf
                        </li>
                        <li class="list-group-item">免费 Window 空间托管</li>
                        <li class="list-group-item">图像的数量</li>
                        <li class="list-group-item">
                            <span class="badge">新</span>
                            24*7 支持
                        </li>
                        <li class="list-group-item">每年更新成本</li>
                        <li class="list-group-item">
                            <span class="badge">新</span>
                            折扣优惠
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<?php //=$this->registerJs()?>
<!--<div id="commit-inner" style="display: none;">-->
<div id="commit-inner" >
    <div class="media">
        <div class="media-left">
            <a href="" rel="author">
                <img class="media-object" src="" alt="">
            </a>
        </div>
        <div class="media-body">
            <div class="media-heading">
                <a href="" rel="author"></a>评论于<span class="commit-date"></span>
                <span class="pull-right">
                    <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i> 回复</a>
                 </span>
            </div>
            <div class="media-content">
                <div class="commit-content">aldfjklasjlkf</div>
                <div class="hint">共 <em></em> 条回复</div>
            </div>
        </div>
    </div>
</div>

<!--<div id="commit-out" style="display: none;">-->
<div id="commit-out">
    <li class="media" data-key="6882">
        <div class="media-left">
            <a href="" rel="author"><img class="media-object" src="" alt=""></a></div>
        <div class="media-body">
            <div class="media-heading">
                <a href="" rel="author"></a>评论于<span class="commit-date"></span>
                <span class="pull-right">
                    <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i> 回复</a>
                 </span>
            </div>
            <div class="media-content">
                <div class="commit-content"></div>
                <div class="hint">共 <em></em> 条回复</div>
            </div>
            <div class="media-action">
                <a class="reply" href="javascript:void(0);"><i class="fa fa-reply"></i>回复</a>
                <span class="pull-right">
                    <a class="vote up" href="javascript:void(0);" title="" data-type="" data-id="" data-toggle="" data-original-title="顶">
                        <i class="fa fa-thumbs-o-up"></i> 0</a>
                    <a class="vote down" href="javascript:void(0);" title="" data-type="comment" data-id="6882" data-toggle="tooltip" data-original-title="踩">
                        <i class="fa fa-thumbs-o-down"></i> 0</a>
                </span>
            </div>
        </div>
    </li>
</div>
<script >

    function li_commit(){
        var commit_data="",
            commit_out=$('#commit-out');
        $.each(commit_data,function(k,v){
            $(commit_out).find();
        });
    }

    function create_commit(data,){

    }


</script>
