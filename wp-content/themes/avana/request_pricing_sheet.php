<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');

if(isset($_POST['user_email']) && $_POST['user_email'] != "" && isset($_POST['user_fullname'])){
	$subject = "Request Pricing Sheets";
	$user_fullname = $_POST['user_fullname'];
	$user_company = $_POST['user_company'];
	$user_phone = $_POST['user_phone'];
	$user_email = $_POST['user_email'];
?>
    <style type="text/css">
        html,body{font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;}
        label{font-size:14px;}
        td{padding:10px;vertical-align:top;}
        td table td{padding:0 5px 0 0;}
        td span{margin:0 0 10px;}
    </style>
<?php
	$html =
		'<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style=" background:#f3eddf;border:1px solid #d3c197;padding:10px;vertical-align:top;">
		<tr>
			<td colspan="2" style="padding:15px 0;"><h1 style="font-size: 18px;text-transform:uppercase;text-align:center;clear:both;">Request Pricing Sheets</h1></td>
		</tr>
		<tr>
			<td><label style="color:#333333;display:block;margin-bottom:10px;">Name:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$user_fullname.' '.$last_name.'</span></td>
		</tr>
		<tr>
			<td><label style="color:#333333;display:block;margin-bottom:10px;">Company:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$user_company.'</span></td>
		</tr>
		<tr>
			<td><label style="color:#333333;display:block;margin-bottom:10px;">Phone:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$user_phone.'</span></td>
		</tr>
		<tr>
			<td><label style="color:#333333;display:block;margin-bottom:10px;">Email:</label></td><td><span style="display:block;color:#912036;padding-bottom:15px;">'.$user_email.'</span></td>
		</tr>
	</table>
	</body>
	</html>';
	add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
	wp_mail("anish@avanacapital.com", $subject, $html);
 }else{
	echo "0";
}?>