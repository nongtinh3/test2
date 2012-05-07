<div id="left">

<form action="<?=base_url();?>index.php/member/login#left" method="post" id="form_login">
            	<table width="250px"   style="padding-top:5px" >                	
                    <tr>
                    	<td style=" padding-left:5px">Email:</td>
                        <td style=" padding-bottom:5px"><input type="text" name="txtemail" id="txtemail" style="width:150px" /></td>
                    </tr>
                    <tr>
                    <td colspan="2"  style="text-align:center; padding-bottom:5px"><span id="emailInfo"></span></td>
                    </tr>
                    <tr>
                    	<td style=" padding-left:5px">Password:</td>
                        <td style=" padding-bottom:5px"><input type="password" name="txtpass" id="txtpass" style="width:150px" /></td>
                    </tr>  
                     <tr>
                    <td colspan="2" style="text-align:center; padding-bottom:5px"><span id="passInfo"></span></td>
                    </tr>                  
                    <tr>
                    	<td colspan="2" class="td"><input type="image" src="<?=base_url();?>public/image/login.jpg" /></td>
                    </tr>
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2"><a href="<?=base_url();?>index.php/member/register">Đăng ký</a> | <a href="#">Quên mật khẩu</a></td>
                        </tr>
                </table>
             </form> 
</div>
