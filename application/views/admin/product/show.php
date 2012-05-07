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
			
			window.location.href = '<?=base_url();?>index.php/admin/product/add_edit/' + a; 
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
			window.location.href='<?=base_url();?>index.php/admin/product/delete/' + a;
		}
	});	
});
</script>
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Quản lý sản phẩm</h1>
            </div>
            <div class="right_top">
            
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;">
                        <a href="<?=base_url();?>index.php/admin/product/add_edit/"><img src="<?=base_url();?>public/image/install.png" height="22" width="22" /></a></td>
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
                 <td>Hình minh họa</td>
                <td>Tên sản phẩm (TV)</td>
                <td>Đơn giá</td>  
                <td>Thuộc danh mục</td>           
                <td>Hiển thị</td>
                
            </tr>
            <?php if(isset($products) && $products !='')
			{
				foreach($products as $row)
				{
			?>	
            <tr class="td">
            	<td><input type="checkbox" name="id[]" id="id" value="<?=$row->p_id;?>" /></td>
                <td><img src="<?=base_url();?><?=$row->p_image;?>" style="width:60px; height:60px;"/></td>
                <td><a href="<?=base_url();?>index.php/admin/product/add_edit/<?=$row->p_id;?>"><?=$row->p_name;?></a></td>
                <td><?=$row->p_price;?></td> 
                <td>
                	<?=$this->Mcates->get_name_cate($row->p_cate_id);?>
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
           	<td colspan="6"><?=$page;?></td>
           </tr>
        </table>
       
    </div>
    	
    </div>