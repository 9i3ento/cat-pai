<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	if($_POST['check_send']=="del_device"){
		
		include('dbconfig.inc.php');
		
		$confirm_pass = $_POST['confirm_password'];
		$data_id = $_POST['data_id'];
		
		
		//Check user matched
		$check_user_sql = "SELECT * FROM user ";
		$check_user_sql .= "WHERE user_name = '". $_COOKIE['user'] ."'";
		
		$check_user_answer = $conn->query($check_user_sql);
		
		while($check_user_set = $check_user_answer->fetch_assoc()){
			$get_user_pw = $check_user_set['user_pw'];
		}
		
		if($confirm_pass == $get_user_pw){
			
			$sql_check_sn = "SELECT * FROM device_data ";
			$sql_check_sn .= "WHERE device_data_id = ". $data_id;
			
			$set_data_sn = $conn->query($sql_check_sn);
			while($rs_data_sn = $set_data_sn->fetch_assoc()){
				$get_sn = $rs_data_sn['device_data_sn'];
			}
			
			$del_data_sql = "DELETE FROM device_data WHERE device_data_id =". $data_id;
			$conn->query($del_data_sql);
			
			$hostname = getHostName();
			$ip_addr = gethostbyname($hostname);
			// log activity
			$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
			$sql_log .= "VALUES (now(),'". $ip_addr ."','". $_COOKIE["user"] ." ลบข้อมูลอุปกรณ์ ". $get_sn ." ออกจากระบบ.', ". $_SESSION["user_id"] .")";
			$conn->query($sql_log);
			// end log activity
			
			echo '<script type="text/javascript">alert("ลบข้อมูลแล้ว.");  window.location = "../device.search.php";</script>';
			
		}else{
			echo '<script type="text/javascript">alert("รหัสผ่านผิด ไม่สามารถทำรายการได้"); window.location = "../main_dashboard.php";</script>';
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