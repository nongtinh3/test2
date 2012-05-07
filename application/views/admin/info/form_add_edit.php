<script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txttitle;
		var name_ac_ta = document.form_login.txtinfo;
		if(name_ac_tv.value == '')
		{
			alert('Tên không được bỏ trống');
			name_ac_tv.focus();
			return false;
		}
		if(name_ac_ta.value == '')
		{
			alert('Tên không được bỏ trống');
			name_ac_ta.focus();
			return false;
		}
		return true;
	}
</script>
<form action="<?=base_url();?>index.php/admin/introduction/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Thêm - sửa bài viết</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/introduction/'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tiêu đề</td>
                <td width="80%">
                	<?php if(@$introduction->title!='') {?>
                    <input type="text" name="txttitle" style="width:400px" value="<?=@$introduction->title;?>" />
                    <?php } else { ?>
                    <input type="text" name="txttitle" style="width:400px"  />
                    <?php } ?>
                </td>
            </tr>          	
           
            <tr>    
                <td width="20%">Nội dung</td>
                <td width="80%">
                	<?php if(@$introduction->info!='') {?>
                	<textarea class="ckeditor" name="txtinfo"><?=@$introduction->info;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txtinfo"></textarea> 
                    <?php } ?>         		               	
                </td>
            </tr> 
             <tr>    
                <td width="20%">Danh mục</td>
                <td width="80%">
                <select name="txtdanhmuc">                	
                    <option value="1"<?php if(@$introduction->danhmuc==1) echo "selected";?>>Giới thiệu</option>
                    <option value="2"<?php if(@$introduction->danhmuc==2) echo "selected";?>>Trả góp</option>
                    <option value="3"<?php if(@$introduction->danhmuc==2) echo "selected";?>>Khuyến mãi</option>                   
                </select></td>
            </tr>     
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$introduction->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$introduction->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
</div>
        	<input type="hidden" name="id" value="<?=@$introduction->id;?>">
       
        </form>
    
    
    