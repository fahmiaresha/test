$(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("evaluasi-kinerja-sales-menu");
    menu.classList.add("active");

    $('.datatable-table').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

});