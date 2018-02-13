		<?php 

			if (isset($_GET['id'])) {

				$id =  $_GET['id'];
				$st = $_GET['status'];
				$sql = '';
				    $con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
				    if ($st == '1') {
				    	$sql = "UPDATE `attandence` SET `st_attnd`='0' WHERE `attnd_id` ='$id'";
				    }else{
				    	$sql = "UPDATE `attandence` SET `st_attnd`='1' WHERE `attnd_id` ='$id'";

				    }
					$qry = $con->prepare($sql);
					$qry->execute();
			}
		?>