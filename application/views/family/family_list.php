<body>

	<div class="content">
		<h1>Manage Family</h1>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
      <div id="myModal1" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
</div>
		<div class="text-right"><?php echo anchor('users/family/add','Add Family Member',array('class'=>'btn btn-lg btn-primary text-right','data-toggle'=>'modal','data-target'=>'#myModal1')); ?></div>
			<br />
		<!--<div class="paging"><?php echo $pagination; ?></div>-->
		<div class="data"><?php echo $table; ?></div>
	
		
	</div>