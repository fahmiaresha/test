$(document).ready(function() {

    // Efek menu aktif pada navbar
    const menu = document.getElementById("pembayaran-supplier-menu");
    menu.classList.add("active");

    // datatable
    var table = $('.datatable-component').DataTable({
        "order": [[ 0, "desc" ]]
    });

    $('.switch-bayar').change(function(e) {
        e.stopPropagation();
        let id = $(this).attr('id').slice(17);
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = '/owner/pembayaran-supplier/update';

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: token,
                id : id
            },
            success: function(results){
                if (results.data.STATUS_PEMBAYARAN == 1){
                    let row = $("tr#"+id).remove().clone();
                    // table.ajax.reload();
                    // row.removeColumn();
                    // move tr
                    row.detach();
                    
                    $(".tabel-riwayat tbody").append(row);

                    $('tr#'+id+' .custom-switch').remove();
                    $('tr#'+id+' td#status-'+id).addClass('text-success');
                    $('tr#'+id+' #status-'+id+' span').after('Sudah Bayar');

                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Berhasil!',
                      text: 'Status Pembayaran berhasil disimpan.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                    
                }
                else {
                    $('#label-'+id).html('Belum Bayar');
                    $('#label-'+id).removeClass('text-success');
                    $('#label-'+id).addClass('text-danger');
                    Swal.fire({
                      position: 'center',
                      icon: 'success',
                      title: 'Berhasil!',
                      text: 'Status Pembayaran berhasil disimpan.',
                      showConfirmButton: false,
                      timer: 2000
                    });
                }
            }
        });
    });
    
});