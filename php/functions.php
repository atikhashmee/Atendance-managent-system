		<?php 


				 


				function role($role)
				{
					switch ($role) {
						case 0:
							echo "Admin";
							break;
						case 1:
							echo "Teacher";
							break;
						case 2:
							echo "Student";
							break;
					}
				}
				function department($department)
				{
					switch ($department) {
						case 1:
							echo "Science";
							break;
						case 2:
							echo "Arts";
							break;
						case 3:
							echo "Commerce";
							break;
						case 4:
							echo "General";
							break;
					}
				}

				function course($courseid)
				{
					$con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
					$qry = $con->prepare("SELECT * FROM `course` WHERE `c_id` ='$courseid'");
					$qry->execute();
					$row = $qry->fetch(PDO::FETCH_ASSOC);
					echo $row['c_code']."<small>(".$row['c_name'].")</small>";
					$con = null;
				}
				function section($sectionid)
				{
					$con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
					$qry = $con->prepare("SELECT * FROM `sections` WHERE `sec_id` ='$sectionid'");
					$qry->execute();
					$row = $qry->fetch(PDO::FETCH_ASSOC);
					echo $row['sec_name'];
					$con = null;
				}
				function schedule($scheduleid)
				{
					$con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
					$qry = $con->prepare("SELECT * FROM `schedule` WHERE `s_id` ='$scheduleid'");
					$qry->execute();
					$row = $qry->fetch(PDO::FETCH_ASSOC);
					echo $row['s_time_name'];
					$con = null;
				}
				function name($uname)
				{
					$con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
					$qry = $con->prepare("SELECT * FROM `users` WHERE `role` ='2' AND `u_id` ='$uname'");
					$qry->execute();
					$row = $qry->fetch(PDO::FETCH_ASSOC);
					echo $row['u_name'];
					$con = null;

				}


		?>