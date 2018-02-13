<?php 
   include 'files/header.php';
   include 'files/menu.php';
   if ($_SESSION['role'] != '0') {
   header("location:home.php?msg=You are not authorized to acces  this page ");
   
    }
   
   ?>
<div class="container" style="margin-top: 10px">
   <div class="row">
      <div class="col">
         <div class="bg-faded">
            <h1>Assign teachers to the course</h1>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <table class="table table-bordered">
            <tr>
               <td>
                  <form method="POST">
                     <div class="form-group">
                        <label for="exampleSelect1">Teacher</label>
                        <select class="form-control" name="teacher_id" id="teacher_id">
                           <option value="">Select an option</option>
                           <?php 
                              $qry = $db->selectAll("users","role='1'");
                              while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
                           <option value="<?php echo $row['u_id'];?>"><?php echo $row['u_name'];?></option>
                           <?php }
                              ?>
                        </select>
                     </div>
               </td>
               <td>
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
               </td>
            </tr>
            <tr>
            <td>
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
            </td>
            <td>
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
            <button type="submit"  name="btn" class="btn btn-primary">Submit</button>
            </form>
            </td>
            </tr>
         </table>
         <?php 
            if (isset($_POST['btn'])) {
            
                $data = array(
                    'teacher_id' => $_POST['teacher_id'], 
                    'course_id' => $_POST['course_id'],
                    'section_id' => $_POST['section_id'],
                    'schedule_id' =>$_POST['schedule_id']
                );
                $qrrry = $db->selectAll("assign_course_to_teacher");
                while ($row = $qrrry->fetch(PDO::FETCH_ASSOC)) {
                  if ($row['teacher_id'] ==$_POST['teacher_id'] && $row['course_id'] ==  $_POST['course_id'] && $row['section_id'] ==  $_POST['section_id'] && $row['schedule_id'] ==  $_POST['schedule_id']) {
                    echo "<p style='color:red'>Data already exist</p>";
                    exit();
                  }
                }
            
                if (empty($_POST['teacher_id'])) {
                    echo "<p style='color:red'>teacher ID cann not be empty</p>";
                }elseif(empty($_POST['course_id']))
                {
                    echo "<p style='color:red'>Course ID cann not be empty</p>";
                }elseif(empty($_POST['section_id']))
                {
                    echo "<p style='color:red'>section  ID cann not be empty</p>";
                }
                elseif(empty($_POST['schedule_id']))
                {
                    echo "<p style='color:red'>schedule_id cann not be empty</p>";
                }
                else {
                    $db->insert("assign_course_to_teacher",$data) ;
                    echo "<p style='color:green'>Saved</p>";
                }
            }
            
            ?>
      </div>
   </div>
</div>
<?php include 'files/footer.php';
   ?>