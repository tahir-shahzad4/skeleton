<?php
/**
 * System messages translations for CodeIgniter
 *
 * @package 	CodeIgniter
 * @subpackage 	Skeleton
 * @license 	https://opensource.org/licenses/MIT	MIT License
 * @link 		https://goo.gl/wGXHO9
 * @since 		1.3.3
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['migration_none_found']          = 'Migrace nebyla nalezena.';
$lang['migration_not_found']           = 'Migrace s číslem této verze nebyla nalezena: %s.';
$lang['migration_sequence_gap']        = 'V sekvenci se nachází mezera blízko: %s.';
$lang['migration_multiple_version']    = 'Existuje více migrací se stejným číslem verze: %s.';
$lang['migration_class_doesnt_exist']  = 'Třída pro migraci "%s" nebyla nalezena.';
$lang['migration_missing_up_method']   = 'V migrační třídě "%s" chybí "up" metoda.';
$lang['migration_missing_down_method'] = 'V migrační třídě "%s" chybí "down" metoda.';
$lang['migration_invalid_filename']    = 'Migrace "%s" má chybné jméno.';
