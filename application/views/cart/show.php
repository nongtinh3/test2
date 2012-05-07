<?php
	foreach($products as $row)
	{
?>
	<form action="<?=base_url();?>index.php/cart/add" method="post">
    	<table>
        	<tr>
            	<td><?=$row->p_name;?></td>
                <td><img src="<?=base_url();?><?=$row->p_image;?>" /></td>
                <td><input type="hidden" name="qty[]<?=$row->p_id;?>" value="1" size="1" /><br />
                	<input type="hidden" name="id" value="<?=$row->p_id;?>" />
                	<input type="submit" name="ok" value="Gio hang" />
                </td>
            </tr>
        </table>
    </form>
<?php
	}
?>	