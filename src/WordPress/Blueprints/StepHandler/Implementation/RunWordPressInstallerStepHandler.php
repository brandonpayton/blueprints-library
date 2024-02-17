<?php

namespace WordPress\Blueprints\StepHandler\Implementation;

use WordPress\Blueprints\Model\DataClass\RunWordPressInstallerStep;
use WordPress\Blueprints\Progress\Tracker;
use WordPress\Blueprints\StepHandler\BaseStepHandler;

class RunWordPressInstallerStepHandler extends BaseStepHandler {
	function execute( RunWordPressInstallerStep $input, Tracker $tracker = null ) {
		$tracker?->setCaption( "Setting site options" );

		return $this->getRuntime()->runShellCommand(
			[
				'php',
				'wp-cli.phar',
				'core',
				'install',
				'--url=http://localhost:8080',
				'--title=Playground Site',
				'--admin_user=' . $input->options->adminUsername,
				'--admin_password=' . $input->options->adminPassword,
				'--admin_email=admin@wordpress.internal',
			],
			$this->getRuntime()->getDocumentRoot()
		);
	}
}
