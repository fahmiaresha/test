$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("order-barang-menu");
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

    //ambil semua produk
    $.ajax({
        type: 'GET',
        url: "/sales-b/order-barang/products/",
        success: function (results) {
            if (results.success === true) {
                $("#product").empty();
                results.data.forEach(addOption)
                function addOption(item, index, arr){
                    let text = item.NAMA_PRODUCT;
                    let val = item.KODE_PRODUCT;
                    var o = new Option(text, val);
                    $(o).html(text);
                    $("#product").append(o);
                }
            }
        }
    });

    //ambil produk ketika kategori dipilih
    $('#categories').change(function(){
        $("#product").empty();
        if($(this).val() == "semua"){
            $.ajax({
                type: 'GET',
                url: "/sales-b/order-barang/products/",
                success: function (results) {
                    if (results.success === true) {
                        $("#product").empty();
                        results.data.forEach(addOption)
                        function addOption(item, index, arr){
                            let text = item.NAMA_PRODUCT;
                            let val = item.KODE_PRODUCT;
                            var o = new Option(text, val);
                            $(o).html(text);
                            $("#product").append(o);
                        }
                    }
                }
            });
        }
        else{
            var jenis = $(this).val();
            $.ajax({
                type: 'GET',
                url: "/sales-b/order-barang/products/"+jenis,
                success: function (results) {
                    if (results.success === true) {
                        $("#product").empty();
                        results.data.forEach(addOption)
                        function addOption(item, index, arr){
                            let text = item.NAMA_PRODUCT;
                            let val = item.KODE_PRODUCT;
                            var o = new Option(text, val);
                            $(o).html(text);
                            $("#product").append(o);
                        }
                    }
                }
            });
        }
    });

    keranjangKosong();
    $('#add-btn').on('click',function(){
        keranjangBerisi();
        let id = $("#product").val();

        if($("#keranjang tbody tr#"+id).length){
            let qty = Number($("#qty-"+id).val());
            $("#qty-"+id).val(Number(qty+1000));
            hitungTotalHargaProduk(id);
        }
        else{

            let product = products[id-1];

            let row = '<tr id="'+product["KODE_PRODUCT"]+'">\
                <td>\
                    <input type="hidden" name="KODE_PRODUCT[]" value="'+product["KODE_PRODUCT"]+'">'+product["KODE_PRODUCT"]+'\
                </td>\
                <td>\
                    '+product["NAMA_PRODUCT"]+'\
                </td>\
                <td>\
                    <input type="hidden" name="HARGA_BARANG[]" id="price-'+product["KODE_PRODUCT"]+'" value="'+product["HARGA_PRODUCT"]+'">'+product["HARGA_PRODUCT"]+'\
                </td>\
                <td>\
                    <input type="number" name="JUMLAH_PCS[]" id="qty-'+product["KODE_PRODUCT"]+'" value="1000" min="1000" class="input-num-sm quantity" step="1000">\
                </td>\
                <td>\
                    <input type="number" name="JUMLAH_SAK[]" id="sak-'+product["KODE_PRODUCT"]+'" value="1" min="1" class="input-num-sm sak">\
                </td>\
                <td>\
                    <input type="hidden" name="discount[]" id="disc-'+product["KODE_PRODUCT"]+'"> \
                    <input type="number" id="discpersen-'+product["KODE_PRODUCT"]+'" value="0" min="0" max="100" class="input-num-sm discpersen">\
                </td>\
                <td>\
                    <span id="totalharga-'+product["KODE_PRODUCT"]+'"></span>\
                    <input type="hidden" name="total[]" id="total-'+product["KODE_PRODUCT"]+'" value="1" min="1" class="input-num-sm totalharga">\
                </td>\
                <td>\
                    <button type="button" class="btn btn-sm btn-youtube del-btn" id="del-'+product["KODE_PRODUCT"]+'">\
                        <i class="fas fa-trash-alt"></i>\
                    </button>\
                </td>\
            </tr>';
            id = product["KODE_PRODUCT"];
            $("#keranjang tbody").append(row);
            hitungTotalHargaProduk(id);
            hitungSemuaTotal();
        }
    });

    $(document).on("click",".del-btn",function(){
        let id = $(this).attr('id').slice(4);
        $('#'+id).remove();
        hitungSemuaTotal();
        if(!$("#keranjang tbody tr").length){
            keranjangKosong();
        }
    });

    $("#input-ongkos-kirim").on("input",function(){
        $("#ongkos-kirim").val(new Intl.NumberFormat(['id']).format($(this).val()));
        hitungSemuaTotal();
    });

    $(document).on("input",".quantity",function(){
        let id = $(this).attr('id').slice(4);
        let val = Number($(this).val());
        var sak;
        if(val < 1000){
          sak = 1;
        }
        else{
          sak = parseInt(val/1000);
        }
        $(".sak#sak-"+id).val(sak);
        hitungTotalHargaProduk(id);
    });

    $(document).on("input",".sak",function(){
        let id = $(this).attr('id').slice(4);
        if($(this).val() < 1){
           $(this).val(1); 
        }
        else{
           hitungTotalHargaProduk(id); 
        }
    });

    $(document).on("input",".discpersen",function(){
        let id = $(this).attr('id').slice(11);
        let percent = Number($(this).val());
        let harga = Number($("#price-"+id).val());
        let qty = Number($("#qty-"+id).val());
        $("#disc-"+id).val(parseFloat(percent/100*harga*qty));
        if($(this).val() < 0){
           $(this).val(0); 
        }
        else if($(this).val() > 100){
           $(this).val(0); 
        }
        hitungTotalHargaProduk(id);
    });

    function hitungTotalHargaProduk(id){
        let quantity = Number($("#qty-"+id).val());
        let disc = Number($("#disc-"+id).val());
        let harga = Number($("#price-"+id).val());
        let total = Number((harga*quantity)-disc);
        $("#total-"+id).val(total);
        $("#totalharga-"+id).html(new Intl.NumberFormat(['id']).format(total));
        hitungSemuaTotal();
    }

    function hitungSemuaTotal(){
        $("#total-item").val(new Intl.NumberFormat(['id']).format(hitungTotalItem()));
        $("#total-sak").val(new Intl.NumberFormat(['id']).format(hitungTotalSak()));
        $("#total-harga").val(new Intl.NumberFormat(['id']).format(hitungTotalHarga()));
        $("#total-bayar").val(new Intl.NumberFormat(['id']).format(hitungTotalBayar()));
        $("#total-bayar-num").val(hitungTotalBayar());
    }

    function hitungTotalItem(){
        let totalitem = 0;
        $(".quantity").each(function(){
            totalitem =  totalitem+Number($(this).val());
        });
        return totalitem;
    }

    function hitungTotalSak(){
        let totalsak = 0;
        $(".sak").each(function(){
            totalsak =  totalsak+Number($(this).val());
        });
        return totalsak;
    }

    function hitungTotalHarga(){
        let totalharga = 0;
        $(".totalharga").each(function(){
            totalharga =  totalharga+Number($(this).val());
        });
        return totalharga;
    }

    function hitungTotalBayar(){
        let totalharga = Number(hitungTotalHarga());
        let ongkir = Number($("#input-ongkos-kirim").val());
        let totalbayar = Number(totalharga+ongkir);
        return totalbayar;
    }

    function keranjangKosong(){
        $("#warning-produk").show();
        $(".btn-linkedin").attr('disabled',true);
    }

    function keranjangBerisi(){
        $("#warning-produk").hide();
        $(".btn-linkedin").attr('disabled',false);
    }
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