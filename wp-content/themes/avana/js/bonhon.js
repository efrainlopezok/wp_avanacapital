
jQuery(document).ready(function(){

	// 1st chart
	// var colors = [
	// 	'#7cc9dd',
	// 	'#a7dae8',
	// 	'#dee0e1',
	// 	'#7c7e82',
	// 	'#5b5d60',
	// 	'#912036',
	// 	'#008298',
	// 	'#3e99ab',
	// ];
	// var labels = ["Nebraska", "South Carolina", "Ohio", "New York", "Georgia", "California", "Tennessee", "Texas"];
	// var data = [15, 12, 8, 6, 4, 42, 35, 30];
	var labels = chart1_labels,
		colors = chart1_colors,
		data   = chart1_percents;

	var dataChart = {
	 	labels: labels,
	 	datasets: [{
			data: data,
	    	backgroundColor: colors
	  	}]
	};

	var config = {
  		type: 'doughnut',
  		data: dataChart,
  		options: {
  			showAllTooltips: true,
    		maintainAspectRatio: false,
    		cutoutPercentage: 50,
    		legend: {
				position: 'bottom',
				labels: {
					padding: 20,
					fontSize: 14,
                }
    		},

    		tooltips: {
	      		yPadding: 1,
	      		titleFontSize: 15,
				bodyFontSize: 15,
				backgroundColor: '#f2f2f2',
				bodyFontColor: '#525252',
				// bodyFontStyle: 'bold',
				displayColors: false,
				enabled: false,
	      		callbacks: {
        			label: function(tooltipItem, data) {
		          		return data.labels[tooltipItem.index];
        			}
                }, 
                custom: function(tooltipModel) {
                    var popup = jQuery('#states_popup');
					
					function getBody(bodyItem) {
						return bodyItem.lines;
					}

					if (tooltipModel.body) {
						var titleLines = tooltipModel.title || [];
						var bodyLines = tooltipModel.body.map(getBody);

						var data = bodyLines[0][0].split(':'),
							hotelID = data[0].trim().replace(' ', '-').toLowerCase();

						if( jQuery('#'+hotelID).length > 0 ) {
							jQuery(popup).find('.wrap-box').addClass('hide');
							jQuery('#'+hotelID).removeClass('hide');
						}
					}

					var position = this._chart.canvas.getBoundingClientRect();
						posX = tooltipModel.caretX,
						posY = tooltipModel.caretY - popup.height() / 2,
						chartW = jQuery('#doughnutChart').width(),
						popupW = popup.width();

					// if( posX >= chartW / 2 ) {
					// 	posX = chartW / 2 + 346 / 2 + 5;
					// 	popup.addClass('from-right');
					// }
					// else {
					// 	posX = chartW / 2 - 346 / 2 - popupW - 5;
					// 	popup.removeClass('from-right');
					// }

					var screensize = document.documentElement.clientWidth;

					if (screensize  >= 1300) {
                        if( posX >= chartW / 2 ) {
							posX = chartW / 2 + 346 / 2 + 5;
							popup.addClass('from-right');
						}
						else {
							posX = chartW / 2 - 346 / 2 - popupW - 5;
							popup.removeClass('from-right');
						}
                    }
                    else {
                        if (posX >= 200) {
                            if( posX >= chartW / 2 ) {
								posX = chartW / 2 - 5 / 2 - popupW - 5;
								popup.removeClass('from-right');
							}
							else {
								posX = chartW / 2 - 346 / 2 - popupW - 5;
								popup.addClass('from-right');
							}
                        } else if(posX <= 200) {
                          	posX = chartW / 2 - 480 / 2 - popupW - 5;
							popup.removeClass('from-right');
                        }
                    }

					popup.css('left', posX + 'px');
					popup.css('top',  posY + 'px');

					if( !popup.hasClass('show') ) {
						popup.addClass('show');
					}

                    if (tooltipModel.opacity === 0) {
                        popup.removeClass('show');
					}
                }
			}
  		}
	};

	// Add Padding 
// 	function getBoxWidth(labelOpts, fontSize) {
// 		return labelOpts.usePointStyle ?
// 	   	fontSize * Math.SQRT2 :
// 		labelOpts.boxWidth;
//    	};

//    Chart.NewLegend = Chart.Legend.extend({
// 		afterFit: function() {
// 		   this.height = this.height + 20;
// 		},
//    });

//    function createNewLegendAndAttach(chartInstance, legendOpts) {
// 		var legend = new Chart.NewLegend({
// 		   ctx: chartInstance.chart.ctx,
// 		   options: legendOpts,
// 		   chart: chartInstance
// 		});
	 
// 		if (chartInstance.legend) {
// 		   Chart.layoutService.removeBox(chartInstance, chartInstance.legend);
// 		   delete chartInstance.newLegend;
// 		}
	 
// 		chartInstance.newLegend = legend;
// 		Chart.layoutService.addBox(chartInstance, legend);
//    }

//    // Register the legend plugin
//    Chart.plugins.register({
// 		beforeInit: function(chartInstance) {
// 		   var legendOpts = chartInstance.options.legend;

// 		   if (legendOpts) {
// 			 createNewLegendAndAttach(chartInstance, legendOpts);
// 		   }
// 		},
// 		beforeUpdate: function(chartInstance) {
// 		   var legendOpts = chartInstance.options.legend;

// 		   if (legendOpts) {
// 				 legendOpts = Chart.helpers.configMerge(Chart.defaults.global.legend, legendOpts);

// 				 if (chartInstance.newLegend) {
// 				   chartInstance.newLegend.options = legendOpts;
// 				 } else {
// 				   createNewLegendAndAttach(chartInstance, legendOpts);
// 				 }
// 		   	} else {
// 				Chart.layoutService.removeBox(chartInstance, chartInstance.newLegend);
// 			 	delete chartInstance.newLegend;
// 		   	}
// 		},
// 		afterEvent: function(chartInstance, e) {
// 			var legend = chartInstance.newLegend;
// 		   	if (legend) {
// 				legend.handleEvent(e);
// 		   	}
// 		}
// 	});
	// END Add Padding    

	var ctx = document.getElementById("doughnutChart").getContext("2d");
	var doughnutChart = new Chart(ctx, config);

	// 2nd oval chart
	jQuery('#hotels_chart_2').mychart({
		labels: chart2_labels,
		percents: chart2_percents,
		bg_colors: chart2_colors,
		popup: '#states_popup_2',
		onBeforeShowPopup: function(tooltipModel, dataID) {
			if( dataID ) {
				jQuery('#states_popup_2 .item-state').addClass('hide');
				jQuery('#states_popup_2 .item-state[id="'+dataID+'"]').removeClass('hide');
			}
		}
	});

	// set the wrapper width and height to match the img size
	$('#wrapper_map').css({'width':$('#wrapper_map img').width(),
		'height':$('#wrapper_map img').height()
	});

	// fade In chart effects on scroll
	jQuery('.doughnut-chart-wrap').each(function(idx, el) {
		var waypoint = new Waypoint({
			element: el,
			handler: function(direction) {
			  if( 'down' == direction ) {
				  if( !el.classList.contains('fade-in') ) {
					  el.classList.add('fade-in');
				  }
			  }
			},
			offset: '80%'
		});
	});

	 // Slide Map
    jQuery('.wrap-slide-map').bxSlider({
        controls: true,
        nextText : "<img src='/wp-content/themes/avana/images/next_slide.png'>",
        prevText : "<img src='/wp-content/themes/avana/images/prev_slide.png'>",
        pager: false,
    });

	// mobile sliders
	jQuery('[data-state-slider]').bxSlider({
		controls: true,
		pager: false,
		responsive: true,
		slideWidth: 380,
		minSlides: 1,
		maxSlides: 3,
		moveSlides: 1,
		//infiniteLoop: false,
		slideMargin: 0,
		auto: true,
		pause: 15000,
		wrapperClass: 'bx-wrapper state-list-slider-wrap',
	});


	//tooltip direction
	var tooltipDirection;
				 
	for (i=0; i<$(".pin").length; i++){               
		// set tooltip direction type - up or down             
		if ($(".pin").eq(i).hasClass('pin-down')) {
			tooltipDirection = 'tooltip-down';
		} else {
			tooltipDirection = 'tooltip-up';
		}

		// append the tooltip
		$("#wrapper_map").append("<div style='left:"+$(".pin").eq(i).data('xpos')+"px;top:"+$(".pin").eq(i).data('ypos')+"px' class='" + tooltipDirection +"'>\<div class='tooltip'>" + $(".pin").eq(i).html() + "</div>\</div>");
	}    

	// show/hide the tooltip
	$('.tooltip-up, .tooltip-down').click(function(e){
		jQuery('.tooltip-down .tooltip').css('display', 'none');
		jQuery('.map-section').removeClass('transparent-op');
		jQuery('.tooltip-down').removeClass('transparent-op');
		jQuery('.tooltip-down').removeClass('rotate');

		$(this).addClass('rotate');
		$(this).children('.tooltip').fadeIn('slow');

		var map = $('#wrapper_map'),
			mouseX = e.pageX - map.offset().left,
			mouseY = e.pageY - map.offset().top,
			posX = 165;

		// if (mouseX <= map.width() / 2) {  // left
		// 	if( e.pageX > 270 ) {
		// 		posX = -165 - 120;
		// 	}
		// 	$(this).children('.tooltip').removeClass('from-right');
		// }
		// else {
		// 	$(this).children('.tooltip').addClass('from-right');
		// }

		var screensize = document.documentElement.clientWidth;
		if (screensize <= 1680) {
			if (mouseX <= 430) {
				posX = 167;
				$(this).children('.tooltip').addClass('from-right');
			} else if (mouseX >= 431) {
				posX = -300;
				$(this).children('.tooltip').removeClass('from-right');
			} 
		} else {
			if (mouseX <= map.width() / 2) {  // left
				if( e.pageX > 270 ) {
					posX = -165 - 120;
				}
				$(this).children('.tooltip').removeClass('from-right');
			}
			else {
				$(this).children('.tooltip').addClass('from-right');
			}
		}

		$(this).children('.tooltip').css('transform', 'translate('+posX+'px, 18px)');
		$(this).siblings('.tooltip-down').addClass('transparent-op');
		$('.map-section').addClass('transparent-op');
	});

	$(document).click(function(e) {
	    var container = $(".tooltip-down");

	    // if the target of the click isn't the container nor a descendant of the container
	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        jQuery('.tooltip-down .tooltip').css('display', 'none');
			jQuery('.map-section').removeClass('transparent-op');
			jQuery('.tooltip-down').removeClass('transparent-op');
			jQuery('.tooltip-down').removeClass('rotate');
	    }
	});
        
});
