<?php

namespace Sulao\CraftQcloudCos;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Fs as FsService;
use yii\base\Event;

class Plugin extends \craft\base\Plugin
{
    public string $schemaVersion = '1.0.0';

    public function init()
    {
        parent::init();

        Event::on(
            FsService::class,
            FsService::EVENT_REGISTER_FILESYSTEM_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = Fs::class;
            }
        );
    }
}
