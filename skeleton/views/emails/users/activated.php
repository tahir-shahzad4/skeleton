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
 * Copyright (c) 2020, Kader Bouyakoub <bkader[at]mail[dot]com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
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
 * @copyright	Copyright (c) 2020, Kader Bouyakoub <bkader[at]mail[dot]com>
 * @license 	https://opensource.org/licenses/MIT	MIT License
 * @link 		http://bit.ly/KaderGhb
 * @since 		2.0.0
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Account activated email.
 *
 * @package 	CodeIgniter
 * @subpackage 	Skeleton
 * @category 	Views
 * @author 		Kader Bouyakoub <bkader[at]mail[dot]com>
 * @link 		http://bit.ly/KaderGhb
 * @copyright 	Copyright (c) 2020, Kader Bouyakoub (http://bit.ly/KaderGhb)
 * @since 		2.0.0
 * @version 	2.0.0
 */

/**
 * English version (Required).
 * @since 	2.0.0
 */
$messages['english'] = <<<EOT
Hello {name},

Your account at {site_anchor} was successfully activated. You may now <a href="{login_url}" target="_blank">login</a> anytime you want.

Hoping you enjoy your stay, please accept our kind regards.

-- {site_name} Team.
EOT;

// ------------------------------------------------------------------------

/**
 * French version.
 * @since 	2.0.0
 */
$messages['french'] = <<<EOT
Salut {name},

Votre compte sur {site_anchor} a bien été activé. Vous pouvez maintenant <a href="{login_url}" target="_blank">vous connecter</a> à tout moment.

En espérant que vous apprécierez votre séjour, veuillez accepter nos salutations distinguées.

-- Équipe {site_name}.
EOT;

// ------------------------------------------------------------------------

/**
 * Arabic version.
 * @since 	2.0.0
 */
$messages['arabic'] = <<<EOT
مرحبًا {name}،

تم تفعيل حسابك في {site_anchor} بنجاح. يمكنك الآن <a href="{login_url}" target="_blank">تسجيل الدخول</a>.

على أمل التمتع بإقامتك، يرجى قبول تحياتنا.

-- فريق {site_name}.
EOT;

// ------------------------------------------------------------------------

/**
 * We make sure to use the correct translation if found.
 * Otherwise, we fall-back to English.
 */
$lang    = langinfo('folder');
$message = isset($messages[$lang]) ? $messages[$lang] : $messages['english'];

/**
 * Filters the welcome email message.
 * @since 	2.0.0
 */
echo apply_filters('email_users_activated', $message, $lang);
