<?php 

		include 'files/header.php';
		include 'files/menu.php';
		
		if ($_SESSION['role'] != '0') {
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
                $qry = $db->selectAll("course");
                while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_name'];?></option>
                <?php }
            ?>
    </select>
  </div>

                    </td>
                    <td>
                        <div class="form-group">
    <label for="exampleSelect1">Student's id </label>
    <input type="text" name="student_id" class="form-control">
   
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
                            $student_id = $_POST['student_id'];
                            $sdate = $_POST['sdate'];
                            $edate = $_POST['edate'];
                            ?>
                                        <div class="card-block">
                <h4 class="card-title">Attandance Information</h4>
                <p class="card-text"><b>Course :</b><?php echo  course($course_id); ?></p> 
                <p class="card-text"><b>Student's name :</b><?php echo  name($student_id); ?></p> 
                <p><b>class start </b><?php echo $sdate; ?> ---- <b>To </b><?php echo $edate; ?></p>
                
              </div>
                            <?php 
                            $qry = $db->joinQuery("SELECT `st_attnd` FROM `attandence` WHERE `crse_name`='$course_id' AND `st_id` ='$student_id' AND `attnd_date` BETWEEN '$sdate' AND '$edate'");
                            $countrow = $qry->rowCount();
                            if ($countrow != 0) {
                               
                            

                            echo "<table class='table table-striped table-bordered table-hover'>";
                            echo "<tr>
                                
                                <th>Total class</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Attandance percentage(%)</th>
                                <th>Action</th>
                            </tr>";
                               $present =0;
                               while ($r = $qry->fetch()) {
                                   if ($r['st_attnd']=='1') {
                                      $present++;
                                   }
                               }

                            
                               
                               echo "<tr>
                                   
                                   <td>".$countrow."</td>
                                   <td>".$present."</td>
                                   <td>".((int)$countrow-(int)$present)."</td>
                                   <td>".number_format((float)(((int)$present/(int)$countrow)*100),2,'.','')."%</td>
    <td><a href='admin_ind_att_report.php?id=".$student_id."&sdate=".$sdate."&edate=".$edate."&course=".$course_id."' target='_blank' class='btn btn-primary'>Details</a></td>
                               </tr>";
                            
                            echo "</table>";
                        }else{
                            echo "<p style='color:red'>There is no data found</p>";

                        }
                        }
                    ?>
                </div>
            </div>
			

			
		</div>

		<?php include 'files/footer.php';
?>


