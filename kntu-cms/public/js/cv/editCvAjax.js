let componentHolder= document.getElementById('componentHolder');
var cvId= document.getElementById('cvIdHolder').value;

var clickedComponent;
function openDeleteModal(item) {
    $('#componentDeleteConfirmModal').modal();
    clickedComponent= item;
}
function openSmOptionEditModal(item) {
    let smOptionTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let smOptionValue= item.parentNode.parentNode.childNodes[6].innerText;
    let modalTitleHolder= $('input[name=smOptionTitle]');
    let modelValueHolder= $('input[name=smOptionValue]');

    modalTitleHolder.val(smOptionTitle);
    modelValueHolder.val(smOptionValue);

    clickedComponent= item;
    $("#editSmOptionBtn").click(function(event) {
        event.preventDefault();

        let compId= clickedComponent.parentNode.getAttribute('data-com-id');
        let comTitle= $('input[name=smOptionTitle]').val();
        let comValue= $('input[name=smOptionValue]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateComponentAjax",
            type:"POST",
            data:{
                compId: compId,
                comTitle: comTitle,
                comValue: comValue
            },
            success:function(response){
            if(response) {
                clickedComponent.parentNode.parentNode.childNodes[4].childNodes[2].innerText= comTitle;
                clickedComponent.parentNode.parentNode.childNodes[6].innerText= comValue;
                $.modal.close();
            }
            },
        });
    });

    $('#smOptionModal').modal();
}

function openOptionEditModal(item) {
    let optionTitle= item.parentNode.parentNode.childNodes[4].innerText;
    let optionValue= item.parentNode.parentNode.parentNode.childNodes[4].innerText;
    let modalTitleHolder= $('input[name=optionTitle]');
    let modelValueHolder= $('textarea[name=optionValue]');

    modalTitleHolder.val(optionTitle);
    modelValueHolder.text(optionValue);

    clickedComponent= item;

    $("#editOptionBtn").click(function(event) {
        event.preventDefault();

        let compId= clickedComponent.parentNode.getAttribute('data-com-id');

        let comTitle= $('input[name=optionTitle]').val();
        let comValue= $('textarea[name=optionValue]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateComponentAjax",
            type:"POST",
            data:{
                compId: compId,
                comTitle: comTitle,
                comValue: comValue
            },
            success:function(response){
            if(response) {
                clickedComponent.parentNode.parentNode.childNodes[4].innerText= comTitle;
                clickedComponent.parentNode.parentNode.parentNode.childNodes[4].innerText= comValue;
                $.modal.close();
            }
            },
        });
    });

    $('#optionModal').modal();

}

function openPureTextEditModal(item) {
    let pureTextValue= item.parentNode.parentNode.childNodes[4].innerText;
    let modelValueHolder= $('textarea[name=pureTextValue]');

    modelValueHolder.text(pureTextValue);

    clickedComponent= item;
    $("#editPureTextBtn").click(function(event) {
        event.preventDefault();

        let compId= clickedComponent.parentNode.getAttribute('data-com-id');

        let comValue= $('textarea[name=pureTextValue]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateComponentAjax",
            type:"POST",
            data:{
                compId: compId,
                comValue: comValue
            },
            success:function(response){
            if(response) {
                clickedComponent.parentNode.parentNode.childNodes[4].innerText= comValue;
                $.modal.close();
            }
            },
        });
    });

    $('#pureTextModal').modal();

}

function openLinkEditModal(item) {
    let linkTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let linkUrl= item.parentNode.parentNode.childNodes[6].childNodes[2].getAttribute('href');

    let modalTitleHolder= $('input[name=linkTitle]');
    let modelValueHolder= $('input[name=linkUrl]');

    modalTitleHolder.val(linkTitle);
    modelValueHolder.val(linkUrl);

    clickedComponent= item;

    $("#editLinkBtn").click(function(event) {
        event.preventDefault();

        let compId= clickedComponent.parentNode.getAttribute('data-com-id');

        let comTitle= $('input[name=linkTitle]').val();
        let comValue= $('input[name=linkUrl]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/updateComponentAjax",
            type:"POST",
            data:{
                compId: compId,
                comTitle: comTitle,
                comValue: comValue
            },
            success:function(response){
            if(response) {
                clickedComponent.parentNode.parentNode.childNodes[4].childNodes[2].innerText= comTitle;
                clickedComponent.parentNode.parentNode.childNodes[6].childNodes[2].setAttribute('href', comValue);
                $.modal.close();
            }
            },
        });
    });

    $('#linkModal').modal();
}

$('#delComponentBtn').click(function(event) {
    event.preventDefault();

    let compId= clickedComponent.parentNode.getAttribute('data-com-id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/deleteComponentAjax",
        type:"DELETE",
        data:{
            compId: compId,
        },
        success:function(response){
        if(response) {
            clickedComponent.parentNode.parentNode.remove();
            $.modal.close();
        }
        },
    });
});

function openSmOptionCreateModal() {
    let modalTitleHolder= $('input[name=smOptionTitle]');
    let modelValueHolder= $('input[name=smOptionValue]');
    let comType= 'sm-option';

    modalTitleHolder.val('');
    modelValueHolder.val('');

    $("#editSmOptionBtn").click(function(event) {
        event.preventDefault();

        let comTitle= $('input[name=smOptionTitle]').val();
        let comValue= $('input[name=smOptionValue]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/createComAjax",
            type:"POST",
            data:{
                cvId:cvId,
                comTitle: comTitle,
                comValue: comValue,
                comType: comType
            },
            success:function(response){
            if(response) {
                let newComp= document.createElement('div');
                newComp.setAttribute('class', 'flex items-center my-4');
                newComp.innerHTML= '<svg class="w-6 h-6 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg> \
                <div class="ml-5 text-2xl"><!--sm-option title--> \
                    <span>'+comTitle+'</span>: \
                </div> \
                <div class="font-semibold"><!--sm-option value--> '+comValue+' </div> \
                <div class="mr-8 flex mt-1" data-com-id="'+response['comId']+'"> \
                    <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white"> \
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
                    </button> \
                    <button onclick="openSmOptionEditModal(this)" class="px-2 bg-blue-500 rounded-md text-white"> \
                        <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
                    </button> \
                </div>';
                componentHolder.appendChild(newComp);
                $.modal.close();
            }
            },
        });
    });

    $('#smOptionModal').modal();
}

function openOptionCreateModal() {
    let modalTitleHolder= $('input[name=optionTitle]');
    let modelValueHolder= $('textarea[name=optionValue]');

    let comType= 'option';

    modalTitleHolder.val('');
    modelValueHolder.val('');

    $("#editOptionBtn").click(function(event) {
        event.preventDefault();

        let comTitle= $('input[name=optionTitle]').val();
        let comValue= $('textarea[name=optionValue]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/createComAjax",
            type:"POST",
            data:{
                cvId: cvId,
                comTitle: comTitle,
                comValue: comValue,
                comType: comType
            },
            success:function(response){
            if(response) {
                let newComp= document.createElement('div');
                newComp.setAttribute('class', 'my-6');
                newComp.innerHTML= '<div class="flex items-center">\
                    <svg class="w-6 h-6 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg> \
                    <div class="text-2xl">'+comTitle+'</div> \
                    <div class="mr-8 flex mt-1" data-com-id="'+response['comId']+'"> \
                        <button onclick="openDeleteModal(this)" class="ml-2 px-2 bg-red-500 rounded-md text-white"> \
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> \
                        </button> \
                        <button onclick="openOptionEditModal(this)" class="px-2 bg-blue-500 rounded-md text-white"> \
                            <svg class="w-6 h-6 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> \
                        </button> \
                    </div> \
                </div> \
                <div class="text-lg pr-2 py-1 border-r-2 border-gray-400" style="margin-right: 0.63rem"><!--option Value-->'+comValue+'</div>';
                componentHolder.appendChild(newComp);
                $.modal.close();
            }
            },
        });
    });

    $('#optionModal').modal();

}
