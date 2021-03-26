$(document).ready(function() {

    // Mencegah submit form via tombol enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
    });

    // Input mask
    $('[data-input-mask="phone"]').mask('0000 0000 00000');

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    // Slick (pilih avatar)
    var slick = $('.select-avatar-show').slick({
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

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/req-data-kota';

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

    //mengambil angka terakhir di nama file avatar
    $(document).on("click",".slick-slide",function(){
        let src = Number($(".slick-current").attr('data-slick-index'));
        if(src > 0){
            if(src == 11){
                src = 1;
            }
            else if(src >= 12){
                src = src-9;
            }
            else{
                src = src+2;
            }
        }
        else{
            src = 1;
        }
        $("#foto-profile").val(src);
    }); 

});
//validation
'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);