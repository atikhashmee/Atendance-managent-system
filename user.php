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
            <h1>Users :: </h1>
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
                     <input type="text" name="name" class="form-control"   placeholder="User's name">
                  </div>
               </td>
               <td>
                  <div class="form-group">
                     <input type="password" name="password" class="form-control"  placeholder="User's password">
                  </div>
               </td>
               <td>
                  <div class="form-group">
                    <select name="role" id="" class="form-control">
                      <option value="">selec a role</option>
                      <option value="0">Admin</option>
                      <option value="1">Teacher</option>
                      <option value="2">Student</option>
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
                        $name =  $_POST['name'];
                        $password =  $_POST['password'];
                        $role =  $_POST['role'];
                        $data = array(
                            'u_name' =>  $name, 
                            'u_pass' =>  $password,
                            'role' =>$role
                            );
                        if (!empty($role)) {
                           if ($db->insert("users",$data)) {
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
       
           <table class="table table-striped table-bordered">
           <tr>
           <form action="#" method="POST">
             <td><div class="form-group">
                    <select name="rolefilter" id="" class="form-control">
                      <option value="">selec a role</option>
                      <option value="0">Admin</option>
                      <option value="1">Teacher</option>
                      <option value="2">Student</option>
                    </select>
        </div></td>
             <td>
               <button type="submit"  name="filter" class="btn btn-primary">Submit</button>
             </td>
             </form>
           </tr>
               <tr>
                   <th>SL</th>
                   <th>Username</th>
                   <th>password</th>
                   <th>role</th>
                   <th>Action</th>
               </tr>
               <?php 
               if (isset($_POST['filter'])) {
                  $id = $_POST['rolefilter'];
                 $qry = $db->selectAll("users","`role`='$id'");
               }else {
                $qry = $db->selectAll("users");
               }
               
               $i = 0;
               while ($row = $qry->fetch(PDO::FETCH_ASSOC)) { $i++;
                ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $row['u_name'];?></td>
                   <td><?php echo $row['u_pass'];?></td>
                   <td><?php echo role($row['role']);?></td>
                   <td><a href="user_details.php?id=<?php echo $row['u_id']; ?>" class="btn btn-primary">View</a> ||
                   <a href="profile.php?p_id=<?php echo $row['u_id']; ?>" class="btn btn-warning">Edit</a> ||
                   <a href="user_delete.php?p_did=<?php echo $row['u_id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a></td>
               </tr>
              <?php  }

               ?>
              
           </table>
       </div>
   </div>
</div>
<?php 


    if (isset($_GET['p_did'])) {
       $id = $_GET['p_did']; 
        if ($db->delete("users","u_id = '$id'") && $db->delete("user_information","user_id = '$id'") ) {
          header("location:user.php");
        }else{
          echo "problem";
        }
    }



include 'files/footer.php';
   ?>


