<div id="right">
			
            <h2 class="maudo1">Hỗ trợ trực tuyến</h2>
            <div class="info_news">
           
            	<table style=" width:240; height:60px;">              	
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2"><img src='http://opi.yahoo.com/online?u=boycute_no_1&m=g&t=14'/></td>
                     </tr>
                     <tr>   
                        <td style=" padding-bottom:5px; padding-left:5px" colspan="2"><b>boycute_no_1@yahoo.com</b></td>
                        
                        </tr>
                </table>
              
            </div>
            <div class="ls"></div>
            <h2 class="maudo1">Giỏ hàng</h2>
            <div class="info_news">
           
            	<table style=" width:240; height:60px;">              	
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2">Bạn có <b><?=@$total;?></b> (SP) | <a href="<?=base_url();?>index.php/cart/views"><b>Đặt hàng</b></a></td>
                        </tr>
                </table>
              
            </div>
            <div class="ls"></div>
             <h2 class="maudo1">Tài khoản</h2>
           
           
            	
                
             <div class="info_news">
             <?php if($this->session->userdata('logged_in')){?>
             	<table style=" width:240; height:60px;">              	
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2"> <?php echo "Bạn <strong>".$this->session->userdata('user_fullname')."</strong>";?> |  <a href="<?=base_url();?>index.php/member/logout">Thoát</b></a></td>
                        </tr>
                </table>
               
               
           		<?php } else { ?>
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
           <?php } ?>
            </div>          
            
            
        	<h2 class="maudo1">Tin nổi bật</h2>
            <?php foreach($news as $row){?>
            <div class="border_news">
                <div class="info_news">
                    <img src="<?=base_url();?><?=$row->image;?>" height="80" width="80" align="left" class="img" />
                    <a href="<?=base_url();?>index.php/news/detail/<?=$row->news_id;?>#left" class="a_news"><?=$row->name;?></a>
                </div>    	
            </div>
             <div class="ls"></div>
            <?php } ?>
           
            
            <h2 class="maudo1">Hàng sắp về</h2>
            <?php foreach($products as $row){?>
        	<div class="info_news">
                <div class="border_news">
                    <img src="<?=base_url();?><?=$row->p_image;?>" height="80" width="80" align="left" class="img" />
                    <a href="<?=base_url();?>index.php/product/detail/<?=$row->p_id;?>#left" class="a_news"><?=$row->p_name;?></a>
                </div>
            </div>
             <div class="ls"></div>
            <?php } ?>
            <h2 class="maudo1">Số người online</h2>
        	  <div class="info_news">
           
            	<table style=" width:240; height:60px;">              	
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2"><strong><?=@$online;?></strong></td>
                        </tr>
                </table>
              
            </div>
            <div class="ls"></div>
        </div>