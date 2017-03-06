<style>
  .modal-header, h4, .close {
      background-color: #FF8F26;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #FF8F26;
  }
  </style>
<?php
define('TITLE','Dashboard - CAT Telecom @ Pai');
require('inc/inc.header.php');
if(!isset($_COOKIE['user']) && !isset($_COOKIE['pass'])){
//require('inc/inc.navbar.php');
?>
  
<div class="container">
  <h2>Click to login</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="POST" action="process/access_system.php">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="admin_user" id="usrname" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="admin_pass" id="psw" placeholder="Enter password">
            </div>
				<input type="hidden" name="check_send" value="login_state">
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        
      </div>
      
    </div>
  </div> 
</div>

<?php
	}else{
		echo '<script type="text/javascript">window.location = "main_dashboard.php";</script>';
	}
require('inc/inc.scripts.php');
?>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

