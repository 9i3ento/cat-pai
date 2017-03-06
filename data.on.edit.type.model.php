<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	$device_old_type = $_POST['device_old_type'];
	if ($device_old_type == ""){
		$text_model = "";
	}else{
		include('process/dbconfig.inc.php');
		$sql_get_model = "SELECT * FROM `device_type` WHERE `device_type_id` = ". $device_old_type ;
		$dataset_get_model = $conn->query($sql_get_model);
		while($rs_get_model = $dataset_get_model->fetch_assoc()) {
			$text_model = $rs_get_model['device_type_model'];
		}
		$conn->close();
	}
	
	echo $text_model;
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
?>
