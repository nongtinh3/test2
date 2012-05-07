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
			
			window.location.href = '<?=base_url();?>index.php/admin/user/add_edit/' + a; 
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
			window.location.href='<?=base_url();?>index.php/admin/user/delete/' + a;
		}
	});	
});
</script>
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Nhân viên</h1>
            </div>
            <div class="right_top">
            
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;">
                        <a href="<?=base_url();?>index.php/admin/user/add_edit/"><img src="<?=base_url();?>public/image/install.png" height="22" width="22" /></a></td>
                  <td>
                  <a href="#" id="act_edit"><img src="<?=base_url();?>public/image/review_002.png" height="30" width="30" border="0"/></a></td>
                        <td><a href="#" id="act_del"><img src="<?=base_url();?>public/image/cancel_enabled.png" height="30" width="30"/></a></td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div class="bottom_info">
        <table class="table">
        	<tr>
            	<td>Tên sản phẩm
                <input type="text" />
                Loại sản phẩm
                <select><option>Chọn danh mục</option></select>
                <input type="submit" value="Tìm kiếm" />
                <input type="submit" value="Tất cả" /></td>
            </tr>
        </table>
        <table class="table">
        	<tr class="tr">
           		<td><input type="checkbox" name="check_id"/></td>
                <td>Nhân viên</td>
                <td>Họ tên</td>
                <td>Email</td>
                <td>Ngày sinh</td>
                <td>Giới tính</td>
                <td>Địa chỉ</td>
                <td>Quyền</td>
                <td>Hiển thị</td>
                
            </tr>
            <?php if(isset($users) && $users !='')
			{
				foreach($users as $row)
				{
			?>	
            <tr class="td">
            	<td><input type="checkbox" name="id[]" id="id" value="<?=$row->user_id;?>" /></td>
                <td><a href="<?=base_url();?>index.php/admin/user/add_edit/<?=$row->user_id;?>"><?=$row->user_name;?></a></td>
                <td><?=$row->user_fullname;?></td>
                <td><?=$row->user_email;?></td>
                <td><?=$row->add_date;?></td>
                <td><?php if($row->gender ==1)  echo "Nam"; else  echo "Nữ";?></td>
                 <td><?=$row->diachi;?></td>
                 <td>
				 <?php if($row->level ==1)
				 		echo "Admin"; 
						else  echo "Nhân viên";?>
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
            
            
        </table>
       
    </div>
    	
    </div>