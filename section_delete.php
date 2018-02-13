		<?php 

			include 'files/header.php';
            include 'files/menu.php';
            ?>
            <?php 

            	if (isset($_GET['sec_id'])) {
            		$id = $_GET['sec_id'];

                                    if ($db->delete("sections","sec_id = '$id'")) {
                                          header("location:section.php?delemsg=section has been deleted");
                                    }
            			}
            
           
            include 'files/footer.php';
		?>