<?php 

		include 'files/header.php';
		include 'files/menu.php';
		

			if (isset($_GET['msg'])) {?>
			<script type="text/javascript">alert("<?php echo $_GET['msg'];?>")</script>
			<?php }
		?>

		<h1>Wel come  <?php echo $_SESSION['username'];?>  </h1>

		<?php include 'files/footer.php';
?>


