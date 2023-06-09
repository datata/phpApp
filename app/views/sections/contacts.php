<?php
  
	// ---------------------------
	// AppTemplate: Contacts Table
	// ---------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.

	// Dependencies
	require_once(dirname(__FILE__) . '/../../actions/get_contacts.php');
	
	$table_cfg = array(
		'id' => 'contacts',
		'columns' => array(
			array('title' => tr('Id'), 'sortBy' => 'id'),
			array('title' => tr('Fullname'), 'sortBy' => 'fullname'),
			array('title' => tr('Email'), 'sortBy' => 'Email'),
			array('title' => tr('Actions'))
		),
		'rows' => array(
		)
	);
	
	// Create table
	$table = new NiceTable($table_cfg);
	
	$table->setGetParams(array('action' => 'contacts'));
	
	// Get page length
	$page_length = $table->getPageLength();
	
	if($table->getSortBy() == '') {
		$table->setSortBy('id');
		$table->setSortOrder('asc');
	}
	
	// Read records
	$records = getContacts($table->getPage(), $page_length, $table->getSortBy(), $table->getSortOrder());
	
	$total_recs = $records['total_recs'];
	$paged_recs = $records['paged_recs'];
	$recs       = $records['recs'];

	// Set # of pages in table
	$table->setPages(floor(($total_recs + $page_length - 1) / $page_length));
	
	// Build rows for table
	$rows = array();
	
	for($i = 0; $i < count($recs); ++$i) {
		$rows[$i] = array($recs[$i]['id'], $recs[$i]['fullname'], $recs[$i]['email'],		
				NiceTable::drawIcon(NiceTable::ICON_INFO,   'rec_info(recs['.$i.'])').
				NiceTable::drawIcon(NiceTable::ICON_EDIT,   'rec_edit(recs['.$i.'])').
				NiceTable::drawIcon(NiceTable::ICON_DELETE, 'rec_delete(recs['.$i.'])'));
	}
	
	// Set rows in table
	$table->setRows($rows);

	// Build array of records for JavaScript modals  -- FIXME -- función PHP???
?>
<script>
	var recs = <?php echo(json_encode($recs)); ?>;
</script>

  <header class="w3-container">
    <h5><b><i class="fa fa-address-card fa-fw"></i> <?php say('Contacts'); ?></b></h5>
	<hr class="w3-border-gray">
  </header>

  <div class="w3-container">
	<div class="w3-right">
		<button class="w3-btn w3-small w3-green" onclick="rec_add();">
			<i class="fa fa-plus-square w3-text-black"></i>&nbsp;&nbsp;<?php say('Add'); ?>
		</button>
	</div>
	
	<br><br>
  
<?php
	$table->draw();
?>
	

  </div>
  
  <!-- ###################### MODAL: RECORD INFO ############################# -->
  
  <div id="modal_info" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container w3-modal-header"> 
        <span onclick="document.getElementById('modal_info').style.display='none'" class="w3-closebtn">&times;</span>
        <h2><i class="fa fa-info"></i>&nbsp;&nbsp;<?php say('ContactInfo'); ?> &nbsp;|&nbsp; <span id="modal_info_id"></span></h2>
      </header>
	  
      <form class="w3-container" method="post" action="">
        <div class="w3-section">
		  <label><b><?php say('Fullname'); ?></b></label>
          <input class="w3-input w3-margin-bottom w3-border" type="text" placeholder="" id="modal_info_fullname" disabled>
		  <label><b><?php say('Email'); ?></b></label>
		  <input class="w3-input w3-margin-bottom w3-border" type="text" placeholder="" id="modal_info_email" disabled>
		  <hr>
		  <button class="w3-btn w3-green" type="button" onclick="document.getElementById('modal_info').style.display='none'"><?php say('Continue'); ?></button>
        </div>
      </form>
    </div>
  </div>
  
  <!-- ###################### MODAL: ADD RECORD ############################# -->
  
  <div id="modal_add" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom x-modal-medium">
	
      <header class="w3-container w3-modal-header"> 
        <span onclick="document.getElementById('modal_add').style.display='none'" class="w3-closebtn">&times;</span>
        <h2><i class="fa fa-plus-square"></i>&nbsp;&nbsp;<?php say('AddContact'); ?></h2>
      </header>
	  
	  <form class="w3-container" method="post" action="index.php?action=add_contact">
        <div class="w3-section">
		  <label><b><?php say('Fullname'); ?></b></label>
		  <input class="w3-input w3-margin-bottom w3-border" type="text" placeholder="" name="contact_fullname" required>
		  <label><b><?php say('Email'); ?></b></label>
          <input class="w3-input w3-margin-bottom w3-border" type="email" placeholder="" name="contact_email" required>
		  <hr>
          <button class="w3-btn w3-green" type="submit"><?php say('Save'); ?></button>
		  <button class="w3-btn w3-green" type="button" onclick="document.getElementById('modal_add').style.display='none'"><?php say('Cancel'); ?></button>
        </div>
      </form>
	  	  
    </div>
  </div>
 
  <!-- ###################### MODAL: EDIT RECORD ############################# -->
  
  <div id="modal_edit" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container w3-modal-header"> 
        <span onclick="document.getElementById('modal_edit').style.display='none'" class="w3-closebtn">&times;</span>
        <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;<?php say('EditContact'); ?> &nbsp;|&nbsp; <span id="modal_edit_id"></span></h2>
      </header>
	  
      <form class="w3-container" method="post" action="index.php?action=edit_contact">
        <div class="w3-section">
		  <input class="" type="hidden" id="modal_edit_id_hidden" name="contact_id" value="">

		  <label><b><?php say('Fullname'); ?></b></label>
          <input class="w3-input w3-margin-bottom w3-border" type="text" placeholder="" id="modal_edit_fullname" name="contact_fullname" value="" required>
		  <label><b><?php say('Email'); ?></b></label>
          <input class="w3-input w3-margin-bottom w3-border" type="email" placeholder="" id="modal_edit_email" name="contact_email" required>
		  <hr>
          <button class="w3-btn w3-green" type="submit"><?php say('Update'); ?></button>
		  <button class="w3-btn w3-green" type="button" onclick="document.getElementById('modal_edit').style.display='none'"><?php say('Cancel'); ?></button>
        </div>
      </form>
    </div>
  </div>
  
   <!-- ###################### MODAL: DELETE RECORD ############################# -->
  
  <div id="modal_delete" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container w3-modal-header"> 
        <span onclick="document.getElementById('modal_delete').style.display='none'" class="w3-closebtn">&times;</span>
        <h2><i class="fa fa-trash"></i>&nbsp;&nbsp;<?php say('DeleteContact'); ?> &nbsp;|&nbsp; <span id="modal_delete_id"></span></h2>
      </header>
	  
      <form class="w3-container" method="post" action="index.php?action=delete_contact">
        <div class="w3-section">
			<input class="" type="hidden" id="modal_delete_id_hidden" name="contact_id" value="">
			<p>
				<?php echo str_replace('*','<b><span id="modal_delete_show">?</span></b>', tr('AskDeleteContact')); ?>
			</p> 
			<hr>
          <button class="w3-btn w3-green" type="submit"><?php say('Delete'); ?></button>
		  <button class="w3-btn w3-green" type="button" onclick="document.getElementById('modal_delete').style.display='none'"><?php say('Cancel'); ?></button>
        </div>
      </form>

	  </div>
  </div>


<script>
	// Init view
	function initSection() {
		
		//
	}

	// Modal Info Record
	function rec_info(rec) {
		document.getElementById("modal_info_id").innerHTML  = rec.id;
		document.getElementById("modal_info_fullname").value    = rec.fullname;
		document.getElementById("modal_info_email").value = rec.email;
		document.getElementById('modal_info').style.display = 'block';
	}
	
	// Modal Add Record
	function rec_add() {
		document.getElementById('modal_add').style.display = 'block';
	}
	
	// Modal Edit Record
	function rec_edit(rec) {
		document.getElementById("modal_edit_id").innerHTML    = rec.id;
		document.getElementById("modal_edit_id_hidden").value = rec.id;
		document.getElementById("modal_edit_fullname").value      = rec.fullname;
		document.getElementById("modal_edit_email").value      = rec.email;
		document.getElementById('modal_edit').style.display = 'block';
	}
	
	// Modal Delete Record
	function rec_delete(rec) {
		document.getElementById("modal_delete_id").innerHTML       = rec.id;
		document.getElementById("modal_delete_id_hidden").value = rec.id;
		document.getElementById("modal_delete_show").innerHTML = rec.fullname;
		document.getElementById('modal_delete').style.display  = 'block';
	}
</script>