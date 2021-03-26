$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("follow-up-customer-menu");
    menu.classList.add("active");

    // Datatable
    const datatableComponent = document.getElementsByClassName("datatable-component");
    $(datatableComponent).DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $(".btn-order").each(function(){
    	$(this).on("click",function(){
			let id = $(this).attr("id");
			let kodedepo = $("#kodedepo-"+id).html();
    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	    	$.ajax({
	            type: 'POST',
	            url: "/sales-b/follow-up/order",
	            data:{
					_token: CSRF_TOKEN,
					ID_KONFIRMASI_PENJUALAN: id
	            },
	            success: function (results) {
	                if (results.success === true) {
						swal("Berhasil!", 
							"Status Konfirmasi berhasil disimpan!", 
							"success");
						setTimeout(() => {  location.reload(); }, 2000);
	                } else {
						swal("Gagal!", 
							"Status konfirmasi gagal disimpan!", 
							"error");
	                }

	            }
	        });
    	});
    });

    $(".btn-submit-alasan").each(function(){
    	$(this).on("click",function(e){
    		e.preventDefault();
    		let id = $(this).attr("id");
    		$('#modal-follow-up-'+id).modal('toggle');
    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    		var alasan = $('#formalasan-'+id+' input[name="alasan"]:checked').val();
	    	$.ajax({
	            type: 'POST',
	            url: "/sales-b/follow-up/tidak-order",
	            data:{
					_token: CSRF_TOKEN,
					ID_KONFIRMASI_PENJUALAN: id,
					alasan: alasan
	            },
	            success: function (results) {
	                if (results.success === true) {
						swal("Berhasil!", 
							"Konfirmasi berhasil disimpan!", 
							"success");
							setTimeout(() => {  location.reload(); }, 2000);
	                } else {
						swal("Gagal!", 
							"Konfirmasi gagal disimpan!", 
							"error");
	                }

	            }
	        });
    	});
    });
    

});