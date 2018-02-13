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
            <form method="POST">
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
                            $sdate = $_POST['sdate']; ?>

                             <div class="card-block">
                            <h4 class="card-title">Attandance Information</h4>
                            <p class="card-text"><b>Course :</b><?php echo course($course_id); ?></p> 
                            <p class="card-text"><b>Section :</b><?php echo section($section_id); ?></p> 
                            <p><b>date </b><?php echo $sdate; ?></p>
                          </div>  

                            <?php 
                            $qry = $db->joinQuery("SELECT * FROM `attandence` INNER JOIN users ON users.u_id= attandence.st_id WHERE `crse_name` ='$course_id' AND `sec_name`='$section_id' and `attnd_date` = '$sdate'");
                            echo "<table class='table table-striped table-bordered table-hover'>";
                            echo "<tr>
                                <th>sl</th>
                                <th>student name</th>
                                
                                <th>attandence</th>
                            </tr>";
                                $i=0;
                            while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
                               
                               
                                $i++;
                               echo "<tr>
                                   <td>".$i."</td>
                                   <td>".$row['u_name']."</td>"; ?>
                                   <td> <?php 


                                   if ($row['st_attnd']=='1') {
                        echo "<button  dataid='".$row['attnd_id']."' class='btn btn-default present'>Presenet</button>";
                                   }else {
                         echo "<button  dataid='".$row['attnd_id']."' class='btn btn-warning absent'>absent</button>";
                                   }


                                   ?></td>
                                   
                               <?php echo "</tr>";
                            }
                            echo "</table>";
                        }
                    ?>
                </div>
            </div>


			

			
		</div>

		<?php include 'files/footer.php';
?>
    <script type="text/javascript">
        $(document).ready(function() {

            function update(id,status)
            {
                $.ajax({

                    url:"updateattendance.php",
                    type : "GET",
                    data : {
                        id : id,
                        status : status
                    },
                    success : function(res)
                    {
                        console.log(res);
                        location.reload(true);
                    }
                });
            }
            $(".present").on("click",function(){
                var id = $(this).attr("dataid");
                update(id,"1");
               // alert(id);
            });
            $(".absent").on("click",function(){
                var id = $(this).attr("dataid");
                update(id,"2");
            });

            
        });
    </script>

