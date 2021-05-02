var categoryParentId= '';
var clicked;
function getParentId(item){
    clicked= item;
    categoryParentId= clicked.parentNode.parentNode.getAttribute('data-pcat-id');
}

$("#addCatBtn").click(function(event){
    event.preventDefault();

    var name = $("input[name=category]").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/catAjax",
        type:"POST",
        data:{
        name:name,
        parentId: categoryParentId,
        },
        success:function(response){
        if(response) {
            let newItem= document.createElement('li');
            newItem.setAttribute('class', 'mt-2 cursor-pointer');
            newItem.setAttribute('onclick', 'loadCvs(this)');
            newItem.setAttribute('data-cat-id', response['catId']);
            newItem.innerHTML= name;

            clicked.parentNode.insertBefore(newItem, clicked);
        }
        },
    });
});
