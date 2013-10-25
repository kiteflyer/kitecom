// check for jQuery
var reqPlugins = ['dialog','button','fadeOut'];
var extbaseajaxAttributes = ['extbaseajax','onclick','onresponse',,'onshow','onsave','closetext','savetext','cancel','confirm','text','pluginname','remove','onconfirm','beforesave','nosave','href','newwindow','newtab','wwidth','wheight','wscrollbars','target','title', 'params'];
var error = '';
if (typeof (jQuery) == 'undefined') {  
    // jQuery is not loaded  
	error = 'Missing jQuery at all!';
} else {
	// jQuery loaded, check for reqPlugins
	for (i = 0; i < reqPlugins.length; i++) if (! (reqPlugins[i] in jQuery.fn)) error += 'Missing jQuery plugin: ' + reqPlugins[i] + '\r\n';
}
if (error) {alert(error);throw new Error(error);}


$(document).ready(function() {
	// automatically unblock UI when ajax calls are finished
	try {$(document).ajaxStop($.unblockUI);}
	catch (error) {}
	
	autoAjax();
});


/**
 *
 */
function autoAjax() {
	// We started allowing buttons also for <img> tags. This wont work in IE, since it complains, that <img> tags are not allowed
	// to have child nodes, but jQuery.button() is intended for <span> tags only and adds a span tag as child node
	// to img tag. Funny enough, this works perfectly in FF. This means that we have to move the parameters to a span tag
	// which wraps the img tag
	$('img.modalDialog, img.modalMessage, img.modalConfirm, img.autoRedirect, img.ajaxRequest').each(function () {
		var addClassname = '';
		if ($(this).hasClass('modalDialog')) addClassname = 'modalDialog';
		if ($(this).hasClass('modalMessage')) addClassname = 'modalMessage';
		if ($(this).hasClass('modalConfirm')) addClassname = 'modalConfirm';
		if ($(this).hasClass('autoRedirect')) addClassname = 'autoRedirect';
		if ($(this).hasClass('ajaxRequest')) addClassname = 'ajaxRequest';
		
		$(this).wrap(	'<span class="' + addClassname +  ' ui-img-button" />' );
		$(this).removeClass('modalDialog modalMessage modalConfirm autoRedirect ajaxRequest');
	  
		// required / allowed attributes are listed in extbaseajaxAttributes (see top of script)
		for (attributeKey in extbaseajaxAttributes) {
			attributeName = extbaseajaxAttributes[attributeKey];
			if ($(this).attr(attributeName)) {
				$(this).closest('span').attr(attributeName, $(this).attr(attributeName));
				$(this).removeAttr(attributeName);
			}
		}
	});
	
	// invoke ajax requests
	$('.ajaxRequest' ).button().unbind('click').click(function(event) {
		event.stopPropagation();

		var onclick = makeFn($(this).attr('onclick'));
		var onresponse = makeFn($(this).attr('onresponse'));
		var postVars = $(this).closest('form').serialize();

		if (typeof ($(this).attr('extbaseajax')) != 'undefined') {
			ajaxBlock();
			var url = autoCreateUrl($(this).attr('extbaseajax'), 0, $(this).attr('pluginname'));
			if (url) {
				$.get(url, postVars, function(data) { 
					try { d = $.parseJSON(data); } catch (e) {
						
					};
					
					try {if (typeof(onresponse) == 'function') onresponse();}
					catch (error) {alert('Error #76399: onresponse failed' + error);}
					ajaxUnblock();
				});
			} else {
				ajaxUnblock();
			}
		}
		autoAjax();
	});

	// invoke autoredirects
	$('.autoRedirect' ).button().unbind('click').click(function(event) {
		if ($(this).attr('href')) {
			url = $(this).attr('href')
		} else {
			var url = autoCreateUrl($(this).attr('extbaseajax'), $(document).getUrlParam('id'), $(this).attr('pluginname'));
		}
		if (typeof($(this).attr('newwindow')) != 'undefined') {
			url += '&mode=standalone'
			title = $(this).attr('title');
			wwidth = $(this).attr('wwidth');if (typeof(wwidth) == 'undefined') wwidth=600;
			wheight = $(this).attr('wheight');if (typeof(wheight) == 'undefined') wheight=300;
			wscrollbars = $(this).attr('wscrollbars');
			window.open(url, title, 'width='+wwidth+',height='+wheight+',scrollbars='+wscrollbars);
		} else if (typeof($(this).attr('newtab')) != 'undefined') {
			if (typeof($(this).attr('target')) != 'undefined') {
				window.open(url, $(this).attr('target'));
			} else {
				window.open(url);
			}
		} else {
			window.location = url;
		}
	});
	
	
	// invoke modal mmessages
	$('.modalMessage').button().unbind('click').click(function(event) {
		event.stopPropagation();
		var onshow = makeFn($(this).attr('onshow'));
		var onsave = makeFn($(this).attr('onsave'));
		var title = $(this).attr('title');
		
		addParams = '';
		if ($(this).attr('params')) {
			var params = $(this).attr('params');
			paramList = params.split(',');
			for (i = 0;i < paramList.length; i++) {
				paramId = paramList[i];
				paramValue = $('#' + paramId).val();
				addParams += ',' + paramId + ":'" +  paramValue + "'"
			}
		}
		
		
		
		var okText = extbaseAjax.buttonok; 
		if ($(this).attr('oktext')) okText = $(this).attr('oktext');
		
		ajaxBlock();
		
		if (typeof ($(this).attr('extbaseajax')) != 'undefined') {
			var url = autoCreateUrl($(this).attr('extbaseajax') + addParams, 0, $(this).attr('pluginname'));
			if (url) {
				$.get(url, '', function(data) { 
					modalMessage(title, data, okText, onshow, onsave);
				});
			} else {
				$.unblockUI();
			}
		} else {
			modalMessage(title, $(this).attr('text'), okText, onshow, onsave);
		}
		autoAjax();
	});
	
	// activate modal confirm dialog box
	$('.modalConfirm' ).button().unbind('click').click(function(event) {
		event.stopPropagation();
		
		ajaxBlock()
		
		var $element = $(this)
		var title = $(this).attr('title');
		var text = $(this).attr('text');
		
		var cancelText = extbaseAjax.buttonno; 
		if ($(this).attr('cancel')) cancelText = $(this).attr('cancel');

		var confirmText = extbaseAjax.buttonyes; 
		if ($(this).attr('confirm')) confirmText = $(this).attr('confirm');

		var onconfirm = makeFn($(this).attr('onconfirm'));
		
		if (typeof($(this).attr('extbaseajax')) != 'undefined')
			var url = autoCreateUrl($(this).attr('extbaseajax'), 0, $(this).attr('pluginname'));
		
		var elementid = randomString(16);

		// add div tag at the beginning of the document, will be used by modalForm
		$( 'body' ).prepend('<div id="modalWindow_' + elementid + '"></div>');
		$modalWindow = $( '#modalWindow_' + elementid );
		
		$modalWindow.html(text);
		returnCode = $modalWindow.dialog({
			modal: true, 
			title: title,
			width: 'auto',
			buttons: [
					{text: cancelText, click: function() {return dialogClose($(this));}},
					{text: confirmText, click: function() {return dialogAction($(this), $element, onconfirm);}}
				],
			beforeClose: function(event, ui) {
				ajaxUnblock();
			}
				
		});
	});
	
	
	// activate modal dialog boxes
	$( '.modalDialog' ).button().unbind('click').click(function(event) {
		event.stopPropagation();

		ajaxBlock();
		
		var title = $(this).attr('title');
		var closeText = extbaseAjax.buttoncancel; 
		if ($(this).attr('closetext')) closeText = $(this).attr('closetext');
		
		var saveText = extbaseAjax.buttonsave;
		if ($(this).attr('savetext')) saveText = $(this).attr('savetext');

		var onsave = makeFn($(this).attr('onsave'));
		var beforesave = makeFn($(this).attr('beforesave'));
		
		var nosave = false;
		if ($(this).attr('nosave')) nosave = $(this).attr('nosave');
		
		var onshow = makeFn($(this).attr('onshow'));
		var icon = $(this).attr('icon');
		var url = autoCreateUrl($(this).attr('extbaseajax'), 0, $(this).attr('pluginname'));
		var elementid = randomString(16);
		

		// add div tag at the beginning of the document, will be used by modalForm
		$( 'body' ).prepend('<div id="modalWindow_' + elementid + '" class="modalWindow"></div>');
		$modalWindow = $( '#modalWindow_' + elementid );

		if (url) {
			$.get(url, '', function(data) { 
				$modalWindow.html(data);

				if (nosave) {
					var buttons = [
							{text: closeText, click: function() {dialogClose($(this));}}
						];
				} else {
					var buttons = [
							{text: saveText, click: function() {dialogSave($(this), onsave, onshow, beforesave);}},
							{text: closeText, click: function() {dialogClose($(this));}}
						];
				}
				

				// prepare modal form
				$modalWindow.dialog({
					autoOpen: false,
					autoResize: true,
					resizable: false,
					modal: true, 
					title: title,
					width: 'auto',
					show: 'fade',
					hide: 'fade',
					buttons: buttons,
					beforeClose: function(event, ui) {
							if ($modalWindow.find('form').attr('changed') == 'true') {
								modalAsk('Änderungen verwerfen?', function() {
									dialogClose($( '#modalWindow_' + elementid), true);
								});
								return false;
							}
							$modalWindow.find('*').unbind();
							$modalWindow.detach();
						},
					create: function(event, ui) {
						if (typeof(icon) != 'undefined') {
							htmlImgTag = '<img style="display: block; float: left; width: 28px; height: 28px; margin-right: 10px;" alt="" src="' + icon + '" />'; 
							$(this).prev('.ui-dialog-titlebar').prepend(htmlImgTag);
						}
					}
				});
				
				activateWarning( $('#modalWindow_' + elementid) );
				ajaxUnblock();
				$modalWindow.dialog('open');
				
				if (nosave) {
					$('#modalWindow_' + elementid).find('input, select, textarea').attr('disabled',true);
				}

				try {if (typeof(onshow) == 'function') onshow();}
				catch (error) {alert('Error #76359: onshow failed' + error);}
				
				autoAjax();
			});
		} else {
			$.unblockUI();
		}
	});
}


/**
 * autoCreateUrl
 * Creates an URL from the ajax settings including the attributes as parameters
 * 
 * @param el
 * 
 * Prepares a callback url to backend
 */
function autoCreateUrl ( paramList, idFromUri, pluginName ) {
	var pagetype = '?type=' + extbaseAjax.type;
	var url = '';
	var pageid = '';
	if (idFromUri) {
		pageid = '&id=' + idFromUri.toString();
	}

	if (pluginName) {
		;
	} else {
		pluginName = extbaseAjax.prefix;
	}

	try {
		var attributes = eval('({' + paramList + '})');

		if (typeof(attributes.pluginname) != 'undefined') pluginName = attributes.pluginname;
		for (key in attributes) {
			if (key == 'type') {
				pagetype = '?type=' + attributes[key];
			} else {
				if (Right(key, 1) == '_') {
					
					keyList = key.split('_');
					newKey = '';
					for (n = 0; n < keyList.length - 1; n++) {
						newKey += '[' + keyList[n] + ']';
					}
					
					url += '&' + pluginName + newKey + '=' + attributes[key];
				} else {
					url += '&' + pluginName + '[' + key + ']=' + attributes[key];
				}
			}
		}
		return pagetype + pageid + url;
	}
	catch (error) {
		alert('Error #12645: Invalid extbaseajax attribute. Cannot evaluate ' + paramList);
		return '';
	}
}


/**
 * dialogClose
 */
function dialogClose($el, forceDialogClose) {
	
	if (forceDialogClose) {
		$el.find('*').unbind();
		$el.dialog('destroy');	
		$el.detach();	
	} else {
		$el.dialog('close');	
		if (! $el.dialog('isOpen')) {
			$el.find('*').unbind();
			$el.dialog('destroy');	
			$el.detach();
		}
	}
}


/**
 * dialogSave
 */
function dialogSave($el, onsave, onshow, beforesave) {
	// block this window
	
	var elementid = randomString(16);
	
	$('#' + $el.attr('id') ).closest('div.ui-dialog')
		.prepend('<div id="' + elementid + '" style="position: absolute; left:0; top: 0; width: 100%; height: 100%; background: url(typo3conf/ext/extbase_ajax/Resources/Public/Icons/ajax-loader-blue.gif) no-repeat center center; background-color: #ccd; opacity: 0.7; z-index: 9999;"></div>');

	// unbind events
	$('#' + $el.attr('id') ).find('*').unbind();
	

	var $form = $el.find('form');

	try {if (typeof(beforesave) == 'function') beforesave()} catch (e) {}

	var postVars = $form.serialize();
	var url = $form.attr('action');
		
	if (typeof($form.attr('type')) != 'undefined') {
		url += '&type=' + $form.attr('type');
	} else {
		url += '&type=' + extbaseAjax.type;
	}

	var loaded = false;
	$.post(url, postVars, function(data) {
		try {
			var result = pushData(data);
			if (result === false ) {
				loaded = false;
			} else {
				d = $.parseJSON(data);			
				$el.find('form').attr('changed', 'false');			
				$el.find('*').unbind();
				$el.dialog('close');
				$el.dialog('destroy');	
				$el.detach();
				loaded = true;
			}
		}
		catch (error) {
			$el.html(data);
			$el.find('form').attr('changed', 'true');
			
			try {if (typeof(onshow) == 'function') 
				autoAjax();	
				onshow();
				$('#' + elementid).detach();
			} catch(e) {}
		}
		
		if (loaded) {
			try {if (typeof(onsave) == 'function') onsave()} catch (e) {}
		}
	})
	
	.error(function(data) {
		alert('Error #44231: ' + data.status + ' ' + data.statusText);
	});
}


/**
 * modalAsk
 */
function modalAsk ( text, onYes, onNo ) {
	var elementid = randomString(16);
	var $modalAsk;

	$( 'body' ).prepend('<div id="modalWindow_' + elementid + '"></div>');
	
	$modalAsk = $( '#modalWindow_' + elementid );
	$modalAsk.html( text );
	$modalAsk.dialog({
		title: extbaseAjax.confirmtitle,
		stack: true,
		modal: true,
		autoOpen: false,
		buttons: [
			{text: extbaseAjax.buttonyes, click: function() {$(this).dialog('destroy');$(this).detach;try {onYes();} catch (e) { }}}, 
			{text: extbaseAjax.buttonno, click: function() {$(this).dialog('destroy');$(this).detach;try {onNo();} catch (e) { }}}
		]
	});

	$modalAsk.dialog('open');
}


/**
 * randomString
 * Returns a rando string of length <lenght>
 * Only lower case characters and numbers will be used
 * 
 * @param length
 */
function randomString(length) {
    var chars = '0123456789abcdefghiklmnopqrstuvwxyz'.split('');
    if (! length) length = Math.floor(Math.random() * chars.length);
    
    var str = '';
    for (var i = 0; i < length; i++) {str += chars[Math.floor(Math.random() * chars.length)];}
    return str;
}


/**
 * ajaxBlock
 */
function ajaxBlock () {
	$.blockUI({
		message: null,
		css: {border: 'none', width: 'auto', height: 'auto', margin: 'auto', zIndex: 99999},
		overlayCSS: {background: 'url(typo3conf/ext/extbase_ajax/Resources/Public/Icons/ajax-loader-blue.gif) no-repeat center center'}
	});
}


/**
 * ajaxUnblock
 */
function ajaxUnblock () {
	$.unblockUI();
}


/**
 * activateWarning
 * activates the warning dialog if fields in modal form have changed
 */
function activateWarning ( $window ) {
	$form = $window.find('form');
	var changed = $form.attr('changed');
	if (typeof(changed) == 'undefined') {$form.attr('changed', 'false');}
	$form.find('input').change(function(){$form.attr('changed', 'true');});
}


/**
 * dialogAction
 */
function dialogAction ($dialog, $el, onconfirm) {
	if (typeof($el.attr('extbaseajax')) != 'undefined')
		var url = autoCreateUrl($el.attr('extbaseajax'), 0, $el.attr('pluginname'));
	
	var removeElement = $el.attr('remove');

	$dialog.dialog('close');
	if (url) {
		ajaxBlock();
		$.get(url, '', function(data) { 
			try { pushData(data); }
			catch (e) {}

			try { d = $.parseJSON(data); } catch(e) { 
				modalMessage ('', data, 'Ok');
			}
			success = data.sucess;
			message = data.message;
			try {if (typeof(onconfirm) == 'function') onconfirm()} catch (e) {}		
			jqueryInterface(data);
		});
	} else {
		$.unblockUI();
		try {if (typeof(onconfirm) == 'function') onconfirm()} catch (e) {}		
	}
}


/**
 *
 */
function jqueryInterface(data) {
	try {
		resultArray = $.parseJSON(data);
		actions = resultArray.actions;
		for (key in actions) {
			switch(actions[key].jQcmd) {
				case 'fadeOut':$(actions[key].jQsel).fadeOut();break;
				case 'html':$(actions[key].jQsel).html(actions[key].jQdata);break;
				case 'attr':$(actions[key].jQsel).attr(actions[key].jQprop, actions[key].jQdata);break;
				case 'css':$(actions[key].jQsel).css(actions[key].jQprop, actions[key].jQdata);break;
				case 'addClass':$(actions[key].jQsel).addClass(actions[key].jQdata);break;
				case 'removeClass':$(actions[key].jQsel).removeClass(actions[key].jQdata);break;
			}
		}
	}
	catch (e) {}
}


/**
 * modalMessage
 */
function modalMessage (title, text, buttontext, onshow, onsave) {
		ajaxUnblock()

		var elementid = randomString(16);

		// add div tag at the beginning of the document, will be used by modalForm
		$( 'body' ).prepend('<div id="modalWindow_' + elementid + '"></div>');
		$modalWindow = $( '#modalWindow_' + elementid );
		
		$modalWindow.html(text);
		returnCode = $modalWindow.dialog({
			modal: true, 
			title: title,
			width: 'auto',
			buttons: [
					{text: buttontext, click: function() {
						try {if (typeof(onsave) == 'function') onsave()} catch (e) {}
						return dialogClose($(this));}}
				],
			beforeClose: function(event, ui) {
				$(this).find('*').unbind();
				$(this).detach();
				ajaxUnblock();
			}
				
		});
		try {if (typeof(onshow) == 'function') onshow();}
		catch (error) {alert('Error #76369: onshow failed' + error);}
}

/**
 * pushData
  * takes an JSON array and pushes the data into span tags with 
 * reference in key
 */
function pushData(data) {
	resultArray = $.parseJSON(data);
	redirectUrl = resultArray.redirect;
	if (resultArray.success == 'ok' || resultArray.success == true) {
		if (typeof(resultArray.additemtype) != 'undefined') {
			$( '#' + resultArray.item + 'List' + resultArray.itemtype ).append( resultArray.showView );
//			prepareShowForms();
		}

		$.each(resultArray, function(key, value) {
			$('span[reference="' + key + '"]').html(value);
		});
		
		try {
			$('#' + resultArray.remove).fadeOut();
		}
		catch (error) {
			// nothing to do
			alert('Error #52319: ' + error);
		}
		
		return redirectUrl;
	} else {
		for (key in resultArray.error) {
			$(resultArray.error[key]).addClass('f3-form-error');
		}
		
		return false;
	}
}

/**
 * makeFn
 * takes text and wraps in a "function(){}" 
 * returns function if valid eval possible, null otherwise
 */
function makeFn (text) {
	if (typeof(text) == 'undefined') return null;
	
	var fnText = 'var fnFun = function() {' + text + '}';
	try {
		eval(fnText);
		return fnFun;
	}
	catch (e) {
		error = 'Error #33778: Cannot evaluate expression \r\n' + text + '\r\n to Javascript function.\r\n ' + error;
		alert(error);
	}
	return null;
}


/**
 * activateModalDialog
 * will be removed in next version
 */
function activateModalDialog() {
	autoAjax();
}


function Right(str, n){
	if (n <= 0)
		return "";
	else if (n > String(str).length)
		return str;
	else {
		var iLen = String(str).length;
		return String(str).substring(iLen, iLen - n);
	}
}