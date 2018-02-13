<?php 
   include 'files/header.php';
   include 'files/menu.php';
   if ($_SESSION['role'] != '0') {
   header("location:home.php?msg=You are not authorized to acces  this page ");
   
    }
   
   ?>
<div class="container"  style="margin-top: 10px">
   <div class="row">
      <div class="col">
         <div class="bg-faded">
            <h1>Assign students to the course</h1>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <form method="POST">
            <div class="form-group">
               <label for="exampleSelect1">Student</label>
               <select class="form-control" name="student_id" id="student_id">
                  <option value="">Select an option</option>
                  <?php 
                     $qry = $db->selectAll("users","role='2'");
                     while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $row['u_id'];?>"><?php echo $row['u_name'];?></option>
                  <?php }
                     ?>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleSelect1">Course </label>
               <select class="form-control" name="course_id" id="course_id">
                  <option value="">Select an option</option>
                  <?php 
                     $qry = $db->selectAll("course");
                     while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $row['c_id'];?>"><?php echo $row['c_code'];?></option>
                  <?php }
                     ?>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleSelect1">Section </label>
               <select class="form-control" name="section_id" id="section_id">
                  <option value="">Select an option</option>
                  <?php 
                     $qry = $db->selectAll("sections");
                     while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $row['sec_id'];?>"><?php echo $row['sec_name'];?></option>
                  <?php }
                     ?>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleSelect1">Schedule </label>
               <select class="form-control" name="schedule_id" id="schedule_id">
                  <option value="">Select an option</option>
                  <?php 
                     $qry = $db->selectAll("schedule");
                     while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $row['s_id'];?>"><?php echo $row['s_time_name'];?></option>
                  <?php }
                     ?>
               </select>
            </div>
            <button type="submit"  name="assignstudentbtn" class="btn btn-primary">Submit</button>
         </form>
         <?php 
            if (isset($_POST['assignstudentbtn'])) {
            
                $studentid = $_POST['student_id'];
                $course_id = $_POST['course_id'];
                $section_id = $_POST['section_id'];
                $schedule_id = $_POST['schedule_id'];
            
            
                $data = array(
                    'student_id' => $studentid, 
                    'courses_id' => $course_id,
                    'sec_id' => $section_id,
                    'sched_id' => $schedule_id
                    );
                $qry = $db->selectAll("assign_student");
                while ($row=$qry->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['student_id'] == $studentid && $row['courses_id']== $course_id &&  $row['sec_id'] ==  $section_id && $row['sched_id'] == $schedule_id) {
                       echo "<p style='color:red'> Already exist </p>";
                       exit();
                    }
                }
            
                if (empty($studentid) || empty($course_id) || empty($section_id) || empty($schedule_id) ) {
                    echo "<p style='color:red'> select necessary fields first </p>";
                }else {
            
                    if ($db->insert("assign_student",$data)) {
                        echo "<p style='color:green'> saved successfully </p>";
                    }else {
                        echo "<p style='color:red'> Problem </p>";
                    }
                }
            
            
            
            
            }
            
            ?>
      </div>
   </div>
</div>
<?php include 'files/footer.php';
   ?>