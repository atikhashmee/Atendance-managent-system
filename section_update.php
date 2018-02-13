		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['sec_id'])) {
            		$id = $_GET['sec_id'];
            		$qry = $db->selectAll("sections","sec_id = '$id'");
            		$row = $qry->fetch(PDO::FETCH_ASSOC);
            		?>
            			<div class="container">
            				<div class="row">
            					<div class="col-6">
            					<div class="card-text"><h4>Section update</h4></div>
            						<form action="" class="form-inline" method="POST">
						<input type="text" name="sec_name" value="<?php echo $row['sec_name'];?>">
						<input type="submit" name="sec_update" class="btn btn-warning" value="update">
						</form>
						<?php 
							if(isset($_POST['sec_update'])){
								$data = array(
									'sec_name' => $_POST['sec_name']);
								if ($db->update("sections",$data,"sec_id = '$id' ")) {
									 echo "<p style='color:green'>updated</p>";
									 header("location:section_update.php?sec_id=".$id."");
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