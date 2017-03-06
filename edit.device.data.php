<?php
define('TITLE','แก้ไขข้อมูล - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$get_sn = $_POST["send_sn"];
	
	include('process/dbconfig.inc.php');
	
	$text_get_data = "SELECT * FROM device_type ";
	$text_get_data .= " INNER JOIN device_data ";
	$text_get_data .= " ON device_data_device_type_id = device_type.device_type_id ";
	$text_get_data .= " WHERE device_data_sn = '". $get_sn ."'";
	$text_get_data .= " ORDER BY device_data_regis_datetime DESC ";
	
	
	
	//echo $text_get_data;
	
	$result_data = $conn->query($text_get_data);
	
	while($data_set = $result_data->fetch_assoc()) {
		$data_id = $data_set["device_data_id"];
		$data_sn = $data_set["device_data_sn"];
		$data_type = $data_set["device_type_type"];
		$data_model = $data_set["device_type_model"];
		$data_status = $data_set["device_data_status"];
		$data_cus_name = $data_set["device_data_cus_name"];
		$data_cat_id = $data_set["device_data_cat_id"];
		$data_regis_date = $data_set["device_data_regis_date"];
		$data_regis_datetime = $data_set["device_data_regis_datetime"];
		
		if($data_status == "Used"){
			$data_status_text = "ใช้งาน";
		}else if($data_status == "Cancel"){
			$data_status_text = "ยกเลิก";
		}else if($data_status == "Crack"){
			$data_status_text = "เสีย";
		}else{
			$data_status_text = "อุปกรณ์ใหม่";
		}
		
	}
	
	//echo 'Text is '. $data_sn;
	$conn->close();

?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="">แสดงผลข้อมูล</li>
		<li class="active">แก้ไขข้อมูล</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							แก้ไขข้อมูล</h5>
						</div>
				<div class="panel-body" >
				<div class="row">
					<div class="col-sm-12">
					<form class="form-horizontal" name="regis_device_with_cus" role="form" method="POST" action="process/process_edit_data.php" onsubmit="return check_form_edit_with_customer()">
					<div class="form-group">
						<label for="device_type" class="col-sm-3 control-label">ชนิด :</label>
						<div class="col-sm-5">
							<input type="text" name="device_type" value="<?=$data_type?>" class="form-control" disabled>
						</div>
						
					</div>
					
					<div class="form-group">
						<label for="regis_new_device" class="col-sm-3 control-label">รุ่น :</label>
						<div class="col-sm-5">
							<input type="text" name="device_model" value="<?=$data_model?>" class="form-control" disabled>
						</div>
						
					</div>
					
					<div class="form-group">
						<label for="device_serial" class="col-sm-3 control-label">Serial No. : </label>
					<div class="col-sm-5">
						<input type="text" name="device_serial" value="<?=$data_sn?>" class="form-control" id="device_serial" maxlength="34" placeholder="Serial No." disabled>
						</div>
					</div>
						
					<div class="form-group">
						<label for="device_cus_name" class="col-sm-3 control-label">ชื่อลูกค้า : </label>
						<div class="col-sm-5">
							<input type="text" name="device_cus_name" value="<?=$data_cus_name?>" class="form-control" id="device_cus_name" placeholder="" >
						</div>
						<div id="check_device_cus_name" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove cus_name_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok cus_name_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
						
					<div class="form-group">
						<label for="device_cus_cat_id" class="col-sm-3 control-label">CATID : </label>
						<div class="col-sm-5">
							<input type="text" name="device_cus_cat_id" value="<?=$data_cat_id?>" class="form-control" id="device_cus_cat_id" placeholder="" >
						</div>
						<div id="check_device_cus_cat_id" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove cus_cat_id_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok cus_cat_id_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="device_regis_date" class="col-sm-3 control-label">ลงทะเบียนเมื่อ : </label>
						<div class="col-sm-5">
							<input type="date" name="device_regis_date" value="<?=$data_regis_date?>" class="form-control" id="device_regis_date" placeholder="" >
						</div>
						<div id="check_device_regis_date" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove regis_date_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok regis_date_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="device_status" class="col-sm-3 control-label">สถานะการทำงาน :</label>
						<div class="col-sm-5">
							<select name="device_status" id="device_status" class="form-control" >
								<option value="">เลือก 1 ข้อ</option>
								<option value="Used">ใช้งาน</option>
								<option value="Cancel">ยกเลิก</option>
								<option value="Crack">เสีย</option>
							</select>
						</div>
						<div id="check_device_status" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove status_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok status_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					<input type="hidden" name="device_id" value="<?=$data_id?>">
					<input type="hidden" name="device_sn" value="<?=$data_sn?>">
					<input type="hidden" name="check_send" value="device_edit_data_chk">
					
					
						<div class="form-group"><br>
							<div class="col-sm-3 col-sm-offset-4">
								<button type="submit" class="btn btn-primary" >แก้ไขข้อมูล</button>
							</div>
						</div>
						
				</form>
				</div>
					
				</div>
				</div>
					</div>
				</div>
				
				
				
			</div>

	  
	  
	  
	  
</div><!-- /.container -->

<?php
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
//require('ajax.on.new.device.php');
?>