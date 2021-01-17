<?php
/**
 * Utility functions
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E-Foundation 5.0
 */

/**
 * Get ordinal word from a given integer (up to 9)
 * @param $num - the number to get the ordinal word for
 * @return string
 * @since Double-E Foundation 3.0
 */
function doublee_integer_to_ordinal_word($num) {
	$word = array('first','second','third','fourth','fifth','sixth','seventh','eighth','ninth','tenth');
	if($num <= 9) {
		return $word[$num];
	} else {
		return '';
	}
}
