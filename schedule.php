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
            <h1>Schedule Add</h1>
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
                     <input type="text" name="schedulecode" class="form-control"   placeholder="course code">
                  </div>
               </td>
               <td>
                  <button type="submit"  name="submitbtn" class="btn btn-primary">Submit</button>

               </td>
            </tr>
            </form>
            <?php 
                if (isset($_POST['submitbtn'])) {
                        $schedulecode =  $_POST['schedulecode'];
                       
                        $data = array(
                            's_time_name' =>  $schedulecode
                            
                            );
                        if (!empty($schedulecode)) {
                           if ($db->insert("schedule",$data)) {
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
                   <th>schedule</th>
                   <th>Action</th>
               </tr>
               <?php 
               $qry = $db->selectAll("schedule");
               $i = 0;
               while ($row = $qry->fetch(PDO::FETCH_ASSOC)) { $i++;
                ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $row['s_time_name'];?></td>
                  
                   <td><a href="schedule_update.php?sche_id=<?php echo $row['s_id'];?>" class="btn btn-warning">Edit</a>||
                     <a href="schedule_delete.php?sche_id=<?php echo $row['s_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
               </tr>
              <?php  }

               ?>
              
           </table>
       </div>
   </div>
</div>
<?php include 'files/footer.php';
   ?>