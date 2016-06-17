<?php

/**
 * @description Модуль для работы со статьями/разделами на сайтах с фреймворком Yii2.
 * @author Moses Fender <mosesfender@gmail.com>
 */

namespace mosesfender\articles;

class Module extends \yii\base\Module implements \yii\base\BootstrapInterface {

    public function bootstrap($app) {
        $app->getUrlManager()->addRules([
            ["class" => "yii\web\UrlRule", "pattern" => $this->id, "route" => "{$this->id}/default/index"],
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/<controller:[\w\-]+>/<action:[\w\-]+>", "route" => "{$this->id}/<controller>/<action>"],
            ["class" => "yii\web\UrlRule", "pattern" => "{$this->id}/<id:\w+>", "route" => "{$this->id}/default/view"],
        ]);
//        $app->i18n->translations['articles'] = [
//            'class' => 'yii\i18n\PhpMessageSource',
//            'sourceLanguage' => 'ru-RU',
//            'forceTranslation' => true,
//            'basePath' => '@mosesfender/articles/messages',
//            'fileMap' => [
//                '@mosesfender/articles/messages' => 'articles.php',
//            ],
//        ];
    }

    public function init() {
        parent::init();
    }

    public function beforeAction($action) {
        /* @var $action yii\base\InlineAction */
        return parent::beforeAction($action);
    }

}
