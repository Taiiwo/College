//Bind .split to open .middle for 150px
$$('.login.split').addEvent('click', function(event){
	split( $$('.login.middle')[0], 300, event);
});
$$('.register.split').addEvent('click', function(event){
	split( $$('.register.middle')[0], 300, event);
});

function split(middle, height, event){
    
    if( '0px' == middle.getStyle('height') ){
        middle.tween('height', height);
    }else{
        middle.tween('height', '0');
    }
    event.preventDefault();
}
