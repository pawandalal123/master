jQuery(document).ready(function(){

	jQuery("#add_verfier_form").validationEngine();
	jQuery("#edit_verfier_form").validationEngine();
	jQuery("#add_contributor_form").validationEngine();
	jQuery("#edit_contributor_form").validationEngine();
	jQuery("#add_group_form").validationEngine();
	jQuery("#add_user_form").validationEngine();
	jQuery("#edit_user_form").validationEngine();
	jQuery("#save_privilege_form").validationEngine();
	jQuery("#add_employee_form").validationEngine();
	jQuery("#dashboard_search_form").validationEngine();
	jQuery("#add_appeal_form").validationEngine();
	jQuery("#user_login_form").validationEngine();
	jQuery("#uploadEmloyee").validationEngine();
	jQuery("#uploadBatch").validationEngine();
	jQuery("#new_password_form").validationEngine();
	jQuery("#response_appeal_form").validationEngine();
	jQuery("#reopen_appeal_form").validationEngine();
	jQuery("#edit_employee_form").validationEngine();
	jQuery("#update_response_appeal_form").validationEngine();
	//jQuery("#user_aprove_form").validationEngine();
	
	
	$(document).on("click" , ".close", function(){
		$("#dashBoard").hide();
	})
	$(document).on('change', '#country_id',  function(){
		var country_id = $(this).val();
		if(country_id){
			$.ajax({
				url: SITE_URL+'commonfunc/stateList/'+country_id,
				type: "GET",
				//data: 'part=stateList&country_id'+country_id,
				dataType: "html",
				beforeSend: function() {
					},
				success: function( msg ){
					$("#state_id").replaceWith(msg);
				}
			});
		}
		
	})
	$(document).on('change', '#state_id', function(){		
		var state_id = $(this).val();
		if(state_id){
			$.ajax({
				url: SITE_URL+'commonfunc/cityList/'+state_id,
				type: "GET",
				dataType: "html",
				beforeSend: function() {
					},
				success: function( msg ){
					$("#city_id").replaceWith(msg);
				}
			});
		}
		
	})
	
	/*
	$(document).on('change', '#companyID', function(){
		var company_id = $(this).val();
		if(company_id != ''){
			//alert('company_id ==> '+company_id);
			$.ajax({
				url:SITE_URL+'commonfunc/roles',
				type: 'POST',
				data:{'company_id':company_id},
				beforeSend:function(data){
				},
				success:function(data){
					$('#role').val(data);
				}
			});
		} else {
			$('#role').val('');
		}
	});
	*/
	
	$(document).on('click', '#is_verifier', function(){
		if($(this).is(':checked')){
			$('#is_verifier_label').show();
			$('#contributor_verifier_id').show();
			//$('#contributor_verifier_id').addClass('validate[required]');
		} else{
			$('#is_verifier_label').hide();
			$('#contributor_verifier_id').hide();
			//$('#contributor_verifier_id').removeClass('validate[required]');
		}
	});
	
	$(document).on('change', '#add_user_role', function(){
		var role_id = $(this).val();
		$.ajax({
				url:SITE_URL+'commonfunc/companyList',
				type: 'POST',
				data:{'role_id':role_id},
				beforeSend:function(data){
				},
				success:function(data){
					$('#user_companyID').html(data);
				}
			});
	});
	
	$(document).on('change', '#search_company_id', function(){
		var search_company_id = $(this).val();
		if(search_company_id != ''){
			$.ajax({
				url:SITE_URL+'commonfunc/criteriaList',
				type: 'POST',
				data:{'search_company_id':search_company_id},
				beforeSend:function(data){
				},
				success:function(data){
					$('#search_criteria_id').html(data);
					$('#load_search_field').html('');
				}
			});
		} else {
			$('#search_criteria_id').html('<option value="">Select Search Criteria</option>');
		}	
	});
	
	$(document).on('change', '#search_criteria_id', function(){
		var search_criteria_id = $(this).val();
		var serach_type           = $('#serach_type').val(); 
		//alert('serach_type = '+serach_type);
		if(search_criteria_id != ''){
			$.ajax({
				url:SITE_URL+'commonfunc/criteria_fields',
				type: 'POST',
				data:{'search_criteria_id':search_criteria_id, 'serach_type':serach_type},
				beforeSend:function(data){
					$('#load_search_field').html('<tr><td align="center"><img src="'+SITE_URL+'icons/h_loading.gif" /></td></tr>');
				},
				success:function(data){
					$('#load_search_field').html(data);
				}
			});
		} else {
			$('#load_search_field').html('');
		}	
	});

	
	$(document).on('change', '#record_source_id',  function(){
		var record_source_id = $(this).val();
		window.location = SITE_URL+'employees/add/'+record_source_id;
		
		/*if(record_source_id != ''){
			$.ajax({
				url: SITE_URL+'commonfunc/inputfields',
				type: "POST",
				data:{'record_source_id':record_source_id},
				dataType: "html",
				beforeSend: function() {
					},
				success: function( msg ){
					$("#contentData").html(msg);
				}
			});
		} */
		
	})
	
	$('#dashboard_search_submit').click( function(){
		var flag = false;
		var form_data = $('#dashboard_search_form').serialize();
		var val = $("#company_name").val();
		var file = $("#search_file").val();
		if(val != "" && file!= ''){
			$.ajax({
				url: SITE_URL+'commonfunc/checkSearchDuplicate',
				type: "POST",
				data:form_data,
				dataType: "html",
				beforeSend: function() {},
				success: function(data){
					if(data == 'Error'){
						var res = confirm("This search has already been performed by you, if you proceed then it will be chargeable?");
						if(res){
							$('#dashboard_search_form').submit();
						}
					}else{
						$('#dashboard_search_form').submit();
					}
				}
			});
		}else{
			$('#dashboard_search_form').submit();
		}
		
	});
	$(document).on('click' , ".disclamer_action" ,function(){
		var src = $(this).attr('src');
		var Html = '<input type="hidden" value="'+src+'" name="data" />';
		$("#contentDiv").html(Html);
		$('#disclamerForm').submit();
		})
	$("#downloadReport").click(function(){	
		$('#generateRe').attr("action" , SITE_URL+'reports/downloadreportdata');
		$('#generateRe').submit();
		
	});
	$("#generateReport").click(function(){	
		$('#generateRe').attr("action" , SITE_URL+'reports');
		$('#generateRe').submit();		
	});
	$(document).on('change', '.takeemployeeaction',  function(){
		var employeeId = $(this).attr("id");
		var action = $(this).val();
		if(action){
			$.ajax({
				url: SITE_URL+'commonfunc/employeeAction',
				type: "POST",
				data:{'employeeId':employeeId ,'action': action },
				dataType: "html",
				beforeSend: function() {
				},
				success: function( msg ){
					var data = JSON.parse(msg);
					window.location = SITE_URL+''+data.url;
				}
			});
		}		
	});
	$(document).on('change', '.takeemployeeactionAll',  function(){
		var employeeId = [];
		$(".candidateIds").each(function(){
			if($(this).prop("checked")){
				employeeId.push($(this).val());
			}
		})
		
		var action = $(this).val();
		if(action){
			$.ajax({
				url: SITE_URL+'commonfunc/employeeActionAll',
				type: "POST",
				data:{'employeeId':employeeId ,'action': action },
				dataType: "html",
				beforeSend: function() {
				},
				success: function( msg ){
					
					var data = JSON.parse(msg);
					window.location = SITE_URL+''+data.url;
				}
			});
		}		
	});
	
	$(document).on('focus' , '.datepicker' , function(){
		$(this).datepicker({ changeYear: true , changeMonth: true, dateFormat: "yy-mm-dd" , yearRange: "1920:2020"});
	});
	
	$(document).on('focus' , '.search_date_picker' , function(){
		$(this).datepicker({ changeYear: true , changeMonth: true, dateFormat: "dd-M-yy" , yearRange: "1920:2020"});
	});
	
	$(document).on("change", ".actionTaken" , function(){
		var ids  = $("#newCandidateId").val();
		var oldCandidate  = $(".oldCandidate:checked").val();
		var val = $(this).val();
		//alert(val);
		/**/
		if(val == 'MD'){
			if(!oldCandidate){
				alert("Please select candidate for mark duplicate");
				return false;
			}
		} else if(val == 'DO'){
			if(!oldCandidate){
				alert("Please select candidate for Discard");
				return false;
			}
		}
		
		if(val){
			$.ajax({
				url: SITE_URL+'employees/duplicationAction',
				type: "POST",
				dataType: "html",
				data:{'candidate_ids':ids , 'action_taken':val , 'oldCandidate':oldCandidate},
				beforeSend: function() {
					},
				success: function( msg ){
					alert(msg);
					window.location = SITE_URL+'employees/listduplicate'
				}
			});
		}
		/**/
	});
	
	$(document).on('click' , ".batch_status" , function(){
		var val = $(this).attr("id");
		if(val){
			$.ajax({
				url: SITE_URL+'employees/updatebatchstatus',
				type: "POST",
				dataType: "html",
				data:{'batch_id': val},
				beforeSend: function() {
					},
				success: function( msg ){
					
				}
			});
		}
		
	});
	
	$('.company_action').change(function(e){

		var val = $(this).val();
		var company_id = $(this).attr('id');
		var response = true;
		if(val != '' && company_id != ''){
			if(val == 'inactive'){
				response = confirm("Do you really want to take this action?");
			}
			if(response == true){
				$.ajax({
					url: SITE_URL+'commonfunc/actions',
					data:{'action':val, 'company_id':company_id},
					type: "POST",
					dataType: "html",
					beforeSend: function() {
					},
					success: function( msg ){
						window.location = SITE_URL+''+msg;
					}
				});
			}
		}
	});
	
	$('.verifier_action').change(function(e){

		var val = $(this).val();
		var company_id = $(this).attr('id');
		
		if(val != '' && company_id != ''){
			$.ajax({
				url: SITE_URL+'commonfunc/actions/v',
				data:{'action':val, 'company_id':company_id},
				type: "POST",
				dataType: "html",
				beforeSend: function() {
				},
				success: function( msg ){
					window.location = SITE_URL+''+msg;
				}
			});
		}
	});
	
	$('#eployee_upload_company_list').change(function(e){
		var company_id = $(this).val();
		window.location = SITE_URL+'employees/upload/'+company_id;
	});
	
	$('#uploaded_file_employer_id').change(function(e){
		var employer_id = $(this).val();
		var status      = $('#uploaded_file_status').val();
		window.location = SITE_URL+'employees/uploadedFiles/'+status+'/'+employer_id;
	});
	$('#employer_list').change(function(e){
		
		var employer_id = $(this).val();
		if(employer_id){
			var status      = $('#status').val();
			window.location = SITE_URL+'employees/index/'+status+'/'+employer_id;
		}
	});
	$('#candidateIds').click(function(){
		
		if($(this).prop("checked")){
			
			$(".candidateIds").each(function(){
				$(this).prop("checked" ,"checked");
			})
		}else{
			
			$(".candidateIds").each(function(){
				$(this).prop("checked" ,"");
			})
		}
	})
	$('#user_list').change(function(e){
		var employer_id = $(this).val();
		var status      = $('#status').val();
		window.location = SITE_URL+'users/index/'+employer_id+'/'+status;
	});
	$('#statusUser').change(function(e){
		var status = $(this).val();
		var employer_id      = $('#employer_id').val();
		window.location = SITE_URL+'users/index/'+employer_id+'/'+status;
	});
	$('#listduplicate').change(function(e){
		var employer_id = $(this).val();		
		window.location = SITE_URL+'employees/listduplicate/'+employer_id;
	});
	$('#uploaded_file_status').change(function(e){
		var employer_id = $('#uploaded_file_employer_id').val();
		var status      = $(this).val();
		window.location = SITE_URL+'employees/uploadedFiles/'+status+'/'+employer_id;
	});
	
	$('#appeal_filter').change(function(e){
		var status = $(this).val();
		window.location = SITE_URL+'appeals/index/'+status;
	});
	
	$('.user_status_action').click(function(e){
		var action_obj = $(this);
		var action = action_obj.attr('id');
		var src = SITE_URL+'icons/loading.gif';
		if(action != ''){
			$.ajax({
				url: SITE_URL+'users/actions/',
				data:{'action':action},
				type: "POST",
				dataType: "html",
				beforeSend: function() {
					action_obj.attr('src', src);
				},
				success: function( msg ){
					var data = JSON.parse(msg);
					var src1 = SITE_URL+'icons/active.png';
					var title = '';
					var action_id = '';
					if(data.image == 'Active'){
						src = SITE_URL+'icons/inactive.png';
						title = 'Inactive';
						action_id = 'Inactive_'+data.actionId;
					}else{
						src = SITE_URL+'icons/active.png';
						src1 = SITE_URL+'icons/inactive.png';
						title = 'Active';
						action_id = 'Active_'+data.actionId;
					}
					
					if(data.type == 'success'){
						action_obj.attr('src', src);
						action_obj.attr('id', action_id);
						action_obj.attr('title', title);
					}else{
						action_obj.attr('src', src1);
					}
				}
			});
		}
	});
	$('#download_search_list_report').click(function(e){
		//alert('hello');
		var form_data = $('#generate_search_report_form').serialize();
		//alert(form_data);
		window.location = SITE_URL+'reports/downloadSearchReports?'+form_data;
	});
	$("#verifierList").on('change' ,function(){
		$("#list_verifier_id").val($(this).val());
		var form_data = $('#generate_search_report_form').serialize();
		$('#generate_search_report_form').submit();
		
	});
	$( "#search_list_datefrom" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		maxDate: '+0D',
		dateFormat: 'yy-mm-dd',
		onClose: function( selectedDate ) {
		$( "#search_list_dateto" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	
	$( "#search_list_dateto" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 1,
		maxDate: '+0D',
		dateFormat: 'yy-mm-dd',
		onClose: function( selectedDate ) {
		$( "#search_list_datefrom" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
	
	$(document).on('click', '.employee_action_icons',  function(){
		var actionData = $(this).attr("id");
		actionData = actionData.split('_');
		var employeeId = actionData[1];
		var action = actionData[0];
		//alert('Employee ID = '+employeeId+', Action = '+action);
		if(action == 'view'){
			window.location = SITE_URL+'employees/employeeDetails/'+employeeId;
		} else if(action == 'edit'){
			window.location = SITE_URL+'employees/edit/'+employeeId;
		} else {
			$.ajax({
				url: SITE_URL+'commonfunc/employeeAction',
				type: "POST",
				data:{'employeeId':employeeId ,'action': action },
				dataType: "html",
				beforeSend: function() {
				},
				success: function( msg ){
					var data = JSON.parse(msg);
					window.location = SITE_URL+''+data.url;
				}
			});
		}		
	});
	
	$(document).on('click', '.employee_edit_action_icons',  function(){
		var editObj = $(this);
		var actionData = editObj.attr("id");
		actionData = actionData.split('_');
		var employeeId = actionData[1];
		var action = actionData[0];
		//alert(employeeId+' == '+action);
		if(employeeId != '' && action == 'edit'){
			$.ajax({
				url: SITE_URL+'commonfunc/isCandidateSearched',
				type: "POST",
				data:{'employeeId':employeeId},
				dataType: "html",
				beforeSend: function() {
					$("#page_hide").show();
					//editObj.removeClass('employee_edit_action_icons');
					//editObj.attr('src', SITE_URL+'icons/loading.gif');
				},
				success: function( msg ){
					if(msg == 'True'){
						var res = confirm("Verification has been conducted on this record in past. Are you sure you want to edit this entry?");
						if(res){
							window.location = SITE_URL+'employees/edit/'+employeeId;
						}
						$("#page_hide").hide();
						//editObj.addClass('employee_edit_action_icons');
						//editObj.attr('src', SITE_URL+'icons/edit.png');
						return false;
					} else {
						window.location = SITE_URL+'employees/edit/'+employeeId;
					}
				}
			});
		}
	});
	
	$('#search_contributor_list_id').change(function(e){
		//alert($(this).val());
		var ver_id = $('#list_verifier_id').val();
		if(ver_id == ''){
			$('#list_verifier_id').val('all');
		}
		$("#list_contributor_id").val($(this).val());
		var form_data = $('#generate_search_report_form').serialize();
		//alert(form_data);
		$('#generate_search_report_form').submit();
	});
});
