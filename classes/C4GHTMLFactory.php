<?php

/**
 * con4gis - the gis-kit
 *
 * @version   php 5
 * @package   con4gis
 * @author    con4gis contributors (see "authors.txt")
 * @license   GNU/LGPL http://opensource.org/licenses/lgpl-3.0.html
 * @copyright Küstenschmiede GmbH Software & Design 2011 - 2017.
 * @link      https://www.kuestenschmiede.de
 */

namespace c4g;

/**
 * Class C4GHTMLFactory
 * @package c4g
 */
class C4GHTMLFactory
{
	protected $defaultInputClass 			= 'c4gInput';
	protected $defaultDivClass 				= 'c4gDiv';
	protected $defaultButtonClass 			= 'c4gButton';

	/**
	 * inserts an <br>-tag
	 * @return string
	 */
	public static function lineBreak()
	{
		return '<br>';
	}

	/**
	 * inserts an <hr>-tag
	 * @return string
	 */
	public static function horizontalLine()
	{
		return '<hr>';
	}

	/**
	 * wrapps a string with HTML-headline-tags
	 * @param  string  $content
	 * @param  integer $type
	 * @return string
	 */
	public static function headline( $content, $type = 1 )
	{
		return '<h' . $type . '>' . $content . '</h' . $type . '>';
	}

	/**
	 * wrapps a string with <p>-tags
	 * @param  string $content
	 * @param  string $id
	 * @param  string $class
	 * @return string
	 */
	public static function paragraph( $content, $id = '', $class = '' )
	{
		$attr = '';
		if (!empty( $id )) {
			$attr .= ' id="' . $id . '"';
		}
		if (!empty( $class )) {
			$attr .= ' class="' . $class . '"';
		}
		return '<p' . $attr . '>' . $content . '</p>';
	}

	/**
	 * wrapps a string with <span>-tags
	 * @param  string $content
	 * @param  string $id
	 * @param  string $class
	 * @return string
	 */
	public static function span( $content, $id='', $class='' )
	{
		$attr = '';
		if (!empty( $id )) {
			$attr .= ' id="' . $id . '"';
		}
		if (!empty( $class )) {
			$attr .= ' class="' . $class . '"';
		}
		return '<span' . $attr . '>' . $content . '</span>';
	}

	/**
	 * [imgLink description]
	 * @param  array  $options [description]
	 * @return string          [description]
	 */
	public static function imgLink( $options=array() )
	{
		$options['href'] = $options['href'] ?: '#';
		$options['addClass'] = $options['addClass'] ?: '';
		$options['target'] = $options['target'] ? ' target="' . $options['target'] . '"' : '';

		if ($options['c4gImg']) {
			$options['src'] = 'system/modules/con4gis_core/assets/images/' . $options['c4gImg'] . '.png';
		} else {
			$options['src'] = $options['src'] ?: 'system/modules/con4gis_core/assets/images/href.png';
		}

		$options['imgWidth'] = $options['imgWidth'] ?: '75';
		$options['imgHeight'] = $options['imgHeight'] ?: '75';

		$options['label'] = $options['label'] ? '<span>' . $options['label'] . '</span>' : '';

		return '<a href="' . $options['href'] . '"' . $options['target'] . ' class="c4g_imgLink ' . $options['addClass'] . '">'.
				'<img src="' . $options['src'] . '" width="' . $options['imgWidth'] . '" height="' . $options['imgHeight'] . '">'.
				$options['label'] . '</a>';
	}

	public static function c4gGuiButton( $label, $action, $additionalClass='', $accesskey='' )
	{
		return '<a href="#" class="c4gGuiAction c4gGuiButton ' . $additionalClass . '" accesskey="' . $accesskey . '" data-action="' . $action . '" role="button">' . $label . '</a>';
	}

	// ----------------------------------------------------------------------------------
	// comming soon
	// ----------------------------------------------------------------------------------
	public static function textfield(  )
	{
		//with label
	}

	public static function checkbox( )
	{
		//PASS
	}

	public static function radiobutton( )
	{
		//PASS
	}

	public static function dropdown( )
	{
		//PASS
	}

	public static function unsortedList( )
	{
		//PASS
	}
}?>