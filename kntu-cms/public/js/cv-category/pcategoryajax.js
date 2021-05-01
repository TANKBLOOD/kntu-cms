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
                <h3 class="font-bold text-lg bg-blue-200">'+name +'</h3>';

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
