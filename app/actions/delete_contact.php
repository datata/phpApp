<?php

	// ---------------------------
	// AppTemplate: Delete Contact
	// ---------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.
	
	function deleteContact() {
		global $db;
		
		//
		$ret  = '';
		
		if(array_key_exists('contact_id', $_POST)) {
				
			$contactId = $_POST['contact_id'];
			
			//
			if(!Contact :: deleteById($contactId)) {
					$ret = 'CantDeleteContact';
			}

			// -->
		}
		else {
			$ret = 'MissingParameters';
		}
		
		// -->
		
		return $ret;
	}
	
	//
	$ret = deleteContact();
	
	if($ret != '') {
		$app_error = $ret;
	}
?>