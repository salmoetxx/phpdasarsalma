$ (document).ready(function(){
    //hilangkan tombol cari
    $('#tombol-cari').hide();
    //event ketika keyword di tulis
    $('#keyword').on('keyup', function(){
        //munculkan icon loading
        $('.loader').show();

        //ajax menggunakan load
       // $('#container').load('ajax/pasien.php?keyword=' + $('#keyword').val());
       $.get('ajax/pasien.php?keyword=' + $('#keyword').val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();

       });
    });

});