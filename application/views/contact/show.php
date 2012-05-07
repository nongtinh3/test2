
<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo">Liên hệ</h1>         
        </div>
        <div class="ct">
          
                <form action="<?=base_url();?>index.php/contact#left" method="post">
                <table width="100%"  class="table1">
              		<tr>
                    	<td colspan="2" style="text-align:center"><strong><?=@$error;?></strong></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Email</td>
                        <td width="70%"><input type="text" name="txtemail" id="txtemail" style="width:380px" />
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2"  style="text-align:center; padding-bottom:5px"><?=form_error('txtemail');?></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px">Tiêu đề</td>
                        <td width="70%"><input type="text" name="txttitle" style="width:380px" />
                       </td>
                    </tr>
                    <tr>
                    <td colspan="2"  style="text-align:center; padding-bottom:5px"><?=form_error('txttitle');?></td>
                    </tr>
                     <tr>
                    	<td width="30%" style="padding:2px 5px" valign="top">Nội dung</td>
                        <td width="70%"><textarea name="txtnoidung" cols="40" rows="10" >
							
                        </textarea>
                       
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2"  style="text-align:center; padding-bottom:5px"><?=form_error('txtnoidung');?></td>
                    </tr>
                
                  
                    	 <tr>
                    	<td width="30%" ></td>
                        <td width="70%" style="padding:10px 5px">
                        	<table align="left">
                            	<tr>
                                	
                                    <td><input type="submit" name="ok" value="Liên hệ" /></td>
                                </tr>
                             
                            </table>
                        </td>
                    </tr> 
                    </tr>       
                </table>
           	</form>
        </div>
         
        </div>  
  
  
  
  
