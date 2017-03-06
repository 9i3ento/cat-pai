<?php
define('TITLE','Dashboard - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
	
require('inc/inc.navbar.php');
include('process/dbconfig.inc.php');

$sql_get_user_id = "SELECT * FROM user WHERE user_name = '". $_COOKIE['user'] ."'";
$dataset_user_id = $conn->query($sql_get_user_id);
while($rs_user_id = $dataset_user_id->fetch_assoc()){
	$get_user_id = $rs_user_id['user_id'];
}

$this_date = date("Y-m-d");
$this_day = date("d");
$this_month = date("m");
$this_year = date("Y");

//get a day activity
$sql_get_a_day_activity = "SELECT COUNT(*) AS get_a_day_activity FROM log_list WHERE log_datetime ";
$sql_get_a_day_activity .= "BETWEEN '". $this_date ." 00:00:00' AND '". $this_date ." 23:59:59'";
$sql_get_a_day_activity .= " AND log_activity NOT LIKE '%เข้าสู่ระบบ%' AND log_activity NOT LIKE '%ออกจากระบบ%'  ";

$dataset_a_day_activity = $conn->query($sql_get_a_day_activity);
while($rs_a_day_activity = $dataset_a_day_activity->fetch_assoc()){
	$get_a_day_activity = $rs_a_day_activity['get_a_day_activity'];
}


//get a month activity
$sql_get_a_month_activity = "SELECT COUNT(*) AS get_a_month_activity FROM log_list WHERE log_datetime ";
$sql_get_a_month_activity .= "BETWEEN '". $this_year ."-". $this_month ."-01 00:00:00' AND '". $this_year ."-". $this_month ."-". $this_day ." 23:59:59'";
$sql_get_a_month_activity .= " AND log_activity NOT LIKE '%เข้าสู่ระบบ%' AND log_activity NOT LIKE '%ออกจากระบบ%'  ";

$dataset_a_month_activity = $conn->query($sql_get_a_month_activity);
while($rs_a_month_activity = $dataset_a_month_activity->fetch_assoc()){
	$get_a_month_activity = $rs_a_month_activity['get_a_month_activity'];
}

$_SESSION['user_id'] = $get_user_id;

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
							<div class="col-sm-offset-1 col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body">
										<strong><u><h2>สวัสดี ! <?=$_COOKIE['user']?></h2></u></strong><br>
										<h5>
										<p>-> วันนี้มีการเปลี่ยนแปลงในระบบ <strong><?=$get_a_day_activity?></strong> ครั้ง </p><br>
										<p>-> ในเดือนนี้ มีการเปลี่ยนแปลงทั้งสิ้น <strong><?=$get_a_month_activity?></strong> ครั้ง </p><br>
										</h5>
										<table class="table">
											<th>
												การเปลี่ยนแปลงล่าสุด
											</th>
										<?php
											//get lasted update
											
											$sql_get_last_activity = "SELECT log_activity FROM log_list WHERE log_activity NOT LIKE '%เข้าสู่ระบบ%' ";
											$sql_get_last_activity .= "AND log_activity NOT LIKE '%ออกจากระบบ%' ORDER BY log_datetime DESC LIMIT 0,3 ";
											
											$dataset_last_activity = $conn->query($sql_get_last_activity);
											while($rs_last_activity = $dataset_last_activity->fetch_assoc()){
										?>
											<tr>
												<td><?=$rs_last_activity['log_activity'];?></td>
											</tr>
										<?php
											}
											
										?>
										</table>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-body">
										<strong><h4><u>สถิติข้อมูลภายในระบบทั้งหมด</u></h4></strong><br>
										<canvas id="myChart" width="500" height="500"></canvas>
									</div>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="panel panel-default">
									<div class="panel-body">
										<strong><u>Tool tips</u></strong><br><br>
										-> หากต้องการดูข้อมูลของอุปกรณ์ต่างๆ คลิกที่ <strong>" <span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา"</strong> <br><br>
										-> หากต้องการเพิ่มข้อมูลของอุปกรณ์ต่างๆ คลิกที่ <strong>" <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> อุปกรณ์"</strong> <br><br>
										-> หากจะจัดการชนิดอุปกรณ์<br>คลิกที่ <strong>" <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> การตั้งค่าอื่นๆ"</strong> <br><br>
										-> ต้องการดูการเปลี่ยนแปลงทั้งหมด<br>คลิกที่ <strong>" <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Log"</strong> <br><br>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				
				
				
			</div>

	  
	  
	  
	  
</div><!-- /.container -->

<?php
$conn->close();
	}else{
		echo '<script type="text/javascript">alert("ไม่มีสิทธิ์ใช้งานเนื้อหาหน้านี้."); window.location = "index.php";</script>';
	}
require('inc/inc.main.chart.php');
require('inc/inc.scripts.php');
?>