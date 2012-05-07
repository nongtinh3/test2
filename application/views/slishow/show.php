<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?=base_url();?>public/css/tooltip.css" type="text/css" rel="stylesheet" />
<link href="<?=base_url();?>public/css/slideshow.css" type="text/css" rel="stylesheet" />
</head>
<body>

	
<!--HTML for the tooltips-->
<div id="mystickytooltip" class="stickytooltip">
    <div style="padding:5px">  
      <?php 
		foreach($products as $row)
		{			
	?>
   
        <div id="sticky<?=$row->p_id;?>" class="atip">
        	 <h2><?=$row->p_name;?></h2>
    		 <img src="<?=base_url();?><?=$row->p_image_thumb;?>" align="left"><br>
             <div class="top">
             	<table border="0"   cellpadding="0" cellspacing="0" >
                	<tr>
                    	<td class="td"><b>Khuyến mãi:</b>
                        <?php if($row->p_khuyenmai =='') { echo "<font color=red>Hết khuyến mãi</font>"; } else { $row->p_khuyenmai;}?></td>
                    </tr>
                    <tr>
                    	<td class="td"><strong>Giá bán:<font color="red"><?=$row->p_price;?></font></strong></td>                        
                    </tr>
                    <tr>
                    	<td class="td"><strong>Mô tả vắn tắt:</strong></td>     
                    </tr>
                    <tr>
                    	<td class="td"><?=$row->p_info;?></td>
                    </tr>
                </table>
             </div>     
        </div>
       <?php
		}
?> 
	</div>
</div>

<div id="outerContainer">
			<div id="imageScroller">
				<div id="viewer" class="js-disabled">                
                <?php 
				
				foreach($products as $row) {
					
				?>            	
                		
                    	<a href="" class="wrapper" data-tooltip="sticky<?=$row->p_id;?>"><img src="<?=base_url();?><?=$row->p_image;?>" style="width:100px; height:100px;" class="logo"></a>           
                  
                								
                 <?php } ?> 
                 
				</div>
			</div>
</div>

<script type="text/javascript" src="<?=base_url();?>public/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/tootip.js"></script>
<script type="text/javascript" src="<?=base_url();?>public/js/slideshow.js"></script>
<?php 
		echo "<table style='width:800px;' align='center'  cellpadding='0' cellspacing='0'>";
		$stt = 0;
		foreach($products as $row)
		{			
			if($stt %4 == 0)
			{
			echo "<tr>";
			}
		$stt++;	
	?>
    	
        	<td class="td"><table align='center'  cellpadding='0' cellspacing='0'><tr><td >
            <a href="" data-tooltip="sticky<?=$row->p_id;?>"><img src="<?=base_url();?><?=$row->p_image;?>" style="width:100px; height:100px;"></a>
            </td></tr></table></td>
		
<?php
			if($stt %4 == 0)
			{
			echo "</tr>";
			}
		}
		echo "</table>";
?>
</body>
</html>
