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
			
			window.location.href = '<?=base_url();?>index.php/admin/acces/add_edit/' + a; 
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
			window.location.href='<?=base_url();?>index.php/admin/acces/delete/' + a;
		}
	});	
});
</script>
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Danh mục cha</h1>
            </div>
            <div class="right_top">
            
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;">
                        <a href="<?=base_url();?>index.php/admin/acces/add_edit/"><img src="<?=base_url();?>public/image/install.png" height="22" width="22" /></a></td>
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
                <td>Hiển thị</td>
                
            </tr>
            <?php if(isset($acces) && $acces !='')
			{
				foreach($acces as $row)
				{
			?>	
            <tr class="td">
            	<td><input type="checkbox" name="id[]" id="id" value="<?=$row->ac_id;?>" /></td>
                <td><a href="<?=base_url();?>index.php/admin/acces/add_edit/<?=$row->ac_id;?>"><?=$row->ac_name;?></a></td>
                <td><?=$row->ac_name_ta;?></td>                
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
            
            
        </table>
       
    </div>
    	
    </div>