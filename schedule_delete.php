		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['sche_id'])) {
            		$id = $_GET['sche_id'];

                                    if ($db->delete("schedule","s_id = '$id'")) {
                                          header("location:schedule.php?delemsg=schedule has been deleted");
                                    }
            			}
            
           
            include 'files/footer.php';
		?>