$(document).ready(function() {

    // Efek menu aktif
    const menu = document.getElementById("pegawai-menu");
    menu.classList.add("active");

    // Mencegah submit form via tombol enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    // Slick (pilih avatar)
    $('.select-avatar-show').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.select-avatar-nav'
    });
    
    $('.select-avatar-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.select-avatar-show',
        centerMode: true,
        focusOnSelect: true
    });
    
    // Cek kesesuaian password & konfirmasi password
    $('.input_password, .input_konfirmasi_password').on('keyup', function () {
        if ($('.input_password').val() == $('.input_konfirmasi_password').val()) {
            $('#pesan_konfirmasi_password').html('Password sesuai').css('color', 'green');
        } else {
            $('#pesan_konfirmasi_password').html('Password tidak sesuai').css('color', 'red');
        }
    });

    // Tampil/sembunyikan password
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('.input_password');
    const konfirmasiPasswordField = document.querySelector('.input_konfirmasi_password');

    togglePassword.addEventListener('click', function (e) {
        const typepass = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        const typepassconf = konfirmasiPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', typepass);
        konfirmasiPasswordField.setAttribute('type', typepassconf);
    });

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/owner/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_provinsi},
            dataType: 'json',
            success: function(data){
                $('.select-kota').empty();

                $.each(data, function (id, name) {
                    $('.select-kota').append(new Option(name, id));
                });
            }
        });
    });

});