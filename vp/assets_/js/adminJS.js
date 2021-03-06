$('#RevenuePdf').change(function () {
    var file = this.files[0];
    var ext = $('#RevenuePdf').val().split('.').pop().toLowerCase();
    if (((file.size / 1024) > 2100) || ($.inArray(ext, ['pdf']) === -1)) {
        $('#__reg_err_msg').css('color', '#ff0000');
        $('#__reg_err_msg').html('<b>&nbsp;&nbsp; <i class="fa fa-info-circle" aria-hidden="true"></i> Revenue Map should be less than or equal to 2100KB and must be in(<b>pdf</b>) format only.</b>');
    } else {
        $('#__reg_err_msg').css('color', '#00ff00');
        $('#__reg_err_msg').html('&nbsp;&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i> Selected file is fine...');
    }
});


function  loadRevenuePDF(dataCmb) {
    //alert(dataCmb.value);
    $("#response").css('display', 'block');
    $.ajax({
        url: site_url_ + "/revenue/fillMap/" + dataCmb.value,
        type: 'GET'
    }).done(function (data) {
        $("#gallery").html(data);
        $("#response").css('display', 'none');
        var btnDelete = $("#gallery").find($(".btn-delete"));

        (btnDelete).on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            //$("#" + id + "g").hide();
            $.ajax({
                url: site_url_ + "/revenue/deletepdf/" + id,
                //data: 'id=' + id,
                type: 'GET'
            }).done(function (data) {
                loadRevenuePDF(dataCmb);
            });
        });
    });
}

function  loadgallery(dataCmb) {
    $.ajax({
        url: site_url_ + "/gallery/fillGallery/" + dataCmb.value,
        type: 'GET'
    }).done(function (data) {
        $("#gallery").html(data);
        var btnDelete = $("#gallery").find($(".btn-delete"));

        (btnDelete).on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            //$("#" + id + "g").hide();
            //alert(id);
            $.ajax({
                url: site_url_ + "/gallery/deleteimg/" + id,
                //data: 'id=' + id,
                type: 'GET'
            }).done(function (data) {
                loadgallery(dataCmb);
            });
        });
    });
}

function change_Cat(id_) {
    $.ajax({
        url: site_url_ + "/gallery/getCategoryData/" + id_,
        type: 'GET'
    }).done(function (data) {
        $("#txtCategory_edit").val(data.category);
        $("#txtDesc_edit").val(data.desc);
        $("#txtID_edit").val(data.catID);
        document.getElementById('editCat').style.display = 'block';
        document.getElementById('newCat').style.display = 'none';
    });
}

function hideEdit() {
    document.getElementById('editCat').style.display = 'none';
    document.getElementById('newCat').style.display = 'block';
}

$('#frmRevenue').submit(function (e) {    
    e.preventDefault();
    vid = $('#villageName').val();
    url_ = site_url_ + "/revenue/do_upload";
    data_ = new FormData($(this)[0]);  
    $('#__reg_err_msg').html('<span>uploading <img src="' + base_path + '/assets_/img/load.GIF" width="10" /></span>');
    $.ajax({
        url: url_,
        type: "POST",
        data: data_,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#msg_').html('<span>uploaded successfully</span>');
            $('#txtSheetNumber').val('');
            $('#RevenuePdf').val('');
           // alert(vid);
           loadRevenuePDF1(vid);
           $('#__reg_err_msg').html('');
        }, error: function (xhr, status, error) {
            //$('#load_here_edit_actinact').html(xhr.responseText);
            $('#msg_').html("<span style='color: #0000ff'>X: Please try again !!</span>");
        }
    });
    return false;
});

function  loadRevenuePDF1(dataCmb) {
    //alert(dataCmb.value);
    $("#response").css('display', 'block');
    $.ajax({
        url: site_url_ + "/revenue/fillMap/" + dataCmb,
        type: 'GET'
    }).done(function (data) {
        $("#gallery").html(data);
        $("#response").css('display', 'none');
        var btnDelete = $("#gallery").find($(".btn-delete"));

        (btnDelete).on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            //$("#" + id + "g").hide();
            $.ajax({
                url: site_url_ + "/revenue/deletepdf/" + id,
                //data: 'id=' + id,
                type: 'GET'
            }).done(function (data) {
                loadRevenuePDF1(dataCmb);
            });
        });
    });
}