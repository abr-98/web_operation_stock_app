<?php
	function setErrMsg($str) {
		$errors = array();
		if(isset($_SESSION['ERR_ARRAY']) && is_array($_SESSION['ERR_ARRAY'])) {
			$errors = $_SESSION['ERR_ARRAY'];
		}
		$errors[] = $str;
		$_SESSION['ERR_ARRAY'] = $errors;
	}
	
	function getErrCount() {
		if(isset($_SESSION['ERR_ARRAY']) && is_array($_SESSION['ERR_ARRAY'])) {
			return count($_SESSION['ERR_ARRAY']);
		}
		
		return 0;
	}
	
	function getErrMsg($class = '') {
		if(isset($_SESSION['ERR_ARRAY']) && is_array($_SESSION['ERR_ARRAY']) && count($_SESSION['ERR_ARRAY']) > 0) {
			$style = ($class == '')?'':' class="'.$class.'"';
			echo "<ul$style>";
			foreach($_SESSION['ERR_ARRAY'] as $msg) {
				echo "<li>$msg</li>";
			}
			echo '</ul>';
		}
		
		$_SESSION['ERR_ARRAY'] = array();
	}
?>