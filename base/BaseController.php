<?php
/**
 * BaseController
 */

namespace app\base;

use Yii;
use yii\base\Response;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\log\Logger;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

class BaseController extends \yii\web\Controller
{
    public static $isStatistic = false;

    public $enableCsrfValidation = true;

    private $markDownCounter;

    public function beforeAction($action)
    {
        if (self::$isStatistic) {
            $this->markDownCounter = microtime(true);
        }

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        if (self::$isStatistic) {
            $now = microtime(true);
        }

        return parent::afterAction($action, $result);
    }

    /**
     * Возвращает стандартный ответ JSON при положительном срабатывании
     * https://redmine.suffra.com/projects/suffra/wiki/Стандартный_ответ_JSON
     *
     * @param mixed $data [optional] возвращаемые данные
     *
     * @return \yii\web\Response json
     */
    public static function jsonSuccess($data = null)
    {
        $ret = [
            'success' => true,
        ];
        if (!is_null($data)) {
            $ret['data'] = $data;
        };

        return self::json($ret);
    }
    
    /**
     * Возвращает стандартный ответ JSON при отрицательном срабатывании
     * https://redmine.suffra.com/projects/suffra/wiki/Стандартный_ответ_JSON
     *
     * @param mixed $data [optional] возвращаемые данные
     *
     * @return \yii\web\Response json
     */
    public static function jsonError($data = null)
    {
        if (is_null($data)) $data = '';

        return self::json([
            'success' => false,
            'data'    => $data,
        ]);
    }

    /**
     * Возвращает стандартный ответ JSON при отрицательном срабатывании
     * https://redmine.suffra.com/projects/suffra/wiki/Стандартный_ответ_JSON
     *
     * @param integer $id   идентификатор ошибки
     * @param mixed   $data [optional] возвращаемые данные
     *
     * @return \yii\web\Response json
     */
    public static function jsonErrorId($id, $data = null)
    {
        $return = [
            'id' => $id,
        ];
        if (!is_null($data)) $return['data'] = $data;

        return self::jsonError($return);
    }


    /**
     * Вызов возможен как render($view, $params)
     * или как render($params)
     * тогда $view = название функции action
     * например если вызов произошел из метода actionOrders то $view = 'orders'
     *
     * @param string|array $view   шаблон или параметры шаблона
     * @param array        $params параметры шаблона если $view = шаблон, иначе не должен указываться
     *
     * @return string = \yii\base\Controller::render()
     */
    public function render($view = '', $params = [])
    {
        if (is_array($view)) {
            $params = $view;
            $view = strtolower(str_replace('action', '', debug_backtrace(2)[1]['function']));
        } else if ($view == '') {
            $params = [];
            $view = strtolower(str_replace('action', '', debug_backtrace(2)[1]['function']));
        } else if ($view == '.tpl') {
            $view = strtolower(str_replace('action', '', debug_backtrace(2)[1]['function'])) . '.tpl';
        }
        if (StringHelper::endsWith(strtolower($view) , '.tpl')) {
            $this->layout .= '.tpl';
        }

        if (self::getParam('_view', '') != '') {
            \cs\services\VarDumper::dump($params, 10);

            return '';
        }

        return parent::render($view, $params);
    }

    /**
     * Закодировать в JSON
     *
     * @return \yii\web\Response json
     * */
    public static function json($array)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $array;

        return Yii::$app->response;
    }


    /**
     * Возвращает переменную из REQUEST
     *
     * @param string $name    имя переменной
     * @param mixed  $default значние по умолчанию [optional]
     *
     * @return string|null
     * Если такой переменной нет, то будет возвращено null
     */
    public static function getParam($name, $default = null)
    {
        $vGet = \Yii::$app->request->get($name);
        $vPost = \Yii::$app->request->post($name);
        $value = (is_null($vGet)) ? $vPost : $vGet;

        return (is_null($value)) ? $default : $value;
    }
}