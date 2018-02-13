		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['c_id'])) {
            		$id = $_GET['c_id'];

                                    if ($db->delete("course","c_id = '$id'")) {
                                          header("location:course.php?delemsg=course has been deleted");
                                    }
            			}
            
           
            include 'files/footer.php';
		?>