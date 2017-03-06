<?php
define('TITLE','Dashboard - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
require('inc/inc.navbar.php');
include('process/dbconfig.inc.php');
//echo $sql_get_log;
?>

<div class="container">
<ol class="breadcrumb" style="margin-bottom: 3px;">
		<li><a href="main_dashboard.php">หน้าหลัก</a></li>
</ol>
    
	<!-- Panel Start -->
	<div class="row">
	<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title"><span class=" glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
							
							หน้าแรก</h5>
						</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12" ng-app="log_list_app" ng-controller="log_list_ctrl">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="Search" >Search Keyword</label>
						<input ng-model="SearchData" type="text" class="form-control" id="Search" placeholder="Keyword">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-label" style="margin-top:30px;"><h4>ตรวจพบ  {{ filtered.length }} ข้อมูล</h4></div>
				</div>
				<div class="col-sm-12" style="height:370px; overflow:scroll;">
					<table class="table table-condensed">
						<th>วัน-เวลา</th>
						<th>กิจกรรม</th>
						<th>IP Address</th>
						<th>ดำเนินการโดย</th>
						
						<tr ng-repeat="x in names | filter:SearchData as filtered" class="text-left" >
							<td>{{ x.logDatetime }}</td>
							<td>{{ x.logActivity }}</td>
							<td>{{ x.logAddr }}</td>
							<td>{{ x.userName }}</td>
						</tr>
					</table>
				</div>	
			</div>
						</div>
					</div>
					</div>
				</div>
				
				
				
			</div>

	  
	  
	  
	  
</div><!-- /.container -->
<script src="app_show_loglist.js"></script>
<?php
	}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.scripts.php');
?>