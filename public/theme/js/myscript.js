$(document).ready(function(){
    $('#carousel-example-one').carousel({
		interval: false,
		keyboard: false,
		pause: "hover"
	});
	$('#carousel-example-two').carousel({
		interval: false,
		keyboard: false,
		pause: "hover"
	});
	$('#carousel-example-three').carousel({
		interval: 3000,
		keyboard: false,
		pause: "hover"
	});
	$('#carousel-example-four').carousel({
		interval: false,
		keyboard: false,
		pause: "hover"
	});
	$('#carousel-example-fifth').carousel({
		interval: false,
		keyboard: false,
		pause: "hover"
	});

	// Price range bootstrap slider
	$( function() {
		function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 1000000,
			values: [ 100000, 800000 ],
			slide: function( event, ui ) {
			$("#price-min").val(addCommas(ui.values[0]) + " VND");
			$("#price-max").val(addCommas(ui.values[1]) + " VND");
			}
		});
		$( "#price-min" ).val(addCommas($( "#slider-range" ).slider( "values", 0 )) + " VND" );
		$( "#price-max" ).val(addCommas($( "#slider-range" ).slider( "values", 1 )) + " VND" );
		} );

		// $(window).resize(function() {
		// 	if ($(window).width() < 990) {
				$(".has-drop-footer1").click(function (){
					$(".footer-navbar1").toggleClass('show');
				});

				$(".has-drop-footer2").click(function (){
					$(".footer-navbar2").toggleClass('show');
				});
				$(".has-drop-footer3").click(function (){
					$(".footer-navbar3").toggleClass('show');
				});
			// });
// }

$('.product-action a').on('click', function (event) {
	event.preventDefault();
});

			})