<script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txt_ac_name_tv;
		var name_ac_ta = document.form_login.txt_ac_name_ta;
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
<form action="<?=base_url();?>index.php/admin/categories/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Danh mục con</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/categories'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tên danh mục(Tiếng việt)</td>
                <td width="80%">
                	<?php if(@$cates->cate_name_tv!='') {?>
                    <input type="text" name="txt_ac_name_tv" style="width:200px" value="<?=@$cates->cate_name_tv;?>" />
                    <?php } else { ?>
                    <input type="text" name="txt_ac_name_tv" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>
            <tr>    
                <td width="20%">Tên danh mục(Tiếng anh)</td>
                <td width="80%">
                	<?php if(@$cates->cate_name_ta!='') {?>
                    <input type="text" name="txt_ac_name_ta" style="width:200px" value="<?=@$cates->cate_name_ta;?>" />
                    <?php } else { ?>
                    <input type="text" name="txt_ac_name_ta" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>   
            <tr>    
                <td width="20%">Danh mục sản phẩm</td>
                <td width="80%">
                	<select name="txtdanhmuc">
                    	
                        		<?php foreach($acces as $row)
										{
											if($row->ac_id == @$cates->ac_id)
											{
											?>
                                            	<option value="<?=$row->ac_id;?>" selected="selected"><?=$row->ac_name;?></option>
                                            <?php
											} else {
											?>
                                            <option value="<?=$row->ac_id;?>"><?=$row->ac_name;?></option>
                                            <?php	
											}
                                           
										}
								 ?>
                     
                        							
                       
                    </select>
                </td>
            </tr>   
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$cates->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$cates->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$cates->ac_id;?>">
        </form>
    
    
    