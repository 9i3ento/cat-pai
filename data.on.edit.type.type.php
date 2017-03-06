<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	$device_old_type = $_POST['device_old_type'];
	if ($device_old_type == ""){
		$text_type = "";
	}else{
		include('process/dbconfig.inc.php');
		$sql_get_type = "SELECT * FROM `device_type` WHERE `device_type_id` = ". $device_old_type ;
		$dataset_get_type = $conn->query($sql_get_type);
		while($rs_get_type = $dataset_get_type->fetch_assoc()) {
			$text_type = $rs_get_type['device_type_type'];
		}
		$conn->close();
	}
	
	echo $text_type;
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
?>
