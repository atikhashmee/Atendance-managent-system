

		<?php 

				require_once 'dboperation.php';
				require_once 'functions.php';
               $db = new Db();
				if (isset($_POST['btn'])) {

					$name = $_POST['username'];
					$pass = $_POST['password'];
					$qry = $db->selectAll("users","u_name = '$name' AND u_pass = '$pass' ");
					$data = $qry->fetch(PDO::FETCH_ASSOC);
					if (!empty($name) && !empty($pass)) {
						
							if ($name == $data['u_name'] && $pass == $data['u_pass']) {

								session_start();
								$_SESSION['username'] = $name;
								$_SESSION['role']     =  $data['role'];
								$_SESSION['u_id']    = $data['u_id'];
								header("location:../home.php");
							}else{

								echo "username and password don't match <a href='../index.php'>Go back</a>";
							}
					}else {
						echo "fields are empty , fill them first ..... <a href='../index.php'>Go back</a>";
					}


				}	


		?>