var all = false;
function AllTags(){
    $('#all').text(all ? "All" : "Clear")
    all = ! all;
    $('input[type="checkbox"]').prop("checked", all)    
}