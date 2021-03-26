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

});
