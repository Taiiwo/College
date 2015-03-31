$('#fullpage').fullpage({
	anchors: ['s1', 's2', 's3'],
	sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
	navigation: true,
	navigationPosition: 'right',
	navigationTooltips: ['1', '2', '3']
});
var colours = [
	Trianglify.colorbrewer.YlGn,
	Trianglify.colorbrewer.PuOr,
	Trianglify.colorbrewer.PuBu
];
$.each(colours, function(index, value){
	var t = new Trianglify({
		x_gradient: value[8],
		y_gradient: value[4]
	});
	var pattern = t.generate(document.body.clientWidth, document.body.clientHeight);
	$('#section' + index).css('background-image', pattern.dataUrl);
});
/*
var t = new Trianglify({
	x_gradient: Trianglify.colorbrewer.OrRd[8],
	y_gradient: Trianglify.colorbrewer.OrRd[4]
});
var pattern = t.generate(document.body.clientWidth, document.body.clientHeight);
$('#section1').css('background-image', pattern.dataUrl);
var t = new Trianglify({
	x_gradient: Trianglify.colorbrewer.PuBu[8],
	y_gradient: Trianglify.colorbrewer.PuBu[4]
});
var pattern = t.generate(document.body.clientWidth, document.body.clientHeight);
$('#section2').css('background-image', pattern.dataUrl);
*/
var sd = new Showdown.converter();
$('xmd').each(function(index, value) {
	value = $(value);
	var md = value.html();
	value.empty();
	value.append(sd.makeHtml(md));
});
