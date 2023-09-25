<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');

if($_POST && isset($_POST['calc_type']) && $_POST['calc_type'] != "" && isset($_POST['user_email']) && $_POST['user_email'] != "" && isset($_POST['user_fullname'])){
	if(isset($_POST['calc_type']) && $_POST['calc_type'] == 'bridge'){
	   $subject = "Loan Builder - Bridge Loan";
	   include_once('emails/bridge-loan.php');
	
	}elseif(isset($_POST['calc_type']) && $_POST['calc_type'] == 'construction'){
		$subject = "Loan Builder - Construction Loan";
		include_once('emails/construction-loan.php');
	
	}elseif(isset($_POST['calc_type']) && $_POST['calc_type'] == 'purchase'){
		$subject = "Loan Builder - Purchase Loan Builder";
		include_once('emails/sba-504-loan-purchase.php');
	
	}elseif(isset($_POST['calc_type']) && $_POST['calc_type'] == 'refinancenocash'){
		$subject = "Loan Builder - Refinance, No Cash Out";
		include_once('emails/sba-504-loan-refinance-no-cash-out.php');
	
	}elseif(isset($_POST['calc_type']) && $_POST['calc_type'] == 'refinancecash'){
		$subject = "Loan Builder - Refinance, Cash Out";
		include_once('emails/sba-504-loan-refinance-cash-out.php');
	
	}
	
	$to = 'anish@avanacapital.com,sundip@avanacapital.com';
	add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
	wp_mail($to, $subject, $html);
}else{
	echo "0";
}
?>