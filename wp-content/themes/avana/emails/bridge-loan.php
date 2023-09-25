<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bridge Loan</title>
<style type="text/css">
    html,body{font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;vertical-align:top}
    label{font-size:12px;}
    td{padding:15px;vertical-align:top;}
    td table td{padding:0 5px 0 0;}
    td span{margin:0 0 15px; padding-bottom: 10px;}
</style>
</head>
<body>
<?php
    $calc_type = $_REQUEST['calc_type'];
    $user_fullname = $_REQUEST['user_fullname'];
    $user_email = $_REQUEST['user_email'];
    $user_phone = $_REQUEST['user_phone'];
    $user_questions = $_REQUEST['user_questions'];
    $bridge_property_type = $_REQUEST['bridge_property_type'];
    $bridge_est_age_of_property = $_REQUEST['bridge_est_age_of_property'];
    $bridge_original_purchase_price = $_REQUEST['bridge_original_purchase_price'];
    $bridge_current_value = $_REQUEST['bridge_current_value'];
    $bridge_current_total_loan_amount = $_REQUEST['bridge_current_total_loan_amount'];
    $bridge_loan_fee_closing_cost_option_1 = $_REQUEST['bridge_loan_fee_closing_cost_option_1'];
    $hid_bridge_loan_fee_closing_cost_option_cal = $_REQUEST['hid_bridge_loan_fee_closing_cost_option_cal'];
    $hid_bridge_bridge_loan_amount = $_REQUEST['hid_bridge_bridge_loan_amount'];
    $bridge_loan_term_desired = $_REQUEST['bridge_loan_term_desired'];
    $bridge_loan_exit_plan = $_REQUEST['bridge_loan_exit_plan'];
    $bridge_interest_rate = $_REQUEST['bridge_interest_rate'];
    $bridge_closing_date = $_REQUEST['bridge_closing_date'];
    $bridge_current_appraisal_available = $_REQUEST['bridge_current_appraisal_available'];
    $bridge_environmental_report_available = $_REQUEST['bridge_environmental_report_available'];
    $hid_bridge_estimated_monthly_mortgage_payment = $_REQUEST['hid_bridge_estimated_monthly_mortgage_payment'];
    $hid_bridge_annual_mortgage_payment = $_REQUEST['hid_bridge_annual_mortgage_payment'];

$html ='
    <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;margin:0 auto 15px;vertical-align:top;">
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
    <table width="640" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;vertical-align:top;">
    <tr>
      <td colspan="4" style="padding:15px 0;"><h1 style="font-size: 18px;text-transform:uppercase;text-align:center;clear:both;">Loan Builder - Bridge Loan</h1></td>
    </tr>
    <tr>
      <td ><label style="color:#333333;display:block;margin-bottom:10px;">Property Type:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_property_type.'</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Estimated Age of Property:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_est_age_of_property.' Years</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Original Purchase Price:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$bridge_original_purchase_price.'</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current Value</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$bridge_current_value.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current Total Loan Amount: </label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$bridge_current_total_loan_amount.'</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Loan Fee & Closing Costs:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_loan_fee_closing_cost_option_1.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Loan Fee & Closing Costs:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_bridge_loan_fee_closing_cost_option_cal.'</span></td>
     <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Bridge Loan Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_bridge_bridge_loan_amount.'</span></td>
      <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" style="border-top:1px solid #ccc;padding:10px 0"></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Bridge Loan Term Desired:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_loan_term_desired.' Months</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Bridge Loan Exit Plan:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_loan_exit_plan.'</span></td>
      <td colspan="2"><label style="color:#333333;display:block;margin-bottom:10px;">Bridge Loan Interest Rate:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_interest_rate.'%</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Closing Date:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_closing_date.' Days</span></td>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Current Appraisal Available</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_current_appraisal_available.'</span></td>
      <td colspan="2"><label style="color:#333333;display:block;margin-bottom:10px;">Environmental Report Available:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$bridge_environmental_report_available.'</span></td>
    </tr>
    <tr>
      <td colspan="2"><label style="color:#333333;display:block;margin-bottom:10px;">Estimated Monthly Mortgage Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;;">$ '.$hid_bridge_estimated_monthly_mortgage_payment.'</span></td>
      <td colspan="2"><label style="color:#333333;display:block;margin-bottom:10px;">
    Estimated Annual Mortgage Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;;">$ '.$hid_bridge_annual_mortgage_payment.'</span></td>
    </tr>
    </table>
    </body>
    </html>';
