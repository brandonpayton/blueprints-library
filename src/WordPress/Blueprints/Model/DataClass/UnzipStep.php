<?php
/**
 * @file AUTOGENERATED FILE – DO NOT CHANGE MANUALLY
 * All your changes will get overridden. See the README for more details.
 */

namespace WordPress\Blueprints\Model\DataClass;

use WordPress\Blueprints\Model\Builder\CorePluginResourceBuilder;
use WordPress\Blueprints\Model\Builder\CoreThemeResourceBuilder;
use WordPress\Blueprints\Model\Builder\FilesystemResourceBuilder;
use WordPress\Blueprints\Model\Builder\InlineResourceBuilder;
use WordPress\Blueprints\Model\Builder\ProgressBuilder;
use WordPress\Blueprints\Model\Builder\UrlResourceBuilder;


class UnzipStep implements StepInterface
{
    const SLUG = 'unzip';

    /** @var ProgressBuilder */
    public $progress;

    /** @var bool */
    public $continueOnError;

    /** @var string */
    public $step = 'unzip';

    /** @var string|FilesystemResourceBuilder|InlineResourceBuilder|CoreThemeResourceBuilder|CorePluginResourceBuilder|UrlResourceBuilder */
    public $zipFile;

    /** @var string The path of the zip file to extract */
    public $zipPath;

    /** @var string The path to extract the zip file to */
    public $extractToPath;

    /** @var string[]|array The path to extract from the zip file. The first item in the array will be tried, and if it doesn't exist, the next item will be tried, and so on. */
    public $pathInZip = [];
}