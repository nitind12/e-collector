$(function(){
	$('#old_pwd').focus(function(){$('#msg_').html('');});
	$('#new_pwd').focus(function(){$('#msg_').html('');});
	$('#new_re-pwd').focus(function(){$('#msg_').html('');});

	$( window ).on( "load", function(){
		$('#patwari_list_here').change();
		$('#patwari_list_for_patwariArea_here').change();
		$('#patwari_list_for_villages_here').change();
		$('#patwari_area_list_for_villages_here').change();
		$('#pdf_here').change(); 
	});
	$('body').on('click', '.patwariIDActiveInactive', function(){
		var url_ = site_url_ + "/village/activeInactivePatwari/"+this.id;
		$('#load_here_edit_actinact').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				//$('#load_here_edit_actinact').html(obj.message.msg_);
				$('#load_here_edit_actinact').html('');
				// affected ones
				$('#patwari_list_here').change();
				$('#patwari_area_list_here').html('');
				$('#patwari_list_for_patwariArea_here').change();
				$('#village_list_here').change();
				$('#patwari_list_for_villages_here').change();
				$('#patwari_name_for_village').html('| -');
				$('#patwari_area_for_village').html('| -');
				$('#cmbVillageReset').click();
				// -------------
			}, error: function(xhr, status, error){
				//$('#load_here_edit_actinact').html(error);
				$('#load_here_edit_actinact').html("<span style='font-size: 10px; background: #ffff00; padding: 3px; border-radius: 5px'>X: Server Error!!. Please trya again.</span>");
	        }
		});
	});

	$('body').on('click', '.PatwariAreaIDActiveInactive', function(){
		var url_ = site_url_ + "/village/activeInactivePatwariArea/"+this.id;
		$('#load_here_edit_patwari').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				//$('#load_here_edit_actinact').html(obj.message.msg_);
				$('#load_here_edit_patwari').html('');
				// affected ones
				//$('#patwari_list_for_patwariArea_here').change();
				$('#cmbPAReset').click();
				PatwariAreaListofPatwari();
				$('#patwari_list_for_villages_here').change();
				$('#patwari_area_list_for_villages_here').html('');
				// -------------
			}, error: function(xhr, status, error){
				//$('#load_here_edit_actinact').html(error);
				$('#load_here_edit_patwari').html("<span style='font-size: 10px; background: #ffff00; padding: 3px; border-radius: 5px'>X: Server Error!!. Please trya again.</span>");
	        }
		});
	});
	$('body').on('click', '.VillageIDActiveInactive', function(){
		var url_ = site_url_ + "/village/activeInactiveVillage/"+this.id;
		$('#load_here_edit_actinact_village').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				//$('#load_here_edit_actinact').html(obj.message.msg_);
				$('#load_here_edit_actinact_village').html('');
				$('#village_name_for_village').html('| -');
				// affected ones
				//$('#village_list_here').change();
				//$('#patwari_list_for_villages_here').change();
				villageListofPatwariArea();
				//$('#cmbVillageReset').click();
				// -------------
			}, error: function(xhr, status, error){
				//$('#load_here_edit_actinact').html(error);
				$('#load_here_edit_actinact_village').html("<span style='font-size: 10px; background: #ffff00; padding: 3px; border-radius: 5px'>X: Server Error!!. Please trya again.</span>");
	        }
		});
	});
	$('body').on('click', '.patwariID', function(){
		reset_the_village_section();
		$('#patwari_area_list_for_villages_here').html('');
		var url_ = site_url_ + "/village/getPatwari/"+this.id;
		$('#load_here_edit_actinact').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				if(obj.patwari.length != 0){
					$('#editPatwari').css("display","block");
					$('#cmbTehsilForVillage_edit').val(obj.patwari.TEHSILID+"~"+obj.patwari.TEHSIL);
					$('#txtpatwariName_edit').val(obj.patwari.NAME_);
					$('#txtpatwariArea_edit').val(obj.patwari.PATWARI_AREA);
					$('#txtpaContact_edit').val(obj.patwari.PHONE_);
					$('#edit_photo_here').html("<img src='"+base_path+"/assets_/patwari_pics/"+obj.patwari.PHOTO_+"' width='50' />");
					$('#txtPID').val(obj.patwari.PID);
					$('#load_here_edit_actinact').html("");
				} else {
					$('#editPatwari').css("display","none");
					$('#load_here_edit_actinact').html("");
				}
				$('#load_here_edit_actinact').html('');
			}, error: function(xhr, status, error){
				//$('#load_here_edit_actinact').html(error);
				$('#load_here_edit_actinact').html("<span style='background: #ffff00; padding: 3px; border-radius: 5px'>Server Error!!. Please trya again.</span>");
	        }
		});
	});
	$('#cmbPatwariUpdateCancel').click(function(){
		$('#editPatwari').css("display","none");
	});
	$('#frmPatwariUpdate').submit(function(e){
		e.preventDefault();
		pid = $('#txtPID').val();
		url_ = site_url_ + "/village/updatePatwari/"+pid;
		data_ = new FormData($(this)[0]);
		$('#load_here_edit_actinact').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url: url_,
			type: "POST",
			data: data_,
			async: false,
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(data){
				var obj = JSON.parse(data);
				if(obj.message.res_ == 'true'){
					$('#txtpatwariName_edit').val('');
					$('#txtpatwariArea_edit').val('');
					$('#txtpaContact_edit').val('');
					$('#txtpaPhoto_edit').val('');
				}
				// affected ones
				$('#patwari_list_here').change();
				$('#village_list_here').change();
				$('#patwari_list_for_villages_here').change();
				// -------------
				$('#editPatwari').css("display","none");
				$("#load_here_edit_actinact").html(obj.message.msg_);

			}, error: function(xhr, status, error){
				//$('#load_here_edit_actinact').html(xhr.responseText);
				$('#load_here_edit_actinact').html("<span style='color: #0000ff'>X: Please try again !!</span>");
	        }	
	    });
	});
	$('#patwari_list_here').change(function(){
		url_ = site_url_ + "/village/getPatwaris";
		$('#patwari_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url:url_,
			type: "POST",
			success: function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.patwaris.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#ECFFE4";
							k=1;
						} else {
							color = "#FFFFE4";
							k=0;
						}
						if(obj.patwaris[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12" style="overflow: hidden; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'">';
					str_html = str_html + '<div class="col-sm-2 col-xs-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10 col-xs-10" style="border: #ff0000 solid 0px">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i>&nbsp;'+obj.patwaris[i].NAME_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="patwariID" title="Edit Patwari" id="'+obj.patwaris[i].PID+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Patwari" class="patwariIDActiveInactive" id="'+obj.patwaris[i].PID+'/'+obj.patwaris[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: left; padding: 0px; margin-top: 0px">';
					str_html = str_html + '<i class="glyphicon glyphicon-earphone"></i>&nbsp;'+obj.patwaris[i].PHONE_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: right; padding: 0px; margin-top: 0px">';
					str_html = str_html + '<span class="tehsil_label">Tehsil</span><span class="tehsil_name">'+obj.patwaris[i].TEHSIL+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';

				}
				$('#patwari_list_here').html(str_html);
			}, error: function(xhr, status, error){
			    $('#patwari_list_here').html(xhr.responseText);
				//$('#patwari_list_here').html("Some server error. Please try again !!");
	        }
	    });
	});
	$('#frmPatwari').submit(function(e){
		e.preventDefault();
		url_ = site_url_ + "/village/submitPatwari";
		data_ = new FormData($(this)[0]);
		$("#this_msg").html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url:url_,
			type: "POST",
			data:  data_,
			async: false,
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(data){
				var obj = JSON.parse(data);
				if(obj.message.res_ == 'true'){
					$('#txtpatwariName').val('');
					$('#txtpaContact').val('');
					$('#txtpaPhoto').val('');
				}
				$("#this_msg").html(obj.message.msg_);
				// affected ones
				$('#patwari_list_here').change();
				$('#patwari_list_for_patwariArea_here').change();
				$('#patwari_list_for_villages_here').change();
				$('#village_list_here').html('');
				$('#patwari_area_list_here').html('');
				// -------------
			}, error: function(xhr, status, error){
				$('#this_msg').html(xhr.responseText);
	        }	
	    });
	});

	/*Patwari Area Code below*/
	$('#patwari_area_list_here').change(function(){
		$('#patwari_area_list_here').html("");
	});
	$('body').on('click', '.patwariIDForPatwariArea', function(){
		$('#this_msg_for_patwari_area').html("");
		var str;
		str = this.id;
		data_ = str.split("~");
		pid_ = '#PID_'+data_[0]+"_";
		p_name = data_[1];

		$('#txtPatwariID_').val(data_[0]);
		$('#patwari_name_for_patwariArea').html('| - '+p_name);
		$('#palist_').html("for "+p_name);
		$(".paid_pallets").css("border","#f0f0f0 solid 1px");
		$(pid_).css('border','#dd0379 solid 2px');

		// reset the village Section
		reset_the_village_section();
		// --------------------------

		$('#patwari_area_list_for_villages_here').html('');


		url_ = site_url_ + "/village/getPatwariAreas/"+data_[0];
		$('#patwari_area_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);

				var str_html = '';
				var k=0;
				len__ = obj.patwariAreas_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#fbefe9";
							k=1;
						} else {
							color = "#effefe";
							k=0;
						}
						if(obj.patwariAreas_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 parea_pallet" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PAREAID_'+obj.patwariAreas_[i].PAID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;'+obj.patwariAreas_[i].PATWARIAREA;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updatePatwariArea" title="Edit Village" id="'+obj.patwariAreas_[i].PAID+"-"+obj.patwariAreas_[i].PATWARIAREA+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="PatwariAreaIDActiveInactive" id="'+obj.patwariAreas_[i].PAID+'/'+obj.patwariAreas_[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#patwari_area_list_here').html(str_html);
			},error: function(xhr, status, error){
				$('#patwari_area_list_here').html(xhr.responseText);
	        }
		});
	});

	$('#frmPatwariArea').submit(function(){
		if($('#txtPatwariID_').val() != ""){
			data_ = $('#frmPatwariArea').serialize();

			url_ = site_url_ + "/village/UpdatePatwariArea";
			$('#this_msg_for_patwari_area').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');

			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				success: function(data){
					//if(data != 'Village already exists!!'){
						//$('#txtPatwariArea').val("");
					//}
					$('#this_msg_for_patwari_area').html("");
					$('#load_here_edit_patwari').html(data);
					PatwariAreaListofPatwari();
				}, error: function(xhr, status, error){
					$('#load_here_edit_patwari').html(xhr.responseText);
		        }
			});
		} else {
			alert("Select Patwari Name First.");
		}
		return false;
	});

	$('body').on('click', '.updateVillage', function(){
		$('#this_msg_for_village').html("");
		id = this.id;

		if(id != "newVillage"){
			str = id;
			idarr = str.split("-");
			name_ = idarr[1];
			id = idarr[0];
			$('#village_name_for_village').html('| - '+name_);

			$('.vid_pallets').css("border", '#f0f0f0 solid 1px');
			$('#VID_'+id+'_').css("border", '#900000 solid 2px');

			url_ = site_url_ + "/village/getVillageData/"+id;
			$('#load_here_edit_actinact_village').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
			$.ajax({
				type: 'POST',
				url: url_,
				success: function(data){
					var obj = JSON.parse(data);
					$('.disableInputVillageArea').removeAttr('disabled');
					$('.disableInputVillageArea').addClass('orange_');
					$('#cmbVillageSubmit').addClass('btn btn-danger');
					$('#cmbVillageSubmit').val(" Update ");

					$('#txtDistrict').val(obj.village[0].DISTRICT);
					$('#cmbTehsilForVillage').val(obj.village[0].TEHSIL);
					$('#txtVillageName').val(obj.village[0].NAME_);
					$('#txtKanoongoArea').val(obj.village[0].KANOONGO_AREA);
					$('#txtGramPanchayat').val(obj.village[0].GRAM_PANCHAYAT);
					$('#txtNyayPanchayat').val(obj.village[0].NYAY_PANCHAYAT);
					$('#txtVanPanchayat').val(obj.village[0].VAN_PANCHAYAT);
					$('#txtParliamentaryCons').val(obj.village[0].PARLIAMENTARY_CONS);
					$('#txtAssemblyCons').val(obj.village[0].ASSEMBLY_CONS);
					$('#txtPollingBoothName').val(obj.village[0].POLLING_BOOTH);
					$('#txtRegularRevenuePolice').val(obj.village[0].REGULAR_REVENUE_POLICE);
					$('#load_here_edit_actinact_village').html("");
				}, error: function(xhr, status, error){
					alert(error);
		        }
			})
		} else {
			$('.disableInputVillageArea').removeAttr('disabled');
			name_ = "";
			$('#village_name_for_village').html('| -'+name_);

			$('#txtVillageName').val("");
			$('#txtKanoongoArea').val("");
			$('#txtGramPanchayat').val("");
			$('#txtNyayPanchayat').val("");
			$('#txtVanPanchayat').val("");
			$('#txtParliamentaryCons').val("");
			$('#txtAssemblyCons').val("");
			$('#txtPollingBoothName').val("");
			$('#txtRegularRevenuePolice').val("");

			$('#cmbVillageSubmit').removeClass('btn btn-danger');
			$('#cmbVillageSubmit').addClass('btn btn-success');
			$('#cmbVillageSubmit').val(" Submit ");
			$('.disableInputVillageArea').removeClass('orange_');
			$('#txtVillageName').focus();
		}
		$('#txtVillageID').val(id);
	});
	$('#cmbVillageReset').click(function(){
		$('#cmbVillageSubmit').removeClass('btn btn-danger');
		$('#cmbVillageSubmit').addClass('btn btn-success');
		$('#cmbVillageSubmit').val(" Submit ");
		$('.disableInputVillageArea').removeClass('orange_');
	});
	function PatwariAreaListofPatwari(){
		var pid_;
		pid_ = $('#txtPatwariID_').val();

		url_ = site_url_ + "/village/getPatwariAreas/"+pid_;

			$('.disableInputpatwariArea').removeClass('orange_');
			$('.disableInputpatwariArea').prop('disabled',true);
			$('#cmbPASubmit').removeClass('btn btn-danger');
			$('#cmbPASubmit').addClass('btn btn-success');
			$('#cmbPASubmit').val(" Submit ");
			$('#txtPatwariArea').val("");
		$('#patwari_area_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);

				var str_html = '';
				var k=0;
				len__ = obj.patwariAreas_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#fbefe9";
							k=1;
						} else {
							color = "#effefe";
							k=0;
						}
						if(obj.patwariAreas_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 parea_pallet" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PAREAID_'+obj.patwariAreas_[i].PAID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;'+obj.patwariAreas_[i].PATWARIAREA;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updatePatwariArea" title="Edit Patwari Area" id="'+obj.patwariAreas_[i].PAID+"-"+obj.patwariAreas_[i].PATWARIAREA+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Patwari Area" class="PatwariAreaIDActiveInactive" id="'+obj.patwariAreas_[i].PAID+'/'+obj.patwariAreas_[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#patwari_area_list_here').html(str_html);
			},error: function(xhr, status, error){
				alert(error);
	        }
	    });
	}
	$('#patwariArea_list_here').change(function(){
		url_ = site_url_ + "/village/getActivePatwaris";
		$('#patwari_list_for_patwariArea_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url:url_,
			type: "POST",
			success: function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.patwaris.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#ECFFE4";
							k=1;
						} else {
							color = "#FFFFE4";
							k=0;
						}
						icon_ = "eye-open";
						status = "";
					str_html = str_html + '<div class="col-sm-12" style="padding: 0px"><div style="overflow: hidden; width:100%; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PID_'+obj.patwaris[i].PID+'_" class="paid_pallets">';
					str_html = str_html + '<div class="col-sm-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i><span class="patwari_name_">&nbsp;'+obj.patwaris[i].NAME_+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="patwariIDForPatwari" title="Call Patwari for Village Entry" id="'+obj.patwaris[i].PID+'-'+obj.patwaris[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-share-alt"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: left; padding: 0px; margin-top: 0px">';
					str_html = str_html + '<i class="glyphicon glyphicon-earphone"></i>&nbsp;'+obj.patwaris[i].PHONE_;
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div></div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';

				}
				$('#patwari_list_for_patwariArea_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_for_patwariArea_here').html("Some server error. Please try again !!");
	        }
	    });
	});
	$('#patwari_list_for_patwariArea_here').change(function(){
		url_ = site_url_ + "/village/getActivePatwaris";
		$('#patwari_list_for_patwariArea_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url:url_,
			type: "POST",
			success: function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.patwaris.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#ECFFE4";
							k=1;
						} else {
							color = "#FFFFE4";
							k=0;
						}
						icon_ = "eye-open";
						status = "";
					str_html = str_html + '<div class="col-sm-12" style="border: #ff0000 solid 0px; padding: 0px"><div style="overflow: hidden; width:100%; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PID_'+obj.patwaris[i].PID+'_" class="paid_pallets">';
					str_html = str_html + '<div class="col-sm-2 col-xs-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10 col-xs-10" style="border: #000000 solid 0px; ">';
					str_html = str_html + '<div style="float: left; padding: 0px;border: #000000 solid 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i><span class="patwari_name_">&nbsp;'+obj.patwaris[i].NAME_+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;border: #000000 solid 0px;">';
					str_html = str_html + '<a href="#" class="patwariIDForPatwariArea" title="Call Patwari for Patwari Area Entry" id="'+obj.patwaris[i].PID+'~'+obj.patwaris[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-share-alt"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: left; padding: 0px; margin-top: 0px; border: #000000 solid 0px; ">';
					str_html = str_html + '<i class="glyphicon glyphicon-earphone"></i>&nbsp;'+obj.patwaris[i].PHONE_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: right; padding: 0px; margin-top: 0px">';
					str_html = str_html + '<span class="tehsil_label">Tehsil</span><span class="tehsil_name">'+obj.patwaris[i].TEHSIL+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div></div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';

				}
				$('#patwari_list_for_patwariArea_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_for_patwariArea_here').html("Some server error. Please try again !!");
	        }
	    });
	});

	$('body').on('click', '.updatePatwariArea', function(){
		$('#this_msg_for_patwari_area').html("");
		id = this.id;


		if(id != "newPatwariArea"){
			str = id;
			idarr = str.split("-");
			name_ = idarr[1];
			id = idarr[0];

			url_ = site_url_ + "/village/getPatwariArea/"+id;

			$('.parea_pallet').css('#f0f0f0 solid 1px');
			$('#PAREAID_'+id+'_').css('#900000 solid 2px');

			$('#load_here_edit_patwari').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
			$.ajax({
				type: 'POST',
				url: url_,
				success: function(data){
					var obj = JSON.parse(data);

					$('.disableInputpatwariArea').removeAttr('disabled');
					$('.disableInputpatwariArea').addClass('orange_');
					$('#cmbPASubmit').addClass('btn btn-danger');
					$('#cmbPASubmit').val(" Update ");

					$('#txtPatwariArea').val(obj.patwariArea_[0].PATWARIAREA);
					$('#load_here_edit_patwari').html("");
				}, error: function(xhr, status, error){
					alert(error);
		        }
			})
		} else {
			$('.disableInputpatwariArea').removeAttr('disabled');
			$('#cmbPASubmit').removeClass('btn btn-danger');
			$('#cmbPASubmit').addClass('btn btn-success');
			$('#cmbPASubmit').val(" Submit ");
			$('.disableInputpatwariArea').removeClass('orange_');
			$('#txtPatwariArea').val("");
			$('#txtPatwariArea').focus();
		}
		$('#txtPatwariAreaID').val(id);
	});

	function reset_the_patwari_area_section(){
		$('#patwari_name_for_village').html('');
		$('#patwari_area_for_village').html('');
		$('#village_name_for_village').html('');

		$('.disableInputpatwariArea').val('');
		$('.disableInputpatwariArea').removeClass('orange_');
		$('.disableInputpatwariArea').prop('disabled',true);
		$('.disableInputpatwariArea').val('');
		
		
		$('#cmbPASubmit').removeClass('btn btn-danger');
		$('#cmbPASubmit').addClass('btn btn-success');
		$('#cmbPASubmit').val(" Submit ");
		$('#txtPatwariArea').val("");
		$('#village_list_here').html('');
	}

	// Villages here ->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	function reset_the_village_section(){
		$('#patwari_name_for_village').html('');
		$('#patwari_area_for_village').html('');
		$('#village_name_for_village').html('');

		$('.disableInputVillageArea').val('');
		$('.disableInputVillageArea').removeClass('orange_');
		$('.disableInputVillageArea').prop('disabled',true);
		$('.disableInputVillageArea').val('');
		$('#patwari_list_for_villages_here').change();
		
		$('#cmbVillageSubmit').removeClass('btn btn-danger');
		$('#cmbVillageSubmit').addClass('btn btn-success');
		$('#cmbVillageSubmit').val(" Submit ");
		$('#txtPatwariArea').val("");
		$('#village_list_here').html('');
	}


	$('body').on('click', '.patwariIDForVillage', function(){
		$('#this_msg_for_village').html("");
		var str;
		str = this.id;
		data_ = str.split("~");
		pid_ = '#PID_'+data_[0]+"_";
		p_name = data_[1];
		p_area = data_[2];

		$('#txtPatwariID').val(data_[0]);
		$('#patwari_name_for_village').html('| - '+p_name);
		$('#patwari_area_for_village').html('| - '+p_area);
		$('#vlist_').html("for "+p_name);
		$(".pid_pallets").css("border","#f0f0f0 solid 1px");
		$(pid_).css('border','#dd0379 solid 2px');

		url_ = site_url_ + "/village/getVillages/"+data_[0];
		$('#village_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);

				var str_html = '';
				var k=0;
				len__ = obj.villages_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#fbefe9";
							k=1;
						} else {
							color = "#effefe";
							k=0;
						}
						if(obj.villages_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 vid_pallets" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="VID_'+obj.villages_[i].VILLAGEID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;'+obj.villages_[i].NAME_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updateVillage" title="Edit Village" id="'+obj.villages_[i].VILLAGEID+"-"+obj.villages_[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="VillageIDActiveInactive" id="'+obj.villages_[i].VILLAGEID+'/'+obj.villages_[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#village_list_here').html(str_html);
			},error: function(xhr, status, error){
				alert(error);
	        }
		});
	});

	$('#patwari_list_for_villages_here').change(function(){
		url_ = site_url_ + "/village/getActivePatwaris";
		$('#patwari_list_for_villages_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			url:url_,
			type: "POST",
			success: function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.patwaris.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#ECFFE4";
							k=1;
						} else {
							color = "#FFFFE4";
							k=0;
						}
						icon_ = "eye-open";
						status = "";
					str_html = str_html + '<div class="col-sm-12" style="border: #ff0000 solid 0px; padding: 0px"><div style="overflow: hidden; width:100%; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="VPID_'+obj.patwaris[i].PID+'_" class="paaid_pallets">';
					str_html = str_html + '<div class="col-sm-2 col-xs-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10 col-xs-10" style="border: #000000 solid 0px; ">';
					str_html = str_html + '<div style="float: left; padding: 0px;border: #000000 solid 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i><span class="patwari_name_">&nbsp;'+obj.patwaris[i].NAME_+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;border: #000000 solid 0px;">';
					str_html = str_html + '<a href="#" class="patwariIDForPatwariArea_2" title="Call Patwari Area for Patwari" id="P~'+obj.patwaris[i].PID+'~'+obj.patwaris[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-share-alt"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: left; padding: 0px; margin-top: 0px; border: #000000 solid 0px; ">';
					str_html = str_html + '<i class="glyphicon glyphicon-earphone"></i>&nbsp;'+obj.patwaris[i].PHONE_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both"></div>';
					str_html = str_html + '<div style="float: right; padding: 0px; margin-top: 0px">';
					str_html = str_html + '<span class="tehsil_label">Tehsil</span><span class="tehsil_name">'+obj.patwaris[i].TEHSIL+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div></div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';

				}
				$('#patwari_list_for_villages_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_for_villages_here').html("Some server error. Please try again !!");
	        }
	    });
	});
	$('body').on('click', '.patwariIDForPatwariArea_2', function(){
		str = this.id;
			idarr = str.split("~");
			name_ = idarr[2];
			pid_ = idarr[1];
			
			url_ = site_url_ + "/village/getPatwariAreas/"+pid_;
			
			$('#patwari_name_for_village').html('| - '+name_);
			$('#patwari_area_for_village').html('| - ');
			$('#village_name_for_village').html('| - ');

			$('.disableInputVillageArea').val('');
			$('.disableInputVillageArea').removeClass('orange_');
			$('.disableInputVillageArea').prop('disabled',true);
			$('.disableInputVillageArea').val('');
			
			$('#cmbPASubmit').removeClass('btn btn-danger');
			$('#cmbPASubmit').addClass('btn btn-success');
			$('#cmbPASubmit').val(" Submit ");
			$('#txtPatwariArea').val("");
			$('#village_list_here').html('');
			$('.paaid_pallets').css("border", '#f0f0f0 solid 1px');
			$('#VPID_'+pid_+'_').css("border", '#009000 solid 2px');
		$('#patwari_area_list_for_villages_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);

				var str_html = '';
				var k=0;
				len__ = obj.patwariAreas_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#92FAB8";
							k=1;
						} else {
							color = "#F4FF68";
							k=0;
						}
						if(obj.patwariAreas_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 paaaid_pallets" style="width:95%;background: '+color+'; padding: 0px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="VPAID_'+obj.patwariAreas_[i].PAID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '&nbsp;&nbsp;'+obj.patwariAreas_[i].PATWARIAREA;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="selectPatwariArea_for_village" title="Select Patwari Area" id="PA~'+obj.patwariAreas_[i].PAID+'~'+obj.patwariAreas_[i].PATWARIAREA+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-share-alt"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#patwari_area_list_for_villages_here').html(str_html);
			},error: function(xhr, status, error){
				$('#patwari_area_list_for_villages_here').html(error);
	        }
	    });
	});
	$('#village_list_here').change(function(){
		$('#village_list_here').html("");
	});
	$('body').on('click', '.selectPatwariArea_for_village', function(){
		var str, paid_;
		str = this.id;

		arri = str.split('~');
		paid_ = arri[1]
		name_ = arri[2];
		url_ = site_url_ + "/village/getVillages/"+paid_;
		
		$('#txtPatwariAreaID_for_village').val(paid_);
		$('#patwari_area_for_village').html('| - '+name_);

		$('.paaaid_pallets').css("border", '#f0f0f0 solid 1px');
		$('#VPAID_'+paid_+'_').css("border", '#000090 solid 2px');

		
		// reset the village list and form
			$('#village_name_for_village').html('');

			$('.disableInputVillageArea').val('');
			$('.disableInputVillageArea').removeClass('orange_');
			$('.disableInputVillageArea').prop('disabled',true);
			$('.disableInputVillageArea').val('');

			$('#cmbVillageSubmit').removeClass('btn btn-danger');
			$('#cmbVillageSubmit').addClass('btn btn-success');
			$('#cmbVillageSubmit').val(" Submit ");

		// -------------------------------
		$('#village_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.villages_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#fbefe9";
							k=1;
						} else {
							color = "#effefe";
							k=0;
						}
						if(obj.villages_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 vid_pallets" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="VID_'+obj.villages_[i].VILLAGEID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;'+obj.villages_[i].NAME_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updateVillage" title="Edit Village" id="'+obj.villages_[i].VILLAGEID+"-"+obj.villages_[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="VillageIDActiveInactive" id="'+obj.villages_[i].VILLAGEID+'/'+obj.villages_[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#village_list_here').html(str_html);
			},error: function(xhr, status, error){
				alert(error);
	        }
		});
	});
	$('#patwari_area_list_for_villages_here').change(function(){

	});
	function villageListofPatwariArea(){
		var str, paid_;
		paid_ = $('#txtPatwariAreaID_for_village').val();
		
		url_ = site_url_ + "/village/getVillages/"+paid_;

		$('#village_list_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
		$.ajax({
			type: "POST",
			url: url_,
			success:  function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				var k=0;
				len__ = obj.villages_.length;
				for(i=0; i<len__; i++){ 
						if(k == 0){ 
							color = "#fbefe9";
							k=1;
						} else {
							color = "#effefe";
							k=0;
						}
						if(obj.villages_[i].STATUS_ == 0){
							icon_ = "eye-close";
							status = "opacity: .1";
						} else {
							icon_ = "eye-open";
							status = "";
						}
					str_html = str_html + '<div class="col-sm-12 vid_pallets" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="VID_'+obj.villages_[i].VILLAGEID+'_">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;'+obj.villages_[i].NAME_;
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updateVillage" title="Edit Village" id="'+obj.villages_[i].VILLAGEID+"-"+obj.villages_[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="VillageIDActiveInactive" id="'+obj.villages_[i].VILLAGEID+'/'+obj.villages_[i].STATUS_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-'+icon_+'" style="color: #000000"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';
				}
				$('#village_list_here').html(str_html);
			},error: function(xhr, status, error){
				alert(error);
	        }
		});
	}
	$('#frmVillage').submit(function(){
		if($('#txtPatwariAreaID_for_village').val() != ""){
			data_ = $('#frmVillage').serialize();

			url_ = site_url_ + "/village/UpdateVillage";
			$('#this_msg_for_village').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');

			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				success: function(data){
					//if(data != 'Village already exists!!'){
						$('#txtVillageName').val("");
						$('#txtKanoongoArea').val("");
						$('#txtGramPanchayat').val("");
						$('#txtNyayPanchayat').val("");
						$('#txtVanPanchayat').val("");
						$('#txtParliamentaryCons').val("");
						$('#txtAssemblyCons').val("");
						$('#txtPollingBoothName').val("");
						$('#txtRegularRevenuePolice').val("");
						//$('#cmbVillageReset').click();
					//}
					$('#this_msg_for_village').html(data);
					villageListofPatwariArea();
				}, error: function(xhr, status, error){
					alert(error);
		        }
			});
		} else {
			alert("Select Patwari Area Name First.");
		}
		return false;
	});
	// --------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> End of Village Modules
	// ---------------------------xxxxxxxxxxxxxxxxxxx---------------------------------
	$("#frmWhoswho").on('submit',(function(e){
		e.preventDefault();
		url_ = site_url_ + "/whoswho/updatewhoswhodetail";
		data_ = new FormData($(this)[0]);
		$.ajax({
			url:url_,
			type: "POST",
			data:  data_,
			async: false,
	        cache: false,
	        contentType: false,
	        processData: false,
			success: function(data){
				var obj = JSON.parse(data);
				$('#photo_').html('<img src="'+base_path+"assets_/post_name_for_department/"+obj.PHOTO_PATH+'" width="90" />')
				$("#this_msg").html(obj.message);
			}, error: function(xhr, status, error){
				$('#this_msg').html("Some server error. Please try again !!");
	        }	        
		});
	return false;
	}));
	$('#changepwdbutt').click(function(){
		if($.trim($('#old_pwd').val()) == ''){
			$('#msg_').html("X: Please mention your old password");
		} else if($.trim($('#new_pwd').val()) == ''){
			$('#msg_').html("X: New password should not be left blank.");
		} else if($.trim($('#new_pwd').val()) != $.trim($('#new_re-pwd').val())){
			$('#msg_').html("X: Please confirm the new password correctly.");
		} else {
			url_ = site_url_ + '/c_pwd/changepwd';

			data_ = $('#frm_cpwd').serialize();
			
			$('#msg_').html('<span style="color: #0000ff">Loading...</span>');
			
			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				success: function(data){
					if(data == "All three chances over."){
						$('#fullform').css({'padding':'20px'});
						$('#fullform').html("Please contact administrator to reset your password.<br /><a href='"+site_url_+"/web/logout'>Logout</a>");
					} else {
						if(data == 'good'){
							good = '<span style="padding: 5px; border-radius: 5px; background: #00AA00; color: #ffffff;"> Password changed successfully </span><br /><br />[ <a href="'+site_url_+'/web/login">Click here login again</a> ]';
							$('#fullform').css({'padding':'20px'});
							$('#fullform').html(good);	
						} else {
							$('#msg_').css({'padding':'20px'});
							$('#msg_').html(data);	
						}
					}
					$('#frm_cpwd')[0].reset();
				},

			});
		}
	});
	$('#txtWhoswhoDepartments').change(function(){
		dept_ = $('#txtWhoswhoDepartments').val();
		url_ = site_url_ + "/whoswho/get_whos_whome/"+dept_;
		$('#txtWhoswhome').html("<option value=''>Loading...</option>");
		$('#dept_name').html("| " + $('#txtWhoswhoDepartments').find('option:selected').text());
		$('#post_name').html("| -");
		$.ajax({
			type:'POST',
			url: url_,
			success:function(data){
				$('#txtWhoswhome').empty();
				var obj = JSON.parse(data);
				var str_html = '';
				len__ = obj.whos_who2.length;
				for(i=0; i<len__; i++){
					str_html = str_html + "<option value='"+obj.whos_who2[i].WW2ID+"'>"+obj.whos_who2[i].WHOME+"</option>";
				}
				$('#txtWhoswhome').html(str_html);

				$('#txtName_').val("");
				$('#txtName_').css('color', '#000000');
				$('#txtContact').val("");
				$('#txtContact').css('color', '#000000');
				$('#txtEmail').val("");
				$('#txtEmail').css('color', '#000000');
				$('#txtDesc_').val("");
				$('#txtDesc_').css('color', '#000000');
				$('#photo_').html("");
			},error: function(xhr, status, error){
				$('#txtWhoswhome').html("<option value=''>"+error+"</option>");
	          }
		});
	});
	//$('body').on('change', '#txtWhoswhome', function(){
		$('#txtWhoswhome').change(function(){
		$('#post_name').html("| "+$('#txtWhoswhome').find('option:selected').text());
		ww2id = $('#txtWhoswhome').val();
		url_ = site_url_ + "/whoswho/get_whos_whome_detail/"+ww2id;
		$('#photo_').html('<img src="'+base_path+'/assets_/img/load.GIF" width="20" />');
		$.ajax({
			type:'POST',
			url: url_,
			success:function(data){
				var obj = JSON.parse(data);
				if(obj.whos_who2_detail.length!=0){
					$('#txtName_').val(obj.whos_who2_detail[0].NAME_);
					$('#txtName_').css('color', '#f55202');
					$('#txtContact').val(obj.whos_who2_detail[0].CONTACT);
					$('#txtContact').css('color', '#f55202');
					$('#txtEmail').val(obj.whos_who2_detail[0].EMAIL);
					$('#txtEmail').css('color', '#f55202');
					$('#txtDesc_').val(obj.whos_who2_detail[0].DESC_);
					$('#txtDesc_').css('color', '#f55202');
					$('#photo_').html('<img src="'+base_path+"/assets_/post_name_for_department/"+obj.whos_who2_detail[0].PHOTO_PATH+'" width="90" />')
				} else {
					$('#txtName_').val("");
					$('#txtName_').css('color', '#000000');
					$('#txtContact').val("");
					$('#txtContact').css('color', '#000000');
					$('#txtEmail').val("");
					$('#txtEmail').css('color', '#000000');
					$('#txtDesc_').val("");
					$('#txtDesc_').css('color', '#000000');
					$('#photo_').html("");
				}
			},error: function(xhr, status, error){
				alert(status);
	          }
		});
	});
	$('#txtForType').change(function(){
		if($('#txtForType').val() != 'Other'){
			$('#txtType').val($('#txtForType').val());
		} else {
			$('#txtType').val('');
			$('#txtType').focus();
		}
	});

	$('#txtForAct_').change(function(){
		if($('#txtForAct_').val() != 'pqusa'){
			$('#txtActName').val($('#txtForAct_').val());
		} else {
			$('#txtActName').val('');
			$('#txtActName').focus();
		}
	});
	
	$('#txtForAct_edit').change(function(){
		if($('#txtForAct_edit').val() != 'pqusa'){
			$('#txtActNameEdit').val($('#txtForAct_edit').val());
		} else {
			$('#txtActNameEdit').val('');
			$('#txtActNameEdit').focus();
		}
	});

	$('#txtForAct_newupdate').change(function(){
		if($('#txtForAct_newupdate').val() != 'pqusa'){
			$('#txtActNameNewUpdate').val($('#txtForAct_newupdate').val());
		} else {
			$('#txtActNameNewUpdate').val('');
			$('#txtActNameNewUpdate').focus();
		}
	});
	
	$('#txtForCourt').change(function(){
		if($('#txtForCourt').val() != 'pqusa'){
			$('#txtCourt').val($('#txtForCourt').val());
		} else {
			$('#txtCourt').val('');
			$('#txtCourt').focus();
		}
	});

	$('#txtForCourtEdit').change(function(){
		if($('#txtForCourt').val() != 'pqusa'){
			$('#txtCourtEdit').val($('#txtForCourtEdit').val());
		} else {
			$('#txtCourtEdit').val('');
			$('#txtCourtEdit').focus();
		}
	});
	$('#txtForSection').change(function(){
		if($('#txtForSection').val() != 'pqusa'){
			$('#txtSection').val($('#txtForSection').val());
		} else {
			$('#txtSection').val('');
			$('#txtSection').focus();
		}
	});
	
	$('#txtForSectionEdit').change(function(){
		if($('#txtForSectionEdit').val() != 'pqusa'){
			$('#txtSectionEdit').val($('#txtForSectionEdit').val());
		} else {
			$('#txtSectionEdit').val('');
			$('#txtSectionEdit').focus();
		}
	});

	$('#txtForSectionUpdate').change(function(){
		if($('#txtForSectionUpdate').val() != 'pqusa'){
			$('#txtSectionUpdate').val($('#txtForSectionUpdate').val());
		} else {
			$('#txtSectionUpdate').val('');
			$('#txtSectionUpdate').focus();
		}
	});
	
	$('#txtForTehsilEdit').change(function(){
		if($('#txtForTehsilEdit').val() != 'pqusa'){
			$('#txtTehsilEdit').val($('#txtForTehsilEdit').val());
		} else {
			$('#txtTehsilEdit').val('');
			$('#txtTehsilEdit').focus();
		}
	});
	
	$('#txtForTehsil').change(function(){
		if($('#txtForTehsil').val() != 'pqusa'){
			$('#txtTehsil').val($('#txtForTehsil').val());
		} else {
			$('#txtTehsil').val('');
			$('#txtTehsil').focus();
		}
	});
	$('#txteditForType').change(function(){
		if($('#txteditForType').val() != 'Other'){
			$('#txteditType').val($('#txteditForType').val());
		} else {
			$('#txteditType').val('');
			$('#txteditType').focus();
		}
	});

	$('#txtnewupdateForType').change(function(){
		if($('#txtnewupdateForType').val() != 'Other'){
			$('#txtnewupdateType').val($('#txtnewupdateForType').val());
		} else {
			$('#txtnewupdateType').val('');
			$('#txtnewupdateType').focus();
		}
	});

	/*
	$('#chkStatus').click(function(){ 
		if($('#chkStatus').is(':checked')){
			$('#txtStatus').val(1);
		} else {
			$('#txtStatus').val(0);
		}
	});
	*/
	//PDF upload

	$('#cmbpdfName').change(function(){
		$('#pdf_here').html("");
		$('#pdfName').prop('disabled', false);
		$('#pdfName').val("");
		var str = $('#cmbpdfName').val();
		var arr_ = str.split("~");
		if(arr_[1] == "New"){
			$('#pdfName').focus();
		} else {
			$('#pdfName').val(arr_[1]);
		}
		$('#txtID').val(arr_[0]);
		if(arr_[0] != 'New'){
			$('#pdf_here').change();
		}
	});
	$('#pdf_here').change(function(){
		$('#pdfName').prop('disabled', false);

		if($('#pdfName').val() != ""){
			name_ = $('#txtID').val();
			tip = $('#txtTip').val();
			url_ = url_ = site_url_ + "/pdfUp/showPdfList/"+encodeURIComponent(tip)+"/"+encodeURIComponent(name_);
			$('#pdf_here').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
			$.ajax({
				type: "POST",
				url: url_,
				success: function(data){
					// Show pdf for the selected item
					var str_html='';
					var obj = JSON.parse(data);
					var len_ = obj.selected_record.length;
					if(len_ != 0){
						for(i=0; i<len_;i++){
							if(obj.selected_record[i].PATH_ != ""){
								str_html = str_html + '<div style="float: left; padding: 2px; width:auto;">';
								str_html = str_html + '<div style="background: #f0f0f0; color: #900000; font-weight: bold; min-width: 100px; float: left; padding:5px; border-radius: 5px; border: #C0C0C0 solid 2px">';
								str_html = str_html + '<a href="'+base_path+'/assets_/pdf_others/'+obj.selected_record[i].PATH_+'" target="_blank">';
								str_html = str_html + '<img src="'+base_path+'/assets_/img/pdf.png" style="float: left" width="30"></i>';
								str_html = str_html + '<span style="float: left">'+obj.selected_record[i].NAME_+'</span>';
								str_html = str_html + '</a>'
								str_html = str_html + '</div>';
								str_html = str_html + '</div>';
							}
						}
					}
					// -------------------------------
					$('#pdf_here').html(str_html);
				}, error: function(xhr, status, error){
					alert(xhr.responseText);
		          }
			});
		} else {
			$('#pdf_here').html("No file name found.");
		}
	});
	$('#frmpdfUp').on('submit',function(e){
		$('#pdfName').prop('disabled',false);
		e.preventDefault();
		if($('#pdfName').val() != "" && $('#txtpdffile').val() != ''){
			tip = $('#txtTip').val();
			url_ = url_ = site_url_ + "/pdfUp/uploadPdf/"+tip;
			data_ = new FormData($(this)[0]);
			$('#__reg_err_msg').html('<span>Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" /></span>');
			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				async: false,
		        cache: false,
		        contentType: false,
		        processData: false,
				success: function(data){
					var str_html='';
					var obj = JSON.parse(data);
					$('#__reg_err_msg').html(obj.message);
					setTimeout(location.reload.bind(location), 1000);
					//location.reload(true);
				},error: function(xhr, status, error){
					alert(xhr.responseText);
		          }
			});
		} else {
			$('#__reg_err_msg').html('X: Please enter the file name &amp; select the file.');
		}
	return false;
	});


	$('#txtpdffile').change(function () {
        var file = this.files[0];
        if (((file.size / 1024) > 5020) || (file.type != 'application/pdf')) {
            $('#__reg_err_msg').css('background', '#fdfca1');
            $('#__reg_err_msg').css('color', '#cf4343');
            $('#__reg_err_msg').html(' File should be less than or equal to 5MB and must be (<b>pdf</b>) image file.');
            $('#cmbpdfSubmit').val("Select correct file type &amp; Size...");
            $('#cmbpdfSubmit').prop('disabled', true);
        } else {
            $('#__reg_err_msg').css('background', '#dcffab');
            $('#__reg_err_msg').css('color', '#909090');
            $('#__reg_err_msg').html('&nbsp;Selected picture is fine...');
            $('#cmbpdfSubmit').val(" Update ");
            $('#cmbpdfSubmit').prop('disabled', false);
        }
    });
    $('#txtpdffile').click(function () {
    	$('#__reg_err_msg').css('background', 'transparent');
    	$('#__reg_err_msg').html("");
    });
});