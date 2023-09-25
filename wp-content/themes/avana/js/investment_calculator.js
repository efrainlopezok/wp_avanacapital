var gauge_risk_profile;

var investmentCal = {
	getDuration: function(val1,month1,val2,month2,tVal,elem,checkVal){
		if(tVal != 0){
			var duration = (val1/tVal)*month1+(val2/tVal)*month2;
			var decimal = (SITEForms.isFloat(duration))?2:0;
			var duration = accounting.formatNumber(duration,decimal); 
			duration = Math.round(duration);		
			jQuery('#'+elem).text(duration + ' Months');
		}else{
			jQuery('#'+elem).text('');
		}

	},

	//By invesment product section :-  Monthly Income Cal
	monthlyIncome: function(invesment,rate,elem){
		if(invesment){
			var Income = (invesment*rate/100)/12;	
			jQuery('#'+elem).text('$'+investmentCal.formatNumber(Income));	
		} else{
			jQuery('#'+elem).text('$0.00');	
		}
	},

	formatMoney: function(value){
		value = investmentCal.formatNumber(value);
		return "$"+value;
		//return accounting.formatMoney(Math.round(value));
	},

	formatNumber: function(value){
		return accounting.formatNumber(Math.round(value));
	},

	yeildCalculator: function(){
		function intRates(rates){
			rates = rates / 100;
			return rates
		}
		
		function formatInputBox(elem,inputVal){
			var decimal = (SITEForms.isFloat(inputVal))?2:0;
			var inputVal = accounting.formatNumber(inputVal,decimal); 
			jQuery('#'+elem).val(inputVal);
		}

		//6 Month and 24 Month Calculation
		//Get the Value
		var yc_6m_notea = parseFloat(accounting.unformat(jQuery('#yc_6m_notea').val()));
		formatInputBox('yc_6m_notea',yc_6m_notea);
		var yc_24m_noteb = parseFloat(accounting.unformat(jQuery('#yc_24m_noteb').val()));
		formatInputBox('yc_24m_noteb',yc_24m_noteb);

		//Checked the value of both 6 Month and 24 Month input fields
		if(!isNaN(yc_6m_notea) && !isNaN(yc_24m_noteb)){
			var yc_24m_dollars_invested = yc_6m_notea+yc_24m_noteb;
		} else if(!isNaN(yc_6m_notea) && isNaN(yc_24m_noteb)){
			var yc_24m_dollars_invested = yc_6m_notea;
		}else if(isNaN(yc_6m_notea) && !isNaN(yc_24m_noteb)){
			var yc_24m_dollars_invested = yc_24m_noteb;
		}else{
			var yc_24m_dollars_invested = "";
		}

		//Checked the total value of both fields
		if(yc_24m_dollars_invested >= 100000){
			jQuery('#yc_24m_dollars_invested_a').text(investmentCal.formatNumber(yc_24m_dollars_invested));
			jQuery('#yc_24m_dollars_invested').text(investmentCal.formatMoney(yc_24m_dollars_invested));

			//Checked the values( isval or not ) in both fields 
			if(!isNaN(yc_6m_notea) && !isNaN(yc_24m_noteb)){
				var yc_24m_expected_yeild = (yc_6m_notea / yc_24m_dollars_invested * intRates(ProductIntRates.MT_3))* 100 + (yc_24m_noteb / yc_24m_dollars_invested * intRates(ProductIntRates.MT_24)) * 100;
			} else if(!isNaN(yc_6m_notea) && isNaN(yc_24m_noteb)){
				var yc_24m_expected_yeild = (yc_6m_notea / yc_24m_dollars_invested * intRates(ProductIntRates.MT_3)) * 100;
			}else if(isNaN(yc_6m_notea) && !isNaN(yc_24m_noteb)){
				var yc_24m_expected_yeild = (yc_24m_noteb / yc_24m_dollars_invested * intRates(ProductIntRates.MT_24)) * 100;
			}else{
				var yc_24m_expected_yeild = "";
			}
			var yc_24m_expected_yeild_toFix = yc_24m_expected_yeild.toFixed(2);

			jQuery('#yc_24m_expected_yeild').text(yc_24m_expected_yeild_toFix+'%');

			var yc_24m_monthly_income = yc_24m_dollars_invested * yc_24m_expected_yeild / 1200;
			jQuery('#yc_24m_monthly_income').text(investmentCal.formatMoney(yc_24m_monthly_income));
			jQuery('#yc_24m_dollars_invested_error').css('opacity', '0');

			
			if(yc_6m_notea != 0){
				//By invesment product
				jQuery('#st1_dollars_invested').text(investmentCal.formatNumber(yc_6m_notea));
				//By invesment product section :-  Monthly Income print
				investmentCal.monthlyIncome(yc_6m_notea,ProductIntRates.MT_3,'st1_monthly_income');
				//Intrest rate
				jQuery('#st1_expected_yeild').text(ProductIntRates.MT_3);
			}else{
				jQuery('#st1_dollars_invested').text('');
				jQuery('#st1_monthly_income').text('$0.00');
				jQuery('#st1_duration').text('');
				jQuery('#st1_expected_yeild').text('');
			}

			if(yc_24m_noteb != 0){
				//By invesment product
				jQuery('#st2_dollars_invested').text(investmentCal.formatNumber(yc_24m_noteb));
				//By invesment product section :-  Monthly Income print
				investmentCal.monthlyIncome(yc_24m_noteb,ProductIntRates.MT_24,'st2_monthly_income');
				//Intrest rate
				jQuery('#st2_expected_yeild').text(ProductIntRates.MT_24);
			}else{
				jQuery('#st2_dollars_invested').text('');
				jQuery('#st2_monthly_income').text('$0.00');
				jQuery('#st2_duration').text('');
				jQuery('#st2_expected_yeild').text('');
			}


		}else{
			jQuery('#yc_24m_dollars_invested_a').text('');
			jQuery('#yc_24m_dollars_invested, #yc_24m_expected_yeild, #yc_24m_monthly_income').text('');
			var yc_24m_dollars_invested = 0;
			var yc_24m_monthly_income = 0;
			jQuery('#yc_24m_dollars_invested_error').css('opacity', '1');
			//By invesment product
			jQuery('#st1_dollars_invested').text('');
			jQuery('#st2_dollars_invested').text('');
			//By invesment product section :-  Monthly Income
			jQuery('#st1_monthly_income').text('$0.00');
			jQuery('#st2_monthly_income').text('$0.00');
			//Intrest rate
			jQuery('#st1_expected_yeild').text('');
			jQuery('#st2_expected_yeild').text('');
		}


		//60 Month Calculation
		//Get the Value
		var yc_60m_notea = parseFloat(accounting.unformat(jQuery('#yc_60m_notea').val()));
		formatInputBox('yc_60m_notea',yc_60m_notea);
		var yc_60m_noteb = parseFloat(accounting.unformat(jQuery('#yc_60m_noteb').val()));
		formatInputBox('yc_60m_noteb',yc_60m_noteb);
		
		//Checked the value of both 60 Month input fields
		if(!isNaN(yc_60m_notea) && !isNaN(yc_60m_noteb)){
			var yc_60m_dollars_invested = yc_60m_notea + yc_60m_noteb;
		} else if(!isNaN(yc_60m_notea) && isNaN(yc_60m_noteb)){
			var yc_60m_dollars_invested = yc_60m_notea ;
		}else if(isNaN(yc_60m_notea) && !isNaN(yc_60m_noteb)){
			var yc_60m_dollars_invested = yc_60m_noteb ;
		}else{
			var yc_60m_dollars_invested = "" ;
		}

		//Checked the total value of both fields
		if(yc_60m_dollars_invested >= 250000){
			jQuery('#yc_60m_dollars_invested_a').text(investmentCal.formatNumber(yc_60m_dollars_invested));
			jQuery('#yc_60m_dollars_invested').text(investmentCal.formatMoney(yc_60m_dollars_invested));

			//Checked the values( isvalue or not ) in both fields 
			if(!isNaN(yc_60m_notea) && !isNaN(yc_60m_noteb)){
				var yc_60m_expected_yeild = (yc_60m_notea / yc_60m_dollars_invested * intRates(ProductIntRates.MT_36))* 100 + (yc_60m_noteb / yc_60m_dollars_invested * intRates(ProductIntRates.MT_60)) * 100;
			} else if(!isNaN(yc_60m_notea) && isNaN(yc_60m_noteb)){
				var yc_60m_expected_yeild = (yc_60m_notea / yc_60m_dollars_invested * intRates(ProductIntRates.MT_36)) * 100;
			}else if(isNaN(yc_60m_notea) && !isNaN(yc_60m_noteb)){
				var yc_60m_expected_yeild = (yc_60m_noteb / yc_60m_dollars_invested * intRates(ProductIntRates.MT_60)) * 100;
			}else{
				var yc_60m_expected_yeild = "" ;
			}
			var yc_60m_expected_yeild_toFix = yc_60m_expected_yeild.toFixed(2);

			jQuery('#yc_60m_expected_yeild').text(yc_60m_expected_yeild_toFix+'%');

			var yc_60m_monthly_income = yc_60m_dollars_invested * yc_60m_expected_yeild / 1200;
			jQuery('#yc_60m_monthly_income').text(investmentCal.formatMoney(yc_60m_monthly_income));

			jQuery('#yc_60m_dollars_invested_error').css('opacity', '0');

			
			if(yc_60m_notea != 0){
				//By invesment product
				jQuery('#lt1_dollars_invested').text(investmentCal.formatNumber(yc_60m_notea));
				//By invesment product section :-  Monthly Income
				investmentCal.monthlyIncome(yc_60m_notea,ProductIntRates.MT_36,'lt1_monthly_income');
				//Intrest rate
				jQuery('#lt1_expected_yeild').text(ProductIntRates.MT_36);
		
			}else{
				jQuery('#lt1_dollars_invested').text('');
				jQuery('#lt1_monthly_income').text('$0.00');
				jQuery('#lt1_duration').text('');
				jQuery('#lt1_expected_yeild').text('');
			}

			if(yc_60m_noteb != 0){
				//By invesment product
				jQuery('#lt2_dollars_invested').text(investmentCal.formatNumber(yc_60m_noteb));
				//By invesment product section :-  Monthly Income
				investmentCal.monthlyIncome(yc_60m_noteb,ProductIntRates.MT_60,'lt2_monthly_income');
				//Intrest rate
				jQuery('#lt2_expected_yeild').text(ProductIntRates.MT_60);
			}	else{
				jQuery('#lt2_dollars_invested').text('');
				jQuery('#lt2_monthly_income').text('$0.00');
				jQuery('#lt2_duration').text('');
				jQuery('#lt2_expected_yeild').text('');

			}

			
			
		}else{
			jQuery('#yc_60m_dollars_invested_a').text('');
			jQuery('#yc_60m_dollars_invested, #yc_60m_expected_yeild, #yc_60m_monthly_income').text('');
			var yc_60m_dollars_invested = 0;
			var yc_60m_monthly_income = 0;
			jQuery('#yc_60m_dollars_invested_error').css('opacity', '1');
			//By invesment product
			jQuery('#lt1_dollars_invested').text('');
			jQuery('#lt2_dollars_invested').text('');
			//By invesment product section :-  Monthly Income
			jQuery('#lt1_monthly_income').text('$0.00');
			jQuery('#lt2_monthly_income').text('$0.00');
			//Intrest rate
			jQuery('#lt1_expected_yeild').text('');
			jQuery('#lt2_expected_yeild').text('');
		}

		
		//Grand Total Calculation
		var yc_gt_dollars_invested = yc_24m_dollars_invested + yc_60m_dollars_invested ;
		
		var yc_24m_mi = accounting.unformat(jQuery('#yc_24m_monthly_income').text());
		var yc_60m_mi = accounting.unformat(jQuery('#yc_60m_monthly_income').text());
		var yc_gt_monthly_income = (yc_24m_mi + yc_60m_mi);
		var yc_gt_expected_yeild = ((yc_gt_monthly_income * 1200) / yc_gt_dollars_invested);

		//Checked Gt Dollars Invested var
		if(yc_gt_dollars_invested != 0){
			jQuery('.yc_gt_dollars_invested').text(investmentCal.formatMoney(yc_gt_dollars_invested));
			jQuery('.pr_yc_gt_dollars_invested ').text(investmentCal.formatMoney(yc_gt_dollars_invested));
		}else{
			jQuery('.yc_gt_dollars_invested').text('');
			jQuery('.pr_yc_gt_dollars_invested').text('');
		}

		//Checked Gt Monthly Income var
		if(yc_gt_monthly_income != 0){
			jQuery('.yc_gt_monthly_income').text(investmentCal.formatMoney(yc_gt_monthly_income));
			jQuery('.pr_yc_gt_monthly_income').text(investmentCal.formatMoney(yc_gt_monthly_income));
		}else{
			jQuery('.yc_gt_monthly_income').text('');
			jQuery('.pr_yc_gt_monthly_income').text('');
		}
		
		//Checked Gt Expected Yeild var
		if(isNaN(yc_gt_expected_yeild)){
			jQuery('.yc_gt_expected_yeild').text('');
		}else{
			jQuery('.yc_gt_expected_yeild').text(yc_gt_expected_yeild.toFixed(2)+'%');
		}

		//By Duration
		investmentCal.getDuration(yc_6m_notea,3,yc_24m_noteb,12,yc_24m_dollars_invested,'st_duration');
		investmentCal.getDuration(yc_60m_notea,36,yc_60m_noteb,60,yc_60m_dollars_invested,'lt_duration');

		//get ST percentage
		var ST_pers = ( yc_24m_dollars_invested / yc_gt_dollars_invested ) * 100;
		var LT_pers = ( yc_60m_dollars_invested / yc_gt_dollars_invested ) * 100;

		if(LT_pers >= ST_pers){
			lower_pt = ST_pers;
			higher_pt = LT_pers;
		}else{
			lower_pt = LT_pers;
			higher_pt = ST_pers;
		}

		// *****************************************************************************************
		// Below code is used for calcualting Risk Profile Gauge value
		// *****************************************************************************************
		var yc_24m_error_shown = parseInt(jQuery("#yc_24m_dollars_invested_error").css("opacity"));
		var yc_60m_error_shown = parseInt(jQuery("#yc_60m_dollars_invested_error").css("opacity"));

		if(yc_24m_error_shown == 1){
			yc_6m_notea = 0;
			yc_24m_noteb = 0
		}

		if(yc_60m_error_shown == 1){
			yc_60m_notea = 0;
			yc_60m_noteb = 0
		}

		//Conservative cal
		var conservative = yc_6m_notea + (yc_60m_notea * lower_pt) /100 ; 

		//Moderate Cal
		var moderate = (yc_24m_noteb * lower_pt / 100 )+( yc_60m_notea * higher_pt / 100);

		//Aggressive Cal
		var aggressive = (yc_24m_noteb * higher_pt / 100 ) + yc_60m_noteb;

		var gt_dollar_invested = conservative + moderate + aggressive;

		// Get Weight
		var pt_conservative = conservative / gt_dollar_invested * 100;
		var pt_moderate = moderate / gt_dollar_invested * 100;
		var pt_aggressive = aggressive / gt_dollar_invested * 100;

		var pt_total = pt_conservative +  pt_moderate +  pt_aggressive;

		var gauge_value = ((pt_conservative * 0) + (pt_moderate * 50) + (pt_aggressive * 100)) / pt_total;

		if(yc_24m_error_shown == 1 && yc_60m_error_shown == 1){
			investmentCal.updateGaugeChart(0);
		}
		
		//console.log(pt_conservative + " " + pt_moderate+ " " +pt_aggressive+ " " + gauge_value);
		//console.log(yc_24m_error_shown + " " + yc_60m_error_shown);

		if(yc_24m_error_shown == 0 || yc_60m_error_shown == 0){
			investmentCal.updateGaugeChart(gauge_value);
		}
		
		SITE.equalHeight(".eq-parent .eq-child");
	},

	initGaugeChart: function(riskValue){
		gauge_risk_profile = echarts.init(document.getElementById('gauge_risk_profile'));
		option = {
            tooltip: {
                show: false,
                formatter: "{a} <br />{b} : {c}%"
            },
            toolbox: {
                show: false,
                feature: {
                    mark: { show: false },
                    restore: { show: true, title: 'Refresh' },
                    saveAsImage: { show: true, title: 'Save As Image' }
                }
            },
            series: [
                {
                    name: 'Risk Profile Indicators',
                    type: 'gauge',
                    startAngle: 180,
                    endAngle: 0,
                    center: ['50%', '100%'],    // Default global center
                    radius: "200%", 
                    splitNumber: 10,       // Dividing the number of segments，The default is 5
                    axisLine: {            // Coordinate axis
                        lineStyle: {       // Property lineStyle control line style
                            color: [[0.3, '#6cd0e7'], [0.7, '#35c471'], [1, '#8c5bc6']],
                            width: 8
                        }
                    },
                    axisTick: {            // Axis markers
                        splitNumber: 10,   // How much of each split segment segment
                        length: 12,        // Attribute length Control line length
                        lineStyle: {       // Property lineStyle control line style
                            color: 'auto'
                        }
                    },
                    axisLabel: {           // Axis text labels
                        formatter: function (v) {
                            switch (v + '') {
                                case '10': return 'Conservative';
                                case '50': return 'Moderate';
                                case '90': return 'Aggresive';
                                default: return '';
                            }
                        },
                        textStyle: {       // The remaining properties using the global default text style
                            color: '#666',
                            fontSize: 15,
                            fontWeight: 'bolder'
                        }
                    },
                    splitLine: {           // Divider
                        show: true,        // The default display, control display properties show or not
                        length: 30,         // Attribute length Control line length
                        lineStyle: {       // Property lineStyle control line style
                            color: 'auto'
                        }
                    },
                    pointer: {
                        width: 5
                    },
                    title: {
                        show: true,
                        offsetCenter: [0, '-40%'],       // x, y, units px
                        textStyle: {       //The remaining properties using the global default text style
                            fontWeight: 'bolder'
                        }
                    },
                    detail: {
                        show: false,
                        backgroundColor: 'rgba(0,0,0,0)',
                        borderWidth: 0,
                        borderColor: '#ccc',
                        width: 100,
                        height: 40,
                        offsetCenter: [0, -40],       // x, y, units px
                        formatter: '{value}%',
                        textStyle: {       // The remaining properties using the global default text style
                            fontSize: 50
                        }
                    },                    
                    data: [{ value: riskValue, name: '' }]
                }
            ]
        };
        gauge_risk_profile.setOption(option);
	},

	updateGaugeChart: function(riskValue){
		option.series[0].data[0].value = riskValue;
        gauge_risk_profile.setOption(option, true);
	}
}
// Init gauge chart
investmentCal.initGaugeChart(0);

jQuery( window ).on( 'debouncedresize', function() {
	gauge_risk_profile.resize();   
	alert('fg')
});