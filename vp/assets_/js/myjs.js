$(function(){
	$('#old_pwd').focus(function(){$('#msg_').html('');});
	$('#new_pwd').focus(function(){$('#msg_').html('');});
	$('#new_re-pwd').focus(function(){$('#msg_').html('');});
	
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

	$('#frmPatwari').submit(function(){
		
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