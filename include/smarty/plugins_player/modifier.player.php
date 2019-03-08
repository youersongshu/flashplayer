<?php
/**
 * player modifier
 */
function smarty_modifier_player($string,$action) {
    switch($action) {
	case 'categoryname':
	    $playerObj = new Player();
		return $playerObj->getCategoryNameById($string);
	    break;
	}
}
