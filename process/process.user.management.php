<?php
session_start();
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
//////////////////////////////////  Insert Process /////////////////////////////////////////////////
	if($_POST['check_send']=="add_user"){
		include('dbconfig.inc.php');
		
		$user_username = $_POST['user_username'];
		$user_password = $_POST['user_password'];
		$user_fname = $_POST['user_fname'];
		$user_detail = $_POST['user_detail'];
		
		
			
		//check repeatedly type
		$add_user_count = 0;
		$sql_get_add_user_form_db = "SELECT `user_name` FROM `user` WHERE `user_name` LIKE '". $user_username ."' ";
		$dataset_get_add_user_form_db = $conn->query($sql_get_add_user_form_db);
		while($row = $dataset_get_add_user_form_db->fetch_assoc()) {
			$add_user_chk = $row['user_name'];
			if($add_user_chk != ""){
				$add_user_count = 1;
			}
		}
		
		//insert data
		if($add_user_count == 1){
			echo '<script type="text/javascript">alert("มี user นี้อยู่แล้ว.."); window.history.back();</script>';
		}else{
			$sql_add_user = "INSERT INTO `user` ";
			$sql_add_user .=" (`user_name`, `user_pw`, `user_fname`,`user_detail`,`user_regis_datetime`)";
			$sql_add_user .=" VALUES";
			$sql_add_user .=" ('".$user_username."','".$user_password."','".$user_fname."','".$user_detail."',now())";
			$conn->query($sql_add_user);
			
			$conn->close();
			echo '<script type="text/javascript">alert("เพิ่มข้อมูลแล้ว"); window.location = "../user.management.php"</script>';
		}
	}
	
////////////////////////////////////////////////// Update Process ////////////////////////////////////////////////////////////////////
	
	if($_POST['check_send']=='edit_user'){
		include('dbconfig.inc.php');
		
		$user_id = $_POST['userId'];
		$user_password = $_POST['user_password'];
		$user_fname = $_POST['user_fname'];
		$user_detail = $_POST['user_detail'];
		
		
		$sql_edit_user = "UPDATE `user` SET ";
		$sql_edit_user .= "`user_pw` = '" . $user_password . "', ";
		$sql_edit_user .= "`user_fname` = '" . $user_fname . "', ";
		$sql_edit_user .= "`user_detail` = '" . $user_detail . "' ";
		$sql_edit_user .= "WHERE `user_id` = " . $user_id;
		
		$conn->query($sql_edit_user);
		
		$conn->close();
		
		//echo 'SQL : '. $sql_edit_user ;
		
		echo '<script type="text/javascript">alert("อัพเดทข้อมูลสำเร็จแล้ว.");  window.location = "../user.management.php";</script>';
		
		
	}

}


}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "../index.php";</script>';
	}
?>