let componentHolder= document.getElementById('componentHolder');
var cvId= document.getElementById('cvIdHolder').value;
var clickedComponent;
var cvTitle;

function openDeleteModal(item) {
    $('#componentDeleteConfirmModal').modal();
    clickedComponent= item;
}

function editCvNameAjax(event) {

    event.preventDefault();
    let cvNameHolder= $('input[name=cvNewName]');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/editCvName",
        type:"POST",
        data:{
            cvId: cvId,
            cvName: cvNameHolder.val(),
        },
        success:function(response){
        if(response) {
            cvTitle.parentNode.innerText= cvNameHolder.val();
            $.modal.close();
        }
        },
    });
}
function openEditCvNameModal(item) {
    cvTitle= item;
    let cvCurrentName= item.getAttribute('data-cv-title');
    let cvNameHolder= $('input[name=cvNewName]');
    cvNameHolder.val(cvCurrentName);

    $("#editCvBtn").click(editCvNameAjax);

    $('#editCvModal').modal();
}

function openSmOptionEditModal(item) {
    let smOptionTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let smOptionValue= item.parentNode.parentNode.childNodes[6].innerText;
    let modalTitleHolder= $('input[name=smOptionTitle]');
    let modelValueHolder= $('input[name=smOptionValue]');

    modalTitleHolder.val(smOptionTitle);
    modelValueHolder.val(smOptionValue);

    $('#createSmOptionBtn').css({display: 'none'});
    $("#editSmOptionBtn").css({display: 'block'});

    clickedComponent= item;

    $('#smOptionModal').modal();
}

$("#editSmOptionBtn").on("click", editSmOptionAjax);
function editSmOptionAjax(event) {
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
}

function openOptionEditModal(item) {
    let optionTitle= item.parentNode.parentNode.childNodes[4].innerText;
    let optionValue= item.parentNode.parentNode.parentNode.childNodes[4].innerText;
    let modalTitleHolder= $('input[name=optionTitle]');
    let modelValueHolder= $('textarea[name=optionValue]');

    modalTitleHolder.val(optionTitle);
    modelValueHolder.val(optionValue);

    clickedComponent= item;
    $("#createOptionBtn").css({display: 'none'});
    $("#editOptionBtn").css({display: 'block'});

    $('#optionModal').modal();
}

$("#editOptionBtn").on("click", editOptionAjax);
function editOptionAjax(event) {
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
}

function openPureTextEditModal(item) {
    let pureTextValue= item.parentNode.parentNode.childNodes[4].innerText;
    let modelValueHolder= $('textarea[name=pureTextValue]');

    modelValueHolder.val(pureTextValue);
    $('#createPureTextBtn').css({display: 'none'});
    $("#editPureTextBtn").css({display: 'block'});

    clickedComponent= item;

    $('#pureTextModal').modal();

}

$("#editPureTextBtn").on("click", editPureTextAjax);
function editPureTextAjax(event) {
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
}

function openLinkEditModal(item) {
    let linkTitle= item.parentNode.parentNode.childNodes[4].childNodes[2].innerText;
    let linkUrl= item.parentNode.parentNode.childNodes[6].childNodes[2].getAttribute('href');
    let modalTitleHolder= $('input[name=linkTitle]');
    let modelValueHolder= $('input[name=linkUrl]');

    modalTitleHolder.val(linkTitle);
    modelValueHolder.val(linkUrl);

    $('#createLinkBtn').css({display: 'none'});
    $("#editLinkBtn").css({display: 'block'});

    clickedComponent= item;

    $('#linkModal').modal();
}

$("#editLinkBtn").on("click", editLinkAjax);
function editLinkAjax(event) {
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

    modalTitleHolder.val('');
    modelValueHolder.val('');
    $('#editSmOptionBtn').css({display: 'none'});
    $("#createSmOptionBtn").css({display: 'block'});

    $('#smOptionModal').modal();
}

$("#createSmOptionBtn").on("click",createSmOptionAjax);
function createSmOptionAjax(event) {
    event.preventDefault();
    let comType= 'sm-option';
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
            let smOptionTemplate= document.getElementsByClassName('sm-option-template')[0];
            let newComp= smOptionTemplate.cloneNode(true);
            newComp.childNodes[4].childNodes[2].innerText= comTitle;
            newComp.childNodes[6].innerText= comValue;
            newComp.childNodes[8].setAttribute('data-com-id', response['comId']);
            componentHolder.appendChild(newComp);
            $.modal.close();
        }
        },
    });
}

function openOptionCreateModal() {
    let modalTitleHolder= $('input[name=optionTitle]');
    let modelValueHolder= $('textarea[name=optionValue]');

    modalTitleHolder.val('');
    modelValueHolder.val('');
    $("#editOptionBtn").css({display: 'none'});
    $("#createOptionBtn").css({display: 'block'});

    $('#optionModal').modal();

}

$("#createOptionBtn").on("click", createOptionAjax);
function createOptionAjax(event) {
    event.preventDefault();
    let comType= 'option';
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
            let smOptionTemplate= document.getElementsByClassName('option-template')[0];
            let newComp= smOptionTemplate.cloneNode(true);
            newComp.childNodes[2].childNodes[4].innerText= comTitle;
            newComp.childNodes[4].innerText= comValue;
            newComp.childNodes[2].childNodes[6].setAttribute('data-com-id', response['comId']);

            componentHolder.appendChild(newComp);
            $.modal.close();
        }
        },
    });
}


function openPureTextCreateModal() {
    let modelValueHolder= $('textarea[name=pureTextValue]');

    modelValueHolder.val('');

    $('#editPureTextBtn').css({display: 'none'});
    $("#createPureTextBtn").css({display: 'block'});

    $('#pureTextModal').modal();
}

$("#createPureTextBtn").on("click", createPureTextAjax);
function createPureTextAjax(event) {
    event.preventDefault();
    let modelValueHolder= $('textarea[name=pureTextValue]');
    let comValue= modelValueHolder.val();
    let comType= 'pure_text';

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
            comValue: comValue,
            comType: comType,
            comTitle: 'pure_text'
        },
        success:function(response){
        if(response) {
            let smOptionTemplate= document.getElementsByClassName('pure-text-template')[0];
            let newComp= smOptionTemplate.cloneNode(true);
            newComp.childNodes[4].innerHTML+= comValue;
            newComp.childNodes[6].setAttribute('data-com-id', response['comId']);
            componentHolder.appendChild(newComp);
            $.modal.close();
        }
        },
    });
}

function openLinkCreateModal() {

    let modalTitleHolder= $('input[name=linkTitle]');
    let modelValueHolder= $('input[name=linkUrl]');

    modalTitleHolder.val('');
    modelValueHolder.val('');


    $('#editLinkBtn').css({display: 'none'});
    $("#createLinkBtn").css({display: 'block'});

    $('#linkModal').modal();
}

$("#createLinkBtn").on("click", createLinkAjax);
function createLinkAjax(event) {
    event.preventDefault();

    let modalTitleHolder= $('input[name=linkTitle]');
    let modelValueHolder= $('input[name=linkUrl]');

    let comTitle= modalTitleHolder.val();
    let comValue= modelValueHolder.val();
    let comType= 'link';

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
            comType:comType
        },
        success:function(response){
        if(response) {
            let smOptionTemplate= document.getElementsByClassName('link-template')[0];
            let newComp= smOptionTemplate.cloneNode(true);
            newComp.childNodes[4].childNodes[2].innerText = comTitle;
            newComp.childNodes[6].childNodes[2].setAttribute('href', comValue);
            newComp.childNodes[8].setAttribute('data-com-id', response['comId']);

            componentHolder.appendChild(newComp);
            $.modal.close();
        }
        },
    });
}
