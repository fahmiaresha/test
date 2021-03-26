$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("pegawai-menu");
    menu.classList.add("active");

    // Datatable
    $('.datatable-component').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

});