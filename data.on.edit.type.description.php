<?php
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	$device_old_type = $_POST['device_old_type'];
	if ($device_old_type == ""){
		$text_description = "";
	}else{
		include('process/dbconfig.inc.php');
		$sql_get_detail = "SELECT * FROM `device_type` WHERE `device_type_id` = ". $device_old_type ;
		$dataset_get_detail = $conn->query($sql_get_detail);
		
		while($rs_get_detail = $dataset_get_detail->fetch_assoc()) {
			$text_description = $rs_get_detail['device_type_description'];
		}
		$conn->close();
	}
	
	echo $text_description;
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
?>
