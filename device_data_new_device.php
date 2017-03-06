<?php

if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

	include('process/dbconfig.inc.php');
	
	$search_with_cus = "SELECT device_data_sn, device_data_regis_datetime ";
	$search_with_cus .= "FROM device_data ";
	$search_with_cus .= "WHERE device_data_status = 'New' ";
	$search_with_cus .= "ORDER BY device_data_regis_date DESC";
	$result = $conn->query($search_with_cus);
	$outp = "";
	while($rs = $result->fetch_assoc()) {
		
		if ($outp != ""){
			$outp .= ",";
		}
			$outp .= '{"SerialNo":"' . $rs["device_data_sn"] . '",';
			$outp .= '"RegisDate":"' . $rs["device_data_regis_datetime"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

//echo $search_with_cus;
echo($outp);

}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
 ?>