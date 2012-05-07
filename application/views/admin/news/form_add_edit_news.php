<script type="text/javascript">
	function check_form()
	{
		var name_ac_tv = document.form_login.txtname;
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
<form action="<?=base_url();?>index.php/admin/news/add_edit_news/<?=@$uid;?>" method="post" name="form_login"  onsubmit="return check_form();" enctype="multipart/form-data">
<div class="top_info">
        	<div class="left_top">
        	<h1 class="xanh">Thêm - sửa bài viết</h1>
            </div>
            <div class="right_top">
          
            	<table width="197" class="top_table">
                	<tr>
                    	<td height="45" style="height:30px;"><input type="submit" name="ok" value="Lưu" class="input_save" /></td>
                  <td><input type="reset" onclick="location.href='<?=base_url();?>index.php/admin/news/show_news/'" value="Quay lại" class="input_save" /></td>
                      
                    </tr>
                    
                </table>
            </div>
</div>
        <div class="bottom_info">
        <table class="table1">
        	<tr>           		
                <td width="20%">Tiêu đề</td>
                <td width="80%">
                	<?php if(@$news->name!='') {?>
                    <input type="text" name="txtname" style="width:400px" value="<?=@$news->name;?>" />
                    <?php } else { ?>
                    <input type="text" name="txtname" style="width:400px"  />
                    <?php } ?>
                </td>
            </tr>            	
            </tr>
            <tr>    
                <td width="20%">Thuộc danh mục</td>
                <td width="80%">
                	<select name="txt_cate_news_id">
                    	<?php
							foreach($cate_news as $row)
							{
								if($row->c_news_id == $news->cate_news_id)
								{
						?>
                        		<option value="<?=$row->c_news_id;?>" selected="selected"><?=$row->c_news_name;?></option>
                        <?php			
								}
								else
								{
						?>
                        	<option value="<?=$row->c_news_id;?>"><?=$row->c_news_name;?></option>	
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
                <img src="<?=base_url();?><?=@$news->image_thumb;?>" style="width:100px; height:100px;">                	
                </td>
            </tr>                          
           <tr>    
                <td width="20%">Giới thiệu ngắn</td>
                <td width="80%">
                	<?php if(@$news->short_info!='') {?>
                	<textarea class="ckeditor" name="txtshort_info"><?=@$news->short_info;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txtshort_info"></textarea> 
                    <?php } ?>              		               	
                </td>
            </tr>    
            <tr>    
                <td width="20%">Nội dung</td>
                <td width="80%">
                	<?php if(@$news->info!='') {?>
                	<textarea class="ckeditor" name="txt_info"><?=@$news->info;?></textarea>    
                    <?php } else { ?>
                    <textarea class="ckeditor" name="txt_info"></textarea> 
                    <?php } ?>         		               	
                </td>
            </tr> 
               
            <tr>    
                <td width="20%">Hiển thị</td>
                <td width="80%">
                <select name="txtactive">                	
                    <option value="1"<?php if(@$news->active==1) echo "selected";?>>Hiện</option>
                    <option value="0"<?php if(@$news->active==0) echo "selected";?>>Ẩn</option>                   
                </select></td>
            </tr>     
            
        </table>
        </div>
        	<input type="hidden" name="id" value="<?=@$news->news_id;?>">
            <input type="hidden" name="txtimage" value="<?=@$news->image;?>" />
            <input type="hidden" name="txtimage_thumb" value="<?=@$news->image_thumb;?>" />
        </form>
    
    
    