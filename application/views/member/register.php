
<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo">Đăng ký tài khoản</h1>         
        </div>
        <div class="ct">
          
                <form action="<?=base_url();?>index.php/member/register#left" method="post">
                <table width="100%"  class="table1">
              		  <tr>
                    	<td style="text-align:center" colspan="4"><strong><?=@$error;?></strong></td>
                        
                    </tr>  
                	<tr>
                    	<td style="text-align:center" colspan="4"><strong>Thông tin tài khoản khách hàng</strong></td>
                        
                    </tr>      
                    <tr>
                    	<td width="30%" style="padding:2px 5px">Họ tên (*)</td>
                        <td width="70%"><input type="text" name="txtname" style="width:380px"
                          />
						<font color="red"><?=form_error('txtname');?></font></td>
                    </tr>  
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Email(*)</td>
                        <td width="70%"><input type="text" name="txtemail" style="width:380px" />
                        <font color="red"><?=form_error('txtemail');?></font></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Password(*)</td>
                        <td width="70%"><input type="password" name="txtpass" style="width:380px" />
                        <font color="red"><?=form_error('txtpass');?></font></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Địa chỉ(*)</td>
                        <td width="70%"><textarea name="txtdiachi" cols="40" rows="10" >
							
                        </textarea>
                         <font color="red"><?=form_error('txtdiachi');?></font>
                        </td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Điện thoại(*)</td>
                        <td width="70%"><input type="text" name="txtphone" style="width:380px" />                      
                         <font color="red"><?=form_error('txtphone');?></font></td>
                    </tr>
                
                  
                    	 <tr>
                    	<td width="30%" ></td>
                        <td width="70%" style="padding:10px 5px">
                        	<table align="left">
                            	<tr>
                                	
                                    <td><input type="submit" name="ok" value="Đăng ký" /></td>
                                </tr>
                             
                            </table>
                        </td>
                    </tr> 
                    </tr>       
                </table>
           	</form>
        </div>
         
        </div>  
  
  
  
  
