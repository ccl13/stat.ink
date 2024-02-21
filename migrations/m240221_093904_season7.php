<?php

/**
 * @copyright Copyright (C) 2015-2024 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

use app\components\db\Migration;
use app\components\helpers\TypeHelper;
use yii\db\Connection;
use yii\db\Expression;

final class m240221_093904_season7 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $db = TypeHelper::instanceOf($this->db, Connection::class);

        $this->insert('{{%season3}}', [
            'key' => 'season202403',
            'name' => 'Fresh Season 2024',
            'start_at' => '2024-03-01T00:00:00+00:00',
            'end_at' => '2024-06-01T00:00:00+00:00',
            'term' => new Expression(
                vsprintf('tstzrange(%s, %s, %s)', [
                    $db->quoteValue('2024-03-01T00:00:00+00:00'),
                    $db->quoteValue('2024-06-01T00:00:00+00:00'),
                    $db->quoteValue('[)'),
                ]),
            ),
        ]);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('{{%season3}}', ['key' => 'season202403']);

        return true;
    }

    /**
     * @inheritdoc
     */
    protected function vacuumTables(): array
    {
        return [
            '{{%season3}}',
        ];
    }
}
