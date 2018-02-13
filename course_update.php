		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['c_id'])) {
            		$id = $_GET['c_id'];
            		$qry = $db->selectAll("course","c_id = '$id'");
            		$row = $qry->fetch(PDO::FETCH_ASSOC);
            		?>
            			<div class="container">
            				<div class="row">
            					<div class="col-6">
            					<div class="card-text"><h4>Section update</h4></div>
            						<form action="" class="form-inline" method="POST">
						<input type="text" name="c_code" value="<?php echo $row['c_code'];?>">
                                    <input type="text" name="c_name" value="<?php echo $row['c_name'];?>">
						<input type="submit" name="sec_update" class="btn btn-warning" value="update">
						</form>
						<?php 
							if(isset($_POST['sec_update'])){
								$data = array(
									'c_code' => $_POST['c_code'],
                                                      'c_name' => $_POST['c_name']
                                                      );
								if ($db->update("course",$data,"c_id = '$id' ")) {
									 echo "<p style='color:green'>updated</p>";
									 header("location:course_update.php?c_id=".$id."");
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