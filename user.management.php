<?php
define('TITLE','การจัดการของผู้ดูแลระบบ - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');
	
	if($_COOKIE['user'] == 'admin'){
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">การจัดการของผู้ดูแลระบบ</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
		<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-plus"></span>&nbsp;&nbsp;
							
							การจัดการของผู้ดูแลระบบ</h5>
						</div>
					<div class="panel-body">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#user_view_list">เรียกดู user ของผู้ดูแลระบบทั้งหมด</a></li>
							<li><a data-toggle="tab" href="#user_add">สร้าง user ผู้ดูแลระบบ</a></li>
						</ul>

						<div class="tab-content">
							<div id="user_view_list" class="tab-pane fade in active">
								<h3>เรียกดู user ของผู้ดูแลระบบทั้งหมด</h3>
								<br>
								<div class="col-sm-12">
									<!-- do somthing -->
									<table class="table">
										<th>Username</th>
										<th>ชื่อเจ้าของ user</th>
										<th>หมายเหตุ / ข้อมูลเพิ่มเติม</th>
										<th>สร้างเมื่อ</th>
										<th>เครื่องมือ</th>
										<?php
											include('process/dbconfig.inc.php');
											
											$sql_get_user = "SELECT * FROM user ORDER BY user_name ASC";
											$dataset_user = $conn->query($sql_get_user);
											while($rs_user = $dataset_user->fetch_assoc()){
										?>
										<tr>
											<td><?=$rs_user['user_name']?></td>
											<td><?=$rs_user['user_fname']?></td>
											<td><?=$rs_user['user_detail']?></td>
											<td><?=$rs_user['user_regis_datetime']?></td>
											<td>
												<a href="user.edit.user.php?userId=<?=$rs_user['user_id']?>" class="btn btn-primary">แก้ไขข้อมูล</a> 
										<?php
												if($rs_user['user_name'] != 'admin'){
												
											
										?>
												<a href="process/process.del.user.php?userId=<?=$rs_user['user_id']?>&check_send=del_user" 
												   class="btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลนี้จริงหรือไม่ ?\nกด ตกลง เพื่อยืนยันการลบ.')">ลบข้อมูลนี้</a> 
										<?php
												}
										?>
												
											</td>
										</tr>
										<?php
												
											}
										?>
									</table>
									
								</div>
								
							</div>
							
							<div id="user_add" class="tab-pane fade">
								<h3>สร้าง user ผู้ดูแลระบบ</h3>
								<br>
								<div class="col-sm-12">
									<form role="form" method="POST" name="add_new_user" action="process/process.user.management.php"  onsubmit="return check_form_add_user()">
					
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_username">Username : </label>
											<input class="form-control" type="text" name="user_username"  id="user_username" placeholder="กรอก Username">
											
										</div>
										<div id="check_user_username" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_username_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_username_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_password">Password : </label>
											<input class="form-control" type="text" name="user_password"  id="user_password" placeholder="กรอก Password">
											
										</div>
										<div id="check_user_password" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_password_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_password_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_fname">ชื่อเจ้าของ user : </label>
											<input class="form-control" type="text" name="user_fname"  id="user_fname" placeholder="กรอกชื่อเจ้าของ user">
											
										</div>
										<div id="check_user_fname" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_fname_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_fname_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_detail">หมายเหตุ / ข้อมูลเพิ่มเติมของ user นี้  : </label>
											<textarea class="form-control" name="user_detail" rows="3" id="user_detail"></textarea>
										</div>
										<div id="check_user_detail" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_detail_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_detail_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										<input type="hidden" name="check_send" value="add_user">
										
										<div class="form-group col-sm-offset-1 col-sm-11">
											<button type="submit" class="btn btn-primary" >บันทึก</button>
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

	}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}

}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
//require('ajax.on.edit.type.php');
?>