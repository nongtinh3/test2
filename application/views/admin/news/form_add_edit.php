<script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txt_c_news_name;
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
<form action="<?=base_url();?>index.php/admin/news/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Danh mục cha</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/news'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tên danh mục(Tiếng việt)</td>
                <td width="80%">
                	<?php if(@$cate_news->c_news_name!='') {?>
                    <input type="text" name="txt_c_news_name" style="width:200px" value="<?=@$cate_news->c_news_name;?>" />
                    <?php } else { ?>
                    <input type="text" name="txt_c_news_name" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>           
          
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$cate_news->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$cate_news->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$cate_news->c_news_id;?>">
        </form>
    
    
    