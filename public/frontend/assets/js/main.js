// set input_search for mobile
function search_on_mobile(){
    document.getElementById("header_search-adress").style.display = 'none';
    document.getElementById("header_cart").style.display = 'none';
    document.getElementById("header_cart-history").style.display = 'none';
}
function show_tab_on_mobile(){
    document.getElementById("header_search-adress").style.display = 'block';
    document.getElementById("header_cart").style.display = 'block';
    document.getElementById("header_cart-history").style.display = 'block';
}


// tab_clock

function tab_clock_1(){
    document.getElementById("tab_1_m").style.display = 'block';
    document.getElementById("tab_2_m").style.display = 'none';

    document.getElementById("tab_3_m").style.display = 'none';

    document.getElementById("tab_4_m").style.display = 'none';
    document.getElementById("tab_list_1_m").style.backgroundColor = 'white';
    document.getElementById("tab_list_3_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_2_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_4_m").style.backgroundColor = '#213f50';

}
function tab_clock_2(){
    document.getElementById("tab_2_m").style.display = 'block';
    document.getElementById("tab_1_m").style.display = 'none';

    document.getElementById("tab_3_m").style.display = 'none';

    document.getElementById("tab_4_m").style.display = 'none';

    document.getElementById("tab_list_2_m").style.backgroundColor = 'white';
    document.getElementById("tab_list_3_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_1_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_4_m").style.backgroundColor = '#213f50';


}
function tab_clock_3(){
    document.getElementById("tab_3_m").style.display = 'block';
    document.getElementById("tab_1_m").style.display = 'none';

    document.getElementById("tab_2_m").style.display = 'none';

    document.getElementById("tab_4_m").style.display = 'none';

    document.getElementById("tab_list_3_m").style.backgroundColor = 'white';
    document.getElementById("tab_list_2_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_1_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_4_m").style.backgroundColor = '#213f50';
    
}
function tab_clock_4(){
    document.getElementById("tab_4_m").style.display = 'block';
    document.getElementById("tab_3_m").style.display = 'none';

    document.getElementById("tab_2_m").style.display = 'none';

    document.getElementById("tab_1_m").style.display = 'none';
    document.getElementById("tab_list_4_m").style.backgroundColor = 'white';
    document.getElementById("tab_list_3_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_1_m").style.backgroundColor = '#213f50';
    document.getElementById("tab_list_2_m").style.backgroundColor = '#213f50';
}