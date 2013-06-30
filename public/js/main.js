$(document).ready(function(){
$('#language_change>select>option').on('click',function(form){
    $('#language_change').submit();
});
});

function showFlashMessage(message,width,height){
	var w_width = window.innerWidth;
	var w_height = window.innerHeight;
	if(width==undefined){
		width = 'auto';
	}
		if(height==undefined){
		height = 'auto';
	}
	$('body').append('<div id=\'messagebox\'></div>');
	$('#messagebox').css('width',width).css('height',height).css('margin','0 auto');
	console.log(w_width+ ' '+w_height+ ' '+ width+ ' '+height);
	$('#messagebox').html(message).fadeIn(2000).delay(3500).fadeOut(2000);
}