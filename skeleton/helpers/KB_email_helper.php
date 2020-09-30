<?php
/**
 * CodeIgniter Skeleton
 *
 * A ready-to-use CodeIgniter skeleton  with tons of new features
 * and a whole new concept of hooks (actions and filters) as well
 * as a ready-to-use and application-free theme and plugins system.
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018, Kader Bouyakoub <bkader[at]mail[dot]com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies OR substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package 	CodeIgniter
 * @author 		Kader Bouyakoub <bkader[at]mail[dot]com>
 * @copyright	Copyright (c) 2018, Kader Bouyakoub <bkader[at]mail[dot]com>
 * @license 	https://opensource.org/licenses/MIT	MIT License
 * @link 		https://goo.gl/wGXHO9
 * @since 		2.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * KB_email_helper
 *
 * @package 	CodeIgniter
 * @subpackage 	Skeleton
 * @category 	Helpers
 * @author 		Kader Bouyakoub <bkader[at]mail[dot]com>
 * @link 		https://goo.gl/wGXHO9
 * @copyright 	Copyright (c) 2018, Kader Bouyakoub (https://goo.gl/wGXHO9)
 * @since 		2.0.0
 * @version 	2.0.0
 */
if ( ! function_exists('valid_email'))
{
	/**
	 * This function has been borrowed from PHPMailer Version 5.2.9.
	 * Check that a string looks like an email address.
	 * @param 	string 	$address 		The email address to check
	 * @param 	string 	$patternselect 	A selector for the validation pattern to use :
	 * @return 	boolean
	 *
	 * 	"auto" 		Pick strictest one automatically.
	 * 	"pcre8" 	Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14.
	 * 	"pcre" 		Use old PCRE implementation.
	 * 	"php" 		Use PHP built-in FILTER_VALIDATE_EMAIL; same as pcre8 but does not allow 'dotless' domains.
	 * 	"html5" 	Use the pattern given by the HTML5 spec for 'email' type form input elements.
	 * 	"noregex" 	Don't use a regex: super fast, really dumb.
	 */
	function valid_email($address, $patternselect = null)
	{
		empty($patternselect) && $patternselect = 'auto';
		
		// Added by Ivan Tcholakov, 17-OCT-2015.
		if (function_exists('idn_to_ascii') 
			&& defined('INTL_IDNA_VARIANT_UTS46') 
			&& false !== ($atpos = strpos($address, '@')))
		{
			$address = substr($address, 0, ++$atpos).idn_to_ascii(substr($address, $atpos), 0, INTL_IDNA_VARIANT_UTS46);
		}
		
		if ( ! $patternselect OR $patternselect == 'auto')
		{
			/**
			 * Check this constant first so it works when extension_loaded()
			 * is disabled by safe mode Constant was added in PHP 5.2.4
			 */
			if (defined('PCRE_VERSION'))
			{
				// This pattern can get stuck in a recursive loop in PCRE <= 8.0.2
				$patternselect = (version_compare(PCRE_VERSION, '8.0.3') >= 0) ? 'pcre8' : 'pcre';
			}
			//Fall back to older PCRE
			elseif (function_exists('extension_loaded') && extension_loaded('pcre'))
			{
				$patternselect = 'pcre';
			}
			else
			{
				//Filter_var appeared in PHP 5.2.0 and does not require the PCRE extension
				$patternselect = (version_compare(PHP_VERSION, '5.2.0') >= 0) ? 'php' : 'noregex';
			}
		}
		
		switch ($patternselect)
		{
			case 'pcre8':
				/**
				 * Uses the same RFC5322 regex on which FILTER_VALIDATE_EMAIL is based, but allows dotless domains.
				 * @link http://squiloople.com/2009/12/20/email-address-validation/
				 * @copyright 2009-2010 Michael Rushton
				 * Feel free to use and redistribute this code. But please keep this copyright notice.
				 */
				return (boolean) preg_match('/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)'.'((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)'.'(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)'.'([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*'.'(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)'.'(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}'.'|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:'.'|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}'.'|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD', $address);

			case 'pcre':
				// An older regex that doesn't need a recent PCRE
				return (boolean) preg_match('/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!(?>"?(?>\\\[ -~]|[^"])"?){65,}@)(?>'.'[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*")'.'(?>\.(?>[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*"))*'.'@(?>(?![a-z0-9-]{64,})(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?![a-z0-9-]{64,})'.'(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)){0,126}|\[(?:(?>IPv6:(?>(?>[a-f0-9]{1,4})(?>:'.'[a-f0-9]{1,4}){7}|(?!(?:.*[a-f0-9][:\]]){8,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?'.'::(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?))|(?>(?>IPv6:(?>[a-f0-9]{1,4}(?>:'.'[a-f0-9]{1,4}){5}:|(?!(?:.*[a-f0-9]:){6,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4})?'.'::(?>(?:[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4}):)?))?(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}'.'|[1-9]?[0-9])(?>\.(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}))\])$/isD', $address);

			case 'html5':
				/**
				 * This is the pattern used in the HTML5 spec for validation of 'email' type form input elements.
				 * @link http://www.whatwg.org/specs/web-apps/current-work/#e-mail-state-(type=email)
				 */
				return (boolean) preg_match('/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}'.'[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD', $address);

			case 'noregex':
				/**
				 * No PCRE! Do something _very_ approximate!
				 * Check the address is 3 chars OR longer and contains
				 * an @ that's not the first OR last char
				 */
				return (strlen($address) >= 3 and strpos($address, '@') >= 1 and strpos($address, '@') != strlen($address) - 1);

			case 'php':
			default:
				return (boolean) filter_var($address, FILTER_VALIDATE_EMAIL);
		}
	}
	
}
