<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
////////////////////////////////////////////////// Update Data With Customer ////////////////////////////////////////////////////////////////////
	
	if($_POST['check_send']=='device_edit_data_chk'){
		include('dbconfig.inc.php');
		
		$device_data_id = $_POST['device_id'];
		$device_data_sn = $_POST['device_sn'];
		$device_edit_cus_name = $_POST['device_cus_name'];
		$device_edit_cus_cat_id = $_POST['device_cus_cat_id'];
		$device_edit_regis_date = $_POST['device_regis_date'];
		$device_edit_status = $_POST['device_status'];
		
		
		$sql_edit_type = "UPDATE `device_data` SET ";
		$sql_edit_type .= "`device_data_cus_name` = '" . $device_edit_cus_name . "', ";
		$sql_edit_type .= "`device_data_cat_id` = '" . $device_edit_cus_cat_id . "', ";
		$sql_edit_type .= "`device_data_regis_date` = '" . $device_edit_regis_date . "', ";
		$sql_edit_type .= "`device_data_status` = '" . $device_edit_status . "', ";
		$sql_edit_type .= "`device_data_user_last_fname` = '" . $_COOKIE['fname'] . "', ";
		$sql_edit_type .= "`device_data_regis_datetime` = now() ";
		$sql_edit_type .= "WHERE `device_data_id` = " . $device_data_id;
		
		$conn->query($sql_edit_type);
		
		$hostname = getHostName();
		$ip_addr = gethostbyname($hostname);
		// log activity
		$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
		$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." แก้ไขข้อมูลอุปกรณ์  ". $device_data_sn .".', ". $_SESSION["user_id"] .")";
		$conn->query($sql_log);
		// end log activity
		
		$conn->close();
		
		//echo 'SQL : '. $sql_edit_type ;
		
		echo '<script type="text/javascript">alert("อัพเดทข้อมูลสำเร็จแล้ว."); window.location = "../main_dashboard.php";</script>';
		
	}
	
	
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}
?>