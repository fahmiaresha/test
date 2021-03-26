$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pengambilan-bahan-baku-menu");
    menu.classList.add("active");  

    // Datatable
    const pengambilanBahanBakuTable = document.getElementById("pengambilan-bahan-baku-table");
    $(pengambilanBahanBakuTable).DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

    // Select2
    // const selectComponent = document.getElementsByClassName("select-component");
    $('.select-component').select2();

    var no = 0;

    // ambil supplier 1
    $(document).on('change','.kode-bahan-baku',function(){
        var no = $(this).attr('id').substr(10);
        var selectid = $(this).attr('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).val();

        $.ajax({
            type: 'POST',
            url: "/operator-mesin/pengambilan-bahan-baku/getSupplier",
            data: {
                _token: token,
                KODE_BAHAN_BAKU : id
            },
            success: function (results) {
                if (results.success === true) {
                    $("#nama-supplier"+no).empty();
                    $('#total_kg'+no).val("");
                    $('#total_sak'+no).val("");
                    results.data.forEach(addOption)
                    function addOption(item, index, arr){
                        let text = item.NAMA_SUPPLIER;
                        let val = item.ID_SUPPLIER;
                        var o = new Option(text, val);
                        $(o).html(text);
                        $("#nama-supplier"+no).append(o);
                    }
                    //update stock ketika supplier keganti
                    $.ajax({
                        type: 'POST',
                        url: "/operator-mesin/pengambilan-bahan-baku/getStock",
                        data: {
                            _token: token,
                            ID_SUPPLIER : $("#nama-supplier"+no).val()
                        },
                        success: function (results) {
                            if (results.success === true) {
                                $('#total_kg'+no).val(results.data[0].STOK_PENERIMAAN);
                                $('#total_sak'+no).val(results.data[0].JUMLAH_KARUNG_SAK);
                                $('#stok'+no).html("Stok saat ini: "+results.data[0].STOK_PENERIMAAN);
                                $("#total_kg"+no).attr({
                                   "max" : results.data[0].STOK_PENERIMAAN,
                                   "min" : 1
                                });
                                $("#total_sak"+no).attr({
                                   "max" : results.data[0].JUMLAH_KARUNG_SAK,
                                   "min" : 0
                                });
                            }
                        }
                    });
                }
            }
        });

        // $('.kode-bahan-baku option').prop('disabled',false);

        // $('.kode-bahan-baku').each(function(){
        //     var thisid = $(this).attr('id');
        //     if(thisid != selectid){
        //         $('#'+thisid+' option[value="'+ id +'"]').prop('disabled', true);
        //     }
        // });
    });

    // ambil stock 1
    $(document).on('change','.id-supplier',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var no = $(this).attr('id').substr(13);
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/operator-mesin/pengambilan-bahan-baku/getStock",
            data: {
                _token: token,
                ID_SUPPLIER : id
            },
            success: function (results) {
                if (results.success === true) {
                    $('#total_kg'+no).val(results.data[0].STOK_PENERIMAAN);
                    $('#total_sak'+no).val(results.data[0].JUMLAH_KARUNG_SAK);
                    $('#stok'+no).html("Stok saat ini: "+results.data[0].STOK_PENERIMAAN);
                    $("#total_kg"+no).attr({
                       "max" : results.data[0].STOK_PENERIMAAN,
                       "min" : 1
                    });
                    $("#total_sak"+no).attr({
                       "max" : results.data[0].JUMLAH_KARUNG_SAK,
                       "min" : 0
                    });
                }
            }
        });
    });

    $('.tambah-bahan-baku-btn').click(function(){
        no++;

    // Elemen bahan baku
    var input_bahan_baku = '<div class="form-group">' +
                                '<label class="col-form-label">Bahan Baku</label>' +
                                '<select class="form-control select-component kode-bahan-baku" id="bahan_baku'+no+'" name="bahan_baku[]" required>' +
                                    '<option selected disabled>Pilih bahan baku . . </option>' +
                                '</select>' +
                                '<div class="invalid-feedback">'+
                                    'Mohon pilih bahan baku.'+
                                '</div>'+
                            '</div>';

    // Elemen supplier
    var input_supplier = '<div class="form-group">' +
                            '<label class="col-form-label">Supplier Bahan Baku</label>' +
                            '<select class="form-control select-component id-supplier" id="nama-supplier'+no+'" name="supplier[]" required>' +
                                '<option selected disabled>Pilih supplier . . </option>' +
                            '</select>' +
                            '<div class="invalid-feedback">'+
                                'Mohon pilih supplier.'+
                            '</div>'+
                        '</div>';

    // Elemen jumlah bahan baku (Kg)
    var input_jumlah_kg = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Kg)</label>' +
                                '<div class="input-group">' +
                                    '<div class="input-group-prepend">' +
                                        '<div class="input-group-text" id="stok'+no+'">' +
                                            'Stok saat ini: -' +
                                        '</div>' +
                                    '</div>' +
                                    '<input type="number" name="jumlah_bahan_baku[]" id="total_kg'+no+'" class="form-control" required>' +
                                    '<div class="invalid-feedback">\
                                        Mohon isi jumlah bahan baku dengan benar.\
                                    </div>'+
                                '</div>' +
                            '</div>';

    // Elemen jumlah bahan baku (Karung)
    var input_jumlah_karung = '<div class="form-group">' +
                                '<label class="col-form-label">Jumlah Bahan Baku (Karung)</label>' +
                                '<input type="number" name="jumlah_karung_sak[]" id="total_sak'+no+'" class="form-control" required>' +
                                '<div class="invalid-feedback">\
                                    Mohon isi jumlah bahan baku dengan benar.\
                                </div>'+
                            '</div>';
   
    // Elemen modal button
    var modal_button = '<div class="modal-footer" id="footer-input">' +
                            '<button type="button" class="btn btn-sm btn-google" data-dismiss="modal">BATAL</button>' +
                            '<input type="submit" class="btn btn-sm btn-linkedin" value="SIMPAN">' +
                        '</div>';
                    
    // Garis pembatas
    var garis_rambut = '<hr>';

    // Hapus modal button saat ini untuk digantikan yang baru
    $('#footer-input').remove();
    
    // Tambah input field bahan baku
    $('.modal-body-pengambilan-bahan-baku form').append(
        garis_rambut,
        input_bahan_baku,
        input_supplier,
        input_jumlah_kg,
        input_jumlah_karung,
        modal_button
    );

    $('.select-component').select2();

    //ambil bahan baku
        $.ajax({
            type: 'GET',
            url: "/operator-mesin/pengambilan-bahan-baku/getBahanBaku",
            success: function (results) {
                if (results.success === true) {
                    results.data.forEach(addOption)
                    function addOption(item, index, arr){
                        let text = item.NAMA_BAHAN_BAKU;
                        let val = item.KODE_BAHAN_BAKU;
                        var o = new Option(text, val);
                        $(o).html(text);
                        $("#bahan_baku"+no).append(o);
                    }
                }
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