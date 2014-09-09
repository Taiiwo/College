//functions
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
}
function applyOneGravity() {
	currentHeight = parseInt($('#bird').css('top').replace(/px/,""));
	gravities++;
	$('#bird').rotate(-90 + gravities*2);
	$('#bird').css('top', (currentHeight + (((gravity * gravities)/1000) * interval) + 'px'));
	if (currentHeight > documentHeight) {
		die();
	}
	else {
		$('.bottomPipe').each(function(index) {
			//console.log(parseInt($(this).css('right')));
            startCounting = true;
			if (parseInt($(this).css('right')) > hitBoxMin && parseInt($(this).css('right')) < hitBoxMax){
                
				if (currentHeight > ((documentHeight - parseInt($(this).css('bottom'))- documentHeight * 0.1))){
					die();
                }
                
            
			}/*
            else {
                countPoints();
            }*/
		});
		$('.topPipe').each( function(index){
            startCounting = true;
			if (parseInt($(this).css('right')) > hitBoxMin && parseInt($(this).css('right')) < hitBoxMax){
				if (currentHeight < (parseInt($(this).css('top')) + documentHeight * 0.07)){
					die();
				}
                
			}/*
            else {
                
            }*/
            
		});
	}
}
function countPoints(){
    if ( startCounting === true ){
        points++;
    }
    $('#points').html(points);
}
$('#game').click(flap);
function flap() {
	$('#this').rotate({ animateTo:-90});
	gravities = -flapPower;
}
function makePipes() {
	pipeNumber++;
	$('#game').html($('#game').html() + ' <img id="bot' +		pipeNumber + '" class="bottomPipe head pipe"	src="http://i.imgur.com/qTxYtKu.png" />'		);
	$('#game').html($('#game').html() + ' <img id="botShaft' +	pipeNumber + '" class="bottomPipeShaft pipe"	src="http://i.imgur.com/dHmRdtK.png" />'		);
	$('#game').html($('#game').html() + ' <img id="top' +		pipeNumber + '" class="topPipe pipe head"		src="http://i.imgur.com/l1oj3vx.png" />'		);
	$('#game').html($('#game').html() + ' <img id="topShaft' +	pipeNumber + '" class="topPipeShaft pipe"		src="http://i.imgur.com/dHmRdtK.png" />'		);
	var randomHeight = Math.floor(Math.random()*(documentHeight-pipeSpace+1)+1);
	$.each(['top', 'bot'], function(index, value){
		$('#'+value+pipeNumber).css('position', 'absolute'				);
		$('#'+value+pipeNumber).css('right',	'1px'					);
		$('#'+value+pipeNumber).css('width',	documentHeight * 0.15	);

		$('#'+value+pipeNumber+'.bottomPipe').css('bottom',					randomHeight			);
		$('#'+value+'Shaft'+pipeNumber+'.bottomPipeShaft').css('height',	randomHeight			);
		$('#'+value+'Shaft'+pipeNumber+'.bottomPipeShaft').css('width',		documentHeight * 0.15	);
		$('#'+value+'Shaft'+pipeNumber+'.bottomPipeShaft').css('bottom',	1						);
		$('#'+value+'Shaft'+pipeNumber+'.bottomPipeShaft').css('position',	'absolute'				);
		$('#'+value+'Shaft'+pipeNumber+'.bottomPipeShaft').css('right',		1						);

		$('#'+value+pipeNumber+'.topPipe').css('top', documentHeight - randomHeight - pipeSpace						);
		$('#'+value+'Shaft'+pipeNumber+'.topPipeShaft').css('height',	documentHeight - randomHeight - pipeSpace	);
		$('#'+value+'Shaft'+pipeNumber+'.topPipeShaft').css('width',	documentHeight * 0.15						);
		$('#'+value+'Shaft'+pipeNumber+'.topPipeShaft').css('top',		1											);
		$('#'+value+'Shaft'+pipeNumber+'.topPipeShaft').css('position', 'absolute'									);
		$('#'+value+'Shaft'+pipeNumber+'.topPipeShaft').css('right',	1);
	});
}

function movePipes() {// move the pipes
	$('.pipe').each(function(index) {
		if (parseInt($(this).css('right').replace(/px/,"")) < documentWidth) {
			$(this).css('right', parseInt($(this).css('right').replace(/px/,"")) + 6+'px' );
		}
		else {
			$(this).remove();
		}
	});
}
function die(){
	play = false;
	$('#game').html($('#game').html() + '<div id="gameover" onclick="pause()" class="menu" ></div>'	);
	$('#gameover').html($('#gameover').html() + '<img id="replay" src="http://i.imgur.com/fEpz2ly.png" />');
    //document.getElementById('#replay').onclick=function(){
	gravities = 0;
    startCounting = false;
    points = 0;
	$('.pipe').remove();
	$('#bird').css('top', documentHeight * 0.3);
}
$('#replay').click(pause);

//$('#replay').click(pause);
function pause() {
	if (play === true){
		play = false;
	}
	else if (play === false){
		play = true;
		$('#gameover').remove();
	}
}

//initialize
$('#game').html($('#game').html() + '<img id="bird" src="http://i.imgur.com/WnvVgwY.png" />');
$('#bird').rotate(-90);
$('#bird').css('top',1);
var points = 0;
var startCounting = false;
var pipeNumber = 0;
var interval = 25;
var documentHeight = $(document).height();
var pipeSpace = documentHeight / 2;
var documentWidth = $(document).width();
var hitBoxMin = (documentWidth * 0.7) - (documentHeight * 0.15);
var hitBoxMax = (documentWidth * 0.7) + (documentHeight * 0.15) - 100;
var play = true;
var distanceTrv = 0;
var gravities = 0;
//var flapPower = 0.015 * documentHeight;
var flapPower = 12;
var gravity = (9.81*documentHeight) / 100;
var currentHeight;
setInterval(function(){//game speed
	if (play){
		applyOneGravity();//this runs gravity over time
		movePipes();// this moves the pipes
		distanceTrv = distanceTrv + 10;
        
	}
}, interval);
setInterval(function() {//make pipes every second
	if (play){
		makePipes();
        countPoints();
	}
}, 1700);
die();
