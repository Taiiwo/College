//Bind .split to open .middle for 150px
$$('.login.split').addEvent('click', function(event){
	split( $$('.login.middle')[0], 300, event);
});
$$('.register.split').addEvent('click', function(event){
	split( $$('.register.middle')[0], 300, event);
});
var openSplit = "";
function split(middle, height, event){
	if( '0px' == middle.getStyle('height') ){
		//Close current split if exists
		if (openSplit != ""){
			openSplit.tween('height', '0');
		}
		//Set new open split
		openSplit = middle;
		//Open the new split
		middle.tween('height', height);
	}
	else{
		openSplit = "";
		middle.tween('height', '0');
	}
	event.preventDefault();
}
