// ============      PROFIL   ==============

const flashDataI = $('.flash-profil').data('flashdata');

if (flashDataI) {
	Swal.fire({
		title: 'Profil',
		text: 'Berhasil ' + flashDataI,
		type: 'success'
	});
}

// ============      PASSWORD  ==============

const flashDataJ = $('.flash-password').data('flashdata');

if (flashDataJ) {
	Swal.fire({
		title: 'Password',
		text: 'Berhasil ' + flashDataJ,
		type: 'success'
	});
}

// ============      MEMBER    ==============

const flashDataA = $('.flash-member').data('flashdata');

if (flashDataA) {
	Swal.fire({
		title: 'Member ',
		text: 'Berhasil ' + flashDataA,
		type: 'success'
	});
}

// hapus-member
$('.hapus-member').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Artikel akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});


// ============      INFORMASI PUBLIK    ==============

const flashDataB = $('.flash-informasi').data('flashdata');

if (flashDataB) {
	Swal.fire({
		title: 'Informasi ',
		text: 'Berhasil ' + flashDataB,
		type: 'success'
	});
}

// hapus-informasi
$('.hapus-informasi').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Informasi akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});


// ============      KATEGORI    ==============

const flashDataD = $('.flash-kategori').data('flashdata');

if (flashDataD) {
	Swal.fire({
		title: 'Kategori ',
		text: 'Berhasil ' + flashDataD,
		type: 'success'
	});
}

// hapus-kategori
$('.hapus-kategori').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Kategori akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

// ============      SKPD    ==============

const flashDataE = $('.flash-skpd').data('flashdata');

if (flashDataE) {
	Swal.fire({
		title: 'SKPD ',
		text: 'Berhasil ' + flashDataE,
		type: 'success'
	});
}

// hapus-skpd
$('.hapus-skpd').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "SKPD akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

// ============      BERITA    ==============

const flashDataF = $('.flash-berita').data('flashdata');

if (flashDataF) {
	Swal.fire({
		title: 'Berita ',
		text: 'Berhasil ' + flashDataF,
		type: 'success'
	});
}

// hapus-berita
$('.hapus-berita').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Berita akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

// ============      KOTAK SARAN   ==============

const flashDataG = $('.flash-pesan').data('flashdata');

if (flashDataG) {
	Swal.fire({
		title: 'Kotak Saran ',
		text: 'Berhasil ' + flashDataG,
		type: 'success'
	});
}

// hapus-pesan
$('.hapus-pesan').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Pesan akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

// ============      PERMOHONAN   ==============

const flashDataH = $('.flash-permohonan').data('flashdata');

if (flashDataH) {
	Swal.fire({
		title: 'Permohonan ',
		text: 'Berhasil ' + flashDataH,
		type: 'success'
	});
}

// hapus-permohonan
$('.hapus-permohonan').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Permohonan akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

const flashDataK = $('.flash-transaksi').data('flashdata');

if (flashDataK) {
	Swal.fire({
		title: 'Transaksi',
		text: flashDataK,
		type: 'success'
	});
}

const flashDataL = $('.flash-gagal').data('flashdata');

if (flashDataL) {
	Swal.fire({
		title: 'Transaksi',
		text: flashDataL,
		type: 'error'
	});
}

const flashDataM = $('.flash-error').data('flashdata');

if (flashDataM) {
	Swal.fire({
		title: 'Error',
		text: flashDataM,
		type: 'error'
	});
}

