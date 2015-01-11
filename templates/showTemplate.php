<?php
	/** @var array $_ */
	style('issuereporter', 'style');
?>

<div id="app">
	<div id="app-content">
		<div id="app-content-wrapper">

			<div class="section">
				<h2><?php p($l->t('Your issue report')) ?></h2>
				<p>
					<?php p($l->t('Your report has been compiled. To report this issue to the ownCloud community please follow the following steps:')) ?>
				</p>

				<ol>
					<li><?php print_unescaped($l->t('Create a <a href="%s">GitHub</a> account', ['https://github.com/'])) ?></li>
					<li><?php print_unescaped($l->t('Go to the <a href="%s">issue tracker for the ownCloud</a> organisation', ['https://github.com/owncloud/core/issues/new'])) ?></li>
					<li><?php p($l->t('Enter "%s" as subject for the issue', [$_['issueTitle']])) ?></li>
					<li><?php p($l->t('Copy-paste the issue report below into the comment box')) ?></li>
					<li><?php p($l->t('Submit the issue')) ?></li>
				</ol>

				<p>
					<?php p('We will then take a look at the issue and may contact you in case of further questions.') ?>
				</p>

				<br/>

				<textarea rows="<?php p(substr_count($_['issueTemplate'], "\n")) ?>"><?php p($_['issueTemplate']) ?></textarea>

			</div>

		</div>
	</div>
</div>
