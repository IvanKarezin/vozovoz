<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\commands;

use common\integrations\vozovoz\DTO\LocationDTO;
use common\integrations\vozovoz\VozovozProvider;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionTest()
    {
        $provider = new VozovozProvider();
        $res = $provider->searchLocations(new LocationDTO(['params' => ['search' => 'Сан']]));

        var_dump($res);

        return ExitCode::OK;
    }

    public function actionEmpty()
    {
        $provider = new VozovozProvider();
        $res = $provider->getLocation(new LocationDTO(['params' => ['guid' => 'e90f1820-0128-11e5-80c7-00155d903d03']]));

        var_dump($res);

        return ExitCode::OK;
    }
}
