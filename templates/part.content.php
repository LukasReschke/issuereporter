<?php
	/** @var array $_ */
?>

<form method="POST">
<div class="section">
	<h2><?php p($l->t('Guidelines')); ?></h2>
	<p>
		<?php p($l->t('%s is a project used by millions of people all over the planet. Only with the help of your gigantic user base we can make it the best solution available. We would like to thank you for wanting to report a potential issue to the ownCloud project.', [$_['versionName']])) ?>
	</p>
	<br/>
	<p>
		<?php p($l->t('We can only help you when we have as much information as possible, this wizard will help you to provide the required information. Please notice that no information is sent to any third-party and you are able to edit the final issue description on your own.')) ?>
	</p>
	<br/>
	<p>
		<?php p($l->t('Because we\'re an international community we would like to ask you to report your issue in English. - No worries if you make mistakes, most of us aren\'t natives too and we don\'t expect perfect English.')) ?>
	</p>
	<br/>
	<p>
		<?php p($l->t('Some entries have been automatically provided for you – others require manual interaction.')) ?>
	</p>
</div>

<div class="section">
	<h2 id="issueDescription"><?php p($l->t('Issue description')); ?></h2>

	<em><?php p($l->t('Provide a short but understandable description of the issue.')) ?></em>
	<input type="text"
			name="issueTitle"
			placeholder="<?php p($l->t('Sharing files is not possible anymore')) ?>">

	<em><?php p($l->t('Tell us what the expected behaviour would be.')) ?></em>
	<textarea
		name="expectedBehaviour"
		rows="2"
		placeholder="<?php p($l->t('A sharing link for files should get generated')) ?>"></textarea>

	<em><?php p($l->t('Tell us what actually happens.')) ?></em>
		<textarea
			name="actualBehaviour"
			rows="2"
			placeholder="<?php p($l->t('ownCloud returns an error "Not allowed to share this file" when trying to share a file')) ?>"></textarea>

	<em><?php p($l->t('Provide us with steps how to reproduce this issue reliably.')) ?></em>
	<textarea
		name="stepsToReproduce"
		rows="3">
1.
2.
3.</textarea>
</div>

<div class="section">
	<h2 id="serverConfiguration"><?php p($l->t('Server configuration')); ?></h2>

	<em><?php p($l->t('Operating system of the server')); ?></em>
	<input type="text"
			name="serverOs"
			value="<?php p($_['operatingSystem']) ?>">

	<em><?php p($l->t('Web server')); ?></em>
	<input type="text"
			name="webserver"
			value="<?php p($_['webserver']) ?>">

	<em><?php p($l->t('Database')); ?></em>
	<input type="text"
			name="database"
			value="<?php p($_['database']) ?>">

	<em><?php p($l->t('PHP version')); ?></em>
	<input type="text"
			name="phpVersion"
			value="<?php p($_['phpVersion']) ?> (<?php p($_['sapiVersion']) ?>)">

	<em><?php p($l->t('%s version', [$_['versionName']])) ?></em>
	<input type="text"
			name="ownCloudVersion"
			value="<?php p($_['ownCloudVersion']) ?>">

	<em><?php p($l->t('Is this a clean installation or did you upgrade from previous versions (which ones)?')) ?></em>
	<textarea
		name="installStory" rows="3"></textarea>

</div>
<div class="section">
	<h2 id="owncloudConfiguration"><?php p($l->t('%s configuration', $_['versionName'])); ?></h2>
	<em><?php p($l->t('List of activated applications')) ?></em>
	<textarea
		name="enabledApps"
		rows="<?php p(count($_['enabledApps']))?>"><?php foreach($_['enabledApps'] as $appName => $app) { ?> - <?php p($appName) ?> (<?php p($app['version']) ?>) <?php p("\n") ?><?php } ?></textarea>

	<em><?php p($l->t('List of disabled applications')) ?></em>
	<textarea
		name="disabledApps"
		rows="<?php p(count($_['disabledApps']))?>"><?php foreach($_['disabledApps'] as $appName => $app) { ?> - <?php p($appName) ?> (<?php p($app['version']) ?>) <?php p("\n") ?><?php } ?></textarea>


	<em><?php p($l->t('Config file')) ?></em>
	<textarea
		name="configFile"
		rows="<?php p(count($_['config'])) ?>"><?php p(json_encode($_['config'], JSON_PRETTY_PRINT)) ?></textarea>

	<em><?php p($l->t('Are you using external storage – if yes, which one?')) ?></em>
	<textarea name="externalStorage"></textarea>
</div>

<div class="section">
	<h2 id="clientConfiguration"><?php p($l->t('Client configuration')); ?></h2>
	<em><?php p($l->t('Browser')) ?></em>
	<input type="text"
			name="browser"
			value="<?php p($_['clientBrowser']) ?>">

	<em><?php p($l->t('Operating system')) ?></em>
	<input type="text"
			name="clientOS">
</div>

<div class="section">
	<h2 id="logs"><?php p($l->t('Logs')); ?></h2>

	<h3><?php p($l->t('Web Server logs')) ?></h3>
	<em><?php p($l->t('Provide information from your webservers log (for example the Apache error log)')) ?></em>
	<textarea name="webLogs" rows="10"></textarea>

	<h3><?php p($l->t('ownCloud logs (data/owncloud.log)')) ?></h3>
	<em><?php p($l->t('Please notice that this log may contain sensitive information. Please remove any sensitive entry from it first.')) ?></em>
	<textarea rows="10" name="owncloudLog"><?php p(json_encode($_['ocLogEntries'], JSON_PRETTY_PRINT)) ?></textarea>

	<h3><?php p($l->t('Browser log')) ?></h3>
	<em><?php p($l->t('Provide information from your webservers log (for example the Apache error log)')) ?></em>
	<textarea rows="10" name="browserLog"></textarea>
</div>

<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>">
<div id="generateReport" class="section">
	<button type="submit">
		<?php p($l->t('Generate report')) ?>
	</button>
</div>
</form>