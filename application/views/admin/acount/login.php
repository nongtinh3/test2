<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=@$title;?></title>
<link href="<?=base_url();?>public/css/css_login.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div id="top">
    	<img src="<?=base_url();?>public/image/banner_login.png" />
    </div>
    <div id="content">
    		
           	  <div class="login">
               	<h1>Đăng nhập hệ thống</h1>
               
                	
                    <?php
					if(isset($error) && $error!='')
					{
						?>
                         <div class="error">
                        <img src="<?=base_url();?>public/image/notice-alert.png" height="29" align="left" />
                       
                        <?php
						echo $error;
						echo"</div>";
					}
					
					?>
                
                <div class="left">
                <div class="title">Xin mời điền vào tên đăng nhập và mật khẩu để đăng nhập vào trang quản trị website
                </div>
                 <div class="title">
                 <img src="<?=base_url();?>public/image/lock.jpg" />
                </div>
                </div>
                
                <div class="right">
                    <div class="title">
                    	<form action="<?=base_url();?>index.php/admin/main/login" method="post">
                        	<fieldset>
                            	<label>Tên đăng nhập :</label>
                                <input type="text" name="txtname" style="width:150px"/>
                                <label>Mật khẩu :</label>
                                <input type="password" name="txtpass" style="width:150px"  />
                                <label>&nbsp;</label>
                                <input type="submit" name="ok" value="Đăng nhập" />
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            	</div>
             
            
    </div>
    <div class="ls"></div>
    <div id="footer">
    	&copy; 2011 Dinh Thanh Minh
    </div>
</body>
</html>
