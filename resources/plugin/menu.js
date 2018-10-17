/*$(".sidebar-elements li.parent").click(function(){
   let i = $(".sidebar-elements li.parent").index(this);
   sessionStorage.setItem('current_menu_index',i);
});
let currentMenuIndex = sessionStorage.getItem('current_menu_index');
$(".sidebar-elements li.parent").eq(currentMenuIndex).addClass('open');*/

$(".sidebar-elements li.parent").removeClass('open');

$(".sidebar-elements li.parent").click(function(){
    let menu_li_id = $(this).prop('id');
    sessionStorage.setItem('current_menu_id',menu_li_id);
});
let current_menu_id = sessionStorage.getItem('current_menu_id');
if(current_menu_id){
    $("#"+current_menu_id).addClass('open');
}


