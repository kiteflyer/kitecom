function its_login_jq (contentid,text,reguid,redirectonlogoutlinkid,imagedir,langid,realurl ) {
	var params='eID=its_rsa_login2&register='+reguid+'&rlid='+redirectonlogoutlinkid+'&L='+langid+'&realurl='+realurl;
	var self1 = this;
	var hiddenform = jQuery('#hiddenform_' + contentid )[0];
	var loginform = jQuery('#LoginForm_' + contentid )[0];	
	var logoutform = jQuery('#LogoutForm_'+contentid )[0];
	var logininprogress=0;
	this.init = function() {
		if (this.cokokiesEnabled == false) {
			
			jQuery('#welcome'+contentid).html( '<span style="color:red">'+ text[7]+'</span>');
			jQuery('#welcome'+contentid).show();
			return;
		}
		jQuery('#loginbox'+contentid).addClass('class_ajax_wait');
		this.getKey();
		this.initForms();
		
	}
	this.cookiesEnabled = true;
	this.checkcookies = function () {
		if(typeof navigator.cookieEnabled != "undefined") {
			this.cookiesEnabled =navigator.cookieEnabled; 
		}
		
	}

	
	this.getKey = function() {
		jQuery.ajax({
			type: "POST",
			url: 'index.php',
			dataType:'json',
			data:params,
			success: self1.reactonresponse 
		});
	}
	
	this.reactonresponse = function (data) {
		var islogin = data.login;
		jQuery('#welcome'+contentid).html('');
		jQuery('#status'+contentid).html('');
		logininprogress=0;
		if (data.registerlink) {
			var registerlink = data.registerlink.replace('###registerlabel###',text[4]);
			jQuery('#register'+contentid)[0].innerHTML =registerlink;
			jQuery('#register'+contentid).show();
		}
		jQuery('#loginbox'+contentid).removeClass('class_ajax_wait')[0];
		var NonValidatedAccount = data.NonValidatedAccount;
		if (islogin == 1) {
			jQuery('#register'+contentid).hide();
		} else {
			jQuery('#register'+contentid).show();
		}
		if (islogin == 0 && NonValidatedAccount == 0) {
			jQuery('#logout'+contentid).css('display' ,'none');
			jQuery('#login'+contentid).css('display' ,'block');
			jQuery('#logininputs'+contentid).css('display' ,'block');
			jQuery('#logininputs1'+contentid).css('display' ,'block');
			jQuery(loginform).show();
		}
		if (islogin == 1 && data.welcome ==1) {
			var welcome = text[1].replace('###name###','<br/>'+data.name);
			jQuery('#welcome'+contentid).html( welcome);
			jQuery('#welcome'+contentid).show();
			var status = text[2].replace('###name###','<br/>'+data.name);
			jQuery('#status'+contentid).hide();
			jQuery('#status'+contentid).html(status);
			setTimeout("jQuery('#welcome"+contentid+"').slideUp('slow');",3000)
			setTimeout("jQuery('#status"+contentid+"').slideDown('slow');",3000)
		}
		if (islogin == 1 && data.welcome ==0) {
			var status = text[2].replace('###name###','<br/>'+data.name);
			jQuery('#status'+contentid).html(status);
		}
		if (islogin == 1 ) {
			jQuery('#logout'+contentid).css('display' ,'block');
			jQuery('#login'+contentid).css('display' ,'none');
			jQuery('#rememberlink'+contentid).hide();
			
		}
		if (data.logout == 1 &&  data.logoutlink.length >0) {
			setTimeout ('window.location=\"' + data.logoutlink + '\"',200);
		}
		
		if (data.welcome == 1 && data.redirect.length > 0 ) {
			setTimeout ('window.location=\"' + data.redirect + '\"',200);
		}
			
		if (data.loginerror == 1 ) {
			jQuery('#loginerror'+contentid).show();
			jQuery('#loginerror'+contentid).html(text[3]);
			var test = "jQuery('#loginerror"+ contentid+"').slideUp('slow')";
			jQuery('#rememberlink'+contentid).show();
			setTimeout(test,3000);
		}
		if (data.rsakey) {
			hiddenform.n.value=data.rsakey;
		}
		if (data.exponent) {
			hiddenform.e.value=data.exponent;
		}
	}
	
	this.submitform = function(form) {
		var formdata = jQuery(form).serialize();
		var url = jQuery(form).attr('action');
		jQuery.ajax({
			type:'POST',
			url:url,
			data:formdata,
			dataType:'json',
			success: self1.reactonresponse
		})
	}
	
	this.initForms = function () {
		jQuery(loginform).hide();
		var userfield = jQuery('#logininputs'+contentid+' [name="user"]')[0];
		var passfield = jQuery('#logininputs1'+contentid+' [name="pass"]')[0];
		
		jQuery('#rememberlink'+contentid).hide();
		var pw_managerdetected = false;
		
		if (userfield.value == '') {
			userfield.value  = text[0];
        } else {
        	pw_managerdetected = true;
        }
		
		jQuery(userfield).bind('focus',function (event){
			if (userfield.value == text[0]) {
				userfield.value = '';
				return true;
			}			
		})
		
		jQuery(userfield).bind('keypress',function (event){			
			if ((event.which && event.which == 13 ) || (event.keyCode && event.keyCode == 13)) {
				passfield.focus();
				return false;
			}
			if (pw_managerdetected) {
				passfield.value='';
				pw_managerdetected = false;
			}
		})
		
		jQuery(userfield).bind('blur',function (event){
			if (userfield.value == '') {
				userfield.value = text[0];
			}
		})
		
		if (passfield.value == '') {
			passfield.value  = 'password';
        }
		
		jQuery(passfield).bind('focus',function (event){
			if (passfield.value == 'password') {
				passfield.value = '';
			}
		})
		
		jQuery(passfield).bind('blur',function (event){
			if (passfield.value == '') {
				passfield.value = 'password';
			}
		})
		
		jQuery(passfield).bind('keypress',function (event){			
			if ((event.which && event.which == 13 ) || (event.keyCode && event.keyCode == 13)) {
				var button = jQuery('#LoginForm_'+contentid + ' [type="submit"]')[0];
				logininprogress=0;
            	jQuery(button).trigger('click');
				return false;
			}
		})
		
		
		
		
        if (loginform) {
        	var button = jQuery('#LoginForm_'+contentid + ' [type="submit"]')[0];
        	jQuery(button).bind('click', {obj:this},function(event) {
        		jQuery(loginform).hide();
        		jQuery('#register'+contentid).hide();
        		jQuery('#rememberlink'+contentid).hide();
        		jQuery('#loginbox'+contentid).addClass('class_ajax_wait');
        		hiddenform.user.value=self1.trim(loginform.user.value);
            	hiddenform.pass.value=self1.trim(loginform.pass.value);
            	if (logininprogress==0 ) {
            		tx_rsaauth_feencrypt(hiddenform);
            		hiddenform.logintype.value="login";
            		self1.submitform(hiddenform);
            	}
            	logininprogress=1;
				return false;
			});
        	jQuery(button).hide();
        	jQuery(loginform).bind('submit',function(event) {
        		var button = jQuery('#LoginForm_'+contentid + ' [type="submit"]')[0];
        		logininprogress=1;
            	jQuery(button).trigger('click');
        		return false;
			});        	
        }
        if (logoutform) {
        	var button = jQuery('#LogoutForm_'+contentid + ' [type="submit"]')[0];
        	jQuery(button).bind('click', {obj:this},function(event) {
        		hiddenform.logintype.value="logout";
        		self1.submitform(hiddenform);				
				return false;
			});
        	jQuery(logoutform).bind('submit',function(event) {
        		return false;
			});        	
        }
        var loginpicspan  = jQuery('<span class="loginpic1"></span>');
        var loginlink = jQuery('<a href="login.html" title="Login"></a>');
        var loginpic = jQuery('<img  src="'+imagedir+'smallarrow.gif" title="Login" valign="bottom" />');
        loginlink.append(loginpic);
        loginpic.css('cursor' , 'pointer');
        //jQuery('body').append(loginlink);
        jQuery('#logininputs1'+contentid).append(loginpicspan);
        jQuery(loginpicspan).append(loginlink);
        jQuery(loginpic).bind('click',function(event) {
        	
        	var button = jQuery('#LoginForm_'+contentid + ' [type="submit"]')[0];
        	logininprogress=1;
        	jQuery(button).trigger('click');
        
			return false;
		});
        
        jQuery(loginpic).bind('mouseover', function(e) {
        	loginpic[0].src = imagedir+'smallarrow_hi.gif';
        });
		jQuery(loginpic).bind('mouseout', function(e) {
        	loginpic[0].src = imagedir+'smallarrow.gif';
        });
		
	}
	this.trim = function (value) {
		return value.replace (/^\s+/, '').replace (/\s+$/, '');
	}
	this.checkcookies();
	//this.init();
}