<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminController extends Controller
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
	
	public function actionCreate($email, $fio, $password)
	{
		$user = new User();
        $user->username = $email;
        $user->fio = $fio;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
		if ($user->save()){
			// задать пользователю роль - admin
				$auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('admin');
                $auth->assign($authorRole, $user->getId());
                return true;
		}
        
        return 'error';
	}
}
