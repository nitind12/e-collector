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
    
    
function  loadgallery(dataCmb) {
    //alert(dataCmb.value);
    $("#response").css('display','block');
    $.ajax({
        url: site_url_ + "/revenue/fillMap/" + dataCmb.value,
        type: 'GET'
    }).done(function (data) {
        $("#gallery").html(data);
        $("#response").css('display','none');
        var btnDelete = $("#gallery").find($(".btn-delete"));

        (btnDelete).on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr('id');
            //$("#" + id + "g").hide();
            $.ajax({
                url: site_url_ + "/revenue/deletepdf/"+ id,
                //data: 'id=' + id,
                type: 'GET'
            }).done(function (data) {
                loadgallery(dataCmb);
            });
        });
    });
}