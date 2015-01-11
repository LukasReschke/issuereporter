<?php
/**
 * ownCloud - issuereporter
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Lukas Reschke <lukas@owncloud.org>
 * @copyright Lukas Reschke 2015
 */

namespace OCA\IssueReporter\AppInfo;

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
use OCP\AppFramework\App;

$application = new App('issuereporter');

$application->registerRoutes($this, array('routes' => array(
	array('name' => 'page#index', 'url' => '/', 'verb' => 'GET'),
    array('name' => 'page#generateReport', 'url' => '/', 'verb' => 'POST'),
)));
