<?php 

		include 'files/header.php';
		include 'files/menu.php';
		
		if ($_SESSION['role'] != '1') {
		header("location:home.php?msg=You are not authorized to acces  this page ");

		 }

		?>	

		
		
		<div class="container">

			
			<div class="row">
			<div class="col">
			
			 <?php 
	 
	 if (isset($_POST['btn'])){
		 
		 
		 $course_id= $_POST['course_id'];
		 $section_id= $_POST['section_id'];
		 $sch_id= $_POST['schedule_id'];
		 $date = $_POST['date'];
		 
		 $qry1 = $db->joinQuery("SELECT * FROM assign_student INNER JOIN users on assign_student.student_id=users.u_id INNER JOIN course on assign_student.courses_id=course.c_id INNER JOIN sections on assign_student.sec_id=sections.sec_id INNER JOIN schedule on assign_student.sched_id= schedule.s_id WHERE assign_student.courses_id='$course_id' AND assign_student.sec_id='$section_id' AND assign_student.sched_id='$sch_id'");
		 $i=0;
		 
		 ?>

				<div class="card">
  <div class="card-block">
    		<p><strong>Course Name:</strong> <?php echo course($course_id); ?></p> <br> 
    		<p><strong>Section Name:</strong> <?php echo section($section_id); ?></p> <br> 
    		<p><strong>Schedule Name:</strong> <?php echo schedule($sch_id); ?></p><br> 
    		<p><strong>Date:</strong> <?php echo $date; ?></p><br> 
  </div>
</div>
			
		 <form method="POST">
		 
		 <table class="table table-striped table-bordered table-hover">
		 
		 <tr><th>Sl</th><th>Student ID</th>><th>Name</th><th>Attandence</th></tr>
		 <?php 
		 
		 while($row=$qry1->fetch(PDO::FETCH_ASSOC))
			 
			 {
				 $i++;
				 
				   ?>
				 
				 <tr> <td><?php echo $i; ?></td>
				 <td><?php echo $row['u_id']; ?></td>
				 <td>
				 
				 <?php echo $row ['u_name'];?>
				 <input type="hidden" name="course_id" value="<?php echo $course_id;  ?>">
		         <input type="hidden" name="section_id" value="<?php echo  $section_id;  ?>">
				 <input type="hidden" name="stid[]" value="<?php echo $row['u_id']; ?>">
				  <input type="hidden" name="date" value="<?php echo $date; ?>">
				 </td>
				 
				 <td>
				 <select name="atst[]" class="attreport" >
				 <option value="0">0</option><option value="1">1</option>
				 </select>
				 </td>
				 </tr>
				 
				 <?php
				 
				 
			 }
			 
			 ?>
			 
			 </table>
			 <input type="hidden" id="totallstudent" value="<?php echo $i; ?>">
			    <p id="totalstudent"><strong>Total student : </strong> <?php echo $i; ?></p> <br>
			   Total Present : <p id="pres"><strong></strong></p> <br>
			   Total Absent : <p id="abss"><strong></strong></p>
			
			<button type="submit"  name="btn2" class="btn btn-primary">Submit</button>
			
			</form>
			
			 <?php 
	 }
	 ?>
			
			<?php 
		 if (isset ($_POST['btn2'])){
			 $stid= $_POST['stid'];
			 $atst= $_POST['atst'];
			 $date = $_POST['date'];
			 $course_id =  $_POST['course_id'];
			 $section_id =  $_POST['section_id'];
			 $con  = new PDO("mysql:host=localhost;dbname=ams", "root", "");
			  $adata = "INSERT INTO `attandence`(`crse_name`, `sec_name`, `attnd_date`, `st_id`, `st_attnd`) VALUES ";
                for ($i=0; $i <count($_POST['stid']); $i++) { 
              $adata .= "('".$_POST['course_id']."','".$_POST['section_id']."','".$_POST['date']."','$stid[$i]','$atst[$i]'),";
                }
               $adata = trim($adata,',');
               $qry = $con->prepare($adata);
               $deleteqry = $con->prepare("DELETE FROM `attandence` WHERE `crse_name` ='".$_POST['course_id']."' AND `attnd_date` = '".$_POST['date']."'");
               $deleteqry->execute();
              if ($qry->execute())
              	echo "<p style='color:green'>saved</p> <a href='attandence.php'>submit another</a>";
              else 
              	echo "<p style='color:red'>problem</p>";
             	$con = null;


			/* echo "<pre>";
			 echo $adata;
			 exit;*/
			 
			 
		 }
			
			?>
			</div>
			</div>
			
		</div>

		<?php include 'files/footer.php';
?>

		<script type="text/javascript">
			$(document).ready(function(){
				var pre=0;
				var abs=0;
				var totalstudent = $("#totallstudent").val();
				
				 
					$(".attreport").on("change",function(){
						if($(this).val()=="1")
						{
							pre++;
							document.getElementById('pres').innerHTML = pre;
						}else{

							pre--;
							document.getElementById('pres').innerHTML = pre;
						}
						document.getElementById('abss').innerHTML = totalstudent-pre;// fixed  now happy :3 
					});

				  
				 

			});
		</script>


