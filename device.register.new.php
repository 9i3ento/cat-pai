<?php
define('TITLE','ระบบลงทะเบียนอุปกรณ์ใหม่ - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
require('inc/inc.navbar.php');
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">ระบบลงทะเบียนอุปกรณ์ใหม่</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							ระบบลงทะเบียนอุปกรณ์ใหม่</h5>
						</div>
						<div class="panel-body" ng-app="">
							<div class="row">
							<div class="col-sm-6">
						
						<form class="form-horizontal" name="regis_device_new" role="form" method="POST" action="process/process_new_device.php"  onsubmit="return check_form_new()">
						<div class="form-group">
							<label for="regis_new_device" class="col-sm-4 control-label">ประเภท :</label>
							<div class="col-sm-7">
								<select name="regis_new_device" id="regis_new_device" class="form-control" >
									<option value="">เลือกประเภทอุปกรณ์</option>
									<?php 
												include('process/dbconfig.inc.php');
												$sql_new_device = "SELECT * FROM device_type ORDER BY `device_type_register_datetime` DESC";
												$dataset_new_device = $conn->query($sql_new_device);
												while($rs_new_device = $dataset_new_device->fetch_assoc()) { 
													$type_id = $rs_new_device['device_type_id'];
													$type_type = $rs_new_device['device_type_type'];
													$type_model = $rs_new_device['device_type_model'];
												
											?>
												<option value="<?= $type_id ?>"><?= $type_type ?> -> <?= $type_model ?></option>
											<?php
												}
												$conn->close();
											?>
											
								</select>
							</div>
							<div id="check_device_type" class="col-sm-1" style="margin-top:10px;">
								<!-- append by js -->
								<span class="glyphicon glyphicon-remove type_glyphicon_no" aria-hidden="true" style="color:red;"></span>
								<span class="glyphicon glyphicon-ok type_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
							</div>
						</div>
					
						<div class="form-group">
							<label for="device_serial" class="col-sm-4 control-label">Serial No. : </label>
							<div class="col-sm-7">
								<input type="text" name="device_serial" class="form-control" id="device_serial" placeholder="Serial No." ng-model="show_sn">
							</div>
							<div id="check_device_serial" class="col-sm-1" style="margin-top:10px;">
								<!-- append by js -->
								<span class="glyphicon glyphicon-remove serial_glyphicon_no" aria-hidden="true" style="color:red;"></span>
								<span class="glyphicon glyphicon-ok serial_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
							</div>
						</div>
						
						<input type="hidden" name="device_status" value="New">
						<input type="hidden" name="check_send" value="add_new_device">
					
					
						<div class="form-group"><br>
							<div class="col-sm-4 col-sm-offset-4">
								<button type="submit" class="btn btn-primary" >บันทึก</button>
							</div>
						</div>
						
						</form>
						</div>
						
						<div class="col-sm-6" style="margin-top:10px;" >
								
									<div class="col-sm-5 text-right">ชนิดอุปกรณ์ : </div>
									<div class="col-sm-7 text-left" ><p id="show_type">- </p></div>
									<div class="col-sm-5 text-right">รุ่นอุปกรณ์ : </div>
									<div class="col-sm-7 text-left" ><p id="show_model">- </p></div>
									<div class="col-sm-5 text-right">Serial No. : </div>
									<div class="col-sm-7 text-left"> <p id="show_sn">{{show_sn}}</p></div>
						</div>
						
						</div>
					</div>
					</div>
	</div>
	</div>

</div><!-- /.container -->

<?php
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
require('ajax.on.new.device.php');
?>