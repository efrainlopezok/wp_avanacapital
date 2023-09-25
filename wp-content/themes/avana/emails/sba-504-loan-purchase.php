<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Purchase Loan Builder</title>
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
    $sba_p_property_type = $_REQUEST['sba_p_property_type'];
    $sba_p_property_value = $_REQUEST['sba_p_property_value'];
    $sba_p_purchase_price = $_REQUEST['sba_p_purchase_price'];
    $hid_sba_p_project_loan_to_value = $_REQUEST['hid_sba_p_project_loan_to_value'];
    $hid_sba_p_equity_contribution_calculated = $_REQUEST['hid_sba_p_equity_contribution_calculated'];
    $sba_p_purchase_financing_interest_rate = $_REQUEST['sba_p_purchase_financing_interest_rate'];
    $sba_p_property_improvements = $_REQUEST['sba_p_property_improvements'];
    $sba_p_purchase_equity_contribution_select = $_REQUEST['sba_p_purchase_equity_contribution_select'];
    $sba_p_purchase_closing_cost_fees_select = $_REQUEST['sba_p_purchase_closing_cost_fees_select'];
    $sba_p_purchase_period_first_mortgage = $_REQUEST['sba_p_purchase_period_first_mortgage'];
    $sba_p_debenture_rates = $_REQUEST['sba_p_debenture_rates'];
    $hid_sba_p_purchase_closing_cost_fees_calculated = $_REQUEST['hid_sba_p_purchase_closing_cost_fees_calculated'];
    $hid_sba_p_total_project_cost = $_REQUEST['hid_sba_p_total_project_cost'];
    $hid_sba_p_est_first_mortgage_amount = $_REQUEST['hid_sba_p_est_first_mortgage_amount'];
    $hid_sba_p_first_mortgage_monthly_payment = $_REQUEST['hid_sba_p_first_mortgage_monthly_payment'];
    $hid_sba_p_est_second_mortgage_amount = $_REQUEST['hid_sba_p_est_second_mortgage_amount'];
    $hid_sba_p_est_second_mortgage_sba_d_amount = $_REQUEST['hid_sba_p_est_second_mortgage_sba_d_amount'];
    $hid_sba_p_total_loan_amount = $_REQUEST['hid_sba_p_total_loan_amount'];
    $hid_sba_p_total_monthly_mortgage_amount = $_REQUEST['hid_sba_p_total_monthly_mortgage_amount'];
    $hid_sba_p_total_annual_mortgage_payment = $_REQUEST['hid_sba_p_total_annual_mortgage_payment'];

$html = '
    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;margin:0 auto 15px">
    <tr>
      <td style="vertical-align: top;" colspan="2"><label style="color:#333333;display:inline-block;margin-bottom:10px;">Full Name:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_fullname.'</span>
      </td>
      </tr>
      <tr>
      <td style="vertical-align:top;">
      <label style="color:#333333;display:inline-block;margin-bottom:10px;">Email:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_email.'</span>
      </td>
      <td style="vertical-align:top;"><label style="color:#333333;display:inline-block;margin-bottom:10px;">Phone:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_phone.'</span>
      </td>
      </tr>
      <tr>
      <td style="vertical-align:top;" colspan="2">
      <label style="color:#333333;display:inline-block;margin-bottom:10px;">Questions/Description:</label> <span style="display:inline-block;color:#912036;padding-bottom:15px;">'.$user_questions.'</span>
      </td>
    </tr>
    </table>

    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;">
    <tr>
      <td colspan="2" style="padding:15px 0;vertical-align:top;"><h1 style="font-size: 18px;text-transform:uppercase;text-align:center;clear:both;">Loan Builder - Purchase Loan Builder</h1></td>
    </tr>
    <tr>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Property Type:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_property_type.'</span></td>
      <td>
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Property Value:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_p_property_value.'</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Project Loan to Value:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$hid_sba_p_project_loan_to_value.'%</span></td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Purchase Price:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_p_purchase_price.'</span></td>
      <td style="vertical-align:top;"><table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Equity Contribution:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_purchase_equity_contribution_select.'%</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Equity Contribution:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$hid_sba_p_equity_contribution_calculated.'</span></td>
      </tr>
      </table></td>
    </tr>
    <tr>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Property Improvements:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$sba_p_property_improvements.'</span></td>
      <td style="vertical-align:top;">&nbsp;</td>
    </tr>
    <tr>
      <td style="vertical-align:top;">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr><td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Closing Cost & Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_purchase_closing_cost_fees_select.'%</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Closing Cost & Fees:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_purchase_closing_cost_fees_calculated.'</span></td>
      </tr>
      </table>
      </td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Total Project Cost:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_total_project_cost.'</span></td>
    </tr>
    <tr>
      <td colspan="2">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Amortization Period(1st Mortgage):</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_purchase_period_first_mortgage.'Years</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Purchase Financing Interest Rate:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_purchase_financing_interest_rate.'%</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">SBA Debenture Rate:</label> <span style="display:block;color:#912036;padding-bottom:15px;">'.$sba_p_debenture_rates.'%</span></td>
      </tr>
      </table>
      </td>
    </tr>
    <tr>
      <td style="vertical-align:top;">
      <label style="color:#333333;display:block;margin-bottom:10px;">Estimated 1st Mortgage Amount:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_est_first_mortgage_amount.'</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">1st Mortgage Monthly Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_first_mortgage_monthly_payment.'</span></td>
    </tr>
    <tr>
      <td style="vertical-align:top;">
     <label style="color:#333333;display:block;margin-bottom:10px;">Estimated 2nd Mortgage Amount:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_est_second_mortgage_amount.'</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">2nd Mortgage SBA Payment Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_est_second_mortgage_sba_d_amount.'</span></td>
    </tr>
    <tr>
    <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Total Loan Amount:</label>
     <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_total_loan_amount.'</span></td>
      <td style="vertical-align:top;">
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Total Monthly Mortgage Amount:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_total_monthly_mortgage_amount.'</span></td>
      <td style="vertical-align:top;"><label style="color:#333333;display:block;margin-bottom:10px;">Total Annual Mortgage Payment:</label> <span style="display:block;color:#912036;padding-bottom:15px;">$'.$hid_sba_p_total_annual_mortgage_payment.'</span></td>
      </tr>
      </table>
      </td>
    </tr>
    </table>
    </body>
    </html>';
