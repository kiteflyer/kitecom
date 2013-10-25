/*
 * jQuery File Upload Plugin JS Example 8.2
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint nomen: true, regexp: true */
/*global $, window, navigator, blueimp */

$(function () {
    'use strict';

	var uid = $('#upload_hauptbild').attr('data-uid');
	var cat = $('#upload_hauptbild').attr('data-cat');
	var user = $('#upload_hauptbild').attr('data-user');	
	var section = $('#upload_hauptbild').attr('data-section');	
	


    // Initialize the jQuery File Upload widget:
    $('.fileupload1').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
		url: 'fileadmin/fileupload/server/php/index.php?uid='+uid+'&cat='+cat+'&user='+user+'&section='+section,
		autoUpload: true,
		maxNumberOfFiles: 1
    });

    // Enable iframe cross-domain access via redirect option:
    $('.fileupload1').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('.fileupload1').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator && navigator.userAgent),
            maxFileSize: 50000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('.fileupload');
            });
        }
    } else {
        // Load existing files:
        $('.fileupload1').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('.fileupload1').fileupload('option', 'url'),        
            dataType: 'json',
            context: $('.fileupload1')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, null, {result: result});
        });
    }

    // Show the blueimp Gallery as lightbox when clicking on image links:
    $('.fileupload .files').on('click', '.gallery', function (event) {
        // The :even filter removes duplicate links (thumbnail and file name links):
        if (blueimp.Gallery($('.fileupload .gallery').filter(':even'), {
                index: this
            })) {
            // Prevent the default link action on
            // successful Gallery initialization:
            event.preventDefault();
        }
    });
    
    
    
	$('.fileupload1').bind('fileuploadadd', function (e, data) {
		$('#upload_hauptbild .fileinput-button').hide();
    });
    
    
	$('.fileupload1').bind('fileuploaddestroy', function (e, data) {
                if (data.url) {
					$('#upload_hauptbild .files').empty();
					$('#upload_hauptbild .fileinput-button').show();					
                } 
    });

/*	if ($('.fileupload1 .preview img').length > 0) {
		$('.fileinput-button').hide();
	}
*/
});


$( document ).ready(function() {

	setTimeout(function() {
	if ($('#upload_hauptbild .thumbnail').length > 0)
	$('#upload_hauptbild .fileupload1 .fileinput-button').hide();
	else
	$('#upload_hauptbild .fileupload1 .fileinput-button').show();
}, 1000);
});



