<?php
function countuseronline() {
	$ipQuery = mysql_query ( "SELECT * FROM tbl_online WHERE ipaddress = '" . $_SERVER ['REMOTE_ADDR'] . "' LIMIT 1" );
	$countquery = mysql_query ( "SELECT * FROM tbl_online WHERE ipaddress = 'tongso'" );
	if ($row = mysql_fetch_array ( $countquery )) {
		$total = $row ['lastactive'];
	}
	if (mysql_num_rows ( $ipQuery ) == 1) {
		mysql_query ( "UPDATE tbl_online SET lastactive = " . time () . " WHERE ipaddress = '" . $_SERVER ['REMOTE_ADDR'] . "' LIMIT 1" );
	} else {
		mysql_query ( "INSERT INTO `tbl_online` VALUES ('" . $_SERVER ['REMOTE_ADDR'] . "', " . time () . ")" ) or die ( mysql_error () );
		mysql_query ( "UPDATE tbl_online SET lastactive = " . ($total + 1) . " WHERE ipaddress='tongso'" );
	}
	mysql_query ( "DELETE FROM tbl_online WHERE lastactive < " . (time () - 300) . " AND ipaddress  <> 'tongso' " ) or die ( mysql_error () );
	$allViewQuery = mysql_query ( "SELECT * FROM tbl_online WHERE ipaddress  <> 'tongso'" );
	$onlineCount = mysql_num_rows ( $allViewQuery );
	
	//$re = "<ul>";
	$re = "<li><b>Tr&#7921;c truy&#7871;n</b> : " . $onlineCount."</li>";
	$re .= "<li><b>T&#7893;ng s&#7889; </b> : " . $total . " l&#432;&#7907;t</li>";
	//$re .= "</ul>";
	
	return $re;
}
?>