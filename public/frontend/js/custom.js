//general function
function isJson(item) {
    item = typeof item !== "string"
        ? JSON.stringify(item)
        : item;

    try {
        item = JSON.parse(item);
    } catch (e) {
        return false;
    }

    if (typeof item === "object" && item !== null) {
        return true;
    }

    return false;
}



//profile update

	formleftprofile = $('form#formleftprofile');
	formleftprofile.submit(function(e){
		jQuery.noConflict();
		e.preventDefault();
		
		var firstname = formleftprofile.find('input#firstname').val();
		var lastname = formleftprofile.find('input#lastname').val();
		var mobilephone = formleftprofile.find('input#mobilephone').val();
		var phone = formleftprofile.find('input#phone').val();
		var address = formleftprofile.find('input#address').val();
		var confirmcurrentpassword = formleftprofile.find('input#confirmcurrentpassword').val();
		var confirmnewpassword = formleftprofile.find('input#confirmnewpassword').val();
		var newpassword = formleftprofile.find('input#newpassword').val();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
	        type: 'POST',
	        data: {firstname: firstname, lastname: lastname, mobilephone: mobilephone, phone: phone, address: address, confirmcurrentpassword: confirmcurrentpassword,
	        	confirmnewpassword: confirmnewpassword, newpassword: newpassword},
	        dataType: 'json',
	        success: function(data){
	        	console.log(data.message);
	        	var showerror = formleftprofile.find('span.errors');
	        	showerror.addClass('hidden');

	        	formleftprofile.find('.form-group').each(function(){
	        		$(this).removeClass('has-error');
	        		$(this).find('.help-block').remove();
	        	});
	        	if(data.code == 0){
	        		var errors = data.errors;
	        		if(isJson(errors)){
	        			for(var key in errors){

		        			var $id = formleftprofile.find('#' + key);

		        			var i;
		        			$finddiv = formleftprofile.find($id).parent();
		        			$finddiv.addClass('has-error');
		        			
		        			if(errors.hasOwnProperty(key)){
		        				if(errors[key].length>0){
	                                for(i=0; i<errors[key].length;i++){
	                                	html = '';
	                                	html += '<span class="help-block mb-0">';
	                                	html += errors[key][i];
	                                	html += '</span>';
	                                	$finddiv.append(html);
									}
	                            }
		        			}
		        		}
	        		
	        		}else if(typeof errors === 'string' || errors instanceof String){
	        			showerror.append(errors).removeClass('hidden');
	        		}
	        	}else if(data.code==1){
	        		html = '';
        			html += '<div class="modal fade" id="successnotify" tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true">';
        			html += '<div class="modal-dialog modal-md">';
        			html += '<div class="modal-content">';
        			html += '<div class="modal-body">';
        			html += '<h4 class="text-center">' + data.message + '...</h4>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			$('body').append(html);
        			$('#successnotify').modal('show');

	        		setTimeout(function(){
	        			window.location.href = '/profile';
						$('body #successnotify').modal('hide');
	        			$('body #successnotify').remove();

	        		}, 3000);	
        			
        		}
	        	
	        },
	        error:function(){

	        }
		});
	});



//signin
$formsignin = $('form#formsignin');
	$formsignin.submit(function(e){
		e.preventDefault();
		
		var email = $formsignin.find('input#email').val();
		var password = $formsignin.find('input#password').val();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
	        type: 'POST',
	        data: {email: email, password: password},
	        dataType: 'json',
	        success: function(data){
	        	var showerror = $formsignin.find('span.errors');
	        	showerror.addClass('hidden');

	        	$formsignin.find('.form-group').each(function(){
	        		$(this).removeClass('has-error');
	        		$(this).find('.help-block').remove();
	        	});
	        	if(data.code == 0){
	        		var errors = data.errors;
	        		if(isJson(errors)){
	        			for(var key in errors){

		        			var $id = $formsignin.find('#' + key);

		        			var i;
		        			$finddiv = $formsignin.find($id).parent();
		        			$finddiv.addClass('has-error');
		        			
		        			if(errors.hasOwnProperty(key)){
		        				if(errors[key].length>0){
	                                for(i=0; i<errors[key].length;i++){
	                                	html = '';
	                                	html += '<span class="help-block mb-0">';
	                                	html += errors[key][i];
	                                	html += '</span>';
	                                	$finddiv.append(html);
									}
	                            }
		        			}
		        		}
	        		
	        		}else if(typeof errors === 'string' || errors instanceof String){
	        			showerror.append(errors).removeClass('hidden');
	        		}
	        	}else if(data.code==1){
	        		html = '';
        			html += '<div class="modal fade" id="successnotify" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">';
        			html += '<div class="modal-dialog modal-md">';
        			html += '<div class="modal-content">';
        			html += '<div class="modal-body">';
        			html += '<h4 class="text-center">' + data.errors + '...</h4>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			$('body').append(html);
        			$('body #signin1').modal('hide');
        			$('body #successnotify').modal('show');

	        		setTimeout(function(){

	        			window.location.href = '/';
	        			$('body #successnotify').modal('hide');
	        			$('body #successnotify').remove();

	        		}, 3000);	
        			
        		}
	        	
	        },
	        error:function(){

	        }
		});
	});


//signup

$(document).ready(function(){
	var url = window.location.href;
	var host = window.location.host; // sogtvt.atk
    var protocol = window.location.protocol;
    var pathname = window.location.pathname;
	
	if(pathname == '/signup'){
		$('#signup').modal('show');
	}

	//ajax validation
	$formsignup = $('form#signupform');
	$formsignup.submit(function(e){
		e.preventDefault();
		var name = $formsignup.find('input#name').val();
		var email = $formsignup.find('input#email').val();
		var password = $formsignup.find('input#password').val();
		var age = $formsignup.find('input#age').val();
		var country = $formsignup.find('input#country').val();
		var code = $formsignup.find('input#code').val();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
	        type: 'POST',
	        data: {name: name, email: email, password: password, age: age, country: country, code: code},
	        dataType: 'json',
	        success: function(data){
	        	var showerror = $formsignup.find('span.errors');
	        	showerror.addClass('hidden');

	        	$formsignup.find('.form-group').each(function(){
	        		$(this).removeClass('has-error');
	        		$(this).find('.help-block').remove();
	        	});
	        	if(data.code == 0){
	        		var errors = data.errors;
	        		if(isJson(errors)){
	        			for(var key in errors){

		        			var $id = $formsignup.find('#' + key);

		        			var i;
		        			$finddiv = $formsignup.find($id).parent();
		        			$finddiv.addClass('has-error');
		        			
		        			if(errors.hasOwnProperty(key)){
		        				if(errors[key].length>0){
	                                for(i=0; i<errors[key].length;i++){
	                                	html = '';
	                                	html += '<span class="help-block mb-0">';
	                                	html += errors[key][i];
	                                	html += '</span>';
	                                	$finddiv.append(html);
									}
	                            }
		        			}
		        		}
	        		
	        		}else if(typeof errors === 'string' || errors instanceof String){
	        			showerror.append(errors).removeClass('hidden');
	        		}
	        	}else if(data.code==1){
	        		html = '';
        			html += '<div class="modal fade" id="successnotify" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">';
        			html += '<div class="modal-dialog modal-md">';
        			html += '<div class="modal-content">';
        			html += '<div class="modal-body">';
        			html += '<h4 class="text-center">' + data.message + '...</h4>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			$('body').append(html);
        			$('body #signup').modal('hide');
        			$('body #successnotify').modal('show');

	        		setTimeout(function(){

	        			window.location.href = '/';
	        			$('body #successnotify').modal('hide');
	        			$('body #successnotify').remove();

	        		}, 3000);	
        			
        		}
	        },
	        error:function(){

	        }
		});
		console.log('hello');
	});
	
});

/*Promo code*/
$('#send_promo').on("click",function(e){
	var promo = $('#promo').val();
    var token = $("[name='_token']").val();

    e.preventDefault(e);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        method: "POST",
        url: pathpromo,
        data: {
           	promo:promo
        },
        dataType: 'json',
        success: function(data){
        	if(data!= null){
        		$('#promo').attr('value',data.id);
        		alert("With "+ data.code+ " you have discount "+ data.discount+"%. Thanks you!");
        	}        	
        	else{
        		$('#promo').html("");
            	alert(data.mes);
        	}            
        },
        error: function(data){
        	
        }
    });
});
/*End promo code*/

//tick button to add or minus ticket
$(document).ready(function(){
	$('.number_ticket a.plus').click(function(e){
		e.preventDefault();
		//console.log($(this).parent().find('.ticket').text());
		var findticket = $(this).parent().find('.ticket');
		var number_ticket = parseInt(findticket.text());
		if(number_ticket < 20){
			number_ticket = number_ticket + 1;
		}
		findticket.text(number_ticket);

	});

	$('.number_ticket a.minus').click(function(e){
		e.preventDefault();
		//console.log($(this).parent().find('.ticket').text());
		var findticket = $(this).parent().find('.ticket');
		var number_ticket = parseInt(findticket.text());
		if(number_ticket > 1){
			number_ticket = number_ticket - 1;
		}
		findticket.text(number_ticket);
		$('#number_ticket').val(number_ticket);

	});
});

//resetPassword
$(document).ready(function(){
	var url = window.location.href;
	var host = window.location.host; // sogtvt.atk
    var protocol = window.location.protocol;
    var pathname = window.location.pathname;
	
	if(pathname == '/resetPassword'){
		$('#resetPassword').modal('show');
	}



	//ajax validation
	$formresetpassword = $('form#formresetpassword');
	$formresetpassword.submit(function(e){
		e.preventDefault();
		
		var email = $formresetpassword.find('input#email').val();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
	        type: 'POST',
	        data: {email: email},
	        dataType: 'json',
	        success: function(data){
	        	var showerror = $formresetpassword.find('span.errors');
	        	showerror.addClass('hidden');

	        	$formresetpassword.find('.form-group').each(function(){
	        		$(this).removeClass('has-error');
	        		$(this).find('.help-block').remove();
	        	});
	        	if(data.code == 0){
	        		var errors = data.errors;
	        		if(isJson(errors)){
	        			for(var key in errors){

		        			var $id = $formresetpassword.find('#' + key);

		        			var i;
		        			$finddiv = $formresetpassword.find($id).parent();
		        			$finddiv.addClass('has-error');
		        			
		        			if(errors.hasOwnProperty(key)){
		        				if(errors[key].length>0){
	                                for(i=0; i<errors[key].length;i++){
	                                	html = '';
	                                	html += '<span class="help-block mb-0">';
	                                	html += errors[key][i];
	                                	html += '</span>';
	                                	$finddiv.append(html);
									}
	                            }
		        			}
		        		}
	        		
	        		}else if(typeof errors === 'string' || errors instanceof String){
	        			showerror.append(errors).removeClass('hidden');
	        		}
	        	}else if(data.code==1){
	        		html = '';
        			html += '<div class="modal fade" id="successnotify" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">';
        			html += '<div class="modal-dialog modal-md">';
        			html += '<div class="modal-content">';
        			html += '<div class="modal-body">';
        			html += '<h4 class="text-center">' + data.message + '...</h4>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			$('body').append(html);
        			$('body #signin1').modal('hide');
        			$('body #successnotify').modal('show');

	        		setTimeout(function(){

	        			window.location.href = '/';
	        			$('body #successnotify').modal('hide');
	        			$('body #successnotify').remove();

	        		}, 3000);	
        			
        		}
	        	
	        },
	        error:function(){

	        }
		});
	});


	//ajax validation new password
	$formResetPassword = $('form#formResetPassword');
	$formResetPassword.submit(function(e){
		e.preventDefault();
		
		var password = $formResetPassword.find('input#password').val();
		var confirm_password = $formResetPassword.find('input#confirm_password').val();
		var url = $(this).attr('action');

		$.ajax({
			url: url,
	        type: 'POST',
	        data: {password: password, confirm_password: confirm_password},
	        dataType: 'json',
	        success: function(data){
	        	var showerror = $formResetPassword.find('span.errors');
	        	showerror.addClass('hidden');

	        	$formResetPassword.find('.form-group').each(function(){
	        		$(this).removeClass('has-error');
	        		$(this).find('.help-block').remove();
	        	});
	        	if(data.code == 0){
	        		var errors = data.errors;
	        		if(isJson(errors)){
	        			for(var key in errors){

		        			var $id = $formResetPassword.find('#' + key);

		        			var i;
		        			$finddiv = $formResetPassword.find($id).parent();
		        			$finddiv.addClass('has-error');
		        			
		        			if(errors.hasOwnProperty(key)){
		        				if(errors[key].length>0){
	                                for(i=0; i<errors[key].length;i++){
	                                	html = '';
	                                	html += '<span class="help-block mb-0">';
	                                	html += errors[key][i];
	                                	html += '</span>';
	                                	$finddiv.append(html);
									}
	                            }
		        			}
		        		}
	        		
	        		}else if(typeof errors === 'string' || errors instanceof String){
	        			showerror.append(errors).removeClass('hidden');
	        		}
	        	}else if(data.code==1){
	        		html = '';
        			html += '<div class="modal fade" id="successnotify" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true">';
        			html += '<div class="modal-dialog modal-md">';
        			html += '<div class="modal-content">';
        			html += '<div class="modal-body">';
        			html += '<h4 class="text-center">' + data.message + '...</h4>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			html += '</div>';
        			$('body').append(html);
        			$('body #signin1').modal('hide');
        			$('body #successnotify').modal('show');

	        		setTimeout(function(){

	        			window.location.href = '/';
	        			$('body #successnotify').modal('hide');
	        			$('body #successnotify').remove();

	        		}, 3000);	
        			
        		}
	        	
	        },
	        error:function(){

	        }
		});
	});
});

