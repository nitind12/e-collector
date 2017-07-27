function  loadgalleryView(dataCmb) {
    //alert(dataCmb.value);
    $j("#response").css('display', 'block');
    $j.ajax({
        url: site_url_ + "/web/fillMapView/" + dataCmb.value,
        type: 'GET',
    }).done(function (data) {
        $j("#galleryView").html(data);
        $j("#response").css('display', 'none');
    });
}

function  fillVillages(dataCmb) {
    $j("#cmbVillage").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/get_village_by_tehsil/" + dataCmb.value,
        type: 'GET',
    }).done(function (data) {
        //alert(data);
        $j("#cmbVillage").html(data);
    });
}

function  fillVillagesMap(dataCmb) {
    $j("#cmbVillage").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/get_village_by_tehsil_forMap/" + dataCmb.value,
        type: 'GET',
    }).done(function (data) {
        //alert(data);
        $j("#cmbVillage").html(data);
    });
}

$(this).ready(function () {
    $("#id").autocomplete({
        minLength: 1,
        source:
                function (req, add) {
                    $.ajax({
                        url: site_url_ + "/web/searchVillageAjax/",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                                function (data) {
                                    if (data.response == "true") {
                                        add(data.message);
                                        console.log(data);
                                    }
                                },
                    });
                },
    });
});

function loadPlaces(dataCmb) {
    window.location.href = site_url_ + "/web/touristGallery/" + dataCmb.value;
}
function readMore() {         
    $j("#long").css('display', 'block');
    $j("#short").css('display', 'none');
}
