<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
//////////////////////////////////  Insert Process /////////////////////////////////////////////////
	if($_POST['check_send']=="device_add_type_chk"){
		include('dbconfig.inc.php');
		
		$device_add_type = $_POST['device_add_type'];
		$device_add_type_model = $_POST['device_add_type_model'];
		$device_add_type_detail = $_POST['device_add_type_detail'];
		
			
		//check repeatedly type
		$add_type_count = 0;
		$sql_get_add_type_form_db = "SELECT * FROM `device_type` WHERE `device_type_model` LIKE '". $device_add_type_model ."' ";
		$result_get_add_type_form_db = $conn->query($sql_get_add_type_form_db);
		while($row = $result_get_add_type_form_db->fetch_assoc()) {
			$add_type_chk = $row['device_type_type'];
			if($add_type_chk != ""){
				$add_type_count = 1;
			}
		}
		
		//insert data
		if($add_type_count == 1){
			echo '<script type="text/javascript">alert("ชนิดสามารถซ้ำได้ แต่\nรุ่นอุปกรณ์จะซ้ำไม่ได้.."); window.history.back();</script>';
		}else{
			$sql_add_new_type = "INSERT INTO `device_type` ";
			$sql_add_new_type .=" (`device_type_type`, `device_type_model`, `device_type_description`,`device_type_register_datetime`)";
			$sql_add_new_type .=" VALUES";
			$sql_add_new_type .=" ('".$device_add_type."','".$device_add_type_model."','".$device_add_type_detail."',now())";
			$conn->query($sql_add_new_type);
			
			$hostname = getHostName();
			$ip_addr = gethostbyname($hostname);
			// log activity
			$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
			$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." เพิ่มข้อมูลชนิด ". $device_add_type .".', ". $_SESSION["user_id"] .")";
			$conn->query($sql_log);
			// end log activity
			
			$conn->close();
			echo '<script type="text/javascript">alert("เพิ่มข้อมูลแล้ว"); window.location="../device.type.management.php"</script>';
		}
	}
	
////////////////////////////////////////////////// Update Process ////////////////////////////////////////////////////////////////////
	
	if($_POST['check_send']=='device_edit_new_type_chk'){
		include('dbconfig.inc.php');
		
		$device_old_type = $_POST['device_old_type'];
		$device_edit_new_type = $_POST['device_edit_new_type'];
		$device_edit_new_type_model = $_POST['device_edit_new_type_model'];
		$device_edit_new_type_detail = $_POST['device_edit_new_type_detail'];
		
		
		$sql_edit_type = "UPDATE `device_type` SET ";
		$sql_edit_type .= "`device_type_type` = '" . $device_edit_new_type . "', ";
		$sql_edit_type .= "`device_type_model` = '" . $device_edit_new_type_model . "', ";
		$sql_edit_type .= "`device_type_description` = '" . $device_edit_new_type_detail . "', ";
		$sql_edit_type .= "`device_type_register_datetime` = now() ";
		$sql_edit_type .= "WHERE `device_type_id` = " . $device_old_type;
		
		$conn->query($sql_edit_type);
		
		$hostname = getHostName();
		$ip_addr = gethostbyname($hostname);
		// log activity
		$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
		$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." แก้ไขข้อมูลชนิด ". $device_edit_new_type .".', ". $_SESSION["user_id"] .")";
		$conn->query($sql_log);
		// end log activity
			
		
		$conn->close();
		
		//echo 'SQL : '. $sql_edit_type ;
		
		echo '<script type="text/javascript">alert("อัพเดทข้อมูลสำเร็จแล้ว.");  window.location = "../device.type.management.php";</script>';
		
		
	}

}

}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}
?>