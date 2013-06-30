$(document).ready(function(){
$('#language_change>select>option').on('click',function(form){
    $('#language_change').submit();
});
});

function showFlashMessage(message,width,height){
	var w_width = window.innerWidth;
	var w_height = window.innerHeight;
	if(width==null){
		var width='auto';
	}
	if(height==null){
		var height='auto';
	}
	$('body').append('<div id=\'messagebox\'></div>');
	$('#messagebox').css('width',width).css('height',height);
	width = $('#messagebox').width();
	height = $('#messagebox').height();

	$('#messagebox').css('position','absolute').css('top',0)
	.css('left',(w_width/2)-(width/2)).html(message).fadeIn(2000).delay(3500).fadeOut(2000);
}