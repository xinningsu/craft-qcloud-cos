<?php

declare(strict_types=1);

namespace Sulao\CraftQcloudCos;

use Craft;
use craft\behaviors\EnvAttributeParserBehavior;
use craft\flysystem\base\FlysystemFs;
use craft\helpers\App;
use craft\helpers\Assets;
use League\Flysystem\FilesystemAdapter;
use Overtrue\Flysystem\Cos\CosAdapter;

class Fs extends FlysystemFs
{
    public string $appId = '';
    public string $secretId = '';
    public string $secretKey = '';
    public string $region = '';
    public string $bucket = '';
    public string $prefix = '';

    public static function displayName(): string
    {
        return 'Tencent COS';
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['parser'] = [
            'class'      => EnvAttributeParserBehavior::class,
            'attributes' => ['appId', 'secretId', 'secretKey', 'region', 'bucket', 'prefix'],
        ];

        return $behaviors;
    }

    protected function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            [['appId', 'secretId', 'secretKey', 'region', 'bucket'], 'required'],
        ]);
    }

    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate('craft-qcloud-cos/fsSettings', [
            'fs'      => $this,
            'periods' => array_merge(['' => ''], Assets::periodList()),
        ]);
    }

    protected function createAdapter(): FilesystemAdapter
    {
        return new CosAdapter([
            'app_id'     => App::parseEnv($this->appId),
            'secret_id'  => App::parseEnv($this->secretId),
            'secret_key' => App::parseEnv($this->secretKey),
            'region'     => App::parseEnv($this->region),
            'bucket'     => preg_replace('/-'.preg_quote($this->appId, '/').'$/', '', App::parseEnv($this->bucket)),
            'prefix'     => App::parseEnv($this->prefix),
        ]);
    }

    protected function invalidateCdnPath(string $path): bool
    {
        return true;
    }
}
