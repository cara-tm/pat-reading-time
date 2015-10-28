<?php
/**
 * pat_reading_time/pat_estimate_time_reading
 * @author:  © Patrick LEFEVRE, all rights reserved. <patrick[dot]lefevre[at]gmail[dot]com>
 * @link:    http://pat-reading-time.cara-tm.com
 * @type:    Public
 * @prefs:   no
 * @order:   5
 * @version: 0.2.1
 * @license: GPLv2
*/


/**
 * This plugin tags registry
 *
 */
if (class_exists('Textpattern_Tag_Registry')) {
	Txp::get('Textpattern_Tag_Registry')
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
		'before'	=> 1,
		'title'		=> 'Word',
		'plural'	=> 's',
		'charlist'	=> NULL,
		'wraptag'	=> 'p',
		'break'		=> 'br',
		'class'		=> 'word-count',
	), $atts));

	if(empty($thisarticle[$text]))
		return '';
	else
		$content = htmlspecialchars_decode(strip_tags($thisarticle[$text]));

	if ($content) {

		$result = _pat_words_count($content, $charlist);
		$result = ( $before == true ? _pat_plural($result, $title, $plural).' '.$result : $result.' '._pat_plural($result, $title, $plural) ).'.';
		if ($break == 'br' or $break == 'hr')
			$break = "<$break />".n;
		else
			$break = '';
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
		'short'		=> false,
		'minute'	=> 'minute',
		'second' 	=> 'second',
		'plural' 	=> 's',
		'wraptag'	=> 'p',
		'break'		=> 'br',
		'class'		=> 'time-reading',
		'frequence'	=> 200,
	), $atts));

	if ( empty($thisarticle[$text]) )
		return '';
	else
		$content = $thisarticle[$text];

	if ($content) {

		$word = _pat_words_count($content);
		$m = floor($word / $frequence);
		$s = floor($word % $frequence / ($frequence / 60));

		$est = $title . ( $m > 0 ? $m . ' ' . _pat_plural($m, $minute, $plural) . ($short ? '' : ', ') . $s . ' ' . _pat_plural($s, $second, $plural) : $s . ' ' . _pat_plural($s, $second, $plural) ) . '.';

		if ($break == 'br' or $break == 'hr')
			$break = "<$break />".n;
		else
			$break = '';

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
	$counter = str_word_count( strip_tags($words), 0, $charlist );

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
