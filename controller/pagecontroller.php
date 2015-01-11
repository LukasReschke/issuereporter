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

namespace OCA\IssueReporter\Controller;


use OCP\IConfig;
use \OCP\IRequest;
use \OCP\AppFramework\Http\TemplateResponse;
use \OCP\AppFramework\Controller;
use OCP\Template;

class PageController extends Controller {

	/** @var string */
	private $userId;
	/** @var IConfig */
	private $config;
	private $defaults;

	public function __construct($AppName,
								IRequest $request,
								IConfig $config,
								\OC_Defaults $defaults,
								$UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
		$this->config = $config;
		$this->defaults = $defaults;
	}

	private function merge(array $appList) {
		$mergedList = [];
		foreach($appList as $app) {
			$mergedList[$app]['version'] = \OC_App::getAppVersion($app);
		}

		return $mergedList;
	}

	private function mergeListOfApps() {
		return $this->merge(\OC_App::getEnabledApps());
	}

	private function mergeListOfDisabledApps() {
		$enabledApps = $this->mergeListOfApps();
		$allApps = $this->merge(\OC_App::getAllApps());

		return array_diff($allApps, $enabledApps);
	}

	private function getConfigValues() {
		$configKeys = \OC_Config::getKeys();
		$sensitiveKeys = ['secret', 'passwordsalt', 'dbpassword', 'dbuser'];
		$configKeys = array_diff($configKeys, $sensitiveKeys);

		$config = [];
		foreach($configKeys as $key) {
			$config[$key] = $this->config->getSystemValue($key);
		}

		return $config;
	}



	/**
	 * @NoCSRFRequired
	 */
	public function index() {
		$params = [
			'user' => $this->userId,
			'operatingSystem' => php_uname(),
			'webserver' => $_SERVER['SERVER_SOFTWARE'],
			'database' => $this->config->getSystemValue('dbtype'),
			'phpVersion' => phpversion(),
			'sapiVersion' => php_sapi_name(),
			'ownCloudVersion' => \OC_Util::getHumanVersion() . ' ' . \OC_Util::getEditionString(),
			'enabledApps' => $this->mergeListOfApps(),
			'disabledApps' => $this->mergeListOfDisabledApps(),
			'config' => $this->getConfigValues(),
			'clientBrowser' => $_SERVER['HTTP_USER_AGENT'],
			'ocLogEntries' => \OC_Log_Owncloud::getEntries(1000),
			'versionName' => $this->defaults->getName()
		];
		return new TemplateResponse($this->appName, 'main', $params);  // templates/main.php
	}

	/**
	 * @param string $issueTitle
	 * @param string $stepsToReproduce
	 * @param string $expectedBehaviour
	 * @param string $actualBehaviour
	 * @param string $serverOs
	 * @param string $webserver
	 * @param string $database
	 * @param string $phpVersion
	 * @param string $ownCloudVersion
	 * @param string $installStory
	 * @param string $enabledApps
	 * @param string $disabledApps
	 * @param string $configFile
	 * @param string $externalStorage
	 * @param string $browser
	 * @param string $clientOS
	 * @param string $webLogs
	 * @param string $owncloudLog
	 * @param string $browserLog
	 * @return TemplateResponse
	 */
	public function generateReport($issueTitle,
									$stepsToReproduce,
									$expectedBehaviour,
									$actualBehaviour,
									$serverOs,
									$webserver,
									$database,
									$phpVersion,
									$ownCloudVersion,
									$installStory,
									$enabledApps,
									$disabledApps,
									$configFile,
									$externalStorage,
									$browser,
									$clientOS,
									$webLogs,
									$owncloudLog,
									$browserLog) {
		$issueTemplate = new Template($this->appName, 'issue.template', '');
		$issueTemplate->assign('stepsToReproduce', $stepsToReproduce);
		$issueTemplate->assign('expectedBehaviour', $expectedBehaviour);
		$issueTemplate->assign('actualBehaviour', $actualBehaviour);
		$issueTemplate->assign('serverOs', $serverOs);
		$issueTemplate->assign('webserver', $webserver);
		$issueTemplate->assign('database', $database);
		$issueTemplate->assign('phpVersion', $phpVersion);
		$issueTemplate->assign('ownCloudVersion', $ownCloudVersion);
		$issueTemplate->assign('installStory', $installStory);
		$issueTemplate->assign('enabledApps', $enabledApps);
		$issueTemplate->assign('disabledApps', $disabledApps);
		$issueTemplate->assign('configFile', $configFile);
		$issueTemplate->assign('externalStorage', $externalStorage);
		$issueTemplate->assign('browser', $browser);
		$issueTemplate->assign('clientOS', $clientOS);
		$issueTemplate->assign('webLogs', $webLogs);
		$issueTemplate->assign('owncloudLog', $owncloudLog);
		$issueTemplate->assign('browserLog', $browserLog);

		$params = [
			'issueTitle' => $issueTitle,
			'issueTemplate' => $issueTemplate->fetchPage()
		];

		return new TemplateResponse($this->appName, 'showTemplate', $params);

	}


}