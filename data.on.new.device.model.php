<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	$regis_new_device = $_POST['regis_new_device'];
	if ($regis_new_device == ""){
		$text_new_model = "-";
	}else{
		include('process/dbconfig.inc.php');
		$sql_get_new_model = "SELECT * FROM `device_type` WHERE `device_type_id` = ". $regis_new_device ;
		$dataset_get_new_model = $conn->query($sql_get_new_model);
		while($rs_get_new_model = $dataset_get_new_model->fetch_assoc()) {
			$text_new_model = $rs_get_new_model['device_type_model'];
		}
		$conn->close();
	}
	
	echo $text_new_model;
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
?>
