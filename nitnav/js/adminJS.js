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
        $j("#cmbVillage").html(data);
    });
}

function  fillPensionDetail(dataCmb, villID) {
    $j("#pensionData").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/getPension_Detail/" + dataCmb.value + "/" + villID,
        type: 'GET',
    }).done(function (data) {
        $j("#pensionData").html(data);
    });
}

function  fillToursitPlaces(dataCmb, villID) {
    $j("#touristPlacesData").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/getTourist_Places_Detail/" + dataCmb.value + "/" + villID,
        type: 'GET',
    }).done(function (data) {
        $j("#touristPlacesData").html(data);
    });
}

function  fillBankDetail(dataCmb, villID) {
    $j("#bankData").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/getBank_Detail/" + dataCmb.value + "/" + villID,
        type: 'GET',
    }).done(function (data) {
        $j("#bankData").html(data);
    });
}

function  fillIndDetail(dataCmb, villID) {
    $j("#indData").html('Loading...');
    $j.ajax({
        url: site_url_ + "/web/getIndustry_Detail/" + dataCmb.value + "/" + villID,
        type: 'GET',
    }).done(function (data) {
        $j("#indData").html(data);
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
