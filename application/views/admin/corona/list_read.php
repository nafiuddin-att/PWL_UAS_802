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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/corona/add') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Kecamatan</th>
										<th>PP</th>
										<th>ODP</th>
										<th>PDP</th>
										<th>Positif</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($corona as $data): ?>
										<tr>
											<td width="150">
												<?php echo $data->kecamatan ?>
											</td>
											<td>
												<?php echo $data->pp ?>
											</td>
											<td>
												<?php echo $data->odp ?>
											</td>
											<td>
												<?php echo $data->pdp ?>
											</td>
											<td>
												<?php echo $data->positif ?>
											</td>				
										</tr>
										<?php endforeach; ?>
								</tbody>
							</table>
							<form method="post" action="<?php echo site_url('admin/corona/ekspor') ?>">
								<input type="submit" name="export" class="btn btn-success" value="Export" />
							</form>
						</div>
					</div>
				</div>

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