
<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo">Thanh toán</h1>         
        </div>
        <div class="ct">
          
                <form action="<?=base_url();?>index.php/cart/checkout#left" method="post">
                <table width="100%"  class="table1">
              		  <tr>
                    	<td style="text-align:center" colspan="4"><strong><?=@$error;?></strong></td>
                        
                    </tr>  
                	<tr>
                    	<td style="text-align:center" colspan="4"><strong>Thông tin người mua</strong></td>
                        
                    </tr>      
                    <tr>
                    	<td width="30%" style="padding:2px 5px">Họ tên (*)</td>
                        <td width="70%"><input type="text" name="txtname" style="width:380px"
                         value="<?=set_value('txtname');?>" />
						<font color="red"><?=form_error('txtname');?></font></td>
                    </tr>  
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Email(*)</td>
                        <td width="70%"><input type="text" name="txtemail" style="width:380px" value="<?=set_value('txtemail');?>"/>
                        <font color="red"><?=form_error('txtemail');?></font></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Địa chỉ(*)</td>
                        <td width="70%"><textarea name="txtdiachi" style="width:380px">
							<?=set_value('txtdiachi');?>
                        </textarea>
                         <font color="red"><?=form_error('txtdiachi');?></font>
                        </td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Điện thoại(*)</td>
                        <td width="70%"><input type="text" name="txtphone" style="width:380px" value="<?=set_value('txtphone');?>"/>                      
                         <font color="red"><?=form_error('txtphone');?></font></td>
                    </tr>
                   <tr>
                    	<td style="text-align:center" colspan="4"><strong>Thời gian &amp; Chi tiết</strong></td>
                        
                    </tr>  
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Thời gian giao hàng(*)</td>
                        <td width="70%"><input type="text" id="datepicker"  name="txttime" style="width:380px" value="<?=set_value('txttime');?>"></td>
                    </tr>    
                    <tr>
                    	<td width="30%" style="padding:2px 5px">Nội dung chi tiết(*)</td>
                        <td width="70%"><textarea name="txtmessage" style="width:380px; height:100px;">
                        <?=set_value('txtmessage');?>
                        </textarea>
                        <font color="red"><?=form_error('txtmessage');?></font></td>
                    </tr> 
                     <tr>
                    	 <tr>
                    	<td width="30%" ></td>
                        <td width="70%" style="padding:10px 5px">
                        	<table align="left">
                            	<tr>
                                	
                                    <td><input type="submit" name="ok" value="Thanh toán" /></td>
                                </tr>
                             
                            </table>
                        </td>
                    </tr> 
                    </tr>       
                </table>
           	</form>
        </div>
         
        </div>  
  
  
  
  
