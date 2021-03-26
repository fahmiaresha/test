$(document).ready(function() {

    const menu = document.getElementById("dashboard-menu");
    menu.classList.add("active");
    
    $('.datatable-table').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });

});