<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Become An Investor</title>
    <style type="text/css">
        html,body{font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;}
        label{font-size:14px;}
        td{padding:10px;vertical-align:top;}
        td table td{padding:0 5px 0 0;}
        td span{margin:0 0 10px;}
    </style>
</head>
<body>
<?php
$html =
'<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;vertical-align:top;">
    <tr>
        <td colspan="2" style="padding:15px 0;"><h1 style="font-size: 18px;text-transform:uppercase;text-align:center;clear:both;">Become An Investor</h1></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Name:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$first_name.' '.$last_name.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Email:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$email.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">State of Residence:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$state.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Phone:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$phone.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Income Assessment:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$income_assessment.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">2013 Income:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$income_2013.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">2014 Income:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$income_2014.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">2015 Income:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$income_2015.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Net Worth (excluding primary residence):</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$net_worth.'</span></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center"><label style="color:#333333;display:block;margin-bottom:10px;">Real Estate Investing Experience</label></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">R/E Investing:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$re_investing.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">R/E Equity:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$re_equity.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">R/E Development:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$re_development.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Investment Objective:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$investment_objective.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Risk Tolerance:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$risk_tolerence.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">Questions:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$questions.'</span></td>
    </tr>
    <tr>
        <td><label style="color:#333333;display:block;margin-bottom:10px;">IP Address:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$_SERVER["REMOTE_ADDR"].'</span></td>
    </tr>
</table>
</body>
</html>';
?>
