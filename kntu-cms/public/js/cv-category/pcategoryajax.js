$("#addPcatBtn").click(function(event){
    event.preventDefault();

    var name = $("input[name=pCategory]").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/pCatAjax",
        type:"POST",
        data:{
        name:name,
        },
        success:function(response){
        if(response) {
                var box= '<div class="bg-blue-100 mt-3" data-pcat-id="'+response['pCatId'] +'"> \
                    <div class="flex justify-center items-center bg-blue-200"> \
                        <h3 class="font-bold text-lg">'+name+'</h3> \
                        <button onclick="deletePcategory(this)" class="mr-2"> \
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
                        </button> \
                        <button onclick="editPcategory(this)" class="mr-2"> \
                            <svg class="w-5 h-5 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
                        </button> \
                    </div>';

                box+='<ul class="mr-4 mt-3 pb-2 font-semibold text-base"> \
                    <a href="#catModal" rel="modal:open" onclick="getParentId(this)"> \
                        <button type="button" class="flex justify-end px-3 -mr-1 mt-1 rounded border-2 bg-gray-100"> \
                            <span class="-mt-1">category</span> \
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> \
                        </button> \
                    </a> \
                </ul> \
            </div>';

            $("#pCatAdder").before(box);
        }
        },
    });
});

var toDeletePcat;
function deletePcategory(item) {
    toDeletePcat= item;
    $('#pCatDeleteConfirmModal').modal();
}
$('#delPcatBtn').click(function(event) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/deletePcatAjax",
        type:"DELETE",
        data:{
            pCatId: toDeletePcat.parentNode.parentNode.getAttribute('data-pcat-id')
        },
        success:function(response){
        if(response) {
            toDeletePcat.parentNode.parentNode.remove();
            $.modal.close();
        }
        },
    });
});

var toEditPcat;
function editPcategory(item) {
    toEditPcat= item;
    let newNameHolder=$("input[name=pCatNewName]");
    newNameHolder.val(item.parentNode.childNodes[1].innerText);
    $('#editPcatModal').modal();
}
$('#editPcatBtn').click(function(event) {
    let newNameHolder=$("input[name=pCatNewName]");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/updatePcatAjax",
        type:"POST",
        data:{
            pCatId: toEditPcat.parentNode.parentNode.getAttribute('data-pcat-id'),
            newName: newNameHolder.val()
        },
        success:function(response){
        if(response) {
            toEditPcat.parentNode.childNodes[1].innerText= newNameHolder.val();
            $.modal.close();
        }
        },
    });
});
