<?php

/**
 * @copyright Copyright (C) 2015-2019 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\actions\entire\AgentAction;
use app\actions\entire\CombinedAgentAction;
use app\actions\entire\Festpower2Action;
use app\actions\entire\KDWin2Action;
use app\actions\entire\KDWinAction;
use app\actions\entire\Knockout2Action;
use app\actions\entire\KnockoutAction;
use app\actions\entire\Salmon3RandomAction;
use app\actions\entire\SalmonClearAction;
use app\actions\entire\UsersAction;
use app\actions\entire\Weapon2Action;
use app\actions\entire\WeaponAction;
use app\actions\entire\Weapons2Action;
use app\actions\entire\Weapons2TierAction;
use app\actions\entire\WeaponsAction;
use app\actions\entire\WeaponsUseAction;
use app\components\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

final class EntireController extends Controller
{
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    '*' => ['head', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'agent' => AgentAction::class,
            'combined-agent' => CombinedAgentAction::class,
            'festpower2' => Festpower2Action::class,
            'kd-win' => KDWinAction::class,
            'kd-win2' => KDWin2Action::class,
            'knockout' => KnockoutAction::class,
            'knockout2' => Knockout2Action::class,
            'salmon-clear' => SalmonClearAction::class,
            'salmon3-random' => Salmon3RandomAction::class,
            'users' => UsersAction::class,
            'weapon' => WeaponAction::class,
            'weapon2' => Weapon2Action::class,
            'weapons' => WeaponsAction::class,
            'weapons-use' => WeaponsUseAction::class,
            'weapons2' => Weapons2Action::class,
            'weapons2-tier' => Weapons2TierAction::class,
        ];
    }
}
