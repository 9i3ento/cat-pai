<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	//add new device
	if($_POST['check_send']=="add_new_device"){
		include('dbconfig.inc.php');
		
		$device_type = $_POST['regis_new_device'];
		$device_serial = $_POST['device_serial'];
		$device_status = $_POST['device_status'];
		
		//check repeatedly S/N
		$sn_count = 0;
		$sql_get_sn_form_db = "SELECT `device_data_sn` FROM `device_data` WHERE `device_data_sn` = '". $device_serial ."'";
		$result_get_sn_form_db = $conn->query($sql_get_sn_form_db);

		while($row = $result_get_sn_form_db->fetch_assoc()) {
			$sn_chk = $row['device_data_sn'];
			if($sn_chk != ""){
				$sn_count = 1;
			}
		}
		
		//insert data
		if($sn_count == 1){
			echo '<script type="text/javascript">alert("มี Serial No. นี้อยู่แล้ว.."); window.history.back();</script>';
		}else{
			
			$sql_add_new = "INSERT INTO `device_data` ";
			$sql_add_new .=" (`device_data_sn`, `device_data_device_type_id`, ";
			$sql_add_new .="  `device_data_status`, `device_data_user_fname`, `device_data_regis_datetime`)";
			$sql_add_new .=" VALUES";
			$sql_add_new .=" ('".$device_serial."', ".$device_type.", '".$device_status."', '".$_COOKIE['fname']."', now())";
			
			$conn->query($sql_add_new);
			
			$hostname = getHostName();
			$ip_addr = gethostbyname($hostname);
			// log activity
			$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
			$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." เพิ่มข้อมูลอุปกรณ์ใหม่ ". $device_serial .".', ". $_SESSION["user_id"] .")";
			$conn->query($sql_log);
			// end log activity
			
			$conn->close();
			
			echo '<script type="text/javascript">alert("เพิ่มข้อมูลแล้ว"); window.location = "../device.register.new.php";</script>';
			
			echo '</h2></center></div>';
		}
	}
	
	//add new device with customer
	if($_POST['check_send']=="add_new_device_with_cus"){
		include('dbconfig.inc.php');
		
		$device_type = $_POST['regis_new_device']; 
		$device_serial = $_POST['device_serial'];
		$device_cus_name = $_POST['device_cus_name'];
		$device_cus_cat_id = $_POST['device_cus_cat_id'];
		$device_regis_date = $_POST['device_regis_date'];
		$device_status = $_POST['device_status'];
		
		//check repeatedly S/N
		$sn_count = 0;
		$sql_get_sn_form_db = "SELECT `device_data_sn` FROM `device_data` WHERE `device_data_sn` = '". $device_serial ."'";
		$result_get_sn_form_db = $conn->query($sql_get_sn_form_db);

		while($row = $result_get_sn_form_db->fetch_assoc()) {
			$sn_chk = $row['device_data_sn'];
			if($sn_chk != ""){
				$sn_count = 1;
			}
		}
		
		//insert data
		if($sn_count == 1){
			$_SESSION['cus_name'] = $device_cus_name;
			$_SESSION['cus_cat_id'] = $device_cus_cat_id;
			$_SESSION['regis_date'] = $device_regis_date;
			echo '<script type="text/javascript">alert("มี Serial No. นี้อยู่แล้ว.."); window.location = "../device.register.with.customer.php";</script>';
			
		}else{
			
			if($device_status == "ใช้งาน"){
				$device_status = "Used";
			}else if($device_status == "ยกเลิก"){
				$device_status = "Cancel";
			}else if($device_status == "เสีย"){
				$device_status = "Crack";
			}
			
			$sql_add_new = "INSERT INTO `device_data` ";
			$sql_add_new .=" (`device_data_sn`, `device_data_device_type_id`, ";
			$sql_add_new .="  `device_data_cus_name`, `device_data_cat_id`, ";
			$sql_add_new .="  `device_data_regis_date`, `device_data_status`, ";
			$sql_add_new .="  `device_data_user_fname`, `device_data_regis_datetime`)";
			$sql_add_new .=" VALUES";
			$sql_add_new .=" ('".$device_serial."', ".$device_type.", '".$device_cus_name."',";
			$sql_add_new .=" '".$device_cus_cat_id."', '".$device_regis_date."' , '".$device_status."', '".$_COOKIE['fname']."', now())";
			
			//echo $sql_add_new;
			
			$conn->query($sql_add_new);
			
			$hostname = getHostName();
			$ip_addr = gethostbyname($hostname);
			// log activity
			$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
			$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." เพิ่มข้อมูลอุปกรณ์ ". $device_serial .".', ". $_SESSION["user_id"] .")";
			$conn->query($sql_log);
			// end log activity
			
			$conn->close();
			
			echo '<script type="text/javascript">alert("เพิ่มข้อมูลแล้ว"); window.location = "../device.register.with.customer.php";</script>';
		}
	}


}else{
	echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.history.back();</script>';
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}

?>