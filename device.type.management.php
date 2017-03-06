<?php
define('TITLE','การจัดการชนิดของอุปกรณ์ - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">การจัดการชนิดของอุปกรณ์</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
		<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-plus"></span>&nbsp;&nbsp;
							
							การจัดการชนิดของอุปกรณ์</h5>
						</div>
					<div class="panel-body" >
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#device_add_type">เพิ่มชนิดของอุปกรณ์</a></li>
							<li><a data-toggle="tab" href="#device_edit_type">แก้ไขชนิดของอุปกรณ์</a></li>
							<li><a data-toggle="tab" href="#device_delete_type">ลบชนิดของอุปกรณ์</a></li>
						</ul>

						<div class="tab-content">
							<div id="device_add_type" class="tab-pane fade in active">
								<h3>เพิ่มชนิดของอุปกรณ์</h3>
								<br>
								<p>
								<div class="col-sm-6">
									<form role="form" method="POST" name="regis_type" action="process/process_device_type.php"  onsubmit="return check_form_add_type()">
					
										<div class="form-group col-sm-10">
											<label for="device_add_type">ชนิดของอุปกรณ์ </label>
											<input class="form-control" type="text" name="device_add_type"  id="device_add_type" placeholder="กรอกชนิดของอุปกรณ์ชนิดใหม่">
											
										</div>
										<div id="check_device_add_type" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove add_type_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok add_type_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-10">
											<label for="device_add_type_model">รุ่นของอุปกรณ์ </label>
											<input class="form-control" type="text" name="device_add_type_model"  id="device_add_type_model" placeholder="กรอกรุ่นของอุปกรณ์ชนิดใหม่">
											
										</div>
										<div id="check_device_add_type_model" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove add_type_model_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok add_type_model_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										
										<div class="form-group col-sm-10">
											<label for="device_add_type_detail">คำอธิบายอุปกรณ์ </label>
											<textarea class="form-control" name="device_add_type_detail" rows="3" id="device_add_type_detail"></textarea>
										</div>
										<div id="check_device_add_type_detail" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove add_type_detail_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok add_type_detail_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										<input type="hidden" name="check_send" value="device_add_type_chk">
										
										
										<div class="form-group col-sm-12">
											<button type="submit" class="btn btn-primary" >บันทึก</button>
										</div>
						
									</form>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group col-sm-12">
											<label for="add_device_type">ชนิดที่มีอยู่แล้วในระบบ </label>
									</div>
										<div class="panel panel-default col-sm-offset-1 col-sm-9" style="height: 150px; overflow-y: scroll;" disabled>
											<p align="left">  
											<?php 
												include('process/dbconfig.inc.php');
												$sql_get_type = "SELECT * FROM device_type ORDER BY `device_type_register_datetime` DESC";
												$dataset_get_type = $conn->query($sql_get_type);
												while($rs_get_type = $dataset_get_type->fetch_assoc()) { 
													$text_get_type = $rs_get_type['device_type_type'];
													$text_get_model = $rs_get_type['device_type_model'];
													echo $text_get_type . ' -> '. $text_get_model . '<br>';
												}
												$conn->close();
											?>
											 
											</p>  
										</div>
										
								</div>
								</p>
							</div>
							
							<div id="device_edit_type" class="tab-pane fade">
									<h3>แก้ไขชนิดของอุปกรณ์</h3>
								<br>
								<p>
								<div class="col-sm-6">
									<form role="form" method="POST" name="edit_type" action="process/process_device_type.php" onsubmit="return check_form_edit_type()">
					
										<div class="form-group col-sm-10">
											<label for="device_old_type">เปลี่ยนจาก... </label>
											<select class="form-control" name="device_old_type" id="device_old_type">
											<option value="">เลือก 1 ชนิด</option>
											<?php 
												include('process/dbconfig.inc.php');
												$sql_edit_type = "SELECT * FROM device_type ORDER BY `device_type_register_datetime` DESC";
												$dataset_edit_type = $conn->query($sql_edit_type);
												while($rs_edit_type = $dataset_edit_type->fetch_assoc()) { 
													$type_id = $rs_edit_type['device_type_id'];
													$type_type = $rs_edit_type['device_type_type'];
													$type_model = $rs_edit_type['device_type_model'];
												
											?>
												<option value="<?= $type_id ?>"><?= $type_type ?> -> <?= $type_model ?></option>
											<?php
												}
												$conn->close();
											?>
											
											</select>
										</div>
										<div id="check_device_old_type" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove old_type_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok old_type_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-10">
											<label for="device_edit_new_type">เปลี่ยนชนิดเป็น... </label>
											<input class="form-control" type="text" name="device_edit_new_type"  id="device_edit_new_type" placeholder="กรอกชนิดของอุปกรณ์">
											
										</div>
										<div id="check_device_edit_new_type" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove edit_new_type_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok edit_new_type_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										
										<div class="form-group col-sm-10" >
											<label for="device_edit_new_type_model">เปลี่ยนรุ่นเป็น... </label>
											<input class="form-control" type="text" name="device_edit_new_type_model"  id="device_edit_new_type_model" placeholder="กรอกรุ่นของอุปกรณ์">
											
										</div>
										<div id="check_device_edit_new_type" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove edit_new_type_model_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok edit_new_type_model_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-10" ng-app="">
											<label for="device_edit_new_type_detail">คำอธิบายอุปกรณ์ </label>
											<input type="checkbox" ng-model="showTextarea">
											<textarea class="form-control" name="device_edit_new_type_detail" rows="3" id="device_edit_new_type_detail" ng-show="showTextarea"></textarea>
										</div>
										<div id="check_device_edit_new_type_detail" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove edit_new_type_detail_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok edit_new_type_detail_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<input type="hidden" name="check_send" value="device_edit_new_type_chk">
										
										
										<div class="form-group col-sm-12">
											<button type="submit" class="btn btn-primary" >บันทึก</button>
										</div>
						
									</form>
								</div>
								
								<div class="col-sm-6">
									<div class="form-group col-sm-12">
											<label for="add_device_type">ชนิดของที่มีอยู่แล้วในระบบ </label>
									</div>
										<div class="panel panel-default col-sm-offset-1 col-sm-9" style="height: 150px; overflow-y: scroll;" disabled>
											<p align="left">  
											<?php 
												include('process/dbconfig.inc.php');
												$sql_get_type_2 = "SELECT * FROM device_type ORDER BY `device_type_register_datetime` DESC";
												$dataset_get_type_2 = $conn->query($sql_get_type_2);
												while($rs_get_type_2 = $dataset_get_type_2->fetch_assoc()) { 
													$text_get_type_2 = $rs_get_type_2['device_type_type'];
													$text_get_model_2 = $rs_get_type_2['device_type_model'];
													echo $text_get_type_2 . ' -> '. $text_get_model_2 . '<br>';
												}
												$conn->close();
											?>
											
											</p>  
										</div>
										
								</div>
								</p>
							</div>
							
							<div id="device_delete_type" class="tab-pane fade">
								<h3>ลบชนิดของอุปกรณ์</h3>
								<p>
								<div class="col-sm-6">
									<form role="form" method="POST" name="delete_type" action="process/process.del.device.type.php"  onsubmit="return check_form_delete_type()">
					
										<div class="form-group col-sm-10">
											<label for="device_delete_type">ชนิดของอุปกรณ์... </label>
											<select class="form-control" name="device_delete_type" id="device_delete_type">
												<option value="">เลือก 1 ชนิด</option>
												<?php 
												include('process/dbconfig.inc.php');
												$sql_del_type = "SELECT * FROM device_type ORDER BY `device_type_register_datetime` DESC";
												$dataset_del_type = $conn->query($sql_del_type);
												while($rs_del_type = $dataset_del_type->fetch_assoc()) { 
													$del_type_id = $rs_del_type['device_type_id'];
													$del_type_type = $rs_del_type['device_type_type'];
													$del_type_model = $rs_del_type['device_type_model'];
												
											?>
												<option value="<?= $del_type_id ?>"><?= $del_type_type ?> -> <?= $del_type_model ?></option>
											<?php
												}
												$conn->close();
											?>
											</select>
										</div>
										<div id="check_device_delete_type" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove delete_type_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok delete_type_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-10" >
											<label for="device_delete_type_pass">รหัสผ่านยืนยันการลบ... </label>
											<input class="form-control" type="text" name="device_delete_type_pass"  id="device_delete_type_pass" placeholder="กรอกรหัสผ่าน">
											
										</div>
										<div id="check_device_delete_type_pass" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove delete_type_pass_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok delete_type_pass_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<input type="hidden" name="check_send" value="device_delete_type_chk">
										
										
										<div class="form-group col-sm-12">
											<button type="submit" class="btn btn-primary" >ลบ</button>
										</div>
						
									</form>
								</div>
								<div class="col-sm-6">
									<div class="panel panel-default">
										<div class="panel-body">
											<strong>**ข้อควรระวัง</strong><br>
											หากทำการลบข้อมูลชนิดในส่วนนี้ จะมีผลกระทบต่อข้อมูลอุปกรณ์ที่เกี่ยวข้องกับชนิด<br>
											== คำแนะนำ ==<br>
											กรุณาตรวจสอบให้ถี่ถ้วนก่อนการตัดสินใจดำเนินการ หรือ ใช้วิธีการ แก้ไข แทนการ ลบ ชนิด.
										</div>
									</div>
								</div>
								</p>
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
require('ajax.on.edit.type.php');
?>