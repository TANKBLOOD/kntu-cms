var categoryParentId= '';
var clickedCategory;
function getParentId(item){
    clickedCategory= item;
    categoryParentId= clickedCategory.parentNode.parentNode.getAttribute('data-pcat-id');
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
            let newItem= document.createElement('div');
            newItem.setAttribute('data-cat-id', response['catId']);
            newItem.setAttribute('class', 'flex items-center');
            newItem.innerHTML= '<li class="mt-2 cursor-pointer"  onclick="loadCvs(this)">'+name+'</li> \
            <button onclick="deleteCategory(this)" class="mt-3 mr-2"> \
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
            </button>';
            newItem.innerHTML+= '<button onclick="editCatAjax(this)" class=" mt-3 mr-1"> \
                <svg class="w-5 h-5 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
            </button>';
            clickedCategory.parentNode.insertBefore(newItem, clickedCategory);
        }
        },
    });
});

var toDeleteCat;
function deleteCategory(item) {
    toDeleteCat= item;
    $('#catDeleteConfirmModal').modal();
}
$('#delCatBtn').click(function(event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/deleteCatAjax",
        type:"DELETE",
        data:{
            catId: toDeleteCat.parentNode.getAttribute('data-cat-id')
        },
        success:function(response){
        if(response) {
            toDeleteCat.parentNode.remove();
            $.modal.close();
        }
        },
    });
});

var toEditCat;
function editCatAjax(item) {
    toEditCat= item;

    let newNameHolder=$("input[name=catNewName]");
    if(item.parentNode.childNodes[1].innerText != undefined){ //this is bug that changes the index of the required tag in ui.some times its 1 and some times its 0;
        newNameHolder.val(item.parentNode.childNodes[1].innerText);
    }else{
        newNameHolder.val(item.parentNode.childNodes[0].innerText);
    }

    $('#editCatModal').modal();

}
$('#editCatBtn').click(function(event) {
    let newNameHolder=$("input[name=catNewName]");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/updateCatAjax",
        type:"POST",
        data:{
            catId: toEditCat.parentNode.getAttribute('data-cat-id'),
            newName: newNameHolder.val()
        },
        success:function(response){
        if(response) {
            if(toEditCat.parentNode.childNodes[1].innerText != undefined){
                toEditCat.parentNode.childNodes[1].innerText= newNameHolder.val();
            }else{
                toEditCat.parentNode.childNodes[0].innerText= newNameHolder.val();
            }
            $.modal.close();
        }
        },
    });
});
