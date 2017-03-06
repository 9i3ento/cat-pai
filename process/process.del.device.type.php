<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	if($_POST['check_send']=="device_delete_type_chk"){
		
		include('dbconfig.inc.php');
		
		$device_delete_type = $_POST['device_delete_type'];
		$confirm_pass = $_POST['device_delete_type_pass'];
		
		
		//Check user matched
		$check_user_sql = "SELECT * FROM user ";
		$check_user_sql .= "WHERE user_name = '". $_COOKIE['user'] ."'";
		
		$check_user_answer = $conn->query($check_user_sql);
		
		while($check_user_set = $check_user_answer->fetch_assoc()){
			$get_user_pw = $check_user_set['user_pw'];
		}
		
		if($confirm_pass == $get_user_pw){
			
			$sql_check_name = "SELECT * FROM device_type ";
			$sql_check_name .= "WHERE device_type_id = ". $device_delete_type;
			
			$set_type_name = $conn->query($sql_check_name);
			while($rs_type_name = $set_type_name->fetch_assoc()){
				$get_name = $rs_type_name['device_type_type'];
			}
			
			$del_type_sql = "DELETE FROM device_type WHERE device_type_id =". $device_delete_type;
			$conn->query($del_type_sql);
			
            //echo $del_type_sql;
            
			$hostname = getHostName();
			$ip_addr = gethostbyname($hostname);
			// log activity
			$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
			$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." ลบข้อมูลอุปกรณ์ ". $get_name ." ออกจากระบบ.', ". $_SESSION["user_id"] .")";
			$conn->query($sql_log);
			// end log activity
			
			echo '<script type="text/javascript">alert("ลบข้อมูลแล้ว.");  window.location = "../device.type.management.php";</script>';
			
		}else{
			echo '<script type="text/javascript">alert("รหัสผ่านผิด กรุณาตรวจสอบอีกครั้ง"); window.history.back();</script>';
		}
		
		$conn->close();
			
		}
}else{
	echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.history.back();</script>';
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}
?>