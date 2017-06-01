<?php
/*
* Copyright (c) e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Featurebox shortcode batch class - shortcodes available site-wide. ie. equivalent to multiple .sc files.
*/

if(!defined('e107_INIT'))
{
	exit;
}



class contactpage_shortcodes extends e_shortcode
{
	public $override = false; // when set to true, existing core/plugin shortcodes matching methods below will be overridden. 


	// @Example: {CPJM_CONTACT_EMAIL: nolink=1}
  // @example: {CPJM_CONTACT_EMAIL: class=btn}
  // @todo:  add safe email adress  
	function sc_cpjm_contact_email($parm = null)  // Naming:  "sc_" + [plugin-directory] + '_uniquename'
	{
    $class = (!empty($parm['class'])) ? ' class='.$parm['class'] : '';
    if(e107::pref('contactpage', 'contact_email')) {
     $contact_email = e107::pref('contactpage', 'contact_email');
     if($parm['nolink']) { 
       return $contact_email;
       }
     else return 
       '<a '.$class.' href="mailto:'.$contact_email.'" target="_top">'.$contact_email.'</a>';
    }
    else return '';
	}

}
