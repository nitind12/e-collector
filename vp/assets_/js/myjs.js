$(function(){
	$('#old_pwd').focus(function(){$('#msg_').html('');});
	$('#new_pwd').focus(function(){$('#msg_').html('');});
	$('#new_re-pwd').focus(function(){$('#msg_').html('');});

	$( window ).on( "load", function(){
		$('#patwari_list_here').change();
		$('#patwari_list_for_villages_here').change();
	});
	$('body').on('click', '.patwariIDActiveInactive', function(){
		var url_ = site_url_ + "/patwari_village/activeInactivePatwari/"+this.id;
		$('#load_here_edit_actinact').html('<img src="'+base_path+'/assets_/img/load.GIF" width="10" />');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				//$('#load_here_edit_actinact').html(obj.message.msg_);
				$('#load_here_edit_actinact').html('');
				// affected ones
				$('#patwari_list_here').change();
				$('#village_list_here').change();
				$('#patwari_list_for_villages_here').change();
				$('#patwari_name_for_village').html('| -');
				$('#cmbVillageReset').click();
				// -------------
			}
		});
	});
	$('body').on('click', '.patwariID', function(){
		var url_ = site_url_ + "/patwari_village/getPatwari/"+this.id;
		$('#load_here_edit_actinact').html('<img src="'+base_path+'/assets_/img/load.GIF" width="10" />');
		$.ajax({
			type: "POST",
			url: url_,
			success: function(data){
				var obj = JSON.parse(data);
				if(obj.patwari.length != 0){
					$('#editPatwari').css("display","block");
					$('#txtpatwariName_edit').val(obj.patwari.NAME_);
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
		url_ = site_url_ + "/patwari_village/updatePatwari/"+pid;
		data_ = new FormData($(this)[0]);
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
					$('#txtpaContact_edit').val('');
					$('#txtpaPhoto_edit').val('');
				}
				// affected ones
				$('#patwari_list_here').change();
				$('#village_list_here').change();
				$('#patwari_list_for_villages_here').change();
				$('#patwari_name_for_village').html('| -');
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
		url_ = site_url_ + "/patwari_village/getPatwaris";
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
					str_html = str_html + '<div class="col-sm-12" style="background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'">';
					str_html = str_html + '<div class="col-sm-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10">';
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
					str_html = str_html + '</div>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="clear: both; padding: 5px"></div>';

				}
				$('#patwari_list_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_here').html("Some server error. Please try again !!");
	        }
	    });
	});
	$('#frmPatwari').submit(function(e){
		e.preventDefault();
		url_ = site_url_ + "/patwari_village/submitPatwari";
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
				if(obj.message.res_ == 'true'){
					$('#txtpatwariName').val('');
					$('#txtpaContact').val('');
					$('#txtpaPhoto').val('');
				}
				$("#this_msg").html(obj.message.msg_);
				// affected ones
				$('#patwari_list_here').change();
				$('#village_list_here').change();
				$('#patwari_list_for_villages_here').change();
				$('#patwari_name_for_village').html('| -');
				// -------------
			}, error: function(xhr, status, error){
				$('#this_msg').html("Some server error. Please try again !!");
	        }	
	    });
	});

	/*Village Code below*/
	$('#village_list_here').change(function(){
		$('#village_list_here').html("");
	});
	$('body').on('click', '.patwariIDForVillage', function(){
		$('#this_msg_for_village').html("");
		var str;
		str = this.id;
		data_ = str.split("-");
		pid_ = '#PID_'+data_[0]+"_";
		p_name = data_[1];
		$('#txtPatwariID').val(data_[0]);
		$('#patwari_name_for_village').html('| - '+p_name);
		$('#vlist_').html("for "+p_name);
		$(".pid_pallets").css("border","#f0f0f0 solid 1px");
		$(pid_).css('border','#dd0379 solid 2px');

		url_ = site_url_ + "/patwari_village/getVillages/"+data_[0];
		
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
					str_html = str_html + '<div class="col-sm-12" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;<span style="font-size:11px; background:#505050; border-radius:3px; color:#ffffff; padding: 3px">'+obj.villages_[i].TEHSIL+'</span>&nbsp;&nbsp;'+obj.villages_[i].NAME_+', <span style="color: #D0D0D0; font-size: 13px">('+obj.villages_[i].DISTRICT+')</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updateVillage" title="Edit Village" id="'+obj.villages_[i].VILLAGEID+"-"+obj.villages_[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="VillageIDActiveInactive" id="'+obj.villages_[i].PID+'/'+obj.villages_[i].STATUS_+'">';
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
	function villageListofPatwari(){
		var pid_;
		pid_ = $('#txtPatwariID').val();

		url_ = site_url_ + "/patwari_village/getVillages/"+pid_;
		
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
					str_html = str_html + '<div class="col-sm-12" style="width:95%;background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'">';
					str_html = str_html + '<div class="col-sm-12">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;<span style="font-size:11px; background:#505050; border-radius:3px; color:#ffffff; padding: 3px">'+obj.villages_[i].TEHSIL+'</span>&nbsp;&nbsp;'+obj.villages_[i].NAME_+', <span style="color: #D0D0D0; font-size: 13px">('+obj.villages_[i].DISTRICT+')</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="updateVillage" title="Edit Village" id="'+obj.villages_[i].VILLAGEID+"-"+obj.villages_[i].NAME_+'">';
					str_html = str_html + '<i class="glyphicon glyphicon-edit"></i>';
					str_html = str_html + '</a>';
					str_html = str_html + '&nbsp;<a href="#" title="Active-Inactive Village" class="VillageIDActiveInactive" id="'+obj.villages_[i].PID+'/'+obj.villages_[i].STATUS_+'">';
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
		if($('#txtPatwariID').val() != ""){
			data_ = $('#frmVillage').serialize();
			url_ = site_url_ + "/patwari_village/UpdateVillage";
			$('#this_msg_for_village').html('Loading <img src="'+base_path+'/assets_/img/load.GIF" width="10" />');

			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				success: function(data){
					if(data != 'Village already exists!!'){
						$('#txtVillageName').val("");
						$('#txtKanoongoArea').val("");
						$('#txtGramPanchayat').val("");
						$('#txtNyayPanchayat').val("");
						$('#txtVanPanchayat').val("");
						$('#txtParliamentaryCons').val("");
						$('#txtAssemblyCons').val("");
						$('#txtPollingBoothName').val("");
						$('#txtRegularRevenuePolice').val("");
						$('#cmbVillageReset').click();
					}
					$('#this_msg_for_village').html(data);
					villageListofPatwari();
				}, error: function(xhr, status, error){
					alert(error);
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
		$('.disableInputVillageArea').removeAttr('disabled');
		if(id != "newVillage"){
			str = id;
			idarr = str.split("-");
			name_ = idarr[1];
			id = idarr[0];
			$('#village_name_for_village').html('| -'+name_);
			$('.disableInputVillageArea').addClass('orange_');
			$('#cmbVillageSubmit').addClass('btn btn-danger');
			$('#cmbVillageSubmit').val(" Update ");

			url_ = site_url_ + "/patwari_village/getVillageData/"+id;

			$.ajax({
				type: 'POST',
				url: url_,
				success: function(data){
					var obj = JSON.parse(data);
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
				}, error: function(xhr, status, error){
					alert(error);
		        }
			})
		} else {
			name_ = "";
			$('#village_name_for_village').html('| -'+name_);
			$('#cmbVillageSubmit').removeClass('btn btn-danger');
			$('#cmbVillageSubmit').addClass('btn btn-success');
			$('#cmbVillageSubmit').val(" Submit ");
			$('#cmbVillageReset').click();
			$('.disableInputVillageArea').removeClass('orange_');
			$('#cmbTehsilForVillage').focus();
		}
		$('#txtVillageID').val(id);
	});
	$('#cmbVillageReset').click(function(){
		$('#cmbVillageSubmit').removeClass('btn btn-danger');
		$('#cmbVillageSubmit').addClass('btn btn-success');
		$('#cmbVillageSubmit').val(" Submit ");
		$('.disableInputVillageArea').removeClass('orange_');
	});
	$('#village_list_here').change(function(){
		url_ = site_url_ + "/patwari_village/getActivePatwaris";
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
					str_html = str_html + '<div class="col-sm-12" style="padding: 0px"><div style="overflow: hidden; width:100%; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PID_'+obj.patwaris[i].PID+'_" class="pid_pallets">';
					str_html = str_html + '<div class="col-sm-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i><span class="patwari_name_">&nbsp;'+obj.patwaris[i].NAME_+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="patwariIDForVillage" title="Call Patwari for Village Entry" id="'+obj.patwaris[i].PID+'-'+obj.patwaris[i].NAME_+'">';
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
				$('#patwari_list_for_villages_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_for_villages_here').html("Some server error. Please try again !!");
	        }
	    });
	});
	$('#patwari_list_for_villages_here').change(function(){
		url_ = site_url_ + "/patwari_village/getActivePatwaris";
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
					str_html = str_html + '<div class="col-sm-12" style="padding: 0px"><div style="overflow: hidden; width:100%; background: '+color+'; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 10px;'+status+'" id="PID_'+obj.patwaris[i].PID+'_" class="pid_pallets">';
					str_html = str_html + '<div class="col-sm-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 10px; padding: 0px">';
					str_html = str_html + '<img src="'+base_path+'assets_/patwari_pics/'+obj.patwaris[i].PHOTO_+'" style="float: left" width="60" />';
					str_html = str_html + '</div>';
					str_html = str_html + '<div class="col-sm-10">';
					str_html = str_html + '<div style="float: left; padding: 0px;">';
					str_html = str_html + '<i class="glyphicon glyphicon-user"></i><span class="patwari_name_">&nbsp;'+obj.patwaris[i].NAME_+'</span>';
					str_html = str_html + '</div>';
					str_html = str_html + '<div style="float: right; padding: 0px;">';
					str_html = str_html + '<a href="#" class="patwariIDForVillage" title="Call Patwari for Village Entry" id="'+obj.patwaris[i].PID+'-'+obj.patwaris[i].NAME_+'">';
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
				$('#patwari_list_for_villages_here').html(str_html);
			}, error: function(xhr, status, error){
				$('#patwari_list_for_villages_here').html("Some server error. Please try again !!");
	        }
	    });
	});
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
});