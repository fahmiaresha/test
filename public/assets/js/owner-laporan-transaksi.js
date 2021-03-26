// Efek menu aktif pada navbar
$('#laporan-menu').addClass('active');

// Datatable
$('.datatable-component').DataTable({
    "order": [[ 0, "desc" ]],
    "columnDefs": [
        { "type": "any-number", "targets": 0 }
    ],
});