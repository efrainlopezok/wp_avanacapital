

(function( $ ) {

    $.fn.mychart = function(options) {
        var defaults = {
            labels: ["A", 'B'],
            percents: [60, 40],
            bg_colors: [ '#f2f2f2', 'gray'],
            type: 'doughnut',
            target: undefined,
            chart: undefined,
            popup: '',
            onBeforeShowPopup: function(tooltipModel, dataID) {}
        };
        var settings = $.extend({}, defaults, options);
            settings.target = this.get(0);

        if (this.length > 1) {
            this.each(function() { $(this).mychart(options) });
            return this;
        }

        this.initialize = function() {
            var dataChart = {
                labels: settings.labels,
                datasets: [{
                   data: settings.percents,
                   backgroundColor: settings.bg_colors
                }]
            };
            var config = {
                type: settings.type,
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
                        enabled: false,
                        displayColors: false,
                            callbacks: {
                            label: function(tooltipItem, data) {
                                return data.labels[tooltipItem.index];
                            }
                        }, 
                        custom: function(tooltipModel) {
                            var popup = jQuery(settings.popup);

                            if( popup.length == 0 ) {
                                return;
                            }
                            
                            function getBody(bodyItem) {
                                return bodyItem.lines;
                            }
        
                            if (tooltipModel.body) {
                                var titleLines = tooltipModel.title || [];
                                var bodyLines = tooltipModel.body.map(getBody);
        
                                var data = bodyLines[0][0].split(':'),
                                    dataID = data[0].trim().replace(' ', '-').toLowerCase();
        
                                if(typeof settings.onBeforeShowPopup == 'function') {
                                    settings.onBeforeShowPopup(tooltipModel, dataID);
                                }
                            }
        
                            var position = this._chart.canvas.getBoundingClientRect();
                                posX = tooltipModel.caretX,
                                posY = tooltipModel.caretY - popup.height() / 2,
                                chartW = jQuery(settings.target).width(),
                                popupW = popup.width();
                            
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
                                if (posX >= 95) {
                                    if( posX >= chartW / 2 ) {
                                        posX = chartW / 2 + 346 / 2 + 5;
                                    } else{
                                        posX = chartW / 2 + 13 / 2 + 5;
                                        posY = posY - 15;
                                    }
                                } else {
                                    posX = chartW / 2 / 2 + 50;
                                }
                                popup.addClass('from-right');
                            }    
                            
                            // if( posX >= chartW / 2 ) {
                            //     posX = chartW / 2 + 346 / 2 + 5;
                            //     popup.addClass('from-right');
                            // }
                            // else {
                            //     posX = chartW / 2 - 346 / 2 - popupW - 5;
                            //     popup.removeClass('from-right');
                            // }
        
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

            var ctx = settings.target.getContext("2d");
            settings.chart = new Chart(ctx, config);
            return this;
        }

        return this.initialize();
    }

}( jQuery ));