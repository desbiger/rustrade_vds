// JavaScript Document


function shore(link_) {

    var ancer = confirm("�� ������� ��� ������ ������� ��������� ������");

    if (ancer) {
        window.location.href = link_;
    }

}
function shoreNewWindow(link_, w, h) {

    var ancer = confirm("�� ������� ��� ������ ������� ��������� ������");

    if (ancer) {
        window.open(link_, 'my_page', 'width=' + w + ', height=' + h + ', scrollbars=1, resizable=0, fullscreen=0');
    }

}

function show(id) {
    document.getElementById(id).style.visibility = 'visible';
}

function hide(id) {
    document.getElementById(id).style.visibility = 'hidden';
}

function submit_(id) {
    if (confirm('�������?')) {
        document.getElementById(id).submit();
    }
}

function submit_form(id) {

    document.getElementById(id).submit();

}


function br(varr) {
    var res = varr.replace(/\[br\]/g, '<br>');
    return res
}

//����� ������� ���� � ����� ������ ����
function showCurPhoto(id, photo) {

    var h = document.height;
    var w = document.width;
    $('#bb').css('height', h);
    $('#bb').css('width', w);

    document.getElementById('id_oborud').value = id;
    document.getElementById('img_replace_form').style.visibility = 'visible';
    document.getElementById('curFoto').src = photo;
}


//����������� � �������������
function toggleDiv(id) {

    if ($("#" + id).css("display") == "block") {
        $("#" + id).css({display: "none"});
        $.cookie(id, "none");
    } else {
        $("#" + id).css({display: "block"});
        $.cookie(id, "yes");

    }
}
//�������� ��������� ������� ������������
function copy_oborud() {
    document.forms['add_form'].action = 'blocks/copy_oborudovanie.php';
    $('#add_form').submit();

}
//��������� ����� ���� � ������������ � ������������
function newWindow(links, name, w, h) {
    var w = window.open(links, name, 'width=' + w + ', height=' + h + ', scrollbars=1, resizable=0, fullscreen=0');
}

//��������� �������
function setRazdel(valueVar) {
    $.cookie('razdel', valueVar);
    location.reload();
}
//��������� ����������
function setPodRazdel(valueVar) {
    $.cookie('podrazdel', valueVar);
    location.reload();
}

$(document).ready(function() {
    $('#right_img').height($('#news_list').height());


    if ($.cookie('holod_menu') == null) {
        $('#holod_menu').css({display:"none"});
    }

    if ($.cookie('ves_menu') == null) {
        $('#ves_menu').css({display:"none"});

    }
    if ($.cookie('sklad_menu') == null) {
        $('#sklad_menu').css({display:"none"});

    }
    if ($.cookie('kitchen_menu') == null) {
        $('#kitchen_menu').css({display:"none"});

    }

});
