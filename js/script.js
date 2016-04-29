$.ajaxSetup({
  // Set throbber for all AJAX call.
  	beforeSend: function() {
        $("#page-loader").show();
    },
    complete: function() {
    	$("#page-loader").slideUp();
    }
});

var allowedFileSize = 2048000;
var checkFileSize = 0 ;

$(window).on("load", function(){
	$("#page-loader").slideUp();
});
$(document).ready(function(){
	// textarea line number plugin
	$('#editer-textarea').numberedtextarea({

	  // font color for line numbers
	  color: null,

	  // border color
	  borderColor: null,

	  // CSS class to be added to the line numbers
	  class: null, 

	  // if true Tab key creates indentation
	  allowTabChar: true,       

	});

	// editor animation
	$('.editor.animated').addClass('fadeInLeft');
	
	// box animation
	$('.animate-css-box.animated').addClass('fadeInUp');
	$('.animate-html-box.animated').addClass('fadeInUp');
	$('.animate-js-box.animated').addClass('fadeInUp');


	// Clipboard Copy Text
	var clipboard = new Clipboard('#copy-content');
	clipboard.on('success', function(e) {
		swal({
			title: "Copied!",
			text: "Copied to clipboard!",
			type: "success",
			confirmButtonText: "Cool",
			confirmButtonColor: "#2cc36b"
		});
	});
	clipboard.on('error', function(e) {
		swal({
			title: "Sorry!",
			text: "Something went wrong!",
			type: "error",
			confirmButtonText: "Close",
			confirmButtonColor: "#c0392b"
		});
	});

});


// Clear Editor Text
function clear() {
	var $form = $( '#form' ),
	content = $form.find( "textarea[name='content']" ).val();

	if ( content != "" ) {
		
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this content!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, clear it!",
			cancelButtonColor: "#2c3e50",
			closeOnConfirm: false
		},
		function(){
			$form.find( "textarea[name='content']" ).val("");
			swal({
				title: "Removed!",
				text: "Your content was removed.",
				type: "success",
				confirmButtonColor: "#27ae60"
			});
		});

	} else {

		swal({
			title: "Content already clear!",
			confirmButtonColor: "#2c3e50"
		});

	}
}

// Submiting Form using jQuery AJAX
$( "#form" ).submit(function( event ) {

 	// Stop form from submitting normally
 	event.preventDefault();

	// Get some values from elements on the page:
	var $form = $( this ),
	content = $form.find( "textarea[name='content']" ).val(),	
	url = $form.attr( "action" );
	
	if ( content != "" ) {

		// Send the data using post
		var posting = $.post( url, { content: content } );
		
		// Put the results in a div
		posting.done(function( data ) {
			$('.modal-body #result').text( data );
			$('#myModal').modal('show');
		});

	} else {

		swal({
			title: "Sorry!",
			text: "Textarea field can't be blank!",
			type: "error",
			confirmButtonText: "Close",
			confirmButtonColor: "#c0392b"
		});

	}

});



/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
	*/

	'use strict';

	;( function ( document, window, index )
	{
		var inputs = document.querySelectorAll( '.inputfile' );
		Array.prototype.forEach.call( inputs, function( input )
		{
			var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

			input.addEventListener( 'change', function( e )
			{
				var fileName = '';
				if( this.files && this.files.length > 1 )
					fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
				else
					fileName = e.target.value.split( '\\' ).pop();

				if( fileName )
					label.querySelector( 'span' ).innerHTML = fileName;
				else
					label.innerHTML = labelVal;
			});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
	}( document, window, 0 ));


// script for file upload

function file_upload()	{

	$("#file-upload-form").modal("toggle");

	$("[for=compress-file-input]>span").text(""); 

	$('#compress-file-input').val('');

}

function submit_file()	{

	var val =  $('#compress-file-input').val();

	if (val == "") {
		set_sweet_message("Sorry!", "Please select file.", "error");
		return false;
	}

	switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
		case 'css': case 'js': case 'html':
		// valid files ... 
		break;

		default:
		// show error message for invalid file ...
		$("[for=compress-file-input]>span").text("");
		$('#compress-file-input').val('');
		set_sweet_message("Sorry!", "Please select valid file.", "error");
		return false;

		break;
	}

	// validate file size
	console.log(checkFileSize, ":", allowedFileSize );
	if(checkFileSize > allowedFileSize)	{

		$("[for=compress-file-input]>span").text(""); 

		$('#compress-file-input').val('');

		set_sweet_message("Sorry!", "Allowed file size upto 2 MB.", "error");

		return false;
	}

	var file_data = $('#compress-file-input').prop('files')[0];   
	var form_data = new FormData();                  
	form_data.append('file', file_data);                         
	$.ajax({
	                url: 'upload.php', // point to server-side PHP script 
	                dataType: 'json',  // what to expect back from the PHP script, if anything
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,                         
	                type: 'post',
	                success: function(rs){
	                	if(rs.result){
	                		$("#result").text(rs.content);
	                		$("#hdnContent").text(rs.content);
	                		$("#hdnFileExt").text(rs.ext);
	                		$("#file-upload-form").modal("toggle");
	                		$("#myModal").modal("toggle");
	                	}	else {
	                		set_sweet_message("Sorry!",  rs.msg, "error");
	                	}
	                }
	            });

}

$('#compress-file-input').bind('change', function() {

	checkFileSize = this.files[0].size;

});


//created common funtion for  sweet alert
function set_sweet_message(title, text, type){

	swal({
		title: title,
		text: text,
		type: type,
		confirmButtonText: "Close",
		confirmButtonColor: "#c0392b"
	});

}