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
        // requisita todos os cookies e dados da sessao
        $cookies = $app->response->cookies;
        $session = Yii::$app->session;
        //pega a linguagem no url do browser
        $languageNew = $app->request->get('language');
        //echo $languageNew;
        //se houver uma linguagem na url
        if($languageNew !== null)
        {
            if (!in_array($languageNew, $this->supportedLanguages)) {
//                throw new Exception('Invalid your selected language.');
                // se a lingua captada na url, nao estiver em linguagem suportadas define um padrao
                $app->language = 'pt-PT';
            }

            $cookies->add(new Cookie([
                'name' => 'language',
                'value' => $languageNew,
                'expire' => time() + 60 * 60 * 24 * 30, // 30 days
            ]));
            // check if a session is already open
            if ($session->isActive) {
                $session->set('language', $languageNew);
            }else {
                $session->open();
                $session->set('language', $languageNew);
            }
            // define a lingua do site
            $app->language = $languageNew;
//            echo $app->language;

        }
        else
        {
            // se não houver a linguagem na url, pega do cookie
            $preferedLanguage = isset($app->request->cookies['language']) ? (string) $app->request->cookies['language'] : null;
            //se a linguagem preferida não esta no cookie

            if(empty($preferedLanguage))
            {
                //pega a linguagem do atributo de linguagens suportadas, fica em config/main.php
                $preferedLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
            }

            //  echo "else do language selector<br>";
            //  echo "preferedlanguage: ".$preferedLanguage."<br>";
            // check if a session is already open
            if ($session->isActive) {
                //  echo "Sessao activo<br>";
                $session->set('language', $preferedLanguage);
            }else {
                //  echo "sessao nao estava activo<br>";
                $session->open();
                $session->set('language', $preferedLanguage);
            }
            //atribui a lingua do site
            $app->language = $preferedLanguage;
        }

    }
}