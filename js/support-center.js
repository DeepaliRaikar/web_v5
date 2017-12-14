/**
 * Created by Deeps on 06-04-2017.
 */

'use strict';

( function ( document, window, index )
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

            if( fileName ){
                $("#previewImage").css("display","block");
                $("#previewImage").siblings(".form-group").children("textarea").css("display","none");
                $("#previewImage").siblings("button").html("Send");
                $("#uploadComplaintImage").siblings("label").children("span").html("<i class='material-icons'>attachment</i>");
            }
            else
            {
                label.innerHTML = labelVal;
                $("#output").removeAttr("src");
                $("#previewImage").css("display","none");
                $("#previewImage").siblings(".form-group").children("textarea").css("display","block");
                $("#previewImage").siblings("button").html("Write Reply");
                $("#uploadComplaintImage").siblings("label").children("span").html("<i class='material-icons'>attachment</i>");
            }
        });

        // Firefox bug fix
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });
}( document, window, 0 ));
function loadFile(element)
{
    $("#previewImage").show();

    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        $("#output").wrap('<a class="preview-upload-image" href="'+reader.result+'" rel="preview-image">');
        $("a.preview-upload-image").fancybox();
    };
    reader.readAsDataURL(element.files[0]);
}

$(".removeImage").click(function(){
    $("#output").removeAttr("src");
    $("#previewImage").css("display","none");
    $("#previewImage").siblings(".form-group").children("textarea").css("display","block");
    $("#previewImage").siblings("button").html("Write Reply");
    $("#uploadComplaintImage").siblings("label").children("span").html("<i class='material-icons'>attachment</i>");
});
$(document).ready(function(){
    // load image lightbox
    $("a.single_image").fancybox({
        'transitionIn'	:	'elastic',
        'transitionOut'	:	'elastic',
        'speedIn'		:	600,
        'speedOut'		:	200,
        'overlayShow'	:	false
    });
    $("#sidebar").css('height',$("#dashboard-right-content").outerHeight());
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $("#sidebar").css('height',$("#dashboard-right-content").outerHeight());
    });
})
