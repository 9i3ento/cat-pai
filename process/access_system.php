<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){

	if($_POST['check_send']=="login_state"){
		
		$get_user = $_POST['admin_user'];
		$get_pass = $_POST['admin_pass'];
	
		include('dbconfig.inc.php');
	
		$sql_get_data = "SELECT * FROM user WHERE user_name = '". $get_user ."';";
		$get_data = $conn -> query($sql_get_data);
	
		while($check_user_set = $get_data->fetch_assoc()){
			$get_user_id = $check_user_set['user_id'];
			$get_user_name = $check_user_set['user_name'];
			$get_user_fname = $check_user_set['user_fname'];
			$get_user_pw = $check_user_set['user_pw'];
		}
	
		if($get_user_name==""){
			echo '<script type="text/javascript">alert("ไม่มี User นี้ในระบบ \n\n กรุณาตรวจสอบ Username & Password ใหม่อีกครั้ง"); window.history.back();</script>';	
		}else{
			if($get_pass==$get_user_pw){
				setcookie('user', $get_user_name, time()+60*60*24*10, '/');
				setcookie('pass', md5($get_user_pw), time()+60*60*24*10, '/');
				setcookie('fname', $get_user_fname, time()+60*60*24*10, '/');
				$_SESSION["user_id"] = $get_user_id;
				
				$hostname = getHostName();
				$ip_addr = gethostbyname($hostname);
				// log activity
				$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
				$sql_log .= "VALUES (now(),'". $ip_addr ."','ผู้ดูแลระบบ ". $get_user_name ." เข้าสู่ระบบ.', ". $get_user_id .")";
				$conn->query($sql_log);
				// end log activity
	
				echo '<script type="text/javascript">alert("ขอต้อนรับเข้าสู่ระบบ...คุณคือ \" '. $get_user_name .' \"");window.location.href="../main_dashboard.php";</script>';
			
				$conn->close();
			}else{
			echo '<script type="text/javascript">alert("คุณกรอกรหัสผ่านผิด \n\n กรุณาตรวจสอบ Password ใหม่อีกครั้ง"); window.history.back();</script>';
			}
		}
	
	}
	
}

if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
if($_SERVER["REQUEST_METHOD"]=="GET"){
	if($_GET['check_send']=="logout"){
		include('dbconfig.inc.php');
		
		$hostname = getHostName();
		$ip_addr = gethostbyname($hostname);
		// log activity
		$sql_log = "INSERT INTO `log_list`(`log_datetime`, `log_addr`, `log_activity`, `log_user_id`) ";
		$sql_log .= "VALUES (now(),'". $ip_addr ."','ผู้ดูแลระบบ ". $_COOKIE["user"] ." ออกจากระบบ.', ". $_SESSION["user_id"] .")";
		$conn->query($sql_log);
		// end log activity
		$conn->close();
		
		setcookie('user', '', time()-1, '/');
		setcookie('pass', '', time()-1, '/');
		setcookie('fname', '', time()-1, '/');
		
		session_unset();
		session_destroy(); 
		
		echo '<script type="text/javascript">alert("การทำงานเสร็จสิ้นแล้ว"); window.location.href="../index.php";</script>';
	}
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}

		
?>