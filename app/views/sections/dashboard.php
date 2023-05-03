  <?php
  
	// ------------------------
	// AppTemplate: Nodes Table
	// ------------------------

	// (c) 2017 Miguel Garcia / FloppySoftware
	//
	// http://www.floppysoftware.es
	// floppysoftware@gmail.com
	//
	// Released under the GNU General Public License v3.

	// Dependencies
	require_once(dirname(__FILE__) . '/../libs/populate_last_users_activities.php');
?>

<header class="w3-container">
	<h5><b><i class="fa fa-dashboard fa-fw"></i> <?php say('Dashboard'); ?></b></h5>
	<hr class="w3-border-gray">
</header>


<div class="w3-row-padding">
	<div class="w3-quarter w3-margin-bottom">
	  <div class="w3-container w3-red w3-text-white w3-padding-16 w3-round-large">
		<div class="w3-left"><i class="fa fa-cubes w3-xxxlarge"></i></div>
		<div class="w3-right">
		  <h3><?php $n = Node :: countAll(); echo($n >= 0 ? $n : tr('NotAvailable')); ?></h3>
		</div>
		<div class="w3-clear"></div>
		<h4><?php say('Nodes'); ?></h4>
	  </div>
	</div>
	<div class="w3-quarter w3-margin-bottom">
      <div class="w3-container w3-blue w3-text-white w3-padding-16 w3-round-large">
        <div class="w3-left"><i class="fa fa-user w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php $n = User :: countAll(); echo($n >= 0 ? $n : tr('NotAvailable')); ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4><?php say('Users'); ?></h4>
      </div>
    </div>
	<div class="w3-quarter w3-margin-bottom">
	  <div class="w3-container w3-orange w3-text-white w3-padding-16 w3-round-large">
		<div class="w3-left"><i class="fa fa-sign-in w3-xxxlarge"></i></div>
		<div class="w3-right">
		  <h3>??</h3>
		</div>
		<div class="w3-clear"></div>
		<h4>Something</h4>
	  </div>
	</div>
	<div class="w3-quarter w3-margin-bottom">
	  <div class="w3-container w3-teal w3-text-white w3-padding-16 w3-round-large">
		<div class="w3-left"><i class="fa fa-money w3-xxxlarge"></i></div>
		<div class="w3-right">
		  <h3>1.000.000 &euro;</h3>
		</div>
		<div class="w3-clear"></div>
		<h4><?php say('Sales'); ?></h4>
	  </div>
	</div>
<!--	
	<div style="clear:both;"></div>
	
	<div class="w3-half w3-margin-bottom">
	  <div class="w3-container w3-white w3-padding-16">
		<i class="fa fa-users fa-fw"></i>&nbsp;&nbsp;<strong><?php say('LastUsersActivities'); ?></strong>
		<span class="w3-right w3-text-gray">
			<i class="fa fa-chevron-up fa-fw th-fa-clickable" onclick="show_hide_widget('widget_last_users_activities', 'widget_last_users_activities_up_down');" id="widget_last_users_activities_up_down"></i>
		</span>
	  </div>
	  <div class="w3-container w3-white w3-padding-16 w3-border-top" id="widget_last_users_activities">
		<?php populateLastUsersActivities(); ?>
	  </div>
	</div>
-->	
	<div style="clear:both;"></div>
	
	<div class="w3-half">
	  <div class="w3-container w3-white w3-padding-16">
		<i class="fa fa-line-chart fa-fw"></i>&nbsp;&nbsp;<strong>Year sales</strong>
		<span class="w3-right w3-text-gray">
			<i class="fa fa-chevron-up fa-fw"></i>
			<i class="fa fa-times fa-fw"></i>
		</span>
	  </div>
	  <div class="w3-container w3-white w3-padding-16 w3-border-top">
		1st term<span class="w3-right">25%</span>
		<div class="w3-grey w3-round">
			<div class="w3-container w3-center w3-green w3-round" style="width:25%">&nbsp;</div>
		</div>
		2nd term<span class="w3-right">35%</span>
		<div class="w3-grey w3-round">
			<div class="w3-container w3-center w3-green w3-round" style="width:35%">&nbsp;</div>
		</div>
		3rd term<span class="w3-right">30%</span>
		<div class="w3-grey w3-round">
			<div class="w3-container w3-center w3-green w3-round" style="width:30%">&nbsp;</div>
		</div>
		4th term<span class="w3-right">10%</span>
		<div class="w3-grey w3-round">
			<div class="w3-container w3-center w3-green w3-round" style="width:10%">&nbsp;</div>
		</div>
	  </div>
	</div>
	
	<div class="w3-half">
	  <div class="w3-container w3-white w3-padding-16">
		<i class="fa fa-calendar fa-fw"></i>&nbsp;&nbsp;<strong>Calendar for today</strong>
		<span class="w3-right w3-text-gray">
			<i class="fa fa-chevron-up fa-fw"></i>
			<i class="fa fa-times fa-fw"></i>
		</span>
	  </div>
	  <div class="w3-container w3-white w3-padding-16 w3-border-top">
		<i class="fa fa-bath fa-fw"></i><span style="font-family:monospace">&nbsp;06:00&nbsp;-&nbsp;</span>Have a bath.
		<hr>
		<i class="fa fa-coffee fa-fw"></i><span style="font-family:monospace">&nbsp;06:30&nbsp;-&nbsp;</span>Have breakfast.
		<hr>
		<i class="fa fa-money fa-fw"></i><span style="font-family:monospace">&nbsp;10:30&nbsp;-&nbsp;</span>Get some pocket money for the lunch.
		<hr>
		<i class="fa fa-phone fa-fw"></i><span style="font-family:monospace">&nbsp;17:15&nbsp;-&nbsp;</span>Call Elvis.
		<hr>
		<button class="w3-btn w3-green th-w3-btn-primary">Add</button>
	  </div>
	</div>
<!--	
	<div style="clear:both; padding-top:16px"></div>
	
	<div class="w3-half">
	  <div class="w3-container w3-white w3-padding-16">
		<i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;<strong>Last user logins</strong>
		<span class="w3-right w3-text-gray">
			<i class="fa fa-chevron-up fa-fw"></i>
			<i class="fa fa-times fa-fw"></i>
		</span>
	  </div>
	  <div class="w3-container w3-white w3-padding-16 w3-border-top">
		<i class="fa fa-sign-in fa-fw"></i><span style="font-family:monospace">&nbsp;06:00&nbsp;-&nbsp;</span>John Doe.
		<br>
		<i class="fa fa-sign-in fa-fw"></i><span style="font-family:monospace">&nbsp;06:30&nbsp;-&nbsp;</span>Marie Smith.
		<br>
		<i class="fa fa-sign-in fa-fw"></i><span style="font-family:monospace">&nbsp;10:30&nbsp;-&nbsp;</span>Gertrude Smith.
	  </div>
	</div>
-->	
	<div style="clear:both; padding-top:16px"></div>
	
	<!-- Opportunity cards, Odoo / OpenERP style -->
	
	<div class="w3-container">
      <h5><strong>Odoo / OpenERP style</strong></h5>
	</div>
	
	<div class="w3-quarter">
	  <div class="w3-container w3-brown w3-padding-16 w3-round">
		<strong>New</strong>
		<span class="w3-right">
			<i class="fa fa-plus fa-fw th-fa-clickable"></i>
		</span>
		<p></p>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-green"></i>
				<i class="fa fa-circle fa-fw w3-text-blue"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
		<br>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-red"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
	  </div>
	</div>
	
	<div class="w3-quarter">
	  <div class="w3-container w3-brown w3-padding-16 w3-round">
		<strong>Qualification</strong>
		<span class="w3-right">
			<i class="fa fa-plus fa-fw th-fa-clickable"></i>
		</span>
	    <p></p>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-red"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
	  </div>
	</div>
	
	<div class="w3-quarter">
	  <div class="w3-container w3-brown w3-padding-16 w3-round">
		<strong>Proposition</strong>
		<span class="w3-right">
			<i class="fa fa-plus fa-fw th-fa-clickable"></i>
		</span>
	    <p></p>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-green"></i>
				<i class="fa fa-circle fa-fw w3-text-blue"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
		<br>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-red"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
		<br>
		<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-green"></i>
				<i class="fa fa-circle fa-fw w3-text-blue"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
	  </div>
	</div>
	
	<div class="w3-quarter">
	  <div class="w3-container w3-brown w3-padding-16 w3-round">
		<strong>Won</strong>
		<span class="w3-right">
			<i class="fa fa-plus fa-fw th-fa-clickable"></i>
		</span>
		<p></p>
	  	<div class="w3-container w3-white w3-padding-16 w3-round">
			<div>
				<i class="fa fa-circle fa-fw w3-text-red"></i>
			</div>
			<strong>Maybe a project about schools</strong>
			<br>
			24.000 &euro;
			<br>
			<span class="w3-text-red">12 Oct 2017 : Email</span>
			<br>
			<i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star fa-fw w3-text-yellow"></i><i class="fa fa-star-o fa-fw"></i>
			<span class="w3-right w3-text-gray">
				John
			</span>
		</div>
	  </div>
	</div>
	
	<div style="clear:both; padding-top:16px"></div>
	
	<br>
	<br>
	
</div>

<script>
	// Init view
	function initSection() {
		
		//
	}
	
	// Show - hide a widget
	function show_hide_widget(sectId, symbId) {
		var sect = document.getElementById(sectId);
		var symb = document.getElementById(symbId);
		
		if(sect.style.display == "none") {
			sect.style.display = "block";
			symb.classList.remove("fa-chevron-down");
			symb.classList.add("fa-chevron-up");
		}
		else {
			sect.style.display = "none";
			symb.classList.remove("fa-chevron-up");
			symb.classList.add("fa-chevron-down");
		}
	}
	
	function trello_left() {
		var arrowLeft  = document.getElementById('trello_left');
		var arrowRight = document.getElementById('trello_right');
		
		arrowLeft.classList.remove("th-fa-clickable");
		arrowLeft.classList.remove("w3-text-black");
		arrowLeft.classList.add("w3-text-gray");
		arrowLeft.onclick = null;
		
		arrowRight.classList.add("th-fa-clickable");
		arrowRight.classList.remove("w3-text-gray");
		arrowRight.classList.add("w3-text-black");
		arrowRight.onclick = trello_right;
		
		var trelloToday  = document.getElementById('trello_today');
		var trelloNever = document.getElementById('trello_never');
		
		trelloNever.style.display = "none";
		trelloToday.style.display = "block";
	}

	function trello_right() {
		var arrowLeft  = document.getElementById('trello_left');
		var arrowRight = document.getElementById('trello_right');
		
		arrowRight.classList.remove("th-fa-clickable");
		arrowRight.classList.remove("w3-text-black");
		arrowRight.classList.add("w3-text-gray");
		arrowRight.onclick = null;
		
		arrowLeft.classList.add("th-fa-clickable");
		arrowLeft.classList.remove("w3-text-gray");
		arrowLeft.classList.add("w3-text-black");
		arrowLeft.onclick = trello_left;
		
		var trelloToday  = document.getElementById('trello_today');
		var trelloNever = document.getElementById('trello_never');
		
		trelloToday.style.display = "none";
		trelloNever.style.display = "block";
	}


</script>
 

