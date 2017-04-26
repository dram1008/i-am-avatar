<?php

namespace app\controllers;

use app\models\Article;
use app\models\Form\NewPassword;
use app\models\Form\Request;
use app\models\Log;
use app\models\User;
use cs\base\BaseController;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Response;

class SiteController extends \app\base\BaseController
{
    public $layout = 'landing';

    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render([
        ]);
    }

    public function actionTest()
    {
        $payment = new \app\services\BitCoinBlockTrailPayment();
        $payment->getForm();
    }


    public function actionVoznesenie2016()
    {
        $this->layout = 'content';

        return $this->render([]);
    }

    public function actionGods()
    {
        $this->layout = 'content';

        return $this->render([]);
    }


}
