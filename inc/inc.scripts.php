
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<script>
	$(document).ready(function() {
		$(".type_glyphicon_yes").hide();
		$(".type_glyphicon_no").hide();
		
		$(".serial_glyphicon_yes").hide();
		$(".serial_glyphicon_no").hide();
		
		$(".cus_name_glyphicon_yes").hide();
		$(".cus_name_glyphicon_no").hide();
		
		$(".cus_cat_id_glyphicon_yes").hide();
		$(".cus_cat_id_glyphicon_no").hide();
		
		$(".regis_date_glyphicon_yes").hide();
		$(".regis_date_glyphicon_no").hide();
		
		$(".status_glyphicon_yes").hide();
		$(".status_glyphicon_no").hide();
		
		// for type management
		//add
		$(".add_type_glyphicon_yes").hide();
		$(".add_type_glyphicon_no").hide();
		
		$(".add_type_model_glyphicon_yes").hide();
		$(".add_type_model_glyphicon_no").hide();
		
		$(".add_type_detail_glyphicon_yes").hide();
		$(".add_type_detail_glyphicon_no").hide();
		
		// edit
		$(".old_type_glyphicon_yes").hide();
		$(".old_type_glyphicon_no").hide();
		
		$(".edit_new_type_glyphicon_yes").hide();
		$(".edit_new_type_glyphicon_no").hide();
		
		$(".edit_new_type_model_glyphicon_yes").hide();
		$(".edit_new_type_model_glyphicon_no").hide();
		
		$(".edit_new_type_detail_glyphicon_yes").hide();
		$(".edit_new_type_detail_glyphicon_no").hide();
		
		//delete
		$(".delete_type_glyphicon_yes").hide();
		$(".delete_type_glyphicon_no").hide();
		
		$(".delete_type_pass_glyphicon_yes").hide();
		$(".delete_type_pass_glyphicon_no").hide();
		
		//check pass
		$(".check_pass_glyphicon_yes").hide();
		$(".check_pass_glyphicon_no").hide();
		
		//admin add new user
		$(".user_username_glyphicon_yes").hide();
		$(".user_username_glyphicon_no").hide();
		
		$(".user_password_glyphicon_yes").hide();
		$(".user_password_glyphicon_no").hide();
		
		$(".user_fname_glyphicon_yes").hide();
		$(".user_fname_glyphicon_no").hide();
		
		$(".user_detail_glyphicon_yes").hide();
		$(".user_detail_glyphicon_no").hide();
		
	});
	
	function check_form_new() {
		var device_type = document.forms["regis_device_new"]["regis_new_device"].value;
		var device_serial = document.forms["regis_device_new"]["device_serial"].value;
	
		if ( device_type == "" || device_serial == "" ) {
			
			if(device_type == ""){
				$(".type_glyphicon_yes").hide();
				$(".type_glyphicon_no").show();
			}else{
				$(".type_glyphicon_yes").show();
				$(".type_glyphicon_no").hide();
			}
			if(device_serial == ""){
				$(".serial_glyphicon_yes").hide();
				$(".serial_glyphicon_no").show();
			}else{
				$(".serial_glyphicon_yes").show();
				$(".serial_glyphicon_no").hide();
			}
			
			
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "เพิ่มข้อมูล" ใช่หรือไม่ ?')){
				//don't do noting
			}else{
				return false;
			}
			
		}
		
		
	}
	
	function check_form_with_customer() {
		var device_type = document.forms["regis_device_with_cus"]["regis_new_device"].value;
		var device_serial = document.forms["regis_device_with_cus"]["device_serial"].value;
		var device_cus_name = document.forms["regis_device_with_cus"]["device_cus_name"].value;
		var device_cus_cat_id = document.forms["regis_device_with_cus"]["device_cus_cat_id"].value;
		var device_regis_date = document.forms["regis_device_with_cus"]["device_regis_date"].value;
		var device_status = document.forms["regis_device_with_cus"]["device_status"].value;
		
		if ( device_type == "" || device_serial == "" || device_cus_name == "" || device_cus_cat_id == "" || device_regis_date == "" || device_status == "" ) {
			
			if(device_type == ""){
				$(".type_glyphicon_yes").hide();
				$(".type_glyphicon_no").show();
			}else{
				$(".type_glyphicon_yes").show();
				$(".type_glyphicon_no").hide();
			}
			if(device_serial == ""){
				$(".serial_glyphicon_yes").hide();
				$(".serial_glyphicon_no").show();
			}else{
				$(".serial_glyphicon_yes").show();
				$(".serial_glyphicon_no").hide();
			}
			if(device_cus_name == ""){
				$(".cus_name_glyphicon_yes").hide();
				$(".cus_name_glyphicon_no").show();
			}else{
				$(".cus_name_glyphicon_yes").show();
				$(".cus_name_glyphicon_no").hide();
			}
			if(device_cus_cat_id == ""){
				$(".cus_cat_id_glyphicon_yes").hide();
				$(".cus_cat_id_glyphicon_no").show();
			}else{
				$(".cus_cat_id_glyphicon_yes").show();
				$(".cus_cat_id_glyphicon_no").hide();
			}
			if(device_regis_date == ""){
				$(".regis_date_glyphicon_yes").hide();
				$(".regis_date_glyphicon_no").show();
			}else{
				$(".regis_date_glyphicon_yes").show();
				$(".regis_date_glyphicon_no").hide();
			}
			if(device_status == ""){
				$(".status_glyphicon_yes").hide();
				$(".status_glyphicon_no").show();
			}else{
				$(".status_glyphicon_yes").show();
				$(".status_glyphicon_no").hide();
			}
			
			
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "บันทึกข้อมูล" ใช่หรือไม่ ?\n\nกดปุ่ม "ตกลง" เพื่อยืนยัน')){
				//don't do anything
			}else{
				return false;
			}
		}
		
		
	}
	
	//check form add type
	function check_form_add_type() {
		var device_add_type = document.forms["regis_type"]["device_add_type"].value;
		var device_add_type_model = document.forms["regis_type"]["device_add_type_model"].value;
		var device_add_type_detail = document.forms["regis_type"]["device_add_type_detail"].value;
	
		if ( device_add_type == "" || device_add_type_model == "" || device_add_type_detail == "" ) {
			
			if(device_add_type == ""){
				$(".add_type_glyphicon_yes").hide();
				$(".add_type_glyphicon_no").show();
			}else{
				$(".add_type_glyphicon_yes").show();
				$(".add_type_glyphicon_no").hide();
			}
			if(device_add_type_model == ""){
				$(".add_type_model_glyphicon_yes").hide();
				$(".add_type_model_glyphicon_no").show();
			}else{
				$(".add_type_model_glyphicon_yes").show();
				$(".add_type_model_glyphicon_no").hide();
			}
			if(device_add_type_detail == ""){
				$(".add_type_detail_glyphicon_yes").hide();
				$(".add_type_detail_glyphicon_no").show();
			}else{
				$(".add_type_detail_glyphicon_yes").show();
				$(".add_type_detail_glyphicon_no").hide();
			}
			
			
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "บันทึกข้อมูล" ใช่หรือไม่ ?\n\nกดปุ่ม "ตกลง" เพื่อยืนยัน')){
				//don't do noting
			}else{
				return false;
			}
			
		}
		
		
	}
	
	//check form edit type
	function check_form_edit_type() {
		var device_old_type = document.forms["edit_type"]["device_old_type"].value;
		var device_edit_new_type = document.forms["edit_type"]["device_edit_new_type"].value;
		var device_edit_new_type_model = document.forms["edit_type"]["device_edit_new_type_model"].value;
		var device_edit_new_type_detail = document.forms["edit_type"]["device_edit_new_type_detail"].value;
	
		if ( device_old_type == "" || device_edit_new_type == "" || device_edit_new_type_model == "" || device_edit_new_type_detail == "" ) {
			
			if(device_old_type == ""){
				$(".old_type_glyphicon_yes").hide();
				$(".old_type_glyphicon_no").show();
			}else{
				$(".old_type_glyphicon_yes").show();
				$(".old_type_glyphicon_no").hide();
			}
			if(device_edit_new_type == ""){ 
				$(".edit_new_type_glyphicon_yes").hide();
				$(".edit_new_type_glyphicon_no").show();
			}else{
				$(".edit_new_type_glyphicon_yes").show();
				$(".edit_new_type_glyphicon_no").hide();
			}
			if(device_edit_new_type_model == ""){
				$(".edit_new_type_model_glyphicon_yes").hide();
				$(".edit_new_type_model_glyphicon_no").show();
			}else{
				$(".edit_new_type_model_glyphicon_yes").show();
				$(".edit_new_type_model_glyphicon_no").hide();
			}
			if(device_edit_new_type_detail == ""){
				$(".edit_new_type_detail_glyphicon_yes").hide();
				$(".edit_new_type_detail_glyphicon_no").show();
			}else{
				$(".edit_new_type_detail_glyphicon_yes").show();
				$(".edit_new_type_detail_glyphicon_no").hide();
			}
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "บันทึกข้อมูล" ใช่หรือไม่ ?\n\nกดปุ่ม "ตกลง" เพื่อยืนยัน')){
				//don't do noting
			}else{
				return false;
			}
		}
	}
	
	//check form delete type
	function check_form_delete_type() {
		var device_delete_type = document.forms["delete_type"]["device_delete_type"].value;
		var device_delete_type_pass = document.forms["delete_type"]["device_delete_type_pass"].value;
	
		if ( device_delete_type == "" || device_delete_type_pass == "" ) {
			
			if(device_delete_type == ""){
				$(".delete_type_glyphicon_yes").hide();
				$(".delete_type_glyphicon_no").show();
				alert("ยังไม่ได้เลือกประเภทที่จะลบ \nกรุณาตรวจสอบความถูกต้อง");
			}else{
				$(".delete_type_glyphicon_yes").show();
				$(".delete_type_glyphicon_no").hide();
			}
			if(device_delete_type_pass == ""){
				$(".delete_type_pass_glyphicon_yes").hide();
				$(".delete_type_pass_glyphicon_no").show();
			}else{
				$(".delete_type_pass_glyphicon_yes").show();
				$(".delete_type_pass_glyphicon_no").hide();
			}
			
			return false;
		}else{
			$(".delete_type_glyphicon_yes").show();
			$(".delete_type_glyphicon_no").hide();
			if (confirm('คุณแน่ใจที่จะ "ลบ" ชนิดอุปกรณ์นี้จริงหรือไม่\n\nหากมันใจว่าจะลบ กดปุ่ม "ตกลง"')){
				//don't do noting
			}else{
				return false;
			}
		}
	}
	
	function check_form_edit_with_customer() {
		
		var device_cus_name = document.forms["regis_device_with_cus"]["device_cus_name"].value;
		var device_cus_cat_id = document.forms["regis_device_with_cus"]["device_cus_cat_id"].value;
		var device_regis_date = document.forms["regis_device_with_cus"]["device_regis_date"].value;
		var device_status = document.forms["regis_device_with_cus"]["device_status"].value;
		
		if ( device_cus_name == "" || device_cus_cat_id == "" || device_regis_date == "" || device_status == "" ) {
			
			if(device_cus_name == ""){
				$(".cus_name_glyphicon_yes").hide();
				$(".cus_name_glyphicon_no").show();
			}else{
				$(".cus_name_glyphicon_yes").show();
				$(".cus_name_glyphicon_no").hide();
			}
			if(device_cus_cat_id == ""){
				$(".cus_cat_id_glyphicon_yes").hide();
				$(".cus_cat_id_glyphicon_no").show();
			}else{
				$(".cus_cat_id_glyphicon_yes").show();
				$(".cus_cat_id_glyphicon_no").hide();
			}
			if(device_regis_date == ""){
				$(".regis_date_glyphicon_yes").hide();
				$(".regis_date_glyphicon_no").show();
			}else{
				$(".regis_date_glyphicon_yes").show();
				$(".regis_date_glyphicon_no").hide();
			}
			if(device_status == ""){
				$(".status_glyphicon_yes").hide();
				$(".status_glyphicon_no").show();
			}else{
				$(".status_glyphicon_yes").show();
				$(".status_glyphicon_no").hide();
			}
			
			
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "บันทึกข้อมูล" ใช่หรือไม่ ?\n\nกดปุ่ม "ตกลง" เพื่อยืนยัน')){
				//don't do anything
			}else{
				return false;
			}
		}
		
		
	} //end
	
	// admin add new user function
	function check_form_add_user() {
		
	var user_username = document.forms["add_new_user"]["user_username"].value;
	var user_password = document.forms["add_new_user"]["user_password"].value;
	var user_fname = document.forms["add_new_user"]["user_fname"].value;
	var user_detail = document.forms["add_new_user"]["user_detail"].value;
		
		if ( user_username == "" || user_password == "" || user_fname == "" || user_detail == "" ) {
			
			if(user_username == ""){
				$(".user_username_glyphicon_yes").hide();
				$(".user_username_glyphicon_no").show();
			}else{
				$(".user_username_glyphicon_yes").show();
				$(".user_username_glyphicon_no").hide();
			}
			if(user_password == ""){
				$(".user_password_glyphicon_yes").hide();
				$(".user_password_glyphicon_no").show();
			}else{
				$(".user_password_glyphicon_yes").show();
				$(".user_password_glyphicon_no").hide();
			}
			if(user_fname == ""){
				$(".user_fname_glyphicon_yes").hide();
				$(".user_fname_glyphicon_no").show();
			}else{
				$(".user_fname_glyphicon_yes").show();
				$(".user_fname_glyphicon_no").hide();
			}
			if(user_detail == ""){
				$(".user_detail_glyphicon_yes").hide();
				$(".user_detail_glyphicon_no").show();
			}else{
				$(".user_detail_glyphicon_yes").show();
				$(".user_detail_glyphicon_no").hide();
			}
			
			
			
			alert("ใส่ข้อมูลไม่ครบ \nกรุณาตรวจสอบช่องกรอกข้อมูล");
			return false;	
		}else{
			if (confirm('คุณต้องการ "บันทึกข้อมูล" ใช่หรือไม่ ?\n\nกดปุ่ม "ตกลง" เพื่อยืนยัน')){
				//don't do anything
			}else{
				return false;
			}
		}
		
		
	} //end
	
	
	function show_title_other(){
		if(document.getElementById('title').value == "อื่นๆ" ){
			document.getElementById('title_other').style.display = 'block';
		}else{
			document.getElementById('title_other').style.display = 'none';
		}
	}
	
	
	
</script>	

  </body>
</html>