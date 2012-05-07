<link href="<?=base_url();?>public/css/tooltip.css" type="text/css" rel="stylesheet" />


<script type="text/javascript" src="<?=base_url();?>public/js/tootip.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#act1').click(function(){
			$('.sp').load('<?=base_url();?>index.php/main/product_top#left');
			return false;		
		});
	});
</script>	
    	<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo"><a href="<?=base_url();?>index.php/main#left" class="h1_a">Sản phẩm mới</a><a href="<?=base_url();?>index.php/main/product_top#left"  class="h1_a">Sản phẩm bán chạy</a></h1> 
                    
        </div>
        
      <div id="mystickytooltip" class="stickytooltip">
    <div style="padding:5px">  
      <?php 
		foreach($products as $row)
		{			
	?>
   
        <div id="sticky<?=$row->p_id;?>" class="atip">       	 
    		 
             <div class="top">
             	<table border="0" width="100%"   cellpadding="0" cellspacing="0" >
                	<tr>
                    	<td rowspan="5" class="td1" width="25%" height="50px"><img src="<?=base_url();?><?=$row->p_image_thumb;?>"></td>
                    </tr>
                	<tr>
                    	<td class="td1" width="75%"><b>Khuyến mãi:</b>
                        <?php if($row->p_khuyenmai =='') { echo "<font color=red>Hết khuyến mãi</font>"; } else { $row->p_khuyenmai;}?></td>
                    </tr>
                    <tr>
                    	<td class="td1"><strong>Giá bán:<font color="red"><?=$row->p_price;?></font></strong></td>                        
                    </tr>
                    <tr>
                    	<td class="td1"><strong>Mô tả vắn tắt:</strong></td>     
                    </tr>
                    <tr>
                    	<td class="td1"><?=$row->p_info;?></td>
                    </tr>
                </table>
             </div>     
        </div>
       <?php
		}
?> 
	</div>
</div>  
       
       
        <div class="sp">
      
        	 <table width="100%" height="100%" cellpadding="0" cellspacing="0" class="table">
             	<?php 
					$stt = 0;
				foreach($products as $row) {
					if($stt%4 == 0)
					{
						echo "<tr>";
					}
					$stt++;	
				?>
                
                <td>
                  <form action="<?=base_url();?>index.php/cart/add#left" method="post">
                <table width="100%" height="100%" cellpadding="0" cellspacing="0" class="table">
            	<tr>
                	<td style="color:#03C; font-weight:bold"><?=$row->p_name;?></td>
                </tr>
                <tr>
                	<td><a href="<?=base_url();?>index.php/product/detail/<?=$row->p_id;?>#left" data-tooltip="sticky<?=$row->p_id;?>"><img src="<?=base_url();?><?=$row->p_image;?>" width="160" height="160" /></a></td>
                </tr>
                <tr>
                	<td class="td"><font color="red"><?=number_format($row->p_price,0,'','.');?> VNĐ</font>
                     <input type="hidden" name="qty[]<?=$row->p_id;?>" value="1" /><br />
                    </td>
                </tr>
                <tr>
                	<td><div align="center"><input type="image" src="<?=base_url();?>public/image/datmua.gif" /></div></td>
                </tr>
                <input type="hidden" name="id" value="<?=$row->p_id;?>" />
              
              </table>
               </form>
              </td>
            	<?php 
					if($stt%4 == 0)
					{
						echo "</tr>";
					}
				} 
				?>  
            </table>
           
        </div>
         
        </div>
       
    	
    