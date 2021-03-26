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

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

});