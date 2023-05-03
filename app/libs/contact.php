<?php

	// -------------
	// Contact Class
	// -------------
	
	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.
	
	// Revisions:
	
	// 29 Sep 2017 : mgl : Start.
	
	class Contact {
		// Properties
		private $p_id;
		private $p_fullname;
		private $p_email;
		private $p_created_on;
		private $p_created_by_user_id;
		private $p_updated_on;
		private $p_updated_by_user_id;
	
		// Constructor
		public function __construct() {
			//
		}
		
		// Destructor
		public function __destruct() {
			//
		}
		
		// Private methods ////////////////////////////////////////////////////////
		
		private static function arrToContact($arr) {
			//
			$contact = new Contact();
			
			//
			$contact -> p_id = $arr['id'];
			$contact -> setFullname($arr['fullname']);
			$contact -> setEmail($arr['email']);
			$contact -> p_created_on = $arr['created_on'];
			$contact -> p_created_by_user_id = $arr['created_by_user_id'];
			$contact -> p_updated_on = $arr['updated_on'];
			$contact -> p_updated_by_user_id = $arr['updated_by_user_id'];

			//
			return $contact;
		}
		
		// Public methods: getters ////////////////////////////////////////////////
		
		public function getId() {
			//
			return $this -> p_id;
		}

		public function getFullname() {
			//
			return $this -> p_fullname;
		}
			
		public function getEmail() {
			//
			return $this -> p_email;
		}

		public function getCreatedOn() {
			//
			return $this -> p_created_on;
		}
		
		public function getCreatedByUserId() {
			//
			return $this -> p_created_by_user_id;
		}
		
		public function getUpdatedOn() {
			//
			return $this -> p_updated_on;
		}
		
		public function getUpdatedByUserId() {
			//
			return $this -> p_updated_by_user_id;
		}
		
		// Public methods: setters ////////////////////////////////////////////////
		
		public function setFullname($fullname) {
			//
			return $this -> p_fullname = $fullname;
		}
		
		public function setEmail($email) {
			//
			return $this -> p_email = $email;
		}
		
		// Public methods: other //////////////////////////////////////////////////
		
		public function toArray() {
			//
			$arr = array();
			
			//
			$arr['id'] = $this -> p_id;
			$arr['fullname'] = $this -> p_fullname;
			$arr['email'] = $this -> p_email;
			$arr['created_on'] = $this -> p_created_on;
			$arr['created_by_user_id'] = $this -> p_created_by_user_id;
			$arr['updated_on'] = $this -> p_updated_on;
			$arr['updated_by_user_id'] = $this -> p_updated_by_user_id;

			//
			return $arr;
		}
		
		public static function existsByFullname($fullname) {
			global $db;
			
			//
			$qr = $db -> countQueryByColumn('contacts', 'fullname', $fullname);

			//
			return $qr > 0;
		}
		
		public static function readById($id) {
			global $db;
			
			//
			$qr = $db -> selectQueryByColumn(
				'contacts',
				null,
				'id',
				$id
			);
			
			if($qr !== null && count($qr) > 0) {
				//
				return self :: arrToContact($qr[0]);
			}
			
			//
			return null;
		}
			
		public static function readAll() {
			global $db;
			
			//
			$qr = $db -> selectQuery(
				'contacts',
				null
			);
			
			if($qr !== null) {
				//
				$contacts = array();
				
				for($i = 0; $i < count($qr); ++$i) {
					$contacts[] = self :: arrToContact($qr[$i]);
				}
				
				//
				return $contacts;
			}
			
			//
			return null;
		}
		
		public static function countAll() {
			global $db;
			
			//
			$qr = $db -> countQuery(
				'contacts'
			);
			
			//
			return $qr;
		}
		
		public function write() {
			global $db;
			
			//
			if($this -> p_fullname) {
				
				//
				$now    = Date('Y-m-d H:i:s');
				$userId = Session :: getUserId();
				
				// Common data
				$data   = array(
					'fullname' => $this -> p_fullname,
					'email' => $this -> p_email
				);
				
				//
				if($this -> p_id === null) {
					// Insert
					$data['created_on'] = $now;
					$data['created_by_user_id'] = $userId;
					
					//
					$qr = $db -> insertQuery('contacts', $data);
					
					//
					if($qr > 0) {
						//
						$this -> p_id = $db -> getLastInsertId();
						
						// Success
						return true;
					}
				}
				else {
					// Update
					$data['updated_on'] = $now;
					$data['updated_by_user_id'] = $userId;
						
					$qr = $db -> updateQueryByColumn('contacts', $data, 'id', $this -> p_id);
					
					//
					if($qr > 0) {
						
						// Success
						return true;
					}
				}
			}
			
			// Failure
			return false;
		}
		
		public static function deleteById($id) {
			global $db;
			
			//
			$qr = $db -> deleteQueryByColumn('contacts', 'id',	$id);
			
			if($qr !== null && count($qr) > 0) {
				//
				return true;
			}
			
			//
			return false;
		}

	}

?>