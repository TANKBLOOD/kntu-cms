function loadCvs(item){
    let categoryId= item.getAttribute('data-cat-id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/cvAjax",
        type:"POST",
        data:{
        catId: categoryId,
        },
        success:function(response){
        if(response) {
            let cvsHolder= document.getElementById('cvsHolder');
            cvsHolder.innerHTML= "";


            if(!response['cvs'].length){
                cvsHolder.innerHTML= "";
                let createNewAtag= document.createElement('a');
                createNewAtag.setAttribute('href', '#cvModal');
                createNewAtag.setAttribute('rel', 'modal:open');
                createNewAtag.setAttribute('data-cvCat-id', categoryId);
                createNewAtag.setAttribute('id', 'addCvModal');
                createNewAtag.innerHTML= '<button class="rounded overflow-hidden bg-white w-4/5 h-20 mb-6 flex items-center justify-center shadow"> \
                    <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> \
                    </button>';
                cvsHolder.append(createNewAtag);
            }else{


                for(theCv of response['cvs']) {
                    let newCat= document.createElement('div');
                    newCat.setAttribute('class', 'rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 h-20 mb-6 flex items-center justify-between  shadow');

                    newCat.innerHTML= '<div class="text-lg font-semibold items-center pr-8"><!--card head-->'+theCv['title'] +' \
                    </div> \
                    <div class="flex ml-16" data-cv-id="'+theCv['id']+'"> \
                        <a onclick="getCvId(this)" href="/adminCvShow/'+theCv['id']+'"> \
                            <div> \
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> \
                            </div> \
                        </a> \
                        <a onclick="getCvId(this)"> \
                            <div> \
                                <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
                            </div> \
                        </a> \
                        <a onclick="getCvId(this)" href="#cvDeleteConfirmModal" rel="modal:open"> \
                            <div> \
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
                            </div> \
                        </a> \
                    </div>';
                    cvsHolder.append(newCat);
                }
                let createNewAtag= document.createElement('a');
                createNewAtag.setAttribute('href', '#cvModal');
                createNewAtag.setAttribute('rel', 'modal:open');
                createNewAtag.setAttribute('data-cvCat-id', categoryId);
                createNewAtag.setAttribute('id', 'addCvModal');
                createNewAtag.innerHTML= '<button class="rounded overflow-hidden bg-white w-4/5 h-20 mb-6 flex items-center justify-center shadow"> \
                    <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> \
                    </button>';
                cvsHolder.append(createNewAtag);

            }
        }
        },
    });
}

$('#addCvBtn').click(function(event){
    event.preventDefault();

    var catId = document.getElementById('addCvModal').getAttribute('data-cvCat-id');
    var title = $("input[name=cvTitle]").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/createCvAjax",
        type:"POST",
        data:{
        title: title,
        catId: catId
        },
        success:function(response){
        if(response) {
            let newCat= document.createElement('div');
                newCat.setAttribute('class', 'rounded overflow-hidden bg-gray-200 border-b border-gray-300 w-4/5 h-20 mb-6 flex items-center justify-between  shadow');

                newCat.innerHTML= ' <div class="text-lg font-semibold items-center pr-8"><!--card head-->'+title +' \
                </div> \
                <div class="flex ml-16" data-cv-id="'+response['cvId']+'"> \
                    <a onclick="getCvId(this)"> \
                        <div> \
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> \
                        </div> \
                    </a> \
                    <a onclick="getCvId(this)"> \
                        <div> \
                            <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
                        </div> \
                    </a> \
                    <a onclick="getCvId(this)" href="#cvDeleteConfirmModal" rel="modal:open"> \
                        <div> \
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
                        </div> \
                    </a> \
                </div>';

                $("a[data-cvCat-id]").first().before(newCat);
        }
        },
    });
});

var clickedCv;
var clickedCvId;
function getCvId(item) {
    clickedCv= item;
    clickedCvId= item.parentNode.getAttribute('data-cv-id');
}

$('#delCvBtn').click(function(event) {
    event.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/deleteCvAjax",
        type:"DELETE",
        data:{
        cvId: clickedCvId,
        },
        success:function(response){
        if(response) {
            if(response['isDeleted'] == 'true') {
                clickedCv.parentNode.parentNode.remove();
                $.modal.close();
            }
        }
        },
    });
});
