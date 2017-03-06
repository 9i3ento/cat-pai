<?php
define('TITLE','ระบบลงทะเบียนอุปกรณ์ + ลูกค้า - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">ระบบลงทะเบียนอุปกรณ์ + ลูกค้า</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							ระบบลงทะเบียนอุปกรณ์ + ลูกค้า</h5>
						</div>
				<div class="panel-body" ng-app="">
				<div class="row">
					<div class="col-sm-6">
					<form class="form-horizontal" name="regis_device_with_cus" role="form" method="POST" action="process/process_new_device.php" onsubmit="return check_form_with_customer()">
					<div class="form-group">
						<label for="regis_new_device" class="col-sm-4 control-label">ประเภท :</label>
						<div class="col-sm-7">
							<select name="regis_new_device" id="regis_new_device" class="form-control">
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
						<input type="text" name="device_serial" class="form-control" id="device_serial" maxlength="34" placeholder="Serial No." ng-model="show_sn">
						</div>
						<div id="check_device_serial" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove serial_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok serial_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
						
					<div class="form-group">
						<label for="device_cus_name" class="col-sm-4 control-label">ชื่อลูกค้า : </label>
						<div class="col-sm-7">
							<input type="text" name="device_cus_name" value="<?=$_SESSION['cus_name']?>" class="form-control" id="device_cus_name" placeholder="" ng-model="show_cus_name">
						</div>
						<div id="check_device_cus_name" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove cus_name_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok cus_name_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
						
					<div class="form-group">
						<label for="device_cus_cat_id" class="col-sm-4 control-label">CATID : </label>
						<div class="col-sm-7">
							<input type="text" name="device_cus_cat_id" value="<?=$_SESSION['cus_cat_id']?>" class="form-control" id="device_cus_cat_id" placeholder="" ng-model="show_catid">
						</div>
						<div id="check_device_cus_cat_id" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove cus_cat_id_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok cus_cat_id_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="device_regis_date" class="col-sm-4 control-label">ลงทะเบียนเมื่อ : </label>
						<div class="col-sm-7">
							<input type="date" name="device_regis_date" value="<?=$_SESSION['regis_date']?>" class="form-control" id="device_regis_date" placeholder="" ng-model="show_regis_date">
						</div>
						<div id="check_device_regis_date" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove regis_date_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok regis_date_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="device_status" class="col-sm-4 control-label">สถานะการทำงาน :</label>
						<div class="col-sm-7">
							<select name="device_status" id="device-status" class="form-control" ng-model="show_status">
								<option value="">เลือก 1 ข้อ</option>
								<option value="ใช้งานอยู่">ใช้งาน</option>
								<option value="ยกเลิก">ยกเลิก</option>
								<option value="เสีย">เสีย</option>
							</select>
						</div>
						<div id="check_device_status" class="col-sm-1" style="margin-top:10px;">
							<!-- append by js -->
							<span class="glyphicon glyphicon-remove status_glyphicon_no" aria-hidden="true" style="color:red;"></span>
							<span class="glyphicon glyphicon-ok status_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
						</div>
					</div>
					
					<input type="hidden" name="check_send" value="add_new_device_with_cus">
					
					
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
					<div class="col-sm-7 text-left"> <p id="show_sn">- {{show_sn}}</p></div>
					<div class="col-sm-5 text-right">ชื่อลูกค้า : </div>
					<div class="col-sm-7 text-left"> <p id="show_sn">- {{show_cus_name}}</p></div>
					<div class="col-sm-5 text-right">CAT ID : </div>
					<div class="col-sm-7 text-left"> <p id="show_sn">- {{show_catid}}</p></div>
					<div class="col-sm-5 text-right">ลงทะเบียนเมื่อ : </div>
					<div class="col-sm-7 text-left"> <p id="show_sn">- {{show_regis_date}}</p></div>
					<div class="col-sm-5 text-right">สถานะการทำงาน : </div>
					<div class="col-sm-7 text-left"> <p id="show_sn">- {{show_status}}</p></div>
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