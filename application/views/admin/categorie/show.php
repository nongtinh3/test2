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
			
			window.location.href = '<?=base_url();?>index.php/admin/categories/add_edit/' + a; 
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
			window.location.href='<?=base_url();?>index.php/admin/categories/delete/' + a;
		}
	});	
});
</script>
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Danh mục con</h1>
            </div>
            <div class="right_top">
            
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;">
                        <a href="<?=base_url();?>index.php/admin/categories/add_edit/"><img src="<?=base_url();?>public/image/install.png" height="22" width="22" /></a></td>
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
                <td>Tên danh mục (TV)</td>
                <td>Tên danh mục (TA)</td>  
                <td>Danh mục sản phẩm</td>           
                <td>Hiển thị</td>
                
            </tr>
            <?php if(isset($cates) && $cates !='')
			{
				foreach($cates as $row)
				{
			?>	
            <tr class="td">
            	<td><input type="checkbox" name="id[]" id="id" value="<?=$row->cate_id;?>" /></td>
                <td><a href="<?=base_url();?>index.php/admin/categories/add_edit/<?=$row->cate_id;?>"><?=$row->cate_name_tv;?></a></td>
                <td><?=$row->cate_name_ta;?></td> 
                <td>
                	<?=$this->Mcates->get_name_acces($row->ac_id);?>
                </td>               
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
            	<td><?php if($page) : ?>
                    <?php echo $page;?>
                    <?php endif;?></td>
            </tr>
            
        </table>
       
    </div>
    	
    </div>