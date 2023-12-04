function show_detail_product_cart(){
    document.getElementById("hidden_detail_product_cart").style.display="block";
    document.getElementById("product_header_detail_list").style.display="block";

    document.getElementById("show_detail_product_cart").style.display="none";
    
}

function hidden_detail_product_cart(){
    document.getElementById("hidden_detail_product_cart").style.display="none";
    document.getElementById("product_header_detail_list").style.display="none";

    document.getElementById("show_detail_product_cart").style.display="block";
    
}

function choosegetgoods_tab_1(){
    var tab =document.getElementById("delivery_address_detail");
    tab.style.display = "block";   


    document.getElementById("delivery_product_body_notes").style.display="block";

    document.getElementById("delivery_address_detail_tab_2").style.display = "none";

    document.getElementById("choose-tab-2_cb").checked = false;

}

function choosegetgoods_tab_2(){
    var tab =document.getElementById("delivery_address_detail");
    tab.style.display = "none";   
    var notes = document.getElementById("delivery_address_notes");
    notes.style.display = "none";    
    document.getElementById("delivery_address_detail_tab_2").style.display = "block";

    document.getElementById("delivery_product_body_notes").style.display="none";

    document.getElementById("choose-tab-2_cb").checked = true;
}
