  <script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txt_p_name;
		var name_ac_ta = document.form_login.txt_p_price;
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
<form action="<?=base_url();?>index.php/admin/config" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Liên hệ</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Trả lời" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/config'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
         <table class="table">
        	<tr>
            <td width="20%">Tiêu đề website:</td>
            <td width="80%">
            <?php if(@$config->title!='') {?>
             <input type="text" size="50" name="txttitle" value="<?=@$config->title;?>" />
            <?php }  else { ?>
             <input type="text" size="50" name="txttitle"  />
            <?php } ?>
           </td>
            </tr>
            <tr>
            <td width="20%">Từ khóa:</td>
            <td width="80%">
            <?php if(@$config->meta!='') {?>
            <textarea name="txtmeta" class="ckeditor" cols="10" rows="10"><?=@$config->meta;?></textarea>
            <?php }  else { ?>
            <textarea name="txtmeta" class="ckeditor" cols="10" rows="10"></textarea>
            <?php } ?>
            </td>
            </tr>
            
           <tr>
            <td width="20%">Footer(Tiếng việt):</td>
            <td width="80%">
             <?php if(@$config->footer!='') {?>
            <textarea name="txtfoter" class="ckeditor" cols="10" rows="10"><?=@$config->footer;?></textarea>
            <?php }  else { ?>
           <textarea name="txtfoter" class="ckeditor" cols="10" rows="10"></textarea>
            <?php } ?>
            </td>
            </tr>
           <input type="hidden" name="id" value="<?=@$config->id;?>" />
        </table>
        </div>
        
            
        </form>
    