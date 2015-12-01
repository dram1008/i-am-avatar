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

class SiteController extends BaseController
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
//        $d = 'params=%7B%22auto_hd%22%3Afalse%2C%22autoplay_reason%22%3A%22unknown%22%2C%22default_hd%22%3Afalse%2C%22disable_native_controls%22%3Atrue%2C%22inline_player%22%3Afalse%2C%22pixel_ratio%22%3A1%2C%22preload%22%3Atrue%2C%22start_muted%22%3Afalse%2C%22video_data%22%3A%7B%22progressive%22%3A%5B%7B%22hd_src%22%3A%22https%3A%5C%2F%5C%2Fvideo-fra3-1.xx.fbcdn.net%5C%2Fhvideo-xft1%5C%2Fv%5C%2Ft42.4659-2%5C%2F11995827_353472038110547_41500709_n.mp4%3Foh%3D0b902469bee4be200b946f9381f00f65%26oe%3D563FFECB%22%2C%22is_hds%22%3Afalse%2C%22stream_type%22%3A%22progressive%22%2C%22is_live_stream%22%3Afalse%2C%22rotation%22%3A0%2C%22sd_src%22%3A%22https%3A%5C%2F%5C%2Fvideo-fra3-1.xx.fbcdn.net%5C%2Fhvideo-xft1%5C%2Fv%5C%2Ft42.4659-2%5C%2F11995827_353472038110547_41500709_n.mp4%3Foh%3D0b902469bee4be200b946f9381f00f65%26oe%3D563FFECB%22%2C%22video_id%22%3A%22353472034777214%22%2C%22sd_tag%22%3A%22%22%2C%22hd_tag%22%3A%22%22%2C%22live_routing_token%22%3A%22%22%2C%22spherical_hd_src%22%3Anull%2C%22spherical_hd_tag%22%3Anull%2C%22spherical_sd_src%22%3Anull%2C%22spherical_sd_tag%22%3Anull%2C%22projection%22%3A%22flat%22%2C%22subtitles_src%22%3Anull%2C%22dash_manifest%22%3Anull%7D%5D%2C%22hls%22%3Anull%7D%2C%22video_data_preference%22%3A%7B%221%22%3A%5B%7B%22hd_src%22%3A%22https%3A%5C%2F%5C%2Fvideo-fra3-1.xx.fbcdn.net%5C%2Fhvideo-xft1%5C%2Fv%5C%2Ft42.4659-2%5C%2F11995827_353472038110547_41500709_n.mp4%3Foh%3D0b902469bee4be200b946f9381f00f65%26oe%3D563FFECB%22%2C%22is_hds%22%3Afalse%2C%22stream_type%22%3A%22progressive%22%2C%22is_live_stream%22%3Afalse%2C%22rotation%22%3A0%2C%22sd_src%22%3A%22https%3A%5C%2F%5C%2Fvideo-fra3-1.xx.fbcdn.net%5C%2Fhvideo-xft1%5C%2Fv%5C%2Ft42.4659-2%5C%2F11995827_353472038110547_41500709_n.mp4%3Foh%3D0b902469bee4be200b946f9381f00f65%26oe%3D563FFECB%22%2C%22video_id%22%3A%22353472034777214%22%2C%22sd_tag%22%3A%22%22%2C%22hd_tag%22%3A%22%22%2C%22live_routing_token%22%3A%22%22%2C%22spherical_hd_src%22%3Anull%2C%22spherical_hd_tag%22%3Anull%2C%22spherical_sd_src%22%3Anull%2C%22spherical_sd_tag%22%3Anull%2C%22projection%22%3A%22flat%22%2C%22subtitles_src%22%3Anull%2C%22dash_manifest%22%3Anull%7D%5D%2C%222%22%3Anull%7D%2C%22show_captions_default%22%3Afalse%2C%22persistent_volume%22%3Atrue%2C%22hide_controls_when_finished%22%3Afalse%2C%22buffer_length%22%3A0.1%7D&width=276&height=394&user=100001742075258&log=no&div_id=id_563fe4cb0e4d82676084578&swf_id=swf_id_563fe4cb0e4d82676084578&browser=Chrome+46.0.2490.80&tracking_domain=https%3A%2F%2Fpixel.facebook.com&post_form_id=&string_table=https%3A%2F%2Fs-static.ak.facebook.com%2Fflash_strings.php%2Ft100488%2Fru_RU';
//        $d = explode('&', $d);
//        $r = [];
//        foreach($d as $i) {
//            $dd = explode('=',$i);
//            $r[] = [$dd[0], urldecode($dd[1])];
//        }
//        $ret = '';
//        foreach($r as $i) {
//            if ($i[0] == 'params') {
//                $ret = json_decode($i[1]);
//            }
//        }
//        VarDumper::dump($ret);
        $query = Article::query()->orderBy(['date_insert' => SORT_DESC]);
        $all = $query->count();
        $pageSize = 10;
        $pagesCount = floor(($all + $pageSize - 1)/$pageSize);
        $limit = $pageSize;
        $page = self::getParam('page', 1);
        $offset = ($page-1) * $pageSize;
        $query->offset($offset)->limit($limit);

        return $this->render([
            'list' => $query->all(),
            'pagesCount' => $pagesCount,
            'page' => $page,
        ]);
    }

    public function actionArticles_month($year, $month)
    {
        return $this->render([
            'list' => Article::query([
                'MONTH(date_insert)' => $month,
                'YEAR(date_insert)' => $year,
            ])->orderBy(['date_insert' => SORT_DESC])->all(),
            'year' => $year,
            'month' => $month,
        ]);
    }

    public function actionSearch()
    {
        $term = self::getParam('term');
        $items = Article::query(['like', 'content', $term])->orWhere(['like', 'header', $term])->all();

        return $this->render([
            'list' => $items,
        ]);
    }

    public function actionIn()
    {
        return $this->render();
    }

    public function actionArticles()
    {
        return $this->render();
    }

    public function actionArticle($year, $month, $day, $id)
    {
        $item = Article::find([
            'id_string' => $id,
            'date'      => $year . $month . $day
        ]);
        if (is_null($item)) {
            throw new Exception('Нет такой статьи');
        }
        $item->incViewCounter();

        return $this->render([
            'item' => $item,
        ]);
    }

    public function actionOut()
    {
        return $this->render();
    }

    public function actionAbout()
    {
        return $this->render();
    }

    public function actionActivate($code)
    {
        $row = \app\services\RegistrationDispatcher::query(['code' => $code])->one();
        if ($row === false) {
            throw new Exception('Нет такого кода или уже устарел');
        }
        $model = new NewPassword();
        $user = User::find($row['parent_id']);
        if ($model->load(Yii::$app->request->post()) && $model->update($user)) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            \app\services\RegistrationDispatcher::delete($row['parent_id']);

            \Yii::$app->user->login($user);

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }

        return $this->render();
    }

    public function actionLogin()
    {
        $this->layout = 'main';
        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionProduction()
    {
        return $this->render([]);
    }

    public function actionProduction_item()
    {
        $id = self::getParam('id');
        $item = Product::find($id);

        return $this->render([
            'item' => $item,
        ]);
    }

    public function actionMap()
    {
        return $this->render([
            'lat' => self::getParam('lat'),
            'lng' => self::getParam('lng'),
        ]);
    }

    public function actionProm()
    {
        return $this->render([]);
    }

    public function actionService()
    {
        return $this->render([]);
    }

    public function actionBuy($id)
    {
        $model = new Request();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->insert($id)) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
                'id'    => $id,
            ]);
        }
    }

    public function actionLog()
    {
        return $this->render([
            'log' => file_get_contents(Yii::getAlias('@runtime/logs/app.log')),
        ]);
    }

    public function actionLog_db()
    {
        $query = Log::query()->orderBy(['log_time' => SORT_DESC]);
        $category = self::getParam('category', '');
        if ($category) {
            $query->where(['like', 'category', $category . '%', false]);
        }
        $type = self::getParam('type', '');
        if ($type) {
            switch ($type) {
                case 'INFO':
                    $type = \yii\log\Logger::LEVEL_INFO;
                    break;
                case 'ERROR':
                    $type = \yii\log\Logger::LEVEL_ERROR;
                    break;
                case 'WARNING':
                    $type = \yii\log\Logger::LEVEL_WARNING;
                    break;
                case 'PROFILE':
                    $type = \yii\log\Logger::LEVEL_PROFILE;
                    break;
                default:
                    $type = null;
                    break;
            }
            if ($type) {
                $query->where(['type' => $type]);
            }
        }

        return $this->render([
            'dataProvider' => new ActiveDataProvider([
                'query'      => $query,
                'pagination' => [
                    'pageSize' => 50,
                ],
            ])
        ]);
    }

    public function actionRent()
    {
        return $this->render([]);
    }

    public function actionDostavka()
    {
        return $this->render([]);
    }

    public function actionDiller()
    {
        return $this->render([]);
    }

    public function actionHouse()
    {
        return $this->render([]);
    }
}
