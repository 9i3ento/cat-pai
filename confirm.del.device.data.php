<?php
define('TITLE','การยืนยันการลบ - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
require('inc/inc.navbar.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$get_sn = $_POST["send_sn"];
	
	include('process/dbconfig.inc.php');
	
	$text_get_data = "SELECT * FROM device_data ";
	$text_get_data .= " WHERE device_data_sn = '". $get_sn ."'";
	$text_get_data .= " ORDER BY device_data_regis_datetime DESC ";
	
	
	
	//echo $text_get_data;
	
	$result_data = $conn->query($text_get_data);
	
	while($data_set = $result_data->fetch_assoc()) {
		$data_id = $data_set["device_data_id"];
		$data_sn = $data_set["device_data_sn"];
	}
	
	//echo 'Text is '. $data_sn;
	$conn->close();

?>
<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="">แสดงผลข้อมูล</li>
		<li class="active">ลบอุปกรณ์</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							ลบอุปกรณ์ของ Serial No. เลขที่ <?=$data_sn?></h5>
						</div>
				<div class="panel-body" >
				<div class="row">
					<div class="col-sm-12 text-center">
						
						<h4>
							<p>หากต้องการลบอุปกรณ์ของ Serial No. เลขที่ <?=$data_sn?> </p><br>
							<p>กรุณากรอกรหัสผ่านของคุณ เพื่อยืนยันการลบนี้ </p><br>
						</h4>
						
							<form class="form-horizontal" id="check_password" name="check_password" method="post" action="process/process.del.device.data.php" onsubmit="return check_confirm_password()" >
								
								<div class="form-group">
									<label for="device_serial" class="col-sm-4 control-label">Password : </label>
									<div class="col-sm-4">
										<input type="password" id="confirm_pass" name="confirm_password" class="form-control">
									</div>
									<div id="check_check_pass" class="col-sm-1" style="margin-top:10px;">
										<span class="glyphicon glyphicon-remove check_pass_glyphicon_no" aria-hidden="true" style="color:red;"></span>
										<span class="glyphicon glyphicon-ok check_pass_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
									</div>
									<div class="col-sm-2 text-left">
										<input type="hidden" name="data_id" value="<?=$data_id?>">
										<input type="hidden" name="check_send" value="del_device">
										<button type="submit" class="btn btn-primary" onclick="return confirm('แน่ใจหรอ')">ลบเลย</button>
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
?>