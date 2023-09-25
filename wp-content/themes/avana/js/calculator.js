//usability function convert nan to 0
var AvanaUtils = {
	formatCurrency: function(elem,val){
	//jQuery('#'+elem).text(accounting.formatNumber(val)).toFixed(5);
		if (!isNaN(val)) {
			jQuery('#'+elem).text(accounting.formatNumber(val));
			jQuery('#hid_'+elem).val(accounting.formatNumber(val));
		} else{
			jQuery('#'+elem).text(accounting.formatNumber(0, 2));
		}
	},

	formatpercent: function(elem,val){
		if (!isNaN(val)) {
			jQuery('#'+elem).text(val.toFixed(2));
			jQuery('#hid_'+elem).val(val.toFixed(2));
		}else{
			jQuery('#'+elem).text(accounting.formatNumber(0, 2));
		}	
	},

	setZero: function(elem){
		var elemVal = jQuery.trim(jQuery('#'+elem).val());
		var inputVal = parseFloat(accounting.unformat(elemVal));
		inputVal = (isNaN(inputVal))?0:inputVal;
		AvanaUtils.formatInputBox(elem,inputVal);
		return inputVal;
	},
	
	formatInputBox: function(elem,inputVal){
		var decimal = (SITEForms.isFloat(inputVal))?2:0;
		var inputVal = accounting.formatNumber(inputVal,decimal); 
		jQuery('#'+elem).val(inputVal);
	},

	getValue: function(elem){
		return jQuery.trim(jQuery("#"+elem).val());
	},

	//Monthly Mortgage Payment
	monthlyPayment: function(pv, i, n){
		var pv = parseFloat(pv);
		var i = parseFloat(i);
		var n = parseInt(n);

		var period_interest = Math.pow((1+i),n);
		var x = (pv * i * period_interest);
		var y = (period_interest - 1);
		var z = 0;
		if(y !== 0){
			z = (x/y);
		}
		
		if(!isNaN(z)){
			return z;			
		}else{
			return 0;
		}
	}

}

var SBA = {
	purchase: function(){
		
		//Get values 	 
		var sba_p_property_type = AvanaUtils.getValue('sba_p_property_type');
		var sba_p_property_value = AvanaUtils.setZero('sba_p_property_value');
		var sba_p_purchase_financing_interest_rate = AvanaUtils.getValue('sba_p_purchase_financing_interest_rate');
		var sba_p_purchase_price = AvanaUtils.setZero('sba_p_purchase_price');
		var sba_p_property_improvements = AvanaUtils.setZero('sba_p_property_improvements');
		var sba_p_debenture_rates = AvanaUtils.setZero('sba_p_debenture_rates');
		var sba_p_purchase_closing_cost_fees_select = AvanaUtils.getValue('sba_p_purchase_closing_cost_fees_select');
		var sba_p_purchase_equity_contribution_select = AvanaUtils.getValue('sba_p_purchase_equity_contribution_select');
		var sba_p_purchase_period_first_mortgage = AvanaUtils.getValue('sba_p_purchase_period_first_mortgage');

		//Cal Closing Cost & Fees:
		var sba_p_purchase_closing_cost_fees_calculated_total = (sba_p_purchase_price + sba_p_property_improvements);
		var sba_p_purchase_closing_cost_fees_calculated = (sba_p_purchase_closing_cost_fees_select * sba_p_purchase_closing_cost_fees_calculated_total) / 100;
		AvanaUtils.formatCurrency('sba_p_purchase_closing_cost_fees_calculated', sba_p_purchase_closing_cost_fees_calculated);

		//Total Project Cost
		var sba_p_total_project_cost = (sba_p_purchase_price + sba_p_property_improvements + sba_p_purchase_closing_cost_fees_calculated);
		AvanaUtils.formatCurrency('sba_p_total_project_cost',sba_p_total_project_cost);

		//Equity Contribution Calculated
		var sba_p_equity_contribution_calculated = (sba_p_total_project_cost * sba_p_purchase_equity_contribution_select) /100;
		AvanaUtils.formatCurrency('sba_p_equity_contribution_calculated',sba_p_equity_contribution_calculated);

		//Est First Mortgage Amount
		var sba_p_est_first_mortgage_amount = (sba_p_total_project_cost * 50) / 100;
		AvanaUtils.formatCurrency('sba_p_est_first_mortgage_amount',sba_p_est_first_mortgage_amount);

		//Est Second Mortgage Amount
		var sba_p_est_second_mortgage_amount = (sba_p_total_project_cost - sba_p_est_first_mortgage_amount) - sba_p_equity_contribution_calculated;
		if(sba_p_est_second_mortgage_amount > 5500001){
			sba_p_est_second_mortgage_amount = sba_p_est_second_mortgage_amount - 5500000;
			sba_p_est_first_mortgage_amount = sba_p_est_first_mortgage_amount + sba_p_est_second_mortgage_amount;
			sba_p_est_second_mortgage_amount = 5500000;
		}
		AvanaUtils.formatCurrency('sba_p_est_second_mortgage_amount',sba_p_est_second_mortgage_amount);

		//Total Loan Amount
		var sba_p_total_loan_amount = (sba_p_est_first_mortgage_amount + sba_p_est_second_mortgage_amount);
		AvanaUtils.formatCurrency('sba_p_total_loan_amount',sba_p_total_loan_amount);

		//Project Loan To Value
		var sba_p_project_loan_to_value = (sba_p_total_loan_amount / sba_p_property_value) * 100;
		AvanaUtils.formatpercent('sba_p_project_loan_to_value', sba_p_project_loan_to_value)

		//To Cal P & Q The Following Steps
		//1st Mortgage Payment
		var apr1 = (sba_p_purchase_financing_interest_rate * 365) / 360; 
		var i1 = (apr1 / 12) / 100;
		var pv = sba_p_est_first_mortgage_amount;
		var n1 = sba_p_purchase_period_first_mortgage * 12;

		//2nd Mortgage Payment
		var apr2 = (sba_p_debenture_rates * 365) / 360; 
		var i2 = (apr2 / 12) / 100;

		var sba_p_first_mortgage_monthly_payment = AvanaUtils.monthlyPayment(sba_p_est_first_mortgage_amount, i1, n1);
		var sba_p_est_second_mortgage_sba_d_amount = AvanaUtils.monthlyPayment(sba_p_est_second_mortgage_amount, i2, 240);

		AvanaUtils.formatCurrency('sba_p_first_mortgage_monthly_payment', sba_p_first_mortgage_monthly_payment);		
		AvanaUtils.formatCurrency('sba_p_est_second_mortgage_sba_d_amount', sba_p_est_second_mortgage_sba_d_amount);		

		//Total Monthly Mortgage Amount:
		var sba_p_total_monthly_mortgage_amount = sba_p_first_mortgage_monthly_payment + sba_p_est_second_mortgage_sba_d_amount;
		AvanaUtils.formatCurrency('sba_p_total_monthly_mortgage_amount', sba_p_total_monthly_mortgage_amount);		

		//Total Annual Mortgage Payment:
		var sba_p_total_annual_mortgage_payment = sba_p_total_monthly_mortgage_amount * 12;
		AvanaUtils.formatCurrency('sba_p_total_annual_mortgage_payment', sba_p_total_annual_mortgage_payment);				
		
	},

	//Refinance, Cash Out fUNCTION
	refinanceCashOut: function(){
		
		//Get values 	 
		var sba_rc_property_type = AvanaUtils.getValue('sba_rc_property_type');
		var sba_rc_current_property_value = AvanaUtils.setZero('sba_rc_current_property_value');
		var sba_rc_estimated_age_property = AvanaUtils.getValue('sba_rc_estimated_age_property');
		var sba_rc_original_purchase_price = AvanaUtils.setZero('sba_rc_original_purchase_price');
		var sba_rc_cash_out_amount = AvanaUtils.setZero('sba_rc_cash_out_amount');
		var sba_rc_reason_for_cash_out = AvanaUtils.getValue('sba_rc_reason_for_cash_out');
		var sba_rc_current_first_mortgage_balance = AvanaUtils.setZero('sba_rc_current_first_mortgage_balance');
		var sba_rc_current_second_mortgage_balance = AvanaUtils.setZero('sba_rc_current_second_mortgage_balance');
		var sba_rc_closing_cost_loan_fees = AvanaUtils.getValue('sba_rc_closing_cost_loan_fees');
		var sba_rc_interest_rate_onfirst_mortgage = AvanaUtils.getValue('sba_rc_interest_rate_onfirst_mortgage');
		var sba_rc_interest_rate_onthird_mortgage = AvanaUtils.getValue('sba_rc_interest_rate_onthird_mortgage');
		var sba_rc_current_second_mortgage_monthly_payment = AvanaUtils.setZero('sba_rc_current_second_mortgage_monthly_payment');
		var sba_rc_amortization_period_first_mortgage = AvanaUtils.getValue('sba_rc_amortization_period_first_mortgage');

		// Cal Total Project Cost
		var sba_rc_total_project_cost = sba_rc_current_first_mortgage_balance + sba_rc_current_second_mortgage_balance + ( (sba_rc_closing_cost_loan_fees * sba_rc_current_first_mortgage_balance ) / 100 ) + ( (sba_rc_closing_cost_loan_fees * sba_rc_cash_out_amount ) / 100 ) + sba_rc_cash_out_amount;
		AvanaUtils.formatCurrency('sba_rc_total_project_cost',sba_rc_total_project_cost);

		// Cal Closing Cost
		var sba_rc_closing_cost = ((sba_rc_closing_cost_loan_fees * sba_rc_cash_out_amount)/100) + ((sba_rc_closing_cost_loan_fees * sba_rc_current_first_mortgage_balance)/100)
		AvanaUtils.formatCurrency('sba_rc_closing_cost',sba_rc_closing_cost);

		//New 1st Mortgage Balance
		//var sba_rc_new_first_mortgage_balance = (sba_rc_total_project_cost * 50 )/ 100;
		//var sba_rc_new_first_mortgage_balance = sba_rc_current_first_mortgage_balance + sba_rc_closing_cost;
		var sba_rc_current_property_value_50 = (sba_rc_current_property_value * 50 )/ 100;
		var sba_rc_new_first_mortgage_balance = sba_rc_current_first_mortgage_balance + sba_rc_cash_out_amount + sba_rc_closing_cost;
		
		// New 3rd Mortgage Balance
		//var sba_rc_new_third_mortgage_balance = (sba_rc_total_project_cost - sba_rc_new_first_mortgage_balance) - sba_rc_current_second_mortgage_balance
		if(sba_rc_new_first_mortgage_balance > sba_rc_current_property_value_50 ){
			// New 3rd Mortgage Balance
			var sba_rc_new_third_mortgage_balance =  sba_rc_new_first_mortgage_balance - sba_rc_current_property_value_50;
			AvanaUtils.formatCurrency('sba_rc_new_third_mortgage_balance',sba_rc_new_third_mortgage_balance);

			//New 1st Mortgage Balance
			sba_rc_new_first_mortgage_balance = sba_rc_current_property_value_50
			AvanaUtils.formatCurrency('sba_rc_new_first_mortgage_balance',sba_rc_new_first_mortgage_balance);
			
		} else if(sba_rc_new_first_mortgage_balance < sba_rc_current_property_value_50){
			//New 1st Mortgage Balance
			AvanaUtils.formatCurrency('sba_rc_new_first_mortgage_balance',sba_rc_new_first_mortgage_balance);
			//New 3st Mortgage Balance
			sba_rc_new_third_mortgage_balance =  0;
			AvanaUtils.formatCurrency('sba_rc_new_third_mortgage_balance',sba_rc_new_third_mortgage_balance);	
		}
		

		//To Cal P & Q The Following Steps
		//1st Mortgage Payment
		var apr1 = (sba_rc_interest_rate_onfirst_mortgage * 365) / 360; 
		var i1 = (apr1 / 12) / 100;
		var pv = sba_rc_new_first_mortgage_balance;
		var n1 = sba_rc_amortization_period_first_mortgage * 12;

		//2nd Mortgage Payment
		var apr2 = (sba_rc_interest_rate_onthird_mortgage * 365) / 360; 
		var i2 = (apr2 / 12) / 100;

		var sba_rc_est_first_mortgage_mnth_Payment = AvanaUtils.monthlyPayment(sba_rc_new_first_mortgage_balance, i1, n1);
		var sba_rc_est_third_mortgage_mnth_Payment = AvanaUtils.monthlyPayment(sba_rc_new_third_mortgage_balance, i2, 240);

		AvanaUtils.formatCurrency('sba_rc_est_first_mortgage_mnth_Payment', sba_rc_est_first_mortgage_mnth_Payment);		
		AvanaUtils.formatCurrency('sba_rc_est_third_mortgage_mnth_Payment', sba_rc_est_third_mortgage_mnth_Payment);

		//Total Monthly Payment:
		var sba_rc_total_mnth_payment = sba_rc_est_first_mortgage_mnth_Payment + sba_rc_est_third_mortgage_mnth_Payment + sba_rc_current_second_mortgage_monthly_payment
		AvanaUtils.formatCurrency('sba_rc_total_mnth_payment',sba_rc_total_mnth_payment);

		//Total Annual Draw Payment:
		var sba_rc_total_annual_payment = sba_rc_total_mnth_payment * 12;
		AvanaUtils.formatCurrency('sba_rc_total_annual_payment',sba_rc_total_annual_payment);

		//Loan to Value:
		var sba_rc_loan_to_value = sba_rc_total_project_cost / sba_rc_current_property_value * 100;
		AvanaUtils.formatpercent('sba_rc_loan_to_value', sba_rc_loan_to_value);
	},

	//Refinance, Cash No Out fUNCTION
	refinanceNoCashOut: function(){
		
		//Get values 	 
		var sba_rnc_property_type = AvanaUtils.getValue('sba_rnc_property_type');
		var sba_rnc_current_property_value = AvanaUtils.setZero('sba_rnc_current_property_value');
		var sba_rnc_estimated_age_property = AvanaUtils.getValue('sba_rnc_estimated_age_property');
		var sba_rnc_original_purchase_price = AvanaUtils.setZero('sba_rnc_original_purchase_price');
		var sba_rnc_cash_out_amount = AvanaUtils.setZero('sba_rnc_cash_out_amount');
		var sba_rnc_reason_for_cash_out = AvanaUtils.setZero('sba_rnc_reason_for_cash_out');
		var sba_rnc_current_first_mortgage_payment = AvanaUtils.setZero('sba_rnc_current_first_mortgage_payment');
		var sba_rnc_current_second_mortgage_payment = AvanaUtils.setZero('sba_rnc_current_second_mortgage_payment');
		var sba_rnc_closing_cost_loan_fees = AvanaUtils.getValue('sba_rnc_closing_cost_loan_fees');
		var sba_rnc_refinance_interest_rate_on_1st_mortgage = AvanaUtils.getValue('sba_rnc_refinance_interest_rate_on_1st_mortgage');
		var sba_rnc_interest_rate_on_third = AvanaUtils.setZero('sba_rnc_interest_rate_on_third');
		var sba_rnc_current_second_mortgage_monthly_payment = AvanaUtils.setZero('sba_rnc_current_second_mortgage_monthly_payment');
		var sba_rnc_amortization_first_mortgage = AvanaUtils.getValue('sba_rnc_amortization_first_mortgage');

		// Cal Total Project Cost
		var sba_rnc_total_project_cost = sba_rnc_current_first_mortgage_payment + sba_rnc_current_second_mortgage_payment + ( (sba_rnc_closing_cost_loan_fees * sba_rnc_current_first_mortgage_payment ) / 100 ) + ( (sba_rnc_closing_cost_loan_fees * sba_rnc_cash_out_amount ) / 100 ) + sba_rnc_cash_out_amount;
		AvanaUtils.formatCurrency('sba_rnc_total_project_cost',sba_rnc_total_project_cost);

		// Cal Closing Cost
		var sba_rnc_closing_cost = ((sba_rnc_closing_cost_loan_fees * sba_rnc_cash_out_amount)/100) + ((sba_rnc_closing_cost_loan_fees * sba_rnc_current_first_mortgage_payment)/100)
		AvanaUtils.formatCurrency('sba_rnc_closing_cost',sba_rnc_closing_cost);

		//New 1st Mortgage Balance
		//var sba_rnc_new_first_mortgage_balance = (sba_rnc_total_project_cost * 50 )/ 100;
		var sba_rnc_new_first_mortgage_balance = sba_rnc_current_first_mortgage_payment + sba_rnc_closing_cost;

		AvanaUtils.formatCurrency('sba_rnc_new_first_mortgage_balance',sba_rnc_new_first_mortgage_balance);

		// New 3rd Mortgage Balance
		var sba_rnc_new_third_mortgage_balance = (sba_rnc_total_project_cost - sba_rnc_new_first_mortgage_balance) - sba_rnc_current_second_mortgage_payment
		AvanaUtils.formatCurrency('sba_rnc_new_third_mortgage_balance',sba_rnc_new_third_mortgage_balance);

		//To Cal P & Q The Following Steps
		//1st Mortgage Payment
		var apr1 = (sba_rnc_refinance_interest_rate_on_1st_mortgage * 365) / 360; 
		var i1 = (apr1 / 12) / 100;
		var pv = sba_rnc_new_first_mortgage_balance;
		var n1 = sba_rnc_amortization_first_mortgage * 12;

		var sba_rnc_est_first_mortgage_mnth_Payment = AvanaUtils.monthlyPayment(sba_rnc_new_first_mortgage_balance, i1, n1);

		AvanaUtils.formatCurrency('sba_rnc_est_first_mortgage_mnth_Payment', sba_rnc_est_first_mortgage_mnth_Payment);		

		//Total Monthly Payment:
		var sba_rnc_total_mnth_payment = sba_rnc_est_first_mortgage_mnth_Payment + sba_rnc_current_second_mortgage_monthly_payment
		AvanaUtils.formatCurrency('sba_rnc_total_mnth_payment',sba_rnc_total_mnth_payment);

		//Total Annual Draw Payment:
		var sba_rnc_total_annual_payment = sba_rnc_total_mnth_payment * 12;
		AvanaUtils.formatCurrency('sba_rnc_total_annual_payment',sba_rnc_total_annual_payment);

		//Loan to Value:
		var sba_rnc_loan_to_value = sba_rnc_total_project_cost / sba_rnc_current_property_value * 100;
		AvanaUtils.formatpercent('sba_rnc_loan_to_value', sba_rnc_loan_to_value);
	}
}

//construction Form
var Construction = {
	
	getCalculations: function(){

		//Get values 	 
		var construction_property_type = AvanaUtils.getValue('construction_property_type');
		var construction_interest_rate = AvanaUtils.getValue('construction_interest_rate');
		var construction_hard_cost = AvanaUtils.setZero('construction_hard_cost');		
		var construction_land_cost = AvanaUtils.setZero('construction_land_cost');
		var construction_soft_cost = AvanaUtils.setZero('construction_soft_cost');
		var construction_ffe = AvanaUtils.setZero('construction_ffe');

		var construction_contingency_hard_cost = AvanaUtils.getValue('construction_contingency_hard_cost');
		var construction_contingency_soft_cost = AvanaUtils.getValue('construction_contingency_soft_cost');

		var construction_down_payment = AvanaUtils.getValue('construction_down_payment');
		var construction_loan_fees = AvanaUtils.getValue('construction_loan_fees');
		var construction_closing_cost = AvanaUtils.setZero('construction_closing_cost');
		var construction_schedule = AvanaUtils.getValue('construction_schedule');
		var construction_interest_rate1 = AvanaUtils.getValue('construction_interest_rate1');
		var construction_sba_debenture_rates = AvanaUtils.getValue('construction_sba_debenture_rates');
		var construction_amortization_period_first_mortgage = AvanaUtils.getValue('construction_amortization_period_first_mortgage');
		var construction_amortization_period = AvanaUtils.getValue('construction_amortization_period');

		//Contingency Hard Cost:
		var construction_contingency = (construction_hard_cost * construction_contingency_hard_cost ) / 100 ; 
		AvanaUtils.formatCurrency('construction_contingency',construction_contingency);

		//Contingency Soft Cost:
		var construction_contingency_soft_cost_calculated = (construction_soft_cost * construction_contingency_soft_cost) / 100;
		AvanaUtils.formatCurrency('construction_contingency_soft_cost_calculated',construction_contingency_soft_cost_calculated);

		//Interest Cost During Construction:
		var interest_cost_during = (construction_hard_cost + construction_land_cost + construction_soft_cost + construction_ffe) * (100 - construction_down_payment) / 100;
		var contingency_hard_and_soft_cost = construction_contingency + construction_contingency_soft_cost_calculated ;
		var construction_interest_cost_during_construction = (((interest_cost_during * construction_interest_rate / 100) * 55 / 100) * construction_schedule / 12) ;
		AvanaUtils.formatCurrency('construction_interest_cost_during_construction',construction_interest_cost_during_construction);

		//Estimated Project Cost Before Fees:
		var construction_estimated_project_cost_before_fees = (construction_hard_cost + construction_land_cost + construction_soft_cost + construction_ffe) + contingency_hard_and_soft_cost + construction_interest_cost_during_construction ;
		AvanaUtils.formatCurrency('construction_estimated_project_cost_before_fees',construction_estimated_project_cost_before_fees);

		//Loan Fees:
		var construction_loan_fees_calculated = (construction_estimated_project_cost_before_fees * (100 - construction_down_payment) / 100) * construction_loan_fees / 100;
		AvanaUtils.formatCurrency('construction_loan_fees_calculated',construction_loan_fees_calculated);

		//Updated Project Cost:
		var construction_updated_project_cost = construction_estimated_project_cost_before_fees + construction_loan_fees_calculated + construction_closing_cost
		AvanaUtils.formatCurrency('construction_updated_project_cost',construction_updated_project_cost);

		//Actual Equity Down Payment: 
		var construction_actual_equity_down_payment = (construction_updated_project_cost * construction_down_payment) / 100;
		AvanaUtils.formatCurrency('construction_actual_equity_down_payment',construction_actual_equity_down_payment);

		//Estimated 1st Mortgage Loan Amount:
		var construction_estimated_first_mortgage = (construction_updated_project_cost * 50) / 100;
		AvanaUtils.formatCurrency('construction_estimated_first_mortgage',construction_estimated_first_mortgage);

		//Estimated 2nd Mortgage Loan Amount:
		var construction_estimated_second_mortgage = (construction_updated_project_cost - construction_estimated_first_mortgage) - construction_actual_equity_down_payment;
		if(construction_estimated_second_mortgage > 5500001){
			construction_estimated_second_mortgage = construction_estimated_second_mortgage - 5500000;
			construction_estimated_first_mortgage = construction_estimated_first_mortgage + construction_estimated_second_mortgage;
			construction_estimated_second_mortgage = 5500000;
		}
		AvanaUtils.formatCurrency('construction_estimated_second_mortgage',construction_estimated_second_mortgage);

		// /Total Loan Amount:
		var construction_total_loan_amount = construction_estimated_first_mortgage + construction_estimated_second_mortgage;
		AvanaUtils.formatCurrency('construction_total_loan_amount',construction_total_loan_amount);

		//To Cal P & Q The Following Steps
		//1st Mortgage Payment
		var apr1 = (construction_interest_rate1 * 365) / 360; 
		var i1 = (apr1 / 12)/100;
		var pv = construction_estimated_first_mortgage;
		var n1 = construction_amortization_period_first_mortgage * 12;


		//2nd Mortgage Payment
		var apr2 = (construction_sba_debenture_rates * 365) / 360; 
		var i2 = (apr2 / 12)/100;

		var construction_first_mortgage_monthly_payment = AvanaUtils.monthlyPayment(construction_estimated_first_mortgage, i1, n1);
		var construction_second_mortgage_monthly_payment = AvanaUtils.monthlyPayment(construction_estimated_second_mortgage, i2, 240);

		console.log(i1, i2);

		AvanaUtils.formatCurrency('construction_second_mortgage_monthly_payment', construction_second_mortgage_monthly_payment);		
		AvanaUtils.formatCurrency('construction_first_mortgage_monthly_payment', construction_first_mortgage_monthly_payment);

		//Total Monthly Payment:
		var construction_total_monthly_payment = construction_first_mortgage_monthly_payment + construction_second_mortgage_monthly_payment;
		AvanaUtils.formatCurrency('construction_total_monthly_payment',construction_total_monthly_payment);


	}
	
}

//bridge Form
var Bridge = {
	getCalculations: function(){
		//Get Value	
		var bridge_current_value = AvanaUtils.setZero('bridge_current_value');
		var bridge_original_purchase_price = AvanaUtils.setZero('bridge_original_purchase_price');
		var bridge_current_total_loan_amount = AvanaUtils.setZero('bridge_current_total_loan_amount');
		var bridge_loan_fee_closing_cost_option_1 = AvanaUtils.getValue('bridge_loan_fee_closing_cost_option_1');
		var bridge_loan_term_desired = AvanaUtils.getValue('bridge_loan_term_desired');
		var bridge_interest_rate = AvanaUtils.getValue('bridge_interest_rate');

		//Loan Fee/Closing Cost:
		var bridge_loan_fee_closing_cost_option_cal = (bridge_current_total_loan_amount * bridge_loan_fee_closing_cost_option_1) / 100 ;
		AvanaUtils.formatCurrency('bridge_loan_fee_closing_cost_option_cal',bridge_loan_fee_closing_cost_option_cal);

		//New Bridge Loan Amount:
		var bridge_bridge_loan_amount = bridge_current_total_loan_amount + bridge_loan_fee_closing_cost_option_cal;
		AvanaUtils.formatCurrency('bridge_bridge_loan_amount',bridge_bridge_loan_amount);  

		//To Cal P & Q The Following Steps
		//1st Mortgage Payment
		var i1 = (bridge_interest_rate * 365) / 360; 
		var bridge_estimated_monthly_mortgage_payment = (((bridge_bridge_loan_amount * i1) / 100) / 12)
		AvanaUtils.formatCurrency('bridge_estimated_monthly_mortgage_payment', bridge_estimated_monthly_mortgage_payment);		

		//Total Monthly Payment:
		var bridge_annual_mortgage_payment = bridge_estimated_monthly_mortgage_payment * 12;
		AvanaUtils.formatCurrency('bridge_annual_mortgage_payment',bridge_annual_mortgage_payment);
	}
}
//SBA Purchase

jQuery('#sba_purchase .input-group .input').on('blur', function() {
	SBA.purchase();
});

jQuery('#sba_purchase .select-group .select').on('change', function() {
	SBA.purchase();
});

jQuery('#sba_refinance_no_cash_out .input-group .input').on('blur', function() {
	SBA.refinanceNoCashOut();
});

jQuery('#sba_refinance_no_cash_out .select-group .select').on('change', function() {
	SBA.refinanceNoCashOut();
});

jQuery('#sba_refinance_cash_out .input-group .input').on('blur', function() {
	SBA.refinanceCashOut();
});

jQuery('#sba_refinance_cash_out .select-group .select').on('change', function() {
	SBA.refinanceCashOut();
});

jQuery('#calculator_construction_loan .input-group .input').on('blur', function() {
	Construction.getCalculations();
});

jQuery('#calculator_construction_loan .select-group .select').on('change', function() {
	Construction.getCalculations();
});

jQuery('#calculator_bridge_loan .input-group .input').on('blur', function() {
	Bridge.getCalculations();
});

jQuery('#calculator_bridge_loan .select-group .select').on('change', function() {
	Bridge.getCalculations();
});