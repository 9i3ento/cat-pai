<?php
define('TITLE','แสดงผลข้อมูล - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');

if($_SERVER["REQUEST_METHOD"]=="GET"){
	$get_sn = $_GET["send_sn"];
	
	include('process/dbconfig.inc.php');
	
	$text_get_data = "SELECT * FROM device_type ";
	$text_get_data .= " INNER JOIN device_data ";
	$text_get_data .= " ON device_data_device_type_id = device_type.device_type_id ";
	$text_get_data .= " WHERE device_data_sn LIKE '". $get_sn ."'";
	$text_get_data .= " ORDER BY device_data_regis_datetime DESC ";
	
	
	
	//echo $text_get_data;
	
	$result_data = $conn->query($text_get_data);
	
	while($data_set = $result_data->fetch_assoc()) {
		$data_sn = $data_set["device_data_sn"];
		$data_type = $data_set["device_type_type"];
		$data_model = $data_set["device_type_model"];
		$data_status = $data_set["device_data_status"];
		$data_cus_name = $data_set["device_data_cus_name"];
		$data_cat_id = $data_set["device_data_cat_id"];
		$data_regis_date = $data_set["device_data_regis_date"];
		$data_fname = $data_set["device_data_user_fname"];
		$data_last_fname = $data_set["device_data_user_last_fname"];
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
	$conn->close();

?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">แสดงผลข้อมูล</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							แสดงผลข้อมูลของ Serial No. เลขที่ <?=$data_sn?></h5>
						</div>
						<div class="panel-body">
							<br>
							<div class="col-sm-7">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-5 control-label">Serial No. :</label>
									<div class="col-sm-7">
										<label for="inputEmail3" class="control-label"><?=$data_sn?></label>
  								    </div>
 								</div>
								
 								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">อุปกรณ์ชนิด :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_type?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">อุปกรณ์รุ่น :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_model?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">สถานะอุปกรณ์ :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_status_text?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">ใช้งานโดย :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_cus_name?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">CAT ID :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_cat_id?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">ใช้งานเมื่อวันที่ :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_regis_date?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">วัน-เวลา บันทึกลงฐานข้อมูล :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_regis_datetime?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">ผู้บันทึกข้อมูล :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_fname?></label>
									</div>
								</div>
								
								<div class="form-group">
									<label for="inputPassword3" class="col-sm-5 control-label">ข้อมูลเปลี่ยนแปลงล่าสุดโดย :</label>
									<div class="col-sm-7">
										<label for="inputPassword3" class="control-label"><?=$data_last_fname?></label>
									</div>
								</div>
								
							</div>
							</div>
							
							<div class="col-sm-5">
								<div class="panel panel-default">
								  <div class="panel-heading">Menu</div>
									<div class="panel-body">
										<form method="post" action="edit.device.data.php" class="form-horizontal">
											<input type="hidden" name="send_sn" value="<?=$data_sn?>">
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-5 control-label">แก้ไขข้อมูล >> </label>
												<div class="col-sm-7">
													<input class="btn btn-primary" type="submit" value="คลิกที่นี่">
												</div>
											</div>
											
										</form>
										
										<form method="post" action="confirm.del.device.data.php" class="form-horizontal">
											<input type="hidden" name="send_sn" value="<?=$data_sn?>">
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-5 control-label">ลบข้อมูลนี้ >> </label>
												<div class="col-sm-7">
													<input class="btn btn-danger" type="submit" value="คลิกที่นี่">
												</div>
											</div>
											
										</form>
										
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
				
				
				
			</div>

	  
	  
	  
	  
</div><!-- /.container -->

<?php
$get_sn = "0";
}
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
?>