<?php
	include('process/dbconfig.inc.php');
	$sql_data1 = "SELECT * FROM device_data WHERE device_data_status = 'New'";
	$rs_data1 = $conn->query($sql_data1);
	$count_data1 = $rs_data1->num_rows;
	
	$sql_data2 = "SELECT * FROM device_data WHERE device_data_status = 'Used'";
	$rs_data2 = $conn->query($sql_data2);
	$count_data2 = $rs_data2->num_rows;
	
	$sql_data3 = "SELECT * FROM device_data WHERE device_data_status = 'Cancel'";
	$rs_data3 = $conn->query($sql_data3);
	$count_data3 = $rs_data3->num_rows;
	
	$sql_data4 = "SELECT * FROM device_data WHERE device_data_status = 'Crack'";
	$rs_data4 = $conn->query($sql_data4);
	$count_data4 = $rs_data4->num_rows;
	
	$conn->close();
?>

<script type="text/javascript">
        var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: [
					"อุปกรณ์ใหม่",
					"ใช้งาน",
					"ยกเลิก",
					"เสีย"
				],
				datasets: [{
					data: [<?=$count_data1?>, <?=$count_data2?>, <?=$count_data3?>, <?=$count_data4?>],
					backgroundColor: [
						"#7DCEA0",
						"#85C1E9",
						"#A3E4D7",
						"#D35400"
					],
					hoverBackgroundColor: [
						"#7DCEA0",
						"#85C1E9",
						"#A3E4D7",
						"#D35400"
					]
				}]
			}
		});
</script>