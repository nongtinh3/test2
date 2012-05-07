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
<form action="<?=base_url();?>index.php/admin/product/add_edit/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Sản phẩm</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/product'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tên sản phẩm</td>
                <td width="80%">
                	<?php if(@$products->p_name!='') {?>
                    <input type="text" name="txt_p_name" style="width:400px" value="<?=@$products->p_name;?>" />
                    <?php } else { ?>
                    <input type="text" name="txt_p_name" style="width:400px"  />
                    <?php } ?>
                </td>
            </tr>
            	<tr>           		
                <td width="20%">Giá</td>
                <td width="80%">
                	<?php if(@$products->p_price!='') {?>
                    <input type="text" name="txt_p_price" style="width:200px" value="<?=@$products->p_price;?>" />
                    <?php } else { ?>
                    <input type="text" name="txt_p_price" style="width:200px"  />
                    <?php } ?>
                </td>
            </tr>
            <tr>    
                <td width="20%">Loại sản phẩm</td>
                <td width="80%">
                	<select name="txt_cate_id">
                    	<?php
							foreach($cates as $row)
							{
								if($row->cate_id == $products->p_cate_id)
								{
						?>
                        		<option value="<?=$row->cate_id;?>" selected="selected"><?=$row->cate_name_tv;?></option>
                        <?php			
								}
								else
								{
						?>
                        	<option value="<?=$row->cate_id;?>"><?=$row->cate_name_tv;?></option>	
                        <?php								
								}
							}							
						?>
                    </select>
                </td>
            </tr> 
            <tr>    
                <td width="20%">Hình ảnh</td>
                <td width="80%">
                	<input type="file" name="p_image">
                </td>
            </tr>  
             <tr>    
                <td width="20%"></td>
                <td width="80%">
                <img src="<?=base_url();?><?=@$products->p_image;?>" style="width:100px; height:100px;">                	
                </td>
            </tr>  
             <tr>    
                <td width="20%">Sản phẩm trang chủ</td>
                <td width="80%">                	
                    	<input type="checkbox" value="1" <?php if(@$products->active_index == 1) { echo "checked"; } ?> name="txtactive_index">                 
               		               	
                </td>
            </tr>     
             <tr>    
                <td width="20%">Sản phẩm bán chạy</td>
                <td width="80%">
                	<input type="checkbox" value="1" <?php if(@$products->active_top == 1) { echo "checked"; } ?> name="txtactive_top">             		               	
                </td>
            </tr>  
             <tr>    
                <td width="20%">Sản phẩm slishow</td>
                <td width="80%">
                	<input type="checkbox" value="1" <?php if(@$products->active_slishow == 1) { echo "checked"; } ?> name="txtactive_slishow">             		               	
                </td>
            </tr>   
             <tr>    
                <td width="20%">Giới thiệu (Tiếng Việt)</td>
                <td width="80%">
                	<?php if(@$products->p_info!='') {?>
                	<textarea class="ckeditor" name="txt_info"><?=@$products->p_info;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txt_info"></textarea> 
                    <?php } ?>              		               	
                </td>
            </tr>    
            <tr>    
                <td width="20%">Thông số(Tiếng Việt)</td>
                <td width="80%">
                	<?php if(@$products->p_thongso!='') {?>
                	<textarea class="ckeditor" name="txt_thongso"><?=@$products->p_thongso;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txt_thongso"></textarea> 
                    <?php } ?>         		               	
                </td>
            </tr> 
             <tr>    
                <td width="20%">Khuyến mãi(Tiếng Việt)</td>
                <td width="80%">
                	<?php if(@$products->p_khuyenmai!='') {?>
                	<textarea class="ckeditor" name="txt_khuyenmai"><?=@$products->p_khuyenmai;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txt_khuyenmai"></textarea> 
                    <?php } ?>            		               	
                </td>
            </tr>        
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$products->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$products->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$products->p_id;?>">
            <input type="hidden" name="image" value="<?=@$products->p_image;?>" />
            <input type="hidden" name="image_thumb" value="<?=@$products->p_image_thumb;?>" />
        </form>
    
    
    