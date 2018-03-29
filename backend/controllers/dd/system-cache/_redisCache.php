<ul>
    <?php foreach ($data as $v):?>
        <li data-jstree='{"type":"key"}'>
            <span onclick="getInfo('<?=\yii\helpers\Url::to(['get-redis-key','key'=>$v])?>')"><?=$v?></span>
            <span style="margin-left: 30px;" onclick="delKey('<?=\yii\helpers\Url::to(['del-redis-key','key'=>$v])?>',{key:<?=$v?>})"><i class="fa fa-trash-o fa-lg"></i>删除</span>
        </li>
    <?php endforeach;?>
</ul>
