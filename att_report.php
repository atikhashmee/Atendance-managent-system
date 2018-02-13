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
                <table class="table">
                    
                <tr>
                    <td>
            <form method="POST" >
     <div class="form-group">
    <label for="exampleSelect1">Course </label>
    <select class="form-control" name="course_id" id="course_id">
        <option value="">Select an option</option>
            <?php 
                $id=$_SESSION['u_id'];
                $qry = $db->joinQuery("SELECT * FROM `assign_course_to_teacher` INNER JOIN course ON assign_course_to_teacher.course_id= course.c_id WHERE `teacher_id` = '$id'");
                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_code'];?></option>
                <?php }
            ?>
    </select>
  </div>

                    </td>
                    <td>
                        <div class="form-group">
    <label for="exampleSelect1">Section </label>
    <select class="form-control" name="section_id" id="section_id">
        <option value="">Select an option</option>
            <?php 

                $qry = $db->joinQuery("SELECT * FROM `assign_course_to_teacher` INNER JOIN sections ON assign_course_to_teacher.section_id= sections.sec_id WHERE `teacher_id` = '$id'");
                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $row['sec_id'];?>"><?php echo $row['sec_name'];?></option>
                <?php }
            ?>
    </select>
  </div>
                    </td>
         
        <td>  <div class="form-group">
    <label for="exampleSelect1"> Start Date </label>
    <input type="date" name="sdate" />
  </div></td>
        <td>
           <div class="form-group">
    <label for="exampleSelect1"> End  Date </label>
    <input type="date" name="edate" />
  </div>
  
  
        </td>
        <td>
            <button type="submit"  name="reportbutton" class="btn btn-primary">Submit</button> 
        </td>
    </tr>
        
  
  </table>
  
</form>
		
				</div>
			</div>

            <div class="row">
                <div class="col">
                    <?php 
                        if(isset($_POST['reportbutton']))
                        {
                            $course_id = $_POST['course_id'];
                            $section_id = $_POST['section_id'];
                            $sdate = $_POST['sdate'];
                            $edate = $_POST['edate'];
                            ?>
                                        <div class="card-block">
                <h4 class="card-title">Attandance Information</h4>
                <p class="card-text"><b>Course :</b><?php echo  course($course_id); ?></p> 
                <p class="card-text"><b>Section :</b><?php echo  section($section_id); ?></p> 
                <p><b>class start </b><?php echo $sdate; ?> ---- <b>To </b><?php echo $edate; ?></p>
                
              </div>
                            <?php 
                            $qry = $db->joinQuery("SELECT DISTINCT `st_id`,users.u_name,users.u_id FROM `attandence` INNER JOIN users on attandence.st_id = users.u_id WHERE `crse_name` ='$course_id' AND `sec_name` ='$section_id' AND `attnd_date` BETWEEN '$sdate' AND '$edate'");

                            echo "<table class='table table-striped table-bordered table-hover'>";
                            echo "<tr>
                                <th>sl</th>
                                <th>student ID</th>
                                <th>student name</th>
                                <th>Total class</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Attandance percentage(%)</th>
                                <th>Action</th>
                            </tr>";
                                $i=0;
                            while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                               
                                $qqry = $db->joinQuery("SELECT COUNT( `st_attnd` ) as countattandance, SUM(`st_attnd`='1') as totalpresents FROM `attandence` WHERE `st_id` ='".$row['st_id']."' AND `attnd_date` BETWEEN '$sdate' AND '$edate'");
                                $qqry->execute();
                                $r = $qqry->fetch();
                                $i++;
                                
                               echo "<tr>
                                   <td>".$i."</td>
                                   <td>".$row['u_id']."</td>
                                   <td>".$row['u_name']."</td>
                                   <td>".$r['countattandance']."</td>
                                   <td>".$r['totalpresents']."</td>
                                   <td>".((int)$r['countattandance']-(int)$r['totalpresents'])."</td>
                                   <td>".number_format((float)(((int)$r['totalpresents']/(int)$r['countattandance'])*100),2,'.','')."%</td>
    <td><a href='attdetails.php?id=".$row['u_id']."&sdate=".$sdate."&edate=".$edate."&course=".$course_id."&section=".$section_id."' target='_blank' class='btn btn-primary'>Details</a></td>
                               </tr>";
                            }
                            echo "</table>";
                        }
                    ?>
                </div>
            </div>
			

			
		</div>

		<?php include 'files/footer.php';
?>


