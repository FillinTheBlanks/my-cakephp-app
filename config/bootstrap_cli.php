<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Configure;

/*
 * Additional bootstrapping and configuration for CLI environments should
 * be put here.
 */

// Set the fullBaseUrl to allow URLs to be generated in shell tasks.
// This is useful when sending email from shells.
//Configure::write('App.fullBaseUrl', php_uname('n'));

//Configure::write('DebugKit.panels', ['DebugKit.Packages' => false]);
Configure::write('DebugKit.safeTld', ['my-cakephp-app', 'ddev', 'site']);
Configure::write('DebugKit.forceEnable', function() {
    return $_SERVER['REMOTE_ADDR'] === '127.0.0.1';
});
//Configure::write('DebugKit.ignorePathsPattern', '/\.(jpg|png|gif)$/');
// Set logs to different files so they don't have permission conflicts.
if (Configure::check('Log.debug')) {
    Configure::write('Log.debug.file', 'cli-debug');
}
if (Configure::check('Log.error')) {
    Configure::write('Log.error.file', 'cli-error');
}
