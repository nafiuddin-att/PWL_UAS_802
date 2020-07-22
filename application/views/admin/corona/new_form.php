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
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/corona/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/corona/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Kecamatan*</label>
								<input class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>"
								 type="text" name="kecamatan" placeholder="Kecamatan" />
								<div class="invalid-feedback">
									<?php echo form_error('kecamatan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Tanggal*</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="number" name="tanggal" min="0" placeholder="Tanggal" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">PP*</label>
								<input class="form-control <?php echo form_error('pp') ? 'is-invalid':'' ?>"
								 type="number" name="pp" min="0" placeholder="PP" />
								<div class="invalid-feedback">
									<?php echo form_error('pp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">odp*</label>
								<input class="form-control <?php echo form_error('odp') ? 'is-invalid':'' ?>"
								 type="number" name="odp" min="0" placeholder="odp" />
								<div class="invalid-feedback">
									<?php echo form_error('odp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">pdp*</label>
								<input class="form-control <?php echo form_error('pdp') ? 'is-invalid':'' ?>"
								 type="number" name="pdp" min="0" placeholder="pdp" />
								<div class="invalid-feedback">
									<?php echo form_error('pdp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">positif*</label>
								<input class="form-control <?php echo form_error('positif') ? 'is-invalid':'' ?>"
								 type="number" name="positif" min="0" placeholder="positif" />
								<div class="invalid-feedback">
									<?php echo form_error('positif') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
							<br>
						</form>
						<form action="<?php echo site_url('admin/corona/unggah') ?>" method="post" enctype="multipart/form-data">
						<input type="file" name="file"><br>
						<button type="submit" class="btn btn-success">Unggah</button>					
						</div>

					<div class="card-footer small text-muted">
						* harus diisi
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

</body>

</html>