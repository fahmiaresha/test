$(document).ready(function() {

    // Efek menu aktif pada navbar menu
    const menu = document.getElementById("sales-menu");
    menu.classList.add("active");

    // Datatable
    const sales_aTable = document.getElementById("sales-a-table");
    $(sales_aTable).DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });
    const sales_bTable = document.getElementById("sales-b-table");
    $(sales_bTable).DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

});