<?php
/*
Plugin Name: TradeMe widgets
Plugin URI: https://www.bidbud.co.nz/trademe_widget
Description: View TradeMe listings or your feedback directly on your website
Version: 1.2
Author: Andrew Connell
Author URI: https://www.bidbid.co.nz
License: GPL2
*/
/*
Copyright 2014-2017 Andrew Connell (email: andrew@bidbud.co.nz)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function trademe_feedback( $atts) 
{
	extract( shortcode_atts( array(
	      'member_id' => null,
		  'width' => '220',
		  'height' => '140')
		  , $atts, 'trademe_feedback' ) );
	if (!$member_id)
		return 'Please specify your member id, for example [trademe_feedback member_id="123456"] (replace 123456 with your own id).';
	return '<iframe src="https://www.bidbud.co.nz/widget/feedback/' . $member_id . '?css=' .  urlencode(get_stylesheet_uri()) . '" style="border:none;" height="' . $height . '" width="' . $width . '"></iframe>';
}

function trademe_search( $atts, $content="" ) 
{
	if (!$content)
		return 'Please enter a search';
	extract( shortcode_atts( array(
		  'width' => '100%',
		  'height' => '600')
		  , $atts, 'trademe_search' ) );
	 if ($pos=strpos($content,'?'))
		$content=substr($content,$pos+1);
	 return '<iframe src="https://www.bidbud.co.nz/widget/search?css=' . urlencode(get_stylesheet_uri()) . ($content?'&' . $content:'') . '" style="border:none;" height="' . $height . '" width="' . $width . '"></iframe>';
}

add_shortcode( 'trademe_feedback', 'trademe_feedback' );
add_shortcode( 'trademe_search', 'trademe_search' );