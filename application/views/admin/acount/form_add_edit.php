<script type="text/javascript">
	function check_form()
	{
		user = document.form_login.txtuser;
		email = document.form_login.txtemail;
		pass = document.form_login.txtpass;
		pass1 = document.form_login.txtpass1;
		fullname = document.form_login.txtfullname;
		phone = document.form_login.txtphone;
		diachi = document.form_login.txtaddress;
		quyen = document.form_login.quyen;
		rephone=/^[0-9]+$/;
		reg1=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		testmail=reg1.test(email.value); 
		testuser = user.value.replace(" ","");		
		if(user.value =='')
		{
			alert('Tên không được bỏ trống');
			user.focus();
			return false;
		}
		if(testuser.length<=0)
		{
			alert('Tên không được có dấu cách');
			user.focus();
			return false;
		}
		if(pass.value=='')
		{
			alert('Password không được bỏ trống');
			pass.focus();
			return false;
		}
		if(pass.value!=pass1.value)
		{
			alert('Mật khẩu không khớp');
			pass1.focus();
			return false;
		}
		if(fullname.value =='')
		{
			alert('Họ và tên không bỏ trống')
			fullname.focus();
			return false;
		}
		if(!testmail)
		{
			alert('Email không hợp lệ');
			email.focus();
			return false;
		}
		if(!phone.value.match(rephone))
		{
			alert('Số điện thoại phải là số');
			phone.focus();
			return false;
		}
		if(diachi.value == '')
		{
			alert('Địa chỉ không được bỏ trống');
			diachi.focus();
			return false;
		}
		if(quyen.value =='')
		{
			alert('Quyền chưa được chọn');
			quyen.focus();
			return false;
		}
		return true;
	}

</script>
<form action="<?=base_url();?>index.php/admin/user/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Thành viên</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/user'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table">
        	<tr>
            	<?php if(@$error !='') { ?>
                <td colspan="2"><?=@$error;?></td>
                <?php } ?>
				
            </tr>
        	<tr>
            <td width="30%">Tên đăng nhập:</td>
            <td width="70%">
            <?php if(@$users->user_name !=''){?>
             <input type="text" style="width:300px" name="txtuser" value="<?=@$users->user_name;?>" />
            <?php } else {?>
            <input type="text" style="width:300px" name="txtuser" id="txtuser" />
            <?php }?>
            <span id="txtuserInfo"></span></td>
            </tr>
            <tr>
            <td width="30%">Mật khẩu:</td>
            <td width="70%"><input type="password" style="width:300px" name="txtpass" id="txtpass" /></td>
            </tr>
             <tr>
            <td width="30%">Nhập lại mật khẩu:</td>
            <td width="70%"><input type="password" style="width:300px" name="txtpass1" /></td>
            </tr>
             <tr>
            <td width="30%">Họ và tên:</td>
            <?php if(@$users->user_fullname !=''){?>
            <td width="70%"><input type="text" style="width:300px" name="txtfullname" value="<?=@$users->user_fullname;?>" /></td>
            <?php } else {?>
            <td width="70%"><input type="text" style="width:300px" name="txtfullname" /></td>
            <?php }?>
            </tr>
            
            <tr>
            <td width="30%">Giới tính:</td>
            
            <td width="70%">
            	<select name="gioitinh">
                <?php if(@$users->gender !=''){?>
                	<option value="1"<?php if(@$users->gender==1) { echo "selected";} ?>>Nam</option>
                    <option value="0"<?php if(@$users->gender==0) { echo "selected";} ?>>Nữ</option>
				 <?php } else {?>
                 <option value="1">Nam</option>
                 <option value="0">Nữ</option>
                 <?php }?>                    
                </select>
           
            </tr>
            
            
             <tr>
            <td width="30%">Email:</td>
            <?php if(@$users->user_email !=''){?>
            <td width="70%"><input type="text" style="width:300px"name="txtemail" id="txtemail" value="<?=@$users->user_email;?>" />
            <?php } else { ?>
            <td width="70%"><input type="text" style="width:300px"name="txtemail" id="txtemail" />
            <?php } ?>
            <span id="txtemailInfo"></span></td>
            </tr>
           <tr>
            <td width="30%">Số điện thoại:</td>
            <?php if(@$users->phone !=''){?>
            <td width="70%"><input type="text" style="width:300px" name="txtphone" value="<?=@$users->phone;?>" /></td>
            <?php } else { ?>
            <td width="70%"><input type="text" style="width:300px" name="txtphone" /></td>
            <?php } ?>
            </tr>
            <tr>
            <td width="30%">Địa chỉ:</td>
             <?php if(@$users->diachi !=''){?>
            <td width="70%"><input type="text" style="width:300px" name="txtaddress" value="<?=@$users->diachi;?>" /></td>
            <?php } else {?>
            <td width="70%"><input type="text" style="width:300px" name="txtaddress" /></td>
            <?php }?>
            </tr>
            <tr>
             <tr>
            <td width="30%">Ngày sinh:</td>
            <?php if(@$users->add_date !='') {?>			
            <td width="70%"><input type="text" style="width:300px" id="datepicker" name="ngaysinh" value="<?=@$users->add_date;?>" /></td>
            <?php } else { ?>
             <td width="70%"><input type="text" style="width:300px" id="datepicker" name="ngaysinh" /></td>
            <?php }?>
            </tr>
            <tr>
            <td width="30%">Quyền:</td>
            <td width="70%">
            <select name="quyen">
            	<option value="" selected="selected">--Chọn--</option>
                <option value="1"<?php if(@$users->level == 1){ echo "selected"; }?>>Admin</option>
                <option value="0"<?php if(@$users->level == 0){ echo "selected"; }?>>Thành viên</option>
            </select>
          
            </td>
            </tr>
            <tr>
             <td width="30%">Hiển thị:</td>
            <td width="70%">
            <select name="hienthi">
            	<option value="" selected="selected">--Chọn--</option>
                <option value="1"<?php if(@$users->active == 1){ echo "selected"; }?>>Hiển thị</option>
                <option value="0"<?php if(@$users->active == 0){ echo "selected"; }?>>Không hiển thị</option>
            </select>
          <input type="hidden" name="id" value="<?=@$users->user_id;?>" />
          
            </td>
            </tr>
            
            
        </table>
        </div>
        </form>
    
    
    