<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: info_sheet.php
	# Downloads info_sheet pdf
	# Last updated April 21, 2014 by KC

	# Source: http://webdesign.about.com/od/php/ht/force_download.htm
	header("Content-disposition: attachment; filename=infosheet.pdf");
	header("Content-type: application/pdf");
	readfile("../css/assets/infosheet.pdf");
?>