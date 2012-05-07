<div id="left">
    	<div class="sanpham">
        	<h1 class="maudo"><a href="<?=base_url();?>index.php/main" class="a_trangchu">Trang chủ</a>>><a href="<?=base_url();?>index.php/news#left" class="a_trangchu">Tin tức</a>	</h1>         
        </div>
        <div class="ct">
        <table class="tintuc">
        <?php foreach($news as $row){ ?>
            	<tr>
                	<td rowspan="3"><img src="<?=base_url();?><?=$row->image;?>" width="100" height="80" style="padding-top:5px;" /></td>
                </tr>
                <tr>
                	<td class="td_news"><a href="<?=base_url();?>index.php/news/detail/<?=$row->news_id;?>#left" class="a_red"><?=$row->name;?></a></td>
               </tr>
               <tr>
                    <td class="td_news"><?=$row->short_info;?></td>
                </tr>
                <tr>
                	<td colspan="2" class="td_news"><a href="<?=base_url();?>index.php/news/detail/<?=$row->news_id;?>#left" class="a_red_bg">Xem chi tiết</a></td>
                </tr>
                <tr>
                	<td colspan="2" style="border-bottom:1px dotted #000;"></td>
                </tr>            
         <?php }?>       
           </table>	
        </div>
         
        </div>  
  
  
  
  
