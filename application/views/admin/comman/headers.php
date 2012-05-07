<div id="top">
    	<img src="<?=base_url();?>public/image/banner_login.png" />
         <div class="acount">
    	Chào: <?=$username;?>
        <a href="<?=base_url();?>index.php/admin/main/logout" class="white">Thoát</a>
    </div>
    </div>
   
    
    <div id="menu">
    	<ul class="nav">
        	<li><a href="<?=base_url();?>index.php/admin/main">Giới thiệu</a></li>
            <li><a href="">Quản lý Danh mục</a>
            	<ul>
                	<li><a href="<?=base_url();?>index.php/admin/acces/">Danh mục cha</a></li>
                    <li><a href="<?=base_url();?>index.php/admin/categories/">Danh mục con</a></li>
                </ul>
            </li>
            <li><a href="<?=base_url();?>index.php/admin/product/"">Sản phẩm</a></li>
            <li><a href="">Phụ kiện</a></li>
            <li><a href="">Tin tức</a>
            	<ul>
                	<li><a href="<?=base_url();?>index.php/admin/news">Danh mục</a></li>
                    <li><a href="<?=base_url();?>index.php/admin/news/show_news/">Bài viết</a></li>      	
                </ul>
            </li>
            <li><a href="<?=base_url();?>index.php/admin/quangcao">Quảng cáo</a></li>
            <li><a href="<?=base_url();?>index.php/admin/contact">Liên hệ</a></li>
            <li><a href="<?=base_url();?>index.php/admin/user">Người dùng</a></li>
            <li><a href="<?=base_url();?>index.php/main/">Home</a></li>
        </ul>
    </div>
    <div class="ls"></div>