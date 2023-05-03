<?php
  
	// -------------------------
	// AppTemplate: Get Contacts
	// -------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.
	
	//
	function getContacts($page, $pageLength, $sortBy, $sortOrder) {
		global $db;
		global $app_error;
		
		//
		$ret = '';
		
		// Read total # of records
		$numrecs = Contact :: countAll();

		if($numrecs >= 0)
		{
			// Set pagination
			$offset = ($page > 0 ? ' offset '.($page * $pageLength).' ' : '');
			$limit  = ($pageLength > 0 ? ' limit '.$pageLength.' ' : '');
			
			// Read records
			$records = $db->getQuery('select * from contacts '.
								'order by '.$sortBy.' '.$sortOrder.$limit.$offset.';');
			// Check result
			if($records !== null) {
				// Success
			}
			else {
				$ret = 'CantReadContacts';
			}
			
			// -->
		}
		else {
			$ret = 'CantReadContacts';
		}

		// -->
		
		if($ret != '') {
			$app_error = $ret;
		}
		
		$ret = array(
			'total_recs' => ($ret == '' ? $numrecs : 0),
			'paged_recs' => ($ret == '' ? count($records) : 0),
			'recs' => ($ret == '' ? $records : array())
		);
		
		return $ret;
	}
?>