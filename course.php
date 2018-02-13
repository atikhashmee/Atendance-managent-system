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
            <h1>Course Add</h1>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <table class="table">
         <form method="POST">
            <tr>
               <td>
                  
                  <div class="form-group">
                     <input type="text" name="coursecode" class="form-control"   placeholder="course code">
                  </div>
               </td>
               <td>
                  <div class="form-group">
                     <input type="text" name="corsedetails" class="form-control"  placeholder="cours details">
                  </div>
               </td>
               <td>
                  <div class="form-group">
                    <select name="department" id="" class="form-control">
                      <option value="">selec a department</option>
                      <option value="1">Science</option>
                      <option value="2">Arts</option>
                      <option value="3">Commerce</option>
                      <option value="4">General</option>
                    </select>
                  </div>
               </td>
               <td>
                  <button type="submit"  name="submitbtn" class="btn btn-primary">Submit</button>

               </td>
            </tr>
            </form>
            <?php 
                if (isset($_POST['submitbtn'])) {
                        $corsecode =  $_POST['coursecode'];
                        $coursedetails =  $_POST['corsedetails'];
                        $department =  $_POST['department'];
                        $data = array(
                            'c_code' =>  $corsecode, 
                            'c_name' =>  $coursedetails,
                            'department' =>  $department
                            );
                        if (!empty($corsecode)) {
                           if ($db->insert("course",$data)) {
                            echo "<p style='color:green'>saved</p>";
                        }else{

                            echo "<p style='color:red'>Problem</p>";
                        }
                        }else{
                             echo "<p style='color:red'>Empty fields</p>";
                        }
                        
                }

            ?>
         </table>
      </div>
   </div>
   <div class="row">
       <div class="col">
       <?php if(isset($_GET['delemsg'])){
                echo "<p style='color:green'>".$_GET['delemsg']."</p>"; 
        }  ?>
           <table class="table table-striped table-bordered">
               <tr>
                   <th>SL</th>
                   <th>Course code</th>
                   <th>Course details</th>
                  
                   <th>Action</th>
               </tr>
               <?php 
               $qry = $db->selectAll("course");
               $i = 0;
               while ($row = $qry->fetch(PDO::FETCH_ASSOC)) { $i++;
                ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $row['c_code'];?></td>
                   <td><?php echo $row['c_name'];?></td>
                   
                   <td><a href="course_update.php?c_id=<?php echo $row['c_id'];?>" class="btn btn-warning">Edit</a>||
                     <a href="course_delete.php?c_id=<?php echo $row['c_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
               </tr>
              <?php  }

               ?>
              
           </table>
       </div>
   </div>
</div>
<?php include 'files/footer.php';
   ?>