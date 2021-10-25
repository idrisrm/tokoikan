<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
	<div class="table-responsive">
		<table class="table">
			<thead class="thead-dark text-center">
				<tr>
					<th>No</th>
					<th width="10%">Tanggal</th>
					<th>Nama</th>
					<th>Judul</th>
					<th>Alamat</th>
					<th>Kategori</th>
					<th>Jenis Pengaduan</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
            	$no = 1;
            	foreach ($load as $d) {
        		?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $d['tgl_pengaduan'] ?></td>
					<td><?= $d['nm_pelapor'] ?></td>
					<td><?= $d['judul'] ?></td>
					<td><?= $d['alamat'] ?></td>
					<td><?= $d['nm_kategori'] ?></td>
					<td><?= $d['st_pengaduan'] ?></td>
					<td>Tolak</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
	</script>
</body>

</html>