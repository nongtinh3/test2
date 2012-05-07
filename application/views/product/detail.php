<style type="text/css">

	
</style>
<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo"><?=$products->p_name;?></h1>         
        </div>
        <div class="ct"> 
        	
    		 
             <div class="top">
             <form action="<?=base_url();?>index.php/cart/add#left" method="post">
             	<table border="0" width="730px"   cellpadding="0" cellspacing="0">
                	<tr>
                    	<td rowspan="5" valign="top"><div align="center" style="padding:40px 0px"><img src="<?=base_url();?><?=$products->p_image_thumb;?>"></div></td>
                    </tr>
                	<tr>
                    	<td><b>Khuyến mãi:</b>
                        <?php if($products->p_khuyenmai =='') { echo "<font color=red>Hết khuyến mãi</font>"; } else { $products->p_khuyenmai;}?></td>
                    </tr>
                    <tr>
                    	<td ><strong>Giá bán:<font color="red"><?=number_format($products->p_price,0,'','.');?> VNĐ</font></strong></td>                        
                    </tr>
                    <tr>
                    	<td><strong>Mô tả vắn tắt:</strong></td>     
                    </tr>
                    <tr>
                    	<td><?=$products->p_info;?></td>
                    </tr>
                    <tr>
                    	<td></td>
                    	<td ><input type="image" src="<?=base_url();?>public/image/datmua.gif" class="input" />
                        <input type="hidden" name="qty[]<?=$products->p_id;?>" value="1" />
                         <input type="hidden" name="pid" value="<?=$products->p_cate_id;?>" />
                         <input type="hidden" name="id" value="<?=$products->p_id;?>" />
                        </td>
                    </tr>
                </table>
               </form> 
             </div>   
           
        </div>
     
     
        <div class="sp">
      <div class="sanpham">
        	<h1 class="maudo">Sản phẩm cùng loại</h1>         
        </div>
        	 <table width="100%" height="100%" cellpadding="0" cellspacing="0" class="table" align="center">
             	<?php 
					$stt = 0;
				$products_cl =	$this->Mproducts->show_product_cl($products->p_cate_id,$this->uri->segment(3));
				foreach($products_cl as $row) {
					if($stt%4 == 0)
					{
						echo "<tr align='center'>";
					}
					$stt++;	
				?>
                
                <td>
                  <form action="<?=base_url();?>index.php/cart/add#left" method="post">
                <table width="100%" height="100%" cellpadding="0" cellspacing="0" class="table" align="center">
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
  
  
  
  
