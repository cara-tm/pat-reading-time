<?php
/**
 * pat_reading_time/pat_estimate_time_reading
 * @author:  Patrick LEFEVRE, all rights reserved. <patrick[dot]lefevre[at]gmail[dot]com>
 * @link:    http://pat-reading-time.cara-tm.com
 * @type:    Public
 * @prefs:   no
 * @order:   5
 * @version: 0.2.4
 * @license: GPLv2
*/


/**
 * This plugin tags registry
 *
 */
if (class_exists('\Textpattern\Tag\Registry')) {
	Txp::get('\Textpattern\Tag\Registry')
		->register('pat_reading_time')
		->register('pat_estimate_time_reading');
}


/**
 * Return word count
 *
 * @param  atts
 * @return integer The number of words
 */
function pat_reading_time($atts)
{

	global $thisarticle;

	//assert_article();

	extract(lAtts(array(
		'text'		=> 'body',
		'before'	=> '1',
		'title'		=> 'Word',
		'plural'	=> 's',
		'charlist'	=> NULL,
		'wraptag'	=> 'p',
		'break'		=> 'br',
		'class'		=> 'word-count',
	), $atts));

	if (empty($thisarticle[$text])) {
		return '';
	} else {
		$content = htmlspecialchars_decode(strip_tags($thisarticle[$text]));
	}

	if ($content) {

		$rs = _pat_words_count($content);
		$result = ($before === "1" ? _pat_plural($title, $plural, $rs).' '.$rs : $rs.' '._pat_plural($rs, $title, $plural));
		if ($break == 'br' or $break == 'hr') {
			$break = "<$break />".n;
		} else {
			$break = '';
		}
		$out = ($wraptag) ? doTag($result, $wraptag, $class).$break : $result;

	} else {
		$out = trigger_error(gTxt('invalid_attribute_value', array('{name}' => 'text')), E_USER_WARNING);
	}

	return $out;

}


/**
 * Return estimated time reading
 *
 * @param  atts
 * @return string Reading time in plain text
 */
function pat_estimate_time_reading($atts)
{

	global $thisarticle;

	assert_article();

	extract(lAtts(array(
		'text'		=> 'body',
		'title'		=> 'Time to read: ',
		'before' 	=> '1',
		'short'		=> false,
		'minute'	=> 'minute',
		'second' 	=> 'second',
		'plural' 	=> 's',
		'less' 	=> '',
		'wraptag'	=> 'p',
		'break'		=> 'br',
		'class'		=> 'time-reading',
		'color' 	=> '#5d5d5d',
		'size' 	 	=> '18',
		'frequence'	=> 200,
	), $atts));

	if (empty($thisarticle[$text])) {
		return '';
	} else {
		$content = $thisarticle[$text];
	}

	if ($content) {

		$word = _pat_words_count($content);
		$m = floor($word / $frequence);
		$s = floor($word % $frequence / ($frequence / 60));

		$icon = '<svg aria-hidden="true" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24"><path d="M12 2C6.489 2 2 6.489 2 12s4.489 10 10 10 10-4.489 10-10S17.511 2 12 2zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8zm-1 2v6.414l4.293 4.293 1.414-1.414L13 11.586V6h-2z" fill="'.$color.'"></path></svg>';

		$result = ("0" !== $short ? ($m <= 0 ? $less.' '._pat_plural($m, $minute, $plural) : _pat_plural($m, $minute, $plural)) : _pat_plural($m, $minute, $plural).' '.$s.' '._pat_plural($s, $second, $plural));

		$est = ("0" !== $before ? $icon.' '.$title.' '.$m.' '.$result : $icon.' '.($m > 0 ? $m.' '.$result.' '.$title : ($less ? $result.' '.$title : '0 '.$result.' '.$title)));

		if ($break == 'br' or $break == 'hr') {
			$break = "<$break />".n;
		} else {
			$break = '';
		}

		$out = ($wraptag) ? doTag($est, $wraptag, $class).$break : $est;

	} else {
		$out = trigger_error(gTxt('invalid_attribute_value', array('{name}' => 'text')), E_USER_WARNING);
	}

	return ($word > 0 ? $out : '');

}


/**
 * Return lenght of string
 *
 * @param  $words, $extra	string, signs to include in count
 * @return integer
 */
function _pat_words_count($words, $extra = NULL)
{
	$counter = str_word_count(strip_tags($words), 0);

	return $counter;

}


/**
 * Return plural word
 *
 * @param  $text, $title, $sign		string, word, plural sign
 * @return string
 */
function _pat_plural($count, $title, $sign)
{
	return ($count <= 1 ? $title : $title.$sign);
}

