<?php

/**
 * @description Модуль для работы со статьями/разделами на сайтах с фреймворком Yii2.
 * @author Moses Fender <mosesfender@gmail.com>
 */

namespace mosesfender\articles;

class Module extends \yii\base\Module implements \yii\base\BootstrapInterface {

    public function bootstrap($app) {
        $app->i18n->translations['articles'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-RU',
            'forceTranslation' => true,
            'basePath' => '@mosesfender/articles/messages',
            'fileMap' => [
                '@mosesfender/articles/messages' => 'articles.php',
            ],
        ];
    }

    public function init() {
        parent::init();
        $app->i18n->translations['articles'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'ru-RU',
            'forceTranslation' => true,
            'basePath' => '@mosesfender/articles/messages',
            'fileMap' => [
                '@mosesfender/articles/messages' => 'articles.php',
            ],
        ];
    }

}
