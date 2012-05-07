<div id="right">
			
            <h2 class="maudo1">Giỏ hàng của bạn</h2>
            <div class="info_news">
           
            	<table style=" width:240; height:60px;">              	
                     <tr>
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2">Bạn có <b><?=@$total;?></b> (SP) | <a href="<?=base_url();?>index.php/cart/views"><b>Đặt hàng</b></a></td>
                        </tr>
                </table>
              
            </div>
            <div class="ls"></div>
             <h2 class="maudo1">Đăng nhập</h2>
            <div class="info_news">
            <form action="#left" method="post" id="form_login">
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
                    	<td style=" padding-bottom:5px; padding-left:5px" colspan="2"><a href="#">Đăng ký</a> | <a href="#">Quên mật khẩu</a></td>
                        </tr>
                </table>
             </form>   
            </div>
            
            <div class="ls"></div>
        	<span><img src="<?=base_url();?>public/image/left_title.jpg" /></span><h2 class="maudo1">Tin tức</h2><span class="right_title"></span>
            <?php foreach($news as $row){?>
        	<div class="info_news">
            	<img src="<?=base_url();?><?=$row->image;?>" height="80" width="80" align="left" class="img" />
                <a href="<?=base_url();?>index.php/news/detail/<?=$row->news_id;?>#left" class="a_news"><?=$row->name;?></a>
            </div>
             <div class="ls"></div>
            <?php } ?>
           
            
            <h2 class="maudo1">Hàng sắp về</h2>
            <?php foreach($products as $row){?>
        	<div class="info_news">
            	<img src="<?=base_url();?><?=$row->p_image;?>" height="80" width="80" align="left" class="img" />
                <a href="<?=base_url();?>index.php/product/detail/<?=$row->p_id;?>#left" class="a_news"><?=$row->p_name;?></a>
            </div>
             <div class="ls"></div>
            <?php } ?>
        </div>