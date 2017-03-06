<script type="text/javascript">
	$(document).ready(function(){
		$('#regis_new_device').change(function(){
			$.ajax({
				type : 'POST',
				url : 'data.on.new.device.type.php',
				data : {regis_new_device:$(this).val()},
				success : function(data){
					$('#show_type').html(data); // Fill data to this id. ex. <p>, <span>, etc..
				}
			});
			
			$.ajax({
				type : 'POST',
				url : 'data.on.new.device.model.php',
				data : {regis_new_device:$(this).val()},
				success : function(data){
					//$('#device_edit_new_type_model').html(data); 
					//document.getElementById("device_edit_new_type_model").value = data; // Fill data to this value. ex. input
					$('#show_model').html(data); // Fill data to this id. ex. <p>, <span>, etc..
				}
			});
			
		});	
	});
</script>