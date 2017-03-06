<script type="text/javascript">
	$(document).ready(function(){
		$('#device_old_type').change(function(){
			$.ajax({
				type : 'POST',
				url : 'data.on.edit.type.description.php',
				data : {device_old_type:$(this).val()},
				success : function(data){
					$('#device_edit_new_type_detail').html(data); // Fill data to this id. ex. <p>, <span>, etc..
				}
			});
			
			$.ajax({
				type : 'POST',
				url : 'data.on.edit.type.model.php',
				data : {device_old_type:$(this).val()},
				success : function(data){
					//$('#device_edit_new_type_model').html(data); 
					document.getElementById("device_edit_new_type_model").value = data; // Fill data to this value. ex. input
				}
			});
			
			$.ajax({
				type : 'POST',
				url : 'data.on.edit.type.type.php',
				data : {device_old_type:$(this).val()},
				success : function(data){
					//$('#device_edit_new_type_model').html(data); 
					document.getElementById("device_edit_new_type").value = data; // Fill data to this value. ex. input
				}
			});
			
		});	
	});
</script>