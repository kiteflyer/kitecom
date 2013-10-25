# ---------------------------------------------- #
#	Config 
# ---------------------------------------------- #

config {
	doctype = {$doctype}
    xmlprologue = none
	xhtml_cleaning = none
	htmlTag_setParams = none
	linkVars = L,test
}
# ---------------------------------------------- #


# ---------------------------------------------- #
#	Javascript	
# ---------------------------------------------- #

config.compressJs = 1
config.concatenateJs = 1
page.includeJS {
   jquery = fileadmin/templates/js/jquery-1.10.2.min.js
   jquery.forceOnTop = 1
   2 = fileadmin/templates/js/jquery-ui-1.10.2.custom.min.js
   2.forceOnTop = 0
   google = http://maps.googleapis.com/maps/api/js?key=AIzaSyDc0C9jG_noWcKOiqB6YJl8ADFdKNofQMw&sensor=true&language=de&libraries=places
   google.external = 1   
   
}

page.includeJSFooter {

	  fotorama = fileadmin/templates/js/fotorama.js
	  backbone = fileadmin/templates/js/jquery.history.js
	  #crypto = fileadmin/templates/js/sso/javascript/hmac-sha1-3.1.2.js	  
	  3 = fileadmin/templates/js/bootstrap.min.js
	  4 = fileadmin/templates/js/jquery.ui.touch-punch.min.js
	  5 = fileadmin/templates/js/bannerscollection_zoominout.js
	  6 = fileadmin/templates/js/jquery.scrollUp.min.js
	  7 = fileadmin/templates/js/bootstrap-datetimepicker.min.js
	  
	  
	  8 = fileadmin/fileupload/js/load-image.min.js
	  9 = fileadmin/fileupload/js/vendor/jquery.ui.widget.js
	  10 = http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js
	  11 = http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js  
	  12 = http://blueimp.github.io/Gallery/js/blueimp-gallery.min.js
	  13 = fileadmin/fileupload/js/jquery.iframe-transport.js
	  14 = fileadmin/fileupload/js/jquery.fileupload.js
	  15 = fileadmin/fileupload/js/jquery.fileupload-process.js
	  16 = fileadmin/fileupload/js/jquery.fileupload-image.js
	  17 = fileadmin/fileupload/js/jquery.fileupload-audio.js
	  18 = fileadmin/fileupload/js/jquery.fileupload-validate.js
	  19 = fileadmin/fileupload/js/jquery.fileupload-ui.js
		
	  20 = fileadmin/templates/js/jquery.backstretch.min.js
	  21 = fileadmin/templates/js/jquery.cycle2.min.js
	  22 = fileadmin/templates/js/jquery.chosen.min.js
	  
	  90 = fileadmin/templates/js/scripts.js
   
}
[globalString = IENV:HTTP_HOST=*kitecom.net]
page.footerData.1 = TEXT
page.footerData.1.value (
		<script type="text/javascript">
	
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-1652292-5']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	
		</script>
)
[global]

# ---------------------------------------------- #



# ---------------------------------------------- #
#	Css	
# ---------------------------------------------- #
// CSS minification.
config.compressCss = 1
config.concatenateCss = 1

page.includeCSS {
   1 = fileadmin/templates/css/bootstrap.min.css
   #2 = fileadmin/templates/css/bootstrap-responsive.css
   3 = fileadmin/templates/css/font-awesome.min.css
   4 = fileadmin/templates/css/bannerscollection_zoominout.css
   5 = fileadmin/templates/css/bootstrap-datetimepicker.min.css
   6 = fileadmin/fileupload/css/jquery.fileupload-ui.css
   7 = fileadmin/templates/css/chosen.css   
   #8 = fileadmin/templates/css/jquery-ui-1.10.2.custom.min.css
   8 = fileadmin/templates/css/datepicker.css
   20 = fileadmin/templates/css/style.css      
   fotorama = fileadmin/templates/css/fotorama.css
}
[globalVar = TSFE:id=2]  
	page.includeCSS {
		21 = fileadmin/templates/css/startpage.css
	}
	page.includeJSFooter {
		startpage = fileadmin/templates/js/startpage.js
	}
[else]
	page.includeCSS {
		21 = fileadmin/templates/css/folgeseite.css
	}
[global] 
# ---------------------------------------------- #


# ---------------------------------------------- #
#	Topnavigation
# ---------------------------------------------- #
	
	lib.topnav = HMENU
	lib.topnav {
	
	  1 = TMENU
	  1 {
	    expAll = 1
	    noBlur=2
		NO.allWrap = <li class="first navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="last navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li>
		NO.ATagTitle.field = subtitle // title 
		NO.subst_elementUid = 1

	    ACT = 1
	    ACT.allWrap = <li class="first navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="last navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li>
		ACT.subst_elementUid = 1 
	    ACT.ATagTitle.field = abstract // description // title
	    #ACT.after < lib.image
	
	    IFSUB = 1
	    IFSUB.allWrap = <li class="first navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="last navi-{elementUid}">|<div class="nav-border-{elementUid}"></div></li>
	    IFSUB.subst_elementUid = 1 
	    IFSUB.ATagTitle.field = abstract // description // title
	    #IFSUB.after < lib.image
	
	    ACTIFSUB = 1
	    ACTIFSUB.allWrap = <li class="first navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li> |*| <li class="last navi-{elementUid} active">|<div class="nav-border-{elementUid}"></div></li>
	    ACTIFSUB.subst_elementUid = 1
	    ACTIFSUB.ATagTitle.field = abstract // description // title
	    ACTIFSUB {
		    #stdWrap.wrap = |<img src="fileadmin/templates/img/nav_pfeil_act.png" alt="pfeil act" />
	    }    
	    
  }
}


# ---------------------------------------------- #



# ---------------------------------------------- #
# Logo 
# ---------------------------------------------- #
lib.logo = TEXT
lib.logo.value = <img src="fileadmin/templates/img/logo.png" alt="Kitecom.net" />
lib.logo.typolink.parameter=2
			      		
# ---------------------------------------------- #




# ---------------------------------------------- #
# Slider
# ---------------------------------------------- #
lib.slider = TEXT
lib.slider.value (


<div id="bannerscollection_zoominout_opportune">
	<div class="myloader"></div>
        <!-- CONTENT -->
	   	<ul class="bannerscollection_zoominout_list">
       		<li data-initialZoom="1" data-finalZoom="0.77" data-bottom-thumb="fileadmin/templates/img/sp_2.jpg" data-horizontalPosition="center" data-verticalPosition="center">
       			<img class="firstimage" src="fileadmin/templates/img/sp_2.jpg" alt="" width="2500" height="1570" />
       		</li>	
       		<li data-initialZoom="1" data-finalZoom="0.77"  data-bottom-thumb="fileadmin/templates/img/sp_0.jpg" data-horizontalPosition="center" data-verticalPosition="bottom">
       			<img  src="fileadmin/templates/img/sp_0.jpg" alt="" width="2500" height="1570" />
       		</li>

       		<li data-initialZoom="1" data-finalZoom="0.77" data-bottom-thumb="fileadmin/templates/img/sp_1.jpg" data-horizontalPosition="center" data-verticalPosition="top">
       			<img src="fileadmin/templates/img/sp_1.jpg" alt="" width="2500" height="1570" />
       		</li>
	   		<!--<li data-autoPlay="0" data-video="true" data-bottom-thumb="" ><img src="" alt="" width="934" height="414" /><iframe style="background-color: white;" width="100%" height="120%" src="http://www.youtube.com/embed/uFKxn1OwFwo?autoplay=1" frameborder="0" allowfullscreen></iframe></li>-->
       	</ul>					   	 
</div> 


)
			      		
# ---------------------------------------------- #



# ---------------------------------------------- #
# Banner / Partner
# ---------------------------------------------- #

lib.partner = CONTENT
lib.partner {
	table = tt_content
	select {
	orderBy = sorting
	pidInList = 28
	 
	where = colPos = 0
	languageField = sys_language_uid
	}
}
# ---------------------------------------------- #



# ---------------------------------------------- #
# Search Startpage
# ---------------------------------------------- #


lib.spsearch = USER_INT
lib.spsearch {
    userFunc = tx_extbase_core_bootstrap->run
    extensionName = T3dKitecom
    vendorName = kitecom
    pluginName = Search
    
}	

lib.search = USER_INT
lib.search {
    userFunc = tx_extbase_core_bootstrap->run
    extensionName = T3dKitecom
    vendorName = kitecom
    pluginName = Search
	switchableControllerActions {
        Search {
            1 = search
        }
    }
    
}	

# ---------------------------------------------- #



# ---------------------------------------------- #
# Extbase hack 
# ---------------------------------------------- #

config.tx_extbase {
	mvc {
		callDefaultActionIfActionCantBeResolved = 1
	}
}
# ---------------------------------------------- #



# ---------------------------------------------- #
# Go Bottom Startpage 
# ---------------------------------------------- #
lib.goBottom = TEXT
lib.goBottom.value = <a class="goBottom" href="#" class=""><i class="icon-circle-arrow-down"></i></a>
			      		
# ---------------------------------------------- #



# ---------------------------------------------- #
# Login / Registrieren
# ---------------------------------------------- #
plugin.tx_felogin_pi1 {
	welcomeHeader_stdWrap.cObject = TEXT
   	welcomeHeader_stdWrap.cObject.value =
	welcomeHeader_stdWrap.wrap = |
    errorHeader_stdWrap.wrap = <div class="alert"><div class="error">|</div></div>
	templateFile = fileadmin/templates/html/ext/felogin.html

	redirectMode = groupLogin, login
	
	[globalVar = GP:logintype = logout]
	config >
	config.additionalHeaders = Location: /
	[global]
	redirectDisable = 1	
	redirectPageLogout = 2	
	
}

plugin.tx_datamintsfeuser_pi1 {

	showtype = {$VAR.type}
	usedfields = username, password, email, gender, usergroup, --submit--
	requiredfields = username, password, email, usergroup
	uniquefields = username, email

	register {
		mailtype = html
		sendusermail = 1
		sendadminmail = 1
		redirect = 2
		usergroup = 1
	}

	edit {
		mailtype = html
	}
	
	/*
	copyfields { 
	  usergroup.usergroup = 1 
	  usergroup.usergroup { 
	    wrap = 2, | 
	  } 
	}
	*/		

	validate {
		username.type = username
		password.type = password
		password.length = 6
		email.type = email
        usergroup.type = custom
	    usergroup.regexp = /^(1|2|3|4|5)$/		
	}

	captcha {
		use = captcha
	}

	format {
		date = %d.%m.%Y
		datetime = %H:%M %d.%m.%Y
	}

	thumb {
		file.maxW = 100
	}
	

	
   fieldconfig {
      usergroup {
         config {
            ### Make a single select box.
            size = 1
            ### Show only the selected entries.
            foreign_table = fe_groups
            foreign_table_where = uid IN(3,4,5)
            ### Add a item to the select box with the value 0.
            items {
               0 {
                  0 = Wähle deinen Typ
                  1 = 0
               }
            }
         }
      }
   }	

}

plugin.tx_srfeuserregister_pi1 {
	templateFile = fileadmin/templates/html/ext/feuser_register.html
	_CSS_DEFAULT_STYLE >
	
}

#config.typolinkLinkAccessRestrictedPages = 1
#config.typolinkLinkAccessRestrictedPages_addParams = &referer=###RETURN_URL###



lib.userlogin = COA

lib.userlogin.1 = TEXT
lib.userlogin.1.value (
	<!-- Login Start -->
	<div id="login_window" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		</div>
			<div class="span6 login">
				<div class="anmelden">
					<h1>Kitecom.net ist kostenlos!</h1>
					<h2 class="small gray">Anmelden</h2>
					<div class="bg_anmelden">
						<h3>Anmelden mit Kitecom.net Profil</h3>
							<div class="ajax_login"></div>
						<div class="contentbox_border"></div>					    				
				    </div>
				</div>
			</div>
			
			<div class="span6 registrieren">
				<div class="anmelden">
					<h1>Von Kitern für Kiter...</h1>
					<h2 class="small gray">Registrieren</h2>					
					<div class="bg_anmelden">
						<h3>Von Kitern für Kiter...</h3>			
							<div class="ajax_reg"></div>
						<div class="contentbox_border"></div>					    				
					</div>
				</div>
			</div>
		</div>
	</div>			
)




[usergroup=*]

lib.anmelden = USER_INT
lib.anmelden {
    userFunc = tx_extbase_core_bootstrap->run
    extensionName = T3dKitecom
    vendorName = kitecom
    pluginName = Feuser
	switchableControllerActions {
        User {
            1 = miniprofile
        }
    }
}	

[else]
	lib.anmelden = TEXT
	lib.anmelden.value (
		<a role="button" data-toggle="modal" href="#login_window" class="btn-orange usernav"><i class="icon-user"></i> Anmelden</a>
	)
[global]
lib.newEntry = TEXT
lib.newEntry.value (
	<a role="button" href="index.php?id=10" class="btn-orange pull-right newEntry"><i class="icon-plus-sign"></i> Neuer Eintrag</a>
)

# ---------------------------------------------- #



# ---------------------------------------------- #
# HTML Template aus Backend Layout wählen
# ---------------------------------------------- #

page = PAGE
page.10 = FLUIDTEMPLATE
page.10 {
	file.stdWrap.cObject = CASE
	file.stdWrap.cObject {
		key.data = levelfield:-1, backend_layout_next_level, slide
		key.override.field = backend_layout
		default = TEXT
		default.value = fileadmin/templates/html/startpage.html
		# Startseite
		1 = TEXT
		1.value = fileadmin/templates/html/startpage.html
		# Folgeseite (normal)
		2 = TEXT
		2.value = fileadmin/templates/html/folgeseite.html
		# Ajax Call 
		3 = TEXT
		3.value = fileadmin/templates/html/ajax.html
		# Folgeseite (kite)
		4 = TEXT
		4.value = fileadmin/templates/html/kite.html
	}
}


# ---------------------------------------------- #


# ---------------------------------------------- #
# Seitenkonfiguration
# ---------------------------------------------- #

config {
    no_cache = 1
	tx_realurl_enable = 1
}

page.config {
	no_cache = 1
	admPanel = 0
	inlineStyle2TempFile = 1
	#baseURL = 

	language = de
	locale_all = de_DE
	htmlTag_langKey = de	
	
	# Spam Protection
	spamProtectEmailAddresses = 2
	spamProtectEmailAddresses_atSubst = (at)

	
	disableAllHeaderCode = 0
	metaCharset = utf-8
	forceCharset = utf-8
	renderCharset = utf-8

}
[globalString = IENV:HTTP_HOST=kitecom.site]
	config.baseURL = http://kitecom.site/
[globalString = IENV:HTTP_HOST=*kitecom.net]
	config.baseURL = http://www.kitecom.net/	
[global]
# ---------------------------------------------- #



# ---------------------------------------------- #
# Ajax Call
# ---------------------------------------------- #

ajax = PAGE
ajax {
  typeNum = 101
}
ajax.10 = FLUIDTEMPLATE
ajax.10.file = fileadmin/templates/html/ajax.html

ajax.config {
   disableAllHeaderCode = 1
   disableCharsetHeader = 1
   disablePrefixComment = 1
   xhtml_cleaning = 1
   admPanel = 0
   debug = 0
   no_cache = 1   
   language = de
   locale_all = de_DE
   htmlTag_langKey = de	   
}



ajaxPage = PAGE
	ajaxPage {
	typeNum = 99
	config {
		disableAllHeaderCode = 1
		additionalHeaders = Content-type:application/json
		xhtml_cleaning = 0
		admPanel = 0
	}

	10 < tt_content.list.20.t3d_kitecom_search
}


[globalVar = GP:type = 99 ] || [globalVar = GP:type = 101]
tt_content.stdWrap.innerWrap >
[global]

# ---------------------------------------------- #
# Tempaltemarker setzen
# ---------------------------------------------- #

marker.topnav < lib.topnav


marker.content_main < styles.content.get
marker.content_main.select.where = colPos = 0

marker.content_left < styles.content.get
marker.content_left.select.where = colPos = 1
	
marker.content_top < styles.content.get
marker.content_top.select.where = colPos = 2


#	 	Page Config								 #
# ---------------------------------------------- #



# ---------------------------------------------- #
# Mobile Call
# ---------------------------------------------- #

[useragent = *iPhone*]  ||  [useragent = *iPod*]  ||  [useragent = *iPad*]  ||  [useragent = *Android*]  ||  [useragent = *OperaMini*]  ||  [useragent = *BlackBerry*] ||  [globalString = GP:test=1]

	lib.slider >

	page.includeJSFooter {
		100 = fileadmin/templates/js/jquery.touchwipe.js
		101 = fileadmin/templates/js/mobile.js
	}
	page.includeCSS {
	   	100 = fileadmin/templates/css/mobile.css      
	}
	page.headerData.26 = TEXT
	page.headerData.26.value (
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />		
	)
	
[end]
# ---------------------------------------------- #

