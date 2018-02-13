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
      <form method="POST" action="submit_attandance.php" >
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
        <div class="form-group">
          <label for="exampleSelect1">Schedule </label>
          <select class="form-control" name="schedule_id" id="schedule_id">
            <option value="">Select an option</option>
            <?php 
              $qry = $db->joinQuery("SELECT * FROM `assign_course_to_teacher` INNER JOIN schedule ON assign_course_to_teacher.schedule_id= schedule.s_id WHERE `teacher_id` = '$id'");
              while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $row['s_id'];?>"><?php echo $row['s_time_name'];?></option>
            <?php }
              ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleSelect1">Date </label>
          <input type="date" name="date" />
        </div>
        <button type="submit"  name="btn" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<?php include 'files/footer.php';
  ?>