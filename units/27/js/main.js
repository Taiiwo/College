// set up fullpage.js (slides)
$('#fullpage').fullpage({
	anchors: ['s0', 's1', 's2', 's3', 's4', 's5', 's6','s7', 's8'],
	navigation: true,
	navigationPosition: 'right',
	navigationTooltips: [	'Intro', 'Languages',
												'Processing', 'Functionality',
												'Features', 'Accessibility',
												'Comparison Table', 'Examples',
												'Security'],
	slidesNavigation: true,
	onLeave: function(anchor, index){
		$('h1, h2, h3, h4, h5, p, span, li')
		.animate({
			opacity: 0
		},200)
			.animate({
				opacity: 1
			}, 800)
	}
});

// set colours for page backgrounds
var colours = [
	Trianglify.colorbrewer.YlGn,
	Trianglify.colorbrewer.PuOr,
	Trianglify.colorbrewer.PuBu,
	Trianglify.colorbrewer.RdYlGn,
	Trianglify.colorbrewer.PuBuGn,
	Trianglify.colorbrewer.Spectral,
	Trianglify.colorbrewer.Purples,
	Trianglify.colorbrewer.RdBu,
	Trianglify.colorbrewer.RdYlBu

];
var t;
var pattern;
$.each(colours, function(index, value){
	t = new Trianglify({
		x_gradient: value[8],
		y_gradient: value[4],
		noiseIntensity: 0.1
	});
	pattern = t.generate(document.body.clientWidth, document.body.clientHeight);
	$('#section' + index).css('background-image', pattern.dataUrl);
});
var sd = new Showdown.converter({extensions:['table']});
$('xmd').each(function(index, value) {
	value = $(value);
	var md = value.html();
	value.empty();
	value.append(sd.makeHtml(md));
});
