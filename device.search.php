<?php
define('TITLE','ข้อมูลอุปกรณ์ + ลูกค้า - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){

require('inc/inc.navbar.php');
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
		<li class="active">ข้อมูลอุปกรณ์ + ลูกค้า</li>
</ol>
    
        <div class="row">
			<div class="col-sm-12" ng-app="new_device_app" ng-controller="new_device_ctrl">
			<div class="panel panel-default">
				<div class="panel-body" style="height:530px; overflow: scroll;">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="Search" >Search Keyword</label>
						<input ng-model="SearchData" type="text" class="form-control" id="Search" placeholder="Keyword">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-label" style="margin-top:30px;"><h4>ตรวจพบ  {{ filtered.length }} ข้อมูล</h4></div>
				</div>
				<div class="col-sm-12">
					<table class="table table-condensed">
						<th>Serial No.</th>
						<th>ลงทะเบียนเมื่อ</th>
						
						<tr ng-repeat="x in names | filter:SearchData as filtered" class="text-left" >
							<td>
								<a href="result.device.data.php?send_sn={{ x.SerialNo }}">{{ x.SerialNo }}</a>
							</td>
							<td>{{ x.RegisDate }}</td>
						</tr>
					</table>
				</div>	
			</div>
			</div>
		</div>
		</div>
 
</div><!-- /.container -->

<script src="app_show_new.js"></script>
<?php
}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
?>