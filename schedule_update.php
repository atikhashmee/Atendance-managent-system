		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['sche_id'])) {
            		$id = $_GET['sche_id'];
            		$qry = $db->selectAll("schedule","s_id = '$id'");
            		$row = $qry->fetch(PDO::FETCH_ASSOC);
            		?>
            			<div class="container">
            				<div class="row">
            					<div class="col-6">
            					<div class="card-text"><h4>Section update</h4></div>
            						<form action="" class="form-inline" method="POST">
						<input type="text" name="s_time_name" value="<?php echo $row['s_time_name'];?>">
						<input type="submit" name="sc_update" class="btn btn-warning" value="update">
						</form>
						<?php 
							if(isset($_POST['sc_update'])){
								$data = array(
									's_time_name' => $_POST['s_time_name']);
								if ($db->update("schedule",$data,"s_id = '$id' ")) {
									 echo "<p style='color:green'>updated</p>";
									 header("location:schedule_update.php?sche_id=".$id."");
								}
							}
						?>
            					</div>
            				</div>
            			</div>
						
            <?php 	}
            ?>
            <?php 
            include 'files/footer.php';
		?>