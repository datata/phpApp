<?php

	// ---------------------------
	// AppTemplate: Update Contact
	// ---------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.
	
	function editContact() {
		global $db;
		
		//
		$ret  = '';
		
		if(array_key_exists('contact_id', $_POST)
			&& array_key_exists('contact_fullname', $_POST)
			&& array_key_exists('contact_email', $_POST)) {

			$contactId       = $_POST['contact_id'];
			$contactFullname = $_POST['contact_fullname'];
			$contactEmail    = $_POST['contact_email'];
			
			// Avoid to store two contacts with the same fullname
			$contact = Contact :: readById($contactId);
			
			if($contact !== null) {
				//
				$contact -> setFullname($contactFullname);
				$contact -> setEmail($contactEmail);
				
				//
				if($contactFullname !== $contact -> getFullname()) {
					if(!Contact :: existsByFullname($contactFullname)) {
						$contact -> setFullname($contactFullname);
					}
					else {
						$ret = 'ContactAlreadyExists';
					}
				}
				
				if($ret == '') {
					if(!$contact -> write()) {
						$ret = 'CantUpdateContact';
					}
				}
				
				// -->
			}
			else {
				$ret = 'ContactNotExists';
			}
		}
		else {
			$ret = 'MissingParameters';
		}
		
		// -->
		
		return $ret;
	}
	
	//
	$ret = editContact();
	
	if($ret != '') {
		$app_error = $ret;
	}
?>