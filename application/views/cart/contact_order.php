<style type="text/css">
	#cart td {border-right:1px solid #ddd; border-bottom:1px solid #ddd; padding:5px; font-size:12px;}
	table#cart {border-left:1px solid #ddd; border-top:1px solid #ddd; }
	h1 {font-size:13px; border-bottom:1px solid #ddd; padding:5px; }
</style>
<h1>THÔNG TIN NGƯỜI ĐẶT HÀNG</h1>
<table>
	<tr>
    	<td><b>Người đặt hàng:</b></td>
        <td><?=$hoten;?></td>
    </tr>
    <tr>
    	<td><b>Địa chỉ:</b></td>
        <td><?=$address;?></td>
    </tr>
    <tr>
    	<td><b>Điện thoại:</b></td>
        <td><?=$phone;?></td>
    </tr>
    <tr>
    	<td><b>Email:</b></td>
        <td><?=@$email;?></td>
    </tr>
    <tr>
    	<td valign="top"><b>Nội dung yêu cầu thêm:</b></td>
        <td><?=$message;?></td>
    </tr>
    
</table>

<h1>THÔNG TIN GIỎ HÀNG</h1>
<table width="100%" border="0" align="center" id="cart">
      <tr height="30">
                <td width="10%" align="left"><b>Hình ảnh</b></td>
                <td width="20%" align="left"><b>Tên sản phẩm</b></td>               
              <td width="13%" align="left"><b>Số lượng</b></td>
            <td width="22%" align="left"><b>Giá bán</b></td>
          </tr>
          
          <?php $i =1; ?>
          <?php foreach($cart_content as $items) { ?>
          <tr>
            <td><img src="<?=base_url();?><?=$items['image'];?>" width="60"></td>
            <td><?=$items['name'];?></td>            
            <td><input type="text" name="qty[]<?=$i;?>" id="qty[]<?=$i;?>" value="<?=$items['qty'];?>" size="2">
                <input type="hidden" name="rowid[]<?=$i;?>" value="<?=$items['rowid'];?>">   
             </td>
             <td><?=number_format($items['price']*$items['qty'],0,'','.');?></td>
                       
          </tr>
          <?php $i++;?>
          <?php } ?> 
             <tr>
                  	<td colspan="4" style="text-align:right"><strong>Tổng thành tiền: <?=number_format($subtotal,0,'','.');?> VNĐ</strong></td>
                  </tr>
      
        </table>	  