<ul>
    <?php foreach ($data as $v):?>
        <?php if(isset($v['child'])):?>
            <li><?=$v['name']?><span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-file-key','key'=>$v['name']])?>',{key:'<?=$v['name']?>'})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
                <ul>
                <?php foreach ($v['child'] as $vv):?>
                    <?php if(isset($vv['child'])):?>
                        <li><?=$vv['name']?><span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-file-key','key'=>$v['name'],'kkey'=>$vv['name'],])?>',{key:'<?=$v['name']?>',kkey:'<?=$vv['name']?>'})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
                        <ul>
                            <?php foreach ($vv['child'] as $vvv):?>
                                <li data-jstree='{"type":"bin"}'><?=$vvv['name']?>
                                    <span onclick="getInfo('<?=\yii\helpers\Url::to(['get-file-key','key'=>$v['name'],'kkey'=>$vv['name'],'kkkey'=>$vvv['name']])?>')"><?=$vvv['name']?></span>
                                    <span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-file-key'])?>',{key:'<?=$v['name']?>',kkey:'<?=$vv['name']?>',kkkey:'<?=$vvv['name']?>'})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    <?php else:?>
                        <li data-jstree='{"type":"key"}'>
                            <span onclick="getInfo('<?=\yii\helpers\Url::to(['get-file-key','key'=>$v['name'],'kkey'=>$vv['name'],])?>')"><?=$vv['name']?></span>
                            <span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-file-key',])?>',{key:'<?=$v['name']?>',kkey:'<?=$vv['name']?>'})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
                </ul>
        <?php else:?>
            <li data-jstree='{"type":"key"}'>
                <span onclick="getInfo('<?=\yii\helpers\Url::to(['get-file-key','key'=>$v['name'],])?>')"><?=$v['name']?></span>
                <span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-file-key',])?>',{key:'<?=$v['name']?>'})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
            </li>
        <?php endif;?>
    <?php endforeach;?>
</ul>