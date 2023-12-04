

function content_active_close()
{
    document.getElementById("content-active").style.display = "none";
    document.getElementById("screen_overlay").style.display = "none";

}
function show_review_article(){
    document.getElementById("content-active").style.display = "block";
    document.getElementById("screen_overlay").style.display = "block";
    document.getElementById("show_content_active_reviewarticle").classList.add("content_active_item_taget");
    document.getElementById("show_content_active_config").classList.remove("content_active_item_taget");
    document.getElementById("content-active_body_content_reviewarticle").style.display = "block";
    document.getElementById("content-active_body_content_active_config").style.display = "none";
}
function show_content_active_reviewarticle(){
    show_review_article();
}
function show_content_active(){
    show_review_article();
}

function show_config(){
    document.getElementById("content-active").style.display = "block";
    document.getElementById("screen_overlay").style.display = "block";
    document.getElementById("show_content_active_reviewarticle").classList.remove("content_active_item_taget");
    document.getElementById("show_content_active_config").classList.add("content_active_item_taget");
    document.getElementById("content-active_body_content_active_config").style.display = "block";
    document.getElementById("content-active_body_content_reviewarticle").style.display = "none";
}
function show_content_active_config(){
    show_config();
}
function pddt_show_all_config(){
    show_config()
}

