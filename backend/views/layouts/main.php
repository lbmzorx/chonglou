<?php
use \backend\assets\CommonAsset;
    CommonAsset::register($this);
    $assets_url=$this->assetBundles[CommonAsset::className()]->baseUrl;
?>
<?=$this->beginPage()?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Apricot 1.3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <?=$this->head()?>

    <style type="text/css">
        canvas#canvas4 {
            position: relative;
            top: 20px;
        }
    </style>
</head>

<body>
<?=$this->beginBody()?>

<?=$this->endBody()?>
</body>

</html>
<?=$this->endPage()?>