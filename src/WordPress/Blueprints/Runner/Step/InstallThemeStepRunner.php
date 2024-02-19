<?php
/**
 * @file
 */

namespace WordPress\Blueprints\Runner\Step;

use WordPress\Blueprints\Model\DataClass\InstallThemeStep;
use WordPress\Blueprints\Progress\Tracker;


class InstallThemeStepRunner extends BaseStepRunner {
	/**
	 * @param InstallThemeStep $input
	 */
	function run( InstallThemeStep $input, Tracker $tracker ) {
		$tracker?->setCaption( $input->progress->caption ?? "Installing theme" );

		// @TODO: Measure the performance. It seems slow. Perhaps that's unzipping a large file, but it could also be spawning wp-cli
		return $this->resourceManager->bufferToTemporaryFile(
			$input->themeZipFile,
			function ( $path ) use ( $input ) {
				return $this->getRuntime()->runShellCommand(
					[
						'php',
						'wp-cli.phar',
						'theme',
						'install',
						$path,
						$input->activate ? '--activate' : '',
					]
				);
			},
			'.zip'
		);
	}
}
