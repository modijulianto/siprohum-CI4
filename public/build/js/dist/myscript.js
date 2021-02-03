const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        title: flashData + '!',
        text: 'Data telah ' + flashData,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();   //mematikan fungsi default
    const hapus = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat mengembalikan data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal!'
    }).then((result) => {
        if (result.value) {
            document.location.href = hapus;
            // console.log(hapus);
        }
    })
});