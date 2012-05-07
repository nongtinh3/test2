<div id="top">
    <img src="<?=base_url();?>public/image/panner.png" style="width:1000px" />
    </div>   
    <div id="menu">
    	<ul class="nav">
        	
           
        	<li><a href="<?=base_url();?>index.php/main">Trang chủ</a></li>
           	
            <li><a href="<?=base_url();?>index.php/news">Tin tức</a>
            	
            </li>
            <li><a href="<?=base_url();?>index.php/introduction/">Giới thiệu</a></li>
            <li><a href="<?=base_url();?>index.php/tragop">Trả góp</a></li>
            <li><a href="<?=base_url();?>index.php/khuyenmai">Khuyến mãi</a></li>
            <li><a href="<?=base_url();?>index.php/contact">Liên hệ</a></li>
             <li><a href="#">Download</a></li>
            
        </ul>
	</div>
    
     <div class="ls"></div>
     <div id="slider" class="nivoSlider">
     	<?php foreach($quangcao as $row) {?>
            <a href="<?=base_url();?><?=$row->lienket;?>"><img src="<?=base_url();?><?=$row->image;?>" alt="" /></a>
            
        <?php } ?>    
        </div>
        
       
<div class="ls"></div>
    <div id="menu_dm">
    	<ul class="nav">
        	<?php foreach($aces as $row) {?>
            	<li><a href="#" class="mauxanh"><?=$row->ac_name;?></a>
                	<ul>     
                    	<?php foreach($cates as $rows)
							{
								if($rows->ac_id == $row->ac_id)
								{
						?>
                         <li><a href="<?=base_url();?>index.php/product/show/<?=$rows->cate_id;?>#left" class="mauxanh"><?=$rows->cate_name_tv;?></a></li>
                        <?php			
									
								}
							}
									
						?>
                        		
                                       	               	
                                                           	
                    </ul>					
                </li>
            <?php } ?>
        	
        </ul>
    </div>