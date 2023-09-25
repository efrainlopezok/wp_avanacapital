<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Refinance, No Cash Out</title>
<style type="text/css">
html,body{font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;vertical-align:top}
label{font-size:14px;}
td{padding:15px;vertical-align:top;}
td table td{padding:0 5px 0 0;}
td span{margin:0 0 15px;}
</style>
</head>
<body>
<?php
$calc_type = $_REQUEST['calc_type'];
$user_fullname = $_REQUEST['user_fullname'];
$user_email = $_REQUEST['user_email'];
$user_phone = $_REQUEST['user_phone'];
$user_questions = $_REQUEST['user_questions'];
$sba_rnc_property_type = $_REQUEST['sba_rnc_property_type'];
$sba_rnc_estimated_age_property = $_REQUEST['sba_rnc_estimated_age_property'];
$sba_rnc_original_purchase_price = $_REQUEST['sba_rnc_original_purchase_price'];
$sba_rnc_current_property_value = $_REQUEST['sba_rnc_current_property_value'];
$sba_rnc_current_first_mortgage_payment = $_REQUEST['sba_rnc_current_first_mortgage_payment'];
$sba_rnc_current_second_mortgage_payment = $_REQUEST['sba_rnc_current_second_mortgage_payment'];
$sba_rnc_current_second_mortgage_monthly_payment = $_REQUEST['sba_rnc_current_second_mortgage_monthly_payment'];
$sba_rnc_closing_cost_loan_fees = $_REQUEST['sba_rnc_closing_cost_loan_fees'];
$hid_sba_rnc_closing_cost = $_REQUEST['hid_sba_rnc_closing_cost'];
$hid_sba_rnc_total_project_cost = $_REQUEST['hid_sba_rnc_total_project_cost'];
$sba_rnc_refinance_interest_rate_on_1st_mortgage = $_REQUEST['sba_rnc_refinance_interest_rate_on_1st_mortgage'];
$sba_rnc_amortization_first_mortgage = $_REQUEST['sba_rnc_amortization_first_mortgage'];
$hid_sba_rnc_loan_to_value = $_REQUEST['hid_sba_rnc_loan_to_value'];
$hid_sba_rnc_new_first_mortgage_balance = $_REQUEST['hid_sba_rnc_new_first_mortgage_balance'];
$hid_sba_rnc_est_first_mortgage_mnth_Payment = $_REQUEST['hid_sba_rnc_est_first_mortgage_mnth_Payment'];
$hid_sba_rnc_total_annual_payment = $_REQUEST['hid_sba_rnc_total_annual_payment'];
$hid_sba_rnc_total_mnth_payment = $_REQUEST['hid_sba_rnc_total_mnth_payment'];

$html = '
    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;margin:0 auto 15px;vertical-align:top;">
    <tr>
      <td colspan="2"><label style="color:#333333;display:inline-block;margin-bottom:10px;">Full Name:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_fullname.'</span>
      </td>
      </tr>
      <tr>
      <td>
      <label style="color:#333333;display:inline-block;margin-bottom:10px;">Email:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_email.'</span>
      </td>
      <td><label style="color:#333333;display:inline-block;margin-bottom:10px;">Phone:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_phone.'</span>
      </td>
      </tr>
      <tr>
      <td colspan="2">
      <label style="color:#333333;display:inline-block;margin-bottom:10px;">Questions/Description:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_questions.'</span>
      </td>
    </tr>
    </table>
    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;vertical-align:top;">
    <tr>
      <td colspan="2" style="padding:15px 0;"><h1 style="font-size:18px;text-transform:uppercase;text-align:center;clear:both;">Loan Builder - Refinance, No Cash Out</h1></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Property Type:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_rnc_property_type.'</span></td>
      <td>
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td><label style="color:#333333;display:block;margin-bottom:10px;">Estimated Age of Property:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_rnc_estimated_age_property.' Years</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Original Purchase Price:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_rnc_original_purchase_price.'</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current Property Value:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_rnc_current_property_value.'</span></td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current 1st Mortgage Balance:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_rnc_current_first_mortgage_payment.'</span></td>
      <td><table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td><label style="color:#333333;display:block;margin-bottom:10px;">Current 2nd Mortgage Balance:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_rnc_current_second_mortgage_payment.'</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current 2nd Mortgage Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_rnc_current_second_mortgage_monthly_payment.'</span></td>
      <td>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td><label style="color:#333333;display:block;margin-bottom:10px;">Closing Costs &amp; Loan Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_rnc_closing_cost_loan_fees.'%</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Closing Costs:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_closing_cost.'</span></td>
      <td>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2"><label style="color:#333333;display:block;margin-bottom:10px;">Total Project Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_total_project_cost.'</span></td>
    </tr>
    <tr>
      <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Interest Rate on new 1st Mortgage:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_rnc_refinance_interest_rate_on_1st_mortgage.'%</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Amortization Period(1st Mortgage):</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_rnc_amortization_first_mortgage.' Years</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Loan to Value:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$hid_sba_rnc_loan_to_value.'%</span></td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">New 1st Mortgage Balance:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_new_first_mortgage_balance.'</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Estimated 1st Mortgage Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_est_first_mortgage_mnth_Payment.'</span></td>
      <td>&nbsp;</td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
    <label style="color:#333333;display:block;margin-bottom:10px;">Total Annual Payment:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_total_annual_payment.'</span></td>
    </tr>
    <tr>
      <td colspan="2">
      <label style="color:#333333;display:block;margin-bottom:10px;">Total Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_rnc_total_mnth_payment.'</span></td>
    </tr>
    </table>
    </body>
    </html>';
