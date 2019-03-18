<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 27-02-2019
 * Time: 17:09
 */

namespace frontend\components;


use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\web\Cookie;
use yii\base\Exception;
use Yii;

class LanguageSelector implements BootstrapInterface
{

    public $supportedLanguages = [];
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $cookies = $app->response->cookies;
        $languageNew = $app->request->get('language');
//        echo $languageNew;

        if($languageNew !== null)
        {
            if (!in_array($languageNew, $this->supportedLanguages)) {
                throw new Exception('Invalid your selected language.');
            }

            $cookies->add(new Cookie([
                'name' => 'language',
                'value' => $languageNew,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]));
            $app->language = $languageNew;
//            echo $app->language;

        }
        else
        {

            $preferedLanguage = isset($app->request->cookies['language']) ? (string) $app->request->cookies['language'] : null;

            if(empty($preferedLanguage))
            {
                $preferedLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
            }
            $app->language = $preferedLanguage;
        }

    }
}