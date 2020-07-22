<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/topbar.php") ?>
        <!-- End of Topbar -->

			<div class="container-fluid">

				<?php
					foreach($corona as $data){
						$tanggal[] = $data->tanggal;
						$pp[] = (float) $data->pp;
						$pdp[] = (float) $data->pdp;
						$odp[] = (float) $data->odp;
						$positif[] = (float) $data->positif;
					}
				?>

                <script src="<?php echo base_url().'assets/chartjs/Chart.min.js'?>"></script>
                    <script src="<?php echo base_url().'assets/chartjs/samples/utils.js'?>"></script>

                    <canvas id="line-chart" width="800" height="450"></canvas>  
                    <script>
                        new Chart(document.getElementById("line-chart"), {
                        type: 'line',
                        data: {
                            labels: <?php echo json_encode($tanggal);?>,
                            datasets: [{ 
                                data: <?php echo json_encode($pp);?>,
                                label: "PP",
                                borderColor: "#3e95cd",
                                fill: false
                            }, { 
                                data: <?php echo json_encode($pdp);?>,
                                label: "PDP",
                                borderColor: "#8e5ea2",
                                fill: false
                            }, { 
                                data: <?php echo json_encode($odp);?>,
                                label: "ODP",
                                borderColor: "#3cba9f",
                                fill: false
                            }, { 
                                data: <?php echo json_encode($positif);?>,
                                label: "Positif",
                                borderColor: "#e8c3b9",
                                fill: false
                            }
                            ]
                        },
                        options: {
                            title: {
                            display: true,
                            text: 'Grafik Corona Kabupaten Jepara'
                            }
                        }
                        });
                    </script>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <?php $this->load->view("admin/_partials/js.php") ?>

<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>

	<!-- Logout Delete Confirmation-->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
	        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div>
	      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
	      <div class="modal-footer">
	        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
	      </div>
	    </div>
	  </div>
	</div>

</body>

</html>

</body>

</html>