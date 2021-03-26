$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("customer-menu");
    menu.classList.add("active");

    // Datatable
    const customerTable = document.getElementById("customer-table");
    $(customerTable).DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

    // Input mask
    $('[data-input-mask="phone"]').mask('0000 0000 00000');

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $('.tombol-edit-customer').click(function() {
        $('.select-kota').empty();
    });

    $('.tombol-tambah-customer').click(function() {
        $('.select-kota').empty();
    });

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/manajer-marketing/req-data-kota';

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

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.edit-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/manajer-marketing/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_provinsi},
            dataType: 'json',
            success: function(data){
                $('.edit-kota').empty();

                $.each(data, function (id, name) {
                    $('.edit-kota').append(new Option(name, id));
                });
            }
        });
    });

    $(".tombol-edit-customer").on("click", function(){
        var kode_depo = $(this).attr('id').slice(14);

        const id_provinsi = $("#edit-provinsi-"+kode_depo).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/manajer-marketing/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_provinsi},
            dataType: 'json',
            success: function(data){
                $('#edit-kota-'+kode_depo).empty();

                $.each(data, function (id, name) {
                    $('#edit-kota-'+kode_depo).append(new Option(name, id));
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: '/manajer-marketing/getKota/'+kode_depo,
            success: function(data){
                console.log('kode_depo ='+kode_depo);
                console.log('data ='+data);
                $('#edit-kota-'+kode_depo+' option[value="'+data+'"]').attr('selected',true);
                $('#edit-kota-'+kode_depo).val(data).trigger('change');
            }
        });
    });

});

// Form validation
(function() {
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
})();

