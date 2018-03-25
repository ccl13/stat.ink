<?php
/**
 * @copyright Copyright (C) 2015-2018 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

namespace app\components\helpers;

use Yii;
use yii\base\Component;

class WeaponShortener extends Component
{
    public $dictionary;

    public static function makeShorter(string $name) : string
    {
        $instance = Yii::createObject(['class' => static::class]);
        return $instance->get($name);
    }

    public function init()
    {
        parent::init();
        if (!$this->dictionary || !is_array($this->dictionary)) {
            $this->dictionary = $this->setupDictionary();
        }
    }

    public function get(string $localizedName) : string
    {
        return $this->dictionary[$localizedName] ?? $localizedName;
    }

    protected function setupDictionary() : array
    {
        if (!preg_match('/^([[:alnum:]]+)/', (string)Yii::$app->language, $match)) {
            return [];
        }

        // try to load "@app/messages/<lang>/weapon-short.php"
        $paths = array_map(
            function (string $langCode) : string {
                return implode(DIRECTORY_SEPARATOR, [
                    Yii::getAlias('@app'),
                    'messages',
                    $langCode,
                    'weapon-short.php',
                ]);
            },
            [
                Yii::$app->language,
                $match[1],
            ]
        );

        foreach ($paths as $path) {
            if (file_exists($path)) {
                return include($path);
            }
        }

        return [];
    }
}
