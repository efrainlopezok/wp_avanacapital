<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Construction Loan</title>
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
    $construction_property_type = $_REQUEST['construction_property_type'];
    $construction_land_cost = $_REQUEST['construction_land_cost'];
    $construction_hard_cost = $_REQUEST['construction_hard_cost'];
    $construction_contingency_hard_cost = $_REQUEST['construction_contingency_hard_cost'];
    $hid_construction_contingency = $_REQUEST['hid_construction_contingency'];
    $construction_soft_cost = $_REQUEST['construction_soft_cost'];
    $construction_contingency_soft_cost = $_REQUEST['construction_contingency_soft_cost'];
    $hid_construction_contingency_soft_cost_calculated = $_REQUEST['hid_construction_contingency_soft_cost_calculated'];
    $construction_ffe = $_REQUEST['construction_ffe'];
    $hid_construction_estimated_project_cost_before_fees = $_REQUEST['hid_construction_estimated_project_cost_before_fees'];
    $construction_loan_fees = $_REQUEST['construction_loan_fees'];
    $hid_construction_loan_fees_calculated = $_REQUEST['hid_construction_loan_fees_calculated'];
    $construction_closing_cost = $_REQUEST['construction_closing_cost'];
    $construction_interest_rate = $_REQUEST['construction_interest_rate'];
    $construction_schedule = $_REQUEST['construction_schedule'];
    $hid_construction_interest_cost_during_construction = $_REQUEST['hid_construction_interest_cost_during_construction'];
    $construction_down_payment = $_REQUEST['construction_down_payment'];
    $hid_construction_actual_equity_down_payment = $_REQUEST['hid_construction_actual_equity_down_payment'];
    $hid_construction_updated_project_cost = $_REQUEST['hid_construction_updated_project_cost'];
    $construction_interest_rate1 = $_REQUEST['construction_interest_rate1'];
    $hid_construction_estimated_first_mortgage = $_REQUEST['hid_construction_estimated_first_mortgage'];
    $hid_construction_first_mortgage_monthly_payment = $_REQUEST['hid_construction_first_mortgage_monthly_payment'];
    $construction_sba_debenture_rates = $_REQUEST['construction_sba_debenture_rates'];
    $hid_construction_estimated_second_mortgage = $_REQUEST['hid_construction_estimated_second_mortgage'];
    $hid_construction_second_mortgage_monthly_payment = $_REQUEST['hid_construction_second_mortgage_monthly_payment'];
    $construction_amortization_period_first_mortgage = $_REQUEST['construction_amortization_period_first_mortgage'];
    $hid_construction_total_loan_amount = $_REQUEST['hid_construction_total_loan_amount'];
    $hid_construction_total_monthly_payment = $_REQUEST['hid_construction_total_monthly_payment'];

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
      <td colspan="3" style="padding:15px 0;"><h1 style="font-size:18px;text-align:center;clear:both;">Loan Builder - Construction Loan</h1></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Property Type:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_property_type.'</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Land Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$ '.$construction_land_cost.'</span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Hard Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$ '.$construction_hard_cost.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Contingency (Hard Cost):</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_contingency_hard_cost.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Contingency (Hard Cost):</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_contingency.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Soft Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$construction_soft_cost.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Contingency (Soft Cost):</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_contingency_soft_cost.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Contingency (Soft Cost):</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_contingency_soft_cost_calculated.'</span></td>
    </tr>
    <tr>
      <td colspan="3"><label style="color:#333333;display:block;margin-bottom:10px;">FF & E:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$construction_ffe.'</span></td>
    </tr>
    <tr>
      <td colspan="3"><label style="color:#333333;display:block;margin-bottom:10px;">Estimated Project Cost Before Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_estimated_project_cost_before_fees.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Loan Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_loan_fees.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Loan Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_loan_fees_calculated.'</span></td>
     <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Closing Costs:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$construction_closing_cost.'</span></td>
     <td>&nbsp;</td><td>&nbsp;</td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Construction Interest Rate:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_interest_rate.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Construction Term:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_schedule.' Months</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Interest Cost During Construction:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_interest_cost_during_construction.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Down Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_down_payment.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Actual Equity Down Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_actual_equity_down_payment.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Updated Project Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_updated_project_cost.'</span></td>
    </tr>
    <tr>
      <td colspan="3" style="padding:1rem 0 3rem;"><h1 style="font-size: 1.500rem;text-align:center;clear:both;">Permanent SBA 504 Loans</h1></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Interest Rate on 1st Mortgage:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_interest_rate1.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Estimated 1st Mortgage Loan Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_estimated_first_mortgage.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">1st Mortgage Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_first_mortgage_monthly_payment.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">SBA Debenture Rate:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_sba_debenture_rates.'%</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Estimated 2nd Mortgage Loan Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_estimated_second_mortgage.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">2nd Mortgage Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_second_mortgage_monthly_payment.'</span></td>
    </tr>
    <tr>
      <td><label style="color:#333333;display:block;margin-bottom:10px;">Amortization Period (1st Mortgage):</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$construction_amortization_period_first_mortgage.' Years</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Total Loan Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_total_loan_amount.'</span></td>
     <td><label style="color:#333333;display:block;margin-bottom:10px;">Total Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_construction_total_monthly_payment.'</span></td>
    </tr>
    <tr>
      <td colspan="3"><label style="color:#333333;display:block;margin-bottom:10px;">Amortization Period (2nd Mortgage):</label> <span style="display:block;color:#912036;padding-bottom:15px;">20 Years</span></td>
    </tr>
    </table>
    </body>
    </html>';
