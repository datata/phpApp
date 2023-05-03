<?php

	// ------------------------
	// AppTemplate: Add Contact
	// ------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.
	
	function addContact() {
		global $db;
		
		//
		$ret  = '';
		
		if(array_key_exists('contact_fullname', $_POST)
			&& array_key_exists('contact_email', $_POST)) {
				
			$contactFullname = $_POST['contact_fullname'];
			$contactEmail    = $_POST['contact_email'];
			
			// Check if record already exists
			if(!Contact :: existsByFullname($contactFullname)) {
				// Add contact
				$contact = new Contact();
				
				$contact -> setFullname($contactFullname);
				$contact -> setEmail($contactEmail);
	
				if(!$contact -> write()) {
					$ret = 'CantAddContact';
				}

				// -->
			}
			else {
				$ret = 'ContactAlreadyExists';
			}
		}
		else {
			$ret = 'MissingParameters';
		}
		
		// -->
		
		return $ret;
	}
	
	//
	$ret = addContact();
	
	if($ret != '') {
		$app_error = $ret;
	}
?>