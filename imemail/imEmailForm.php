<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Email', $_POST['email'], '', false);
	$form->setField('Name', $_POST['name'], '', false);
	$form->setField('Message', $_POST['message'], '', false);

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'E15C92680F3081D1572ACF6D7DE6D9E1' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner($_POST['email'] != "" ? $_POST['email'] : 'pflanz@pflanz.com', 'pflanz@pflanz.com', '', '', false);
		$form->mailToCustomer('pflanz@pflanz.com', $_POST['email'], 'Thanks,  I have received your email', 'I will be replying soon.

But if your query was for ordering, please give us a call instead of emailing.', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file
