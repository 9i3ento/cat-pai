<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	$regis_new_device = $_POST['regis_new_device'];
	if ($regis_new_device == ""){
		$text_new_type = "-";
	}else{
		include('process/dbconfig.inc.php');
		$sql_get_new_type = "SELECT * FROM `device_type` WHERE `device_type_id` = ". $regis_new_device ;
		$dataset_get_new_type = $conn->query($sql_get_new_type);
		while($rs_get_new_type = $dataset_get_new_type->fetch_assoc()) {
			$text_new_type = $rs_get_new_type['device_type_type'];
		}
		$conn->close();
	}
	
	echo $text_new_type;
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
?>
