<?php
define('TITLE','การจัดการของผู้ดูแลระบบ - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');
	
	if($_COOKIE['user'] == 'admin'){
		
		if($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["userId"])){
			$get_userId = $_GET["userId"];
	
			include('process/dbconfig.inc.php');
	
			$sql_get_data = "SELECT * FROM user ";
			$sql_get_data .= "WHERE user_id =". $get_userId;
	
	
			//echo $sql_get_data;
	
			$dataset_user = $conn->query($sql_get_data);
	
			while($rs_user = $dataset_user->fetch_assoc()) {
				$user_id = $rs_user["user_id"];
				$user_name = $rs_user["user_name"];
				$user_pw = $rs_user["user_pw"];
				$user_fname = $rs_user["user_fname"];
				$user_detail = $rs_user["user_detail"];
		
			}
	
	//echo 'Text is '. $data_sn;
	$conn->close();

?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="">การจัดการของผู้ดูแลระบบ</li>
		<li class="active">แก้ไขข้อมูลของผู้ดูแลระบบ</li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
		<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-plus"></span>&nbsp;&nbsp;
							
							แก้ไขข้อมูลของผู้ดูแลระบบ</h5>
						</div>
					<div class="panel-body">
						<div class="col-sm-offset-1 col-sm-11">
							<form role="form" method="POST" name="add_new_user" action="process/process.user.management.php"  onsubmit="return check_form_add_user()">
					
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_username">Username : </label>
											<input class="form-control" type="text" name="user_username" value="<?=$user_name?>" id="user_username" placeholder="กรอก Username" disabled>
											
										</div>
										<div id="check_user_username" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_username_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_username_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_password">Password : </label>
											<input class="form-control" type="text" name="user_password" value="<?=$user_pw?>" id="user_password" placeholder="กรอก Password">
											
										</div>
										<div id="check_user_password" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_password_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_password_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_fname">ชื่อเจ้าของ user : </label>
											<input class="form-control" type="text" name="user_fname" value="<?=$user_fname?>" id="user_fname" placeholder="กรอกชื่อเจ้าของ user">
											
										</div>
										<div id="check_user_fname" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_fname_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_fname_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<div class="form-group col-sm-offset-1 col-sm-9">
											<label for="user_detail">หมายเหตุ / ข้อมูลเพิ่มเติมของ user นี้  : </label>
											<textarea class="form-control" name="user_detail" rows="3" id="user_detail"><?=$user_detail?></textarea>
										</div>
										<div id="check_user_detail" class="col-sm-2" style="margin-top:30px;">
											<!-- append by js -->
											<span class="glyphicon glyphicon-remove user_detail_glyphicon_no" aria-hidden="true" style="color:red;"></span>
											<span class="glyphicon glyphicon-ok user_detail_glyphicon_yes" aria-hidden="true" style="color:green;"></span>
										</div>
										
										<input type="hidden" name="userId" value="<?=$user_id?>">
										<input type="hidden" name="check_send" value="edit_user">
										
										<div class="form-group col-sm-offset-1 col-sm-11">
											<button type="submit" class="btn btn-primary" >บันทึก</button>
										</div>
						
									</form>
						</div>
					</div>
					</div>
		</div>
		
	
				
				
				
			</div>

	  
	  
	  
	  
</div><!-- /.container -->

<?php

		}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "user.management.php";</script>';
	}

	}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}

}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
//require('ajax.on.edit.type.php');
?>