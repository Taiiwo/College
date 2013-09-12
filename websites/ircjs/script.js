function button(){
	print( document.getElementById('speech').value );
	document.getElementById('speech').value = '';
}
function print(string){
	$('#textoutput').html( $('#textoutput').html() + '<br />' + string );
}
function onenterpress(event) {
	if (event.keyCode === 13 ){
		button();
	}
}
function refocus(){
	$('#speech').focus();
}
