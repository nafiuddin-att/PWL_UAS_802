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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $product->id_produk?>" />

							<div class="form-group">
								<label for="name">Nama Produk*</label>
								<input class="form-control <?php echo form_error('nama_produk') ? 'is-invalid':'' ?>"
								 type="text" name="nama_produk" placeholder="Nama Produk" value="<?php echo $product->nama_produk ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_produk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga_produk">Harga</label>
								<input class="form-control <?php echo form_error('harga_produk') ? 'is-invalid':'' ?>"
								 type="number" name="harga_produk" min="0" placeholder="Harga" value="<?php echo $product->harga_produk ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_produk') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Gambar</label>
								<input class="form-control-file <?php echo form_error('gambar_produk') ? 'is-invalid':'' ?>"
								 type="file" name="gambar_produk" />
								<input type="hidden" name="old_image" value="<?php echo $product->gambar_produk ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar_produk') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

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