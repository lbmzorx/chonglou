<!DOCTYPE html>
<html>
<head>
    <title>ocp</title>
</head>
<body>
	<?php if($status):?>
 	<iframe style="width: 100%;height: 1200px;overflow: auto;" frameborder="no" scrolling="no" src="<?=$file?>"></iframe>
	<?php else:?>
		<?=$msg?>
	<?php endif;?>
   
</body>
</html>