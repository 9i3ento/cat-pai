<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main_dashboard.php">CAT Telecom</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
		  
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
				<li><a href="device.search.with.customer.php">อุปกรณ์ + ลูกค้า</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="device.search.php">อุปกรณ์ใหม่</a></li>
				
				<li role="separator" class="divider"></li>
                
              </ul>
            </li>
			<!-- End nev left -->
            
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"> อุปกรณ์ <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
				<li><a href="device.register.new.php">ลงทะเบียนอุปกรณ์ ใหม่</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="device.register.with.customer.php">ลงทะเบียนอุปกรณ์ + ลูกค้า</a></li>
				
				<li role="separator" class="divider"></li>
                
              </ul>
            </li>
			
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-wrench" aria-hidden="true"> การตั้งค่าอื่นๆ <span class="caret"></span></a>
              <ul class="dropdown-menu">
				<li role="separator" class="divider"></li>
				<li><a href="device.type.management.php">เกี่ยวกับชนิดของอุปกรณ์</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>
			
			<li><a href="show.loglist.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> Log</a></li>
			
          </ul>
		  
		  
		  <ul class="nav navbar-nav navbar-right">
		  
			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?=$_COOKIE['user']?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
				<?php if($_COOKIE['user'] == 'admin'){ ?>
				<li role="separator" class="divider"></li>
				<li><a href="user.management.php">การจัดการของผู้ดูแลระบบ</a></li>
				<?php } ?>
			    <li role="separator" class="divider"></li>
				<li><a href="process/access_system.php?check_send=logout">ออกจากระบบ</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<br><br><br>