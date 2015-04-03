// set up fullpage.js (slides)
$('#fullpage').fullpage({
	anchors: ['s0', 's1', 's2', 's3', 's4', 's5'],
	navigation: true,
	navigationPosition: 'right',
	navigationTooltips: [	'Intro', 'Languages',
												'Processing', 'Functionality',
												'Features', 'Accessibility'],
	slidesNavigation: true,
	onLeave: function(anchor, index){
		$('h1, h2, h3, h4, h5, p, span, li')
		.animate({
			opacity: 0
		}, 150)
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
	Trianglify.colorbrewer.RdPu,
	Trianglify.colorbrewer.Spectral
];
$.each(colours, function(index, value){
	var t = new Trianglify({
		x_gradient: value[8],
		y_gradient: value[4]
	});
	var pattern = t.generate(document.body.clientWidth, document.body.clientHeight);
	$('#section' + index).css('background-image', pattern.dataUrl);
});
var sd = new Showdown.converter();
$('xmd').each(function(index, value) {
	value = $(value);
	var md = value.html();
	value.empty();
	value.append(sd.makeHtml(md));
});
