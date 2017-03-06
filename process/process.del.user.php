<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="GET"){
	
	if(isset($_GET['userId']) && isset($_GET['check_send'])){
		if($_GET['check_send'] == "del_user" ){
			
			include('dbconfig.inc.php');
			
			$user_id = $_GET['userId'];
			
			$sql_del_user = "DELETE FROM user WHERE user_id = ". $user_id;
			$conn->query($sql_del_user);
			$conn->close();
			
			echo '<script type="text/javascript">alert("ลบ user ทิ้งแล้ว");  window.location = "../user.management.php";</script>';
		}else{
			echo '<script type="text/javascript">alert("ใม่อนุญาติให้ใช้งาน");  window.location = "../user.management.php";</script>';
		}
		
	}else{
		echo '<script type="text/javascript">alert("ใม่อนุญาติให้ใช้งาน");  window.location = "../user.management.php";</script>';
	}
}else{
	echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.history.back();</script>';
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}
?>