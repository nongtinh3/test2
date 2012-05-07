
<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo">Giỏ hàng</h1>         
        </div>
        <div class="ct">
        <?php if(@$total > 0) {
				if($cart=$this->cart->contents())
				{	
		?>
        <form action="<?=base_url();?>index.php/cart/update" method="post">
        		<table width="100%"  class="table1">
                	<tr>
                    	<td colspan="5" align="center"><strong><h3 style="padding:0px 0px 0px 10px; font-size:12px;">Bạn có <?=@$total;?> sản phẩm trong giỏ hàng</h3></strong></td>                       
                    </tr>
                	<tr>
                    	<td class="red">Hình</td>
                        <td class="red">Tên</td>
                        <td class="red">Số lượng</td>
                        <td class="red">Giá</td>
                         <td class="red">Thành tiền</td>
                        <td class="red">Xóa</td>
                    </tr>
                 <?php $i=1; ?> 
                 <?php foreach($cart as $item) { ?>        
                    <tr class="tr">
                    	<td class="red1"><img src="<?=base_url();?><?=$item['image'];?>" style="width:120px; height:120px;" /></td>
                        <td class="red1"><?=$item['name'];?></td>
                        <td class="red1"><input type="text" name="qty[]<?=$i;?>" value="<?=$item['qty'];?>" size="1" />
                               <input type="hidden" name="rowid[]<?=$i;?>" value="<?=$item['rowid'];?>"></td>
                        
                        <td class="red1"><?=number_format($item['price'],0,'','.');?></td>
                        <td class="red1"><?=number_format($item['price']*$item['qty'],0,'','.');?> VNĐ</td>
                        <td class="red1"><a href="<?=base_url();?>index.php/cart/remove/<?=$item['rowid'];?>#left"><img src="<?=base_url();?>public/image/notok.jpg" /></a></td>
                    </tr>  
                    
                     
                  <?php $i++; } ?> 
                  <tr>
                  	<td colspan="5" style="text-align:right"><strong>Tổng thành tiền: <?=number_format($subtotal,0,'','.');?> VNĐ</strong></td>
                  </tr>
                  <tr>
                    	<td colspan="5" class="red1">                       	
                            	
                                    	<input type="submit" name="ok" value="Cập nhật số lượng" class="input_right" />
    
                        </td> 
                        <td colspan="6" class="red1">                       	
                            	<a href="<?=base_url();?>index.php/cart/checkout#left" class="input_a">Thanh tóan</a>                                
                        </td>  
                        

                   </tr>              
                </table>
               </form> 
           <?php
				}
			} else {
			?>
            	<p align="center" style="line-height:25px; font-weight:bold;">Giỏ hàng bạn trống</p>
            <?php	
			}
		   ?>     
                
           	
        </div>
         
        </div>  
  
  
  
  
