<?php

namespace avatar\base;

use cs\services\SitePath;
use cs\services\VarDumper;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

class Application extends \yii\web\Application
{
    protected $timeZone2;
    protected $timeZone;

    /**
     * @param $value
     * @return bool
     */
    public static function isInteger($value)
    {
        if (is_integer($value)) return true;
        if (preg_match('/[0-9-]/', $value)) return true;

        return false;
    }

    /**
     * @param int|double|string $value
     * @return bool
     */
    public static function isDouble($value)
    {
        if (is_integer($value)) return true;
        if (self::isInteger($value)) return true;
        if (preg_match('/[0-9-.]/', $value)) return true;

        return false;
    }

    /**
     * Отправляет письмо в формате html и text
     *
     * @param string       $email   куда
     * @param string       $subject тема
     * @param string       $view    шаблон, лежит в /mail/html и /mail/text
     * @param array        $options параметры для шаблона
     * @param array        $attaches файлы для прикрепления, должны быть класса \Swift_Attachment
     *
     * @return boolean
     */
    public static function mail($email, $subject, $view, $options = [], $layout = ['text' => 'layouts/text', 'html' => 'layouts/html'], $attaches = [])
    {
        $from = \Yii::$app->params['mailer']['from'];
        $text = '';

        /** @var \yii\swiftmailer\Mailer $mailer */
        $mailer = Yii::$app->mailer;
        $textFile = Yii::getAlias('@app/mail/text/' . $view . '.php');
        $layoutText = ArrayHelper::getValue($layout, 'text', '');
        if ($layoutText != '') {
            if (file_exists($textFile)) {
                $text = $mailer->render('text/' . $view, $options, $layoutText);
            }
        }
        $html = $mailer->render('html/' . $view, $options, $layout['html']);

        $o = \Yii::$app->mailer
            ->compose()
            ->setFrom($from)
            ->setTo($email)
            ->setHtmlBody($html)
            ->setSubject($subject);

        if ($text) $o->setTextBody($text);
        if ($attaches) {
            foreach($attaches as $path => $name) {
                $c = file_get_contents($path);
                $o->attachContent($c, ['fileName' => $name]);
            }
        }

        return $o->send();
    }

    /**
     * Кеширует даные при помощи $functionGet
     *
     * @param string    $key ключ для кеша
     * @param \Closure  $functionGet функция для получения данных кеша
     * @param mixed     $options данные которыебудут переданы в функцию $functionGet
     * @param bool      $isUseCache использовать кеш?
     *
     * @return mixed
     */
    public static function cache($key, $functionGet, $options = null, $isUseCache = true)
    {
        if ($isUseCache) {
            $cache = Yii::$app->cache->get($key);
            if ($cache === false) {
                $cache = $functionGet($options);
                Yii::$app->cache->set($key, $cache);
            }
            return $cache;
        } else {
            return $functionGet($options);
        }
    }
}