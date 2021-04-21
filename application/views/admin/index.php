		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content">

				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title ml-3">Administrator</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="col-md-4">
							<!-- Widget: user widget style 1 -->
							<div class="card card-widget widget-user">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-primary">
									<h3 class="widget-user-username mt-3 text-capitalize"><?= $user['name']; ?></h3>
								</div>
								<div class="widget-user-image">
									<img class="img-rounded" src="assets/foto/<?= $user['foto']; ?>">
								</div>
								<div class="card-footer text-capitalize">
									<div class="row">
										<div class="col-sm-6">
											<div class="description-block">
												<h5 class="description-header">jabatan</h5>
												<p><?= $user['role_id']; ?></p>
											</div>
											<!-- /.description-block -->
										</div>
										<!-- /.col -->
										<!-- /.col -->
										<div class="col-sm-6">
											<div class="description-block">
												<h5 class="description-header">email</h5>
												<p><?= $user['email']; ?></p>
											</div>
											<!-- /.description-block -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
								</div>
							</div>
							<!-- /.widget-user -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->