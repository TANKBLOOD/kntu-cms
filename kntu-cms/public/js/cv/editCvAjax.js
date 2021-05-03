let componentHolder= document.getElementById('componentHolder');

var clicked;
function openDeleteModal(item) {
    $('#componentDeleteConfirmModal').modal();
    clicked= item;
}
function openSmOptionEditModal(item) {
    let smOptionTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let smOptionValue= item.parentNode.parentNode.childNodes[6].innerText;
    let modalTitleHolder= $('input[name=smOptionTitle]');
    let modelValueHolder= $('input[name=smOptionValue]');

    modalTitleHolder.val(smOptionTitle);
    modelValueHolder.val(smOptionValue);
    $('#smOptionModal').modal();
    clicked= item;
}

function openOptionEditModal(item) {
    let optionTitle= item.parentNode.parentNode.childNodes[4].innerText;
    let optionValue= item.parentNode.parentNode.parentNode.childNodes[4].innerText;
    let modalTitleHolder= $('input[name=optionTitle]');
    let modelValueHolder= $('textarea[name=optionValue]');

    modalTitleHolder.val(optionTitle);
    modelValueHolder.text(optionValue);
    $('#optionModal').modal();
    clicked= item;
}

function openPureTextEditModal(item) {
    let pureTextValue= item.parentNode.parentNode.childNodes[4].innerText;
    let modelValueHolder= $('textarea[name=pureTextValue]');

    modelValueHolder.text(pureTextValue);
    $('#pureTextModal').modal();
    clicked= item;
}

function openLinkEditModal(item) {
    let linkTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let linkUrl= item.parentNode.parentNode.childNodes[6].childNodes[2].getAttribute('href');

    let modalTitleHolder= $('input[name=linkTitle]');
    let modelValueHolder= $('input[name=linkUrl]');

    modalTitleHolder.val(linkTitle);
    modelValueHolder.val(linkUrl);
    $('#linkModal').modal();
    clicked= item;
}

$('#delComponentBtn').click(function(event) {
    event.preventDefault();

    let compId= clicked.parentNode.getAttribute('data-com-id');

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
            clicked.parentNode.parentNode.remove();
            $.modal.close();
        }
        },
    });
});

$("#editSmOptionBtn").click(function(event) {
    event.preventDefault();

    let compId= clicked.parentNode.getAttribute('data-com-id');
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
            clicked.parentNode.parentNode.childNodes[4].childNodes[2].innerText= comTitle;
            clicked.parentNode.parentNode.childNodes[6].innerText= comValue;
            $.modal.close();
        }
        },
    });
});

$("#editOptionBtn").click(function(event) {
    event.preventDefault();

    let compId= clicked.parentNode.getAttribute('data-com-id');

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
            clicked.parentNode.parentNode.childNodes[4].innerText= comTitle;
            clicked.parentNode.parentNode.parentNode.childNodes[4].innerText= comValue;
            $.modal.close();
        }
        },
    });
});

$("#editPureTextBtn").click(function(event) {
    event.preventDefault();

    let compId= clicked.parentNode.getAttribute('data-com-id');

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
            clicked.parentNode.parentNode.childNodes[4].innerText= comValue;
            $.modal.close();
        }
        },
    });
});

$("#editLinkBtn").click(function(event) {
    event.preventDefault();

    let compId= clicked.parentNode.getAttribute('data-com-id');

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
            clicked.parentNode.parentNode.childNodes[4].childNodes[2].innerText= comTitle;
            clicked.parentNode.parentNode.childNodes[6].childNodes[2].setAttribute('href', comValue);
            $.modal.close();
        }
        },
    });
});
