<script type="text/javascript">
jQuery(document).ready(function() {	 
	$('#act_edit').click(function() {		
		var a = $('input[name="id[]"]:checked').val();
		var dem = $('input[name="id[]"]:checked').length;
		if(dem >=2)
		{
			alert('Bạn nên chọn 1');
		}
		else if(dem == false)
		{
			alert('Bạn chưa chọn cái nào');			
		}
		else
		{
			
			window.location.href = '<?=base_url();?>index.php/admin/news/add_edit_news/' + a; 
		}
				
	});	
	$('#act_del').click(function(){
		var a = $('input[name="id[]"]:checked').val();
		var dem = ('input[name="id[]"]:checked').length;
		if(dem == false)
		{
			alert('Bạn chưa chọn cái nào');
		}
		else
		{
			window.location.href='<?=base_url();?>index.php/admin/news/delete_news/' + a;
		}
	});	
});
</script>
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Bài viết</h1>
            </div>
            <div class="right_top">
            
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;">
                        <a href="<?=base_url();?>index.php/admin/news/add_edit_news/"><img src="<?=base_url();?>public/image/install.png" height="22" width="22" /></a></td>
                  <td>
                  <a href="#" id="act_edit"><img src="<?=base_url();?>public/image/review_002.png" height="30" width="30" border="0"/></a></td>
                        <td><a href="#" id="act_del"><img src="<?=base_url();?>public/image/cancel_enabled.png" height="30" width="30"/></a></td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div class="bottom_info">        
        <table class="table">
        	<tr class="tr">
           		<td><input type="checkbox" name="check_id"/></td>
                <td>Hình ảnh</td>
                <td>Tên bài viết</td>
                <td>Thuộc danh mục</td>          
                <td>Hiển thị</td>
                
            </tr>
            <?php if(isset($news) && $news !='')
			{
				foreach($news as $row)
				{
			?>	
            <tr class="td">
            	<td><input type="checkbox" name="id[]" id="id" value="<?=$row->news_id;?>" /></td>
                <td><img src="<?=base_url();?><?=$row->image;?>" style="width:100px; height:100px;" /></td>          
                <td><a href="<?=base_url();?>index.php/admin/news/add_edit_news/<?=$row->news_id;?>"><?=$row->name;?></a></td>          
                <td><?=$this->Mnews->get_name_cate($row->cate_news_id);?></a></td>          
                          
                 <td>
				 <?php if($row->active ==1)
				 		echo "Hiển thị"; 
						else  echo "Không";?>
                 </td>
                 
                 
            </tr>
            <?php
				}
			}
			?>          
            <tr>
            	<td colspan="5"><?=$page;?></td>
            </tr>
        </table>
       
    </div>
    	
    </div>