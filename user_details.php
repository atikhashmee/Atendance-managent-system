		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['id'])) {
            		$id = $_GET['id'];
            		$qry = $db->selectAll("user_information","user_id = '$id'");
            		$row = $qry->fetch(PDO::FETCH_ASSOC);
            		?>
						<div class="container">
							<div class="row">
								<div class="col">
									<table class="table table-striped table bordered">
										<tr>
											<th>Name :</th>
											<td><?php echo $row['full_name']; ?></td>
										</tr>
										<tr>
											<th>Date of Birth :</th>
											<td><?php echo $row['date_of_birth']; ?></td>
										</tr>
										<tr>
											<th>Gender :</th>
											<td><?php echo $row['gender']; ?></td>
										</tr>
										<tr>
											<th>Email :</th>
											<td><?php echo $row['email']; ?></td>
										</tr>
										<tr>
											<th>Phone :</th>
											<td><?php echo $row['phone']; ?></td>
										</tr>
										<tr>
											<th>Address :</th>
											<td><?php echo $row['adress']; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
            <?php 	}
            ?>
            <?php 
            include 'files/footer.php';
		?>