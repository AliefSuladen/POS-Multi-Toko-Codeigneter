<div class="container">
	<div class="card">
		<div class="card-header">
			<br>
			<a style="margin-left: 10px;" href="<?= base_url('Toko/add') ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add</a>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				echo $this->session->flashdata('pesan');
				echo '</div>';
			} ?>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Toko</th>
						<th>Username</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $no = 1;
						foreach ($user as $key => $value) { ?>
							<td><?= $no++ ?></td>
							<td><?= $value->nama_operator ?></td>
							<td><?= $value->username ?></td>
							<td class="">
								<a href="<?= base_url('Toko/delete/' . $value->id_operator) ?>" onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger">
									<i class="fa fa-trash"> </i></a>
							</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
</div>
<!-- /.card -->
<!-- /.content-header -->