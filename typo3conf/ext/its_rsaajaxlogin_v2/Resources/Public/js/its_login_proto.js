function its_login_proto (contentid,text,reguid,redirectonlogoutlinkid,imagedir,langid,realurl ) {
	var params='eID=its_rsa_login2&register='+reguid+'&rlid='+redirectonlogoutlinkid+'&L='+langid+'&realurl='+realurl;
	var self1 = this;
	var hiddenform = $$('#hiddenform_' + contentid )[0];
	var loginform = $$('#LoginForm_' + contentid )[0];	
	var logoutform = $$('#LogoutForm_'+contentid )[0];
	var logininprogress=0;
	this.init = function() {
		if (this.cookiesEnabled == false) {
			$$('#welcome'+contentid)[0].innerHTML ='<span style="color:red">'+ text[7]+'</span>';
			return;
		}
		$$('#loginbox'+contentid)[0].addClassName('class_ajax_wait');
		this.getKey();
		this.initForms();
	}
	this.cookiesEnabled = true;
	this.checkcookies = function () {
		if(typeof navigator.cookieEnabled != "undefined") {
			this.cookiesEnabled =navigator.cookieEnabled; 
		}
		
	}
	this.getKey = function () {
		var myAjax = new Ajax.Request('index.php', {
			method: 'post',
			parameters: params,
			onComplete: self1.reactonresponse
		});
	}
	
	this.initForms = function () {
		loginform.hide();
		var userfield = $$('#logininputs'+contentid+' [name="user"]')[0];
		var passfield = $$('#logininputs1'+contentid+' [name="pass"]')[0];
		$$('#rememberlink'+contentid)[0].hide();
		var pw_managerdetected = false;		
		if (userfield.value == '') {
			userfield.value  = text[0];
        } else {
        	pw_managerdetected = true;
        }
		userfield.observe('focus',function (event){
			if (userfield.value == text[0]) {
				userfield.value = '';
				event.stop();
			}			
		});
		userfield.observe('keypress',function (event){			
			if ((event.which && event.which == 13) || (event.keyCode && event.keyCode == 13)) {
				passfield.focus();
				event.stop();
			}
			if (pw_managerdetected) {
				passfield.value='';
				pw_managerdetected = false;
			}
		});
		
		userfield.observe('blur',function (event){
			if (userfield.value == '') {
				userfield.value = text[0];
			}
		});
		
		if (passfield.value == '') {
			passfield.value  = 'password';
        }
		
		passfield.observe('focus',function (event){
			if (passfield.value == 'password') {
				passfield.value = '';
			}
		});
		
		passfield.observe('blur',function (event){
			if (passfield.value == '') {
				passfield.value = 'password';
			}
		});
		
		passfield.observe('keypress',function (event){			
			if ((event.which && event.which == 13 ) || (event.keyCode && event.keyCode == 13)) {
				var button = $$('#LoginForm_'+contentid + ' [type="submit"]')[0];
            	//self1.trigger(button,'click');
            	logininprogress=0;
            	//event.stop();
			}
		});
		if (loginform) {
			var button = $$('#LoginForm_'+contentid + ' [type="submit"]')[0];
	        button.observe('click', function(event) {
	        	loginform.hide();
	        	$$('#register'+contentid)[0].hide();
	        	$$('#rememberlink'+contentid)[0].hide();
	        	$$('#loginerror'+contentid)[0].hide();
	        	$$('#loginbox'+contentid)[0].addClassName('class_ajax_wait');
	        	hiddenform.user.value=self1.trim(loginform.user.value);
	            hiddenform.pass.value=self1.trim(loginform.pass.value);
	            if (logininprogress==0 ) {
            		tx_rsaauth_feencrypt(hiddenform);
            		hiddenform.logintype.value="login";
            		self1.submitform(hiddenform);
            	}
	            
	            logininprogress=1;				
				event.stop;
			});
	        //button.hide();
	        loginform.observe('submit',function(event) {
	        	var button = $$('#LoginForm_'+contentid + ' [type="submit"]')[0];
	        	
	        	self1.trigger(button,'click');
	        	
	        	event.stop();
			});        	
		}
        if (logoutform) {
        	var button = $$('#LogoutForm_'+contentid + ' [type="submit"]')[0];
        	button.observe('click',function(event) {
        		hiddenform.logintype.value="logout";
        		self1.submitform(hiddenform);				
				event.stop();
			});
        	logoutform.observe('submit',function(event) {
        		event.stop();
			});        	
        }
       
        
        var loginpicspan  = new Element ('span' , { 'class':'loginpic1'});        
        var loginpic = new Element('img', { 'title': 'Login', 'valign':'bottom' , 'src':imagedir+'smallarrow.gif' });
        var loginlink = new Element ('a' , { 'href':'login.html', 'title':'Login'});
        loginpic.style.cursor ='pointer';
        loginpicspan.insert(loginlink);
        var t = $$('#logininputs1'+contentid)[0];
        t.insert(loginpicspan);
        loginlink.insert(loginpic);
        loginpic.observe('click',function(event) {
        	var button = $$('#LoginForm_'+contentid + ' [type="submit"]')[0];
        	self1.trigger(button,'click');
        	logininprogress=1;
			event.stop();
		});
        
        loginpic.observe('mouseover', function(e) {
        	loginpic.src = imagedir+'smallarrow_hi.gif';
        });
        loginpic.observe('mouseout', function(e) {
        	loginpic.src = imagedir+'smallarrow.gif';
        });
        

		
	}
	this.reactonresponse = function (transport) {
		var data = transport.responseText.evalJSON();
		var islogin = data.login;
		logininprogress=0;
		var NonValidatedAccount = data.NonValidatedAccount;
		$$('#welcome'+contentid)[0].innerHTML = '';
		$$('#status'+contentid)[0].innerHTML = '';
		$$('#loginerror'+contentid)[0].hide();
		$$('#loginbox'+contentid)[0].removeClassName('class_ajax_wait');
		if (data.registerlink) {
			var registerlink = data.registerlink.replace('###registerlabel###',text[4]);
			$$('#register'+contentid)[0].innerHTML =registerlink;
			$$('#register'+contentid)[0].show();
		}
		if (islogin == 1) {
			$$('#register'+contentid)[0].hide();
		} else {
			$$('#register'+contentid)[0].show();
		}
		
		
		if (islogin == 0 && NonValidatedAccount == 0) {
			$$('#logout'+contentid)[0].style.display ='none';
			$$('#login'+contentid)[0].style.display ='block';
			$$('#logininputs'+contentid)[0].style.display ='block';
			$$('#logininputs1'+contentid)[0].style.display ='block';
			loginform.show();
		}
		
		if (islogin == 1 && data.welcome == 1) {
			var welcome = text[1].replace('###name###','<br/>'+data.name);
			$$('#welcome'+contentid)[0].innerHTML = welcome;
			$$('#welcome'+contentid)[0].show();
			var status = text[2].replace('###name###','<br/>'+data.name);
			$$('#status'+contentid)[0].hide();
			$$('#status'+contentid)[0].innerHTML = status;
			//setTimeout("$$('#welcome"+contentid+"').slideUp('slow');",3000)
			//setTimeout("$$('#status"+contentid+"').slideDown('slow');",3000)
		}
		if (islogin == 1 && data.welcome ==0) {
			var status = text[2].replace('###name###','<br/>'+data.name);
			$$('#status'+contentid)[0].innerHTML =status;
		}
		
		if (islogin == 1 ) {
			$$('#logout'+contentid)[0].style.display ='block';
			$$('#login'+contentid)[0].style.display = 'none';
			$$('#rememberlink'+contentid)[0].hide();
		}
		if (data.loginerror == 1 ) {
			$$('#loginerror'+contentid)[0].show();
			$$('#loginerror'+contentid)[0].innerHTML =text[3];
			//var test = "jQuery('#loginerror"+ contentid+"').slideUp('slow')";
			$$('#rememberlink'+contentid)[0].show();
			//setTimeout(test,3000);
		}
		if (data.logout == 1 &&  data.logoutlink.length >0) {
			setTimeout ('window.location=\"' + data.logoutlink + '\"',200);
		}
		
		if (data.welcome == 1 && data.redirect.length > 0 ) {
			setTimeout ('window.location=\"' + data.redirect + '\"',200);
		}
		
		if (data.rsakey) {
			hiddenform.n.value=data.rsakey;
		}
		if (data.exponent) {
			hiddenform.e.value=data.exponent;
		}
	}
	// this supports trigger native events such as 'onchange'
	// whereas prototype.js Event.fire only supports custom events
	this.trigger = function triggerEvent(element, eventName) {
	    // safari, webkit, gecko
	    if (document.createEvent)
	    {
	    var evt = document.createEvent('HTMLEvents');
	    evt.initEvent(eventName, true, true);
	 
	        return element.dispatchEvent(evt);
	    }
	 
	    // Internet Explorer
	    if (element.fireEvent) {
	        return element.fireEvent('on' + eventName);
	    }
	}
	
	this.submitform = function (form) {
		form.request({
			  method: 'post',              
              onSuccess: self1.reactonresponse
		});
	}
	
	this.trim = function (value) {
		return value.replace (/^\s+/, '').replace (/\s+$/, '');
	}
	this.checkcookies();
}