$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("supplier-menu");
    menu.classList.add("active");

    // Datatable
    const supplierTable = document.getElementById("supplier-table");
    $(supplierTable).DataTable({
        "order": [[ 0, "desc" ]],
      "columnDefs": [
          { "type": "any-number", "targets": 0 }
      ],
    });

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $('.tombol-edit-supplier').click(function() {
        $('.select-kota').empty();
    });

    $('.tombol-tambah-supplier').click(function() {
        $('.select-kota').empty();
    });

    //tombol batal
    $('.batal_insert').click(function(){
        $('#form_input_supplier').trigger('reset');
    });

    $('.batal_edit').click(function(){
        $('#form_edit_supplier').trigger('reset');
    });

    // Input mask
    $('.nama_supplier').inputmask('Regex', {regex: "^[a-zA-Z ]{1,50}"});
    $('.input-telp').mask("0000 0000 00000")

    // Tampilkan data kota sesuai provinsi yang dipilih
    $('.select-provinsi').on('change', function () {
        const id_provinsi = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/admin-gudang/req-data-kota';

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

    $(".tombol-edit-supplier").on("click", function(){
        var id_supplier = $(this).attr('id').slice(14);

        const id_provinsi = $("#edit-provinsi-"+id_supplier).val();
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/admin-gudang/req-data-kota';

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: url,
            data: {id : id_provinsi},
            dataType: 'json',
            success: function(data){
                $('#edit-kota-'+id_supplier).empty();

                $.each(data, function (id, name) {
                    $('#edit-kota-'+id_supplier).append(new Option(name, id));
                });
            }
        });

        $.ajax({
            type: 'GET',
            url: '/admin-gudang/supplier/getKota/'+id_supplier,
            success: function(data){
                console.log('kode_depo ='+id_supplier);
                console.log('data ='+data);
                $('#edit-kota-'+id_supplier+' option[value="'+data+'"]').attr('selected',true);
                $('#edit-kota-'+id_supplier).val(data).trigger('change');
            }
        });
    });

});

// Form Validate
'use strict';
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