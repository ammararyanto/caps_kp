const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);

if (flashData) {
	Swal.fire({
		title: 'Berhasil ' + flashData,
		text: 'klik ok',
		type: 'success'
	});
}

//teknisi disable button
$('.disableButtonTeknisi').on('click', function (e) {
	e.preventDefault();

	Swal.fire({
		title: 'Access Denied ',
		type: 'error'
	})
})

//hapus

$('.delete-btn').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Anda yakin akan menghapus ini',
		text: "data akan hilang dan tidak bisa dikembalikan",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {

			document.location.href = href;

		}
	})
})


$('.selesaibtn').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin device sudah selesai',
		text: "status akan diubah menjadi sudah selesai",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

$('.kerjakanbtn').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin device akan Dikerjakan',
		text: "status akan diubah menjadi sedang dikerjakan",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

$('.batalbtn').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin device dibatalkan',
		text: "status akan diubah menjadi Cancel",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {

			document.location.href = href;

		}
	})
})

$('.konfirmasi').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin sudah dikonfirmasi',
		text: "status akan diubah menjadi sudah dikonfirmasi",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yakin'
	}).then((result) => {
		if (result.value) {

			document.location.href = href;

		}
	})
})
