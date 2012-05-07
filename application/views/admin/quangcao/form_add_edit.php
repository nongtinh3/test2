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
<form action="<?=base_url();?>index.php/admin/quangcao/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Quảng cáo</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/quangcao'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	
           
            <tr>    
                <td width="20%">Hình ảnh</td>
                <td width="80%">
                	<input type="file" name="p_image">
                </td>
            </tr>  
             <tr>    
                <td width="20%"></td>
                <td width="80%">
                <img src="<?=base_url();?><?=@$quangcao->image_thumb;?>">                	
                </td>
            </tr>  
             <tr>    
                <td width="20%">Liên kết</td>
                <td width="80%">
                <?php if(@$quangcao->lienket!='') {?>
                	<input type="text" name="txt_lienket" value="<?=@$quangcao->lienket;?>">
                <?php } else { ?>
                	<input type="text" name="txt_lienket" >
                <?php } ?>    
                </td>
            </tr> 
             <tr>    
                <td width="20%">Vị trí</td>
                <td width="80%">
                	<select name="txt_vitri">
                    	<?php
							foreach($Mvitri as $row)
							{
								if($row->id_vitri == $quangcao->vitri)
								{
						?>
                        		<option value="<?=$row->id_vitri;?>" selected="selected"><?=$row->name;?></option>
                        <?php			
								}
								else
								{
						?>
                        	<option value="<?=$row->id_vitri;?>"><?=$row->name;?></option>	
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
                    <option value="1"<?php if(@$quangcao->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$quangcao->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$quangcao->q_id;?>">
            <input type="hidden" name="image" value="<?=@$quangcao->image;?>" />
            <input type="hidden" name="image_thumb" value="<?=@$quangcao->image_thumb;?>" />
        </form>
    
    
    