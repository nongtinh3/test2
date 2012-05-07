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
<form action="<?=base_url();?>index.php/admin/contact/reply/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Liên hệ</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/contact'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
           <tr>    
                <td width="20%">Email</td>
                <td width="80%">                	
                	<input type="text" name="txtemail" value="<?=@$contact->email;?>" size="50">                     
                </td>
            </tr>  
             <tr>    
                <td width="20%">Tiêu đề</td>
                <td width="80%">               
                	<input type="text" name="txt_tieude" value="<?=@$contact->title;?>" size="50">                
                </td>
            </tr> 
             <tr>    
                <td width="20%">Trả lời</td>
                <td width="80%">
                	<textarea class="ckeditor" name="txtmessage"></textarea>
                </td>
            </tr> 
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$contact->active==1) echo "selected";?>>Đã trả lời</option>
                    <option value="0"<?php if(@$contact->active==0) echo "selected";?>>Chưa trả lời</option>                   
                </select></td>
            </tr>     
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$contact->contact_id ;?>">
            
        </form>
    
    
    