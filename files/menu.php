

 <?php  if(!isset($_SESSION)){
                    session_start(); // starting session for checking username
                }
                if($_SESSION['username'] == "")
                {
                    header("location:index.php"); // Redirect to login.php page
                }

               require_once 'php/dboperation.php';
			   require_once 'php/functions.php';
			   $db = new Db();

?>


<nav class="navbar navbar-toggleable-md navbar-light bg-faded" style="margin-top: 15px">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">AMS <small> (Attandance Management System)</small></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
   <li class="nav-item active">
		        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <?php if($_SESSION['role']=="0") { ?>
		      <li class="nav-item">
		      	<a class="nav-link" href="assigncourse.php">Assign
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="assignstudent.php">Assign student
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="course.php">Course
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="schedule.php">Schedule
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="section.php">Section
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="user.php">Users
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="student_ad_report.php">Student's report
		      	</a>
		      </li>
		      <?php }?>
			   <?php if($_SESSION['role']=="1") { ?>
		      <li class="nav-item">
		      	<a class="nav-link" href="attandence.php">Attendance
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="att_report.php">Attendance report
		      	</a>
		      </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="ind_report.php">update report
		      	</a>
		      </li>
		      <?php }?>
		  
		      
		    
		      <li class="nav-item"><a class="nav-link" href="profile.php?p_id=<?php echo $_SESSION['u_id']; ?>">	
		      	<?php 
		echo $_SESSION['username'];
		echo "(".role($_SESSION['role']).")";
		?></a></li>

		 <li class="nav-item"><a  class="nav-link" href="logout.php">Logout</a></li>
    </ul>
   
  </div>
</nav>