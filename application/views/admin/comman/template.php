<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=@$title;?></title>
<link href="<?=base_url();?>public/css/style.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url();?>public/css/ui.datepicker.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?=base_url();?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/menu.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/ui_dangky.js"></script>
<script type="text/ecmascript" src="<?=base_url();?>public/js/ui.datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/ui.core.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/calander.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/tootip.js"></script>

</head>

<body>
		<?php echo $headers;?>
    <div id="info">
    	<?php echo $content;?>
        <?php echo $footers;?>
    </div>
    
</body>
</html>