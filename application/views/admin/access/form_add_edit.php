<script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txtac_name;
		var name_ac_ta = document.form_login.txtac_name_ta;
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
<form action="<?=base_url();?>index.php/admin/acces/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Danh mục cha</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/acces'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tên danh mục(Tiếng việt)</td>
                <td width="80%">
                	<?php if(@$acces->ac_name!='') {?>
                    <input type="text" name="txtac_name" style="width:200px" value="<?=@$acces->ac_name;?>" />
                    <?php } else { ?>
                    <input type="text" name="txtac_name" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>
            <tr>    
                <td width="20%">Tên danh mục(Tiếng anh)</td>
                <td width="80%">
                	<?php if(@$acces->ac_name_ta!='') {?>
                    <input type="text" name="txtac_name_ta" style="width:200px" value="<?=@$acces->ac_name_ta;?>" />
                    <?php } else { ?>
                    <input type="text" name="txtac_name_ta" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>   
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$acces->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$acces->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$acces->ac_id;?>">
        </form>
    
    
    