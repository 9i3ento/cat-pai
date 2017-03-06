<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	include('process/dbconfig.inc.php');
	
	$sql_get_log = "SELECT * FROM user";
	$sql_get_log .= " INNER JOIN log_list ";
	$sql_get_log .= " ON log_user_id = user.user_id ";
	$sql_get_log .= " ORDER BY log_datetime DESC ";
	//echo $sql_get_log;
	$rs_get_log = $conn->query($sql_get_log);
	$outp = "";
	while($set_log_data = $rs_get_log->fetch_assoc()){
		
		if ($outp != ""){
			$outp .= ",";
		}
			$outp .= '{"logDatetime":"' . $set_log_data["log_datetime"] . '",';
			$outp .= '"logActivity":"' . $set_log_data["log_activity"] . '",';
			$outp .= '"logAddr":"' . $set_log_data["log_addr"] . '",';
			$outp .= '"userName":"' . $set_log_data["user_name"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

//echo $search_with_cus;
echo($outp);

}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
 ?>