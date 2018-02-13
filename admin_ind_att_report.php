<?php 
				include 'files/header.php';
		        include 'files/menu.php';
 
					if (isset($_GET['id'])) {

						 
						
						$id =  $_GET['id'];
						$sdate =  $_GET['sdate'];
						$edate =  $_GET['edate'];
										$i=0;
										
										echo '<div class="container style=margin-top:10px">
											<div class="row">
												<div class="col">';?>
												<button id="mypdf" class="btn btn-primary pull-right">Print</button>
												<div id="pdfarea">
												<div class="card-block">
			                <h4 class="card-title">Attandance Information</h4>
			                <p class="card-text"><b>Student Name :</b><?php echo name($_GET['id']); ?></p> 
			                <p class="card-text"><b>Course :</b><?php echo course($_GET['course']); ?></p> 
			                
			                <p><b>class start </b><?php echo $_GET['sdate'];?> ---- <b>To </b> <?php echo $_GET['edate'];?></p>
			                
			              </div>	
							<?php 	$qry = $db->joinQuery("SELECT `attnd_date`,`st_attnd` FROM `attandence` WHERE `st_id` ='$id' AND `attnd_date` BETWEEN '".$_GET['sdate']."' AND '".$_GET['edate']."'");
								
									
										echo "<table class='table table-striped table-bordered'>
											<tr>
												<th>sl</th>
												<th>dates</th>
												<th>statuse</th>
											</tr>";
										

										while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
											
										 $i++;
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['attnd_date']; ?></td>
												<td><?php if ($row['st_attnd']=='1') {
													echo "<p style='color:green'>Present</p>";
												}else{
													echo "<p style='color:red'>Absent</p>";
												}

												  ?>
												  	</td>
												
											</tr>
										<?php }
									echo '</table>
								</div>
								</div>
							</div>
						</div>';
							
					}
					include 'files/footer.php';
					 ?>
				

  <script type="text/javascript">
 /* function PDF1(){
    var doc = new jsPDF();
    var elementHandler = {
      '#ignorePDF': function (element, renderer) {
        return true;
      }
    };

    var source = window.document.getElementById('pdfarea')[0];
    doc.fromHTML(
      source,
      15,
      15,
      {
        'width': 180,'elementHandlers': elementHandler
      });

      doc.output("datauri.pdf");
    }*/
    function printPDF() {
    var printDoc = new jsPDF();
    printDoc.fromHTML($('#pdfarea').get(0), 20, 20, {'width': 200});
    printDoc.autoPrint();
    printDoc.output("dataurlnewwindow"); // this opens a new popup,  after this the PDF opens the print window view but there are browser inconsistencies with how this is handled
}
    $("#mypdf").click(function(){
    	printPDF();
    })

</script>
