		<?php 
					include 'files/header.php';
                    include 'files/menu.php';?>

					
	        <div class="container">
	  						<div class="row">
								<div class="col">

								

				<?php if (isset($_GET['p_id'])) {
					
					$id =  $_GET['p_id'];
					$look = $db->selectAll("user_information","user_id = '$id'");
					if ($look->rowCount()!=0) {
						$row = $look->fetch(PDO::FETCH_ASSOC);
						?>

									<table class="table table-bordered">
								 <form method="POST">
            <tr>
               <td>
									
									 <input type="hidden" name="user_id" value="<?php echo $id?>">
                     <div class="form-group">
                        <label for="exampleSelect1">Full Name</label>
                        <input type="text" name="fullname" class="form-control" value="<?php echo $row['full_name'];?>">
                     </div>
               </td>
               <td>
               <div class="form-group">
               <label for="exampleSelect1">Date of Birth </label>
               <input type="date" name="date_of_birth" class="form-control" value="<?php echo $row['date_of_birth'];?>">
               </div>
               </td>
            </tr>
            <tr>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">Gender </label>
            <select name="gender" id="" class="form-control" >
            	<option value="male">Male</option>
            	<option value="female">Female</option>
            </select>
            </div>  
            </td>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">E-mail </label>
           <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
            </div>
            
            
            </td>
            </tr>
			<tr>
              <td>
            <div class="form-group">
            <label for="exampleSelect1">Phone</label>
            <input type="number" name="phone" class="form-control" value="<?php echo $row['phone'];?>">
            </div>  
            </td>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">Address </label>
           <input type="text" name="adres" class="form-control" value="<?php echo $row['adress'];?>">
            </div>
            <button type="submit"  name="btnsubmitinformtaion" class="btn btn-primary">Submit</button>
            </td>
            </tr>
            </form>
            <?php 
            	if (isset($_POST['btnsubmitinformtaion'])) {
            		$data = array(
            			'user_id' => $_POST['user_id'],
            			'full_name' => $_POST['fullname'],
            			'date_of_birth' => $_POST['date_of_birth'] ,
            			'gender' => $_POST['gender'] ,
            			'email' => $_POST['email'],
            			'phone' => $_POST['phone'] ,
            			'adress' => $_POST['adres'] );
            		if (!empty($_POST['fullname'] && !empty($_POST['email']) )) {
            			if ($db->update("user_information",$data,"user_id = '$id'")) {
            				echo "<p style='color:green'>update</p>";
            			}else {

            				echo "<p style='color:red'>Problem</p>";
            			}
            		}else {
            			echo "<p style='color:red'>name and email can not be empty</p>";
            		}
            	}
            ?>
            
            </table>
          
						
					<?php }else 
					{?>
							
						
								<table class="table table-bordered">
								 <form method="POST">
            <tr>
               <td>
									
									 <input type="hidden" name="user_id" value="<?php echo $id?>">
                     <div class="form-group">
                        <label for="exampleSelect1">Full Name</label>
                        <input type="text" name="fullname" class="form-control">
                     </div>
               </td>
               <td>
               <div class="form-group">
               <label for="exampleSelect1">Date of Birth </label>
               <input type="date" name="date_of_birth" class="form-control">
               </div>
               </td>
            </tr>
            <tr>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">Gender </label>
            <select name="gender" id="" class="form-control">
            	<option value="male">Male</option>
            	<option value="female">Female</option>
            </select>
            </div>  
            </td>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">E-mail </label>
           <input type="email" name="email" class="form-control">
            </div>
            
            
            </td>
            </tr>
			<tr>
              <td>
            <div class="form-group">
            <label for="exampleSelect1">Phone</label>
            <input type="number" name="phone" class="form-control">
            </div>  
            </td>
            <td>
            <div class="form-group">
            <label for="exampleSelect1">Address </label>
           <input type="text" name="adres" class="form-control">
            </div>
            <button type="submit"  name="btnsubmitinformtaion" class="btn btn-primary">Submit</button>
            </td>
            </tr>
            </form>
            <?php 
            	if (isset($_POST['btnsubmitinformtaion'])) {
            		$data = array(
            			'user_id' => $_POST['user_id'],
            			'full_name' => $_POST['fullname'],
            			'date_of_birth' => $_POST['date_of_birth'] ,
            			'gender' => $_POST['gender'] ,
            			'email' => $_POST['email'],
            			'phone' => $_POST['phone'] ,
            			'adress' => $_POST['adres'] );
            		if (!empty($_POST['fullname'] && !empty($_POST['email']) )) {
            			if ($db->insert("user_information",$data)) {
            				echo "<p style='color:green'>saved</p>";
            			}else {

            				echo "<p style='color:red'>Problem</p>";
            			}
            		}else {
            			echo "<p style='color:red'>name and email can not be empty</p>";
            		}
            	}
            ?>
            
            </table>
          

					<?php }

				}
				?>
				  </div>
            </div>
            </div>	

			<?php 	include 'files/footer.php';

		?>