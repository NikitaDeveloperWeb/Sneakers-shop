<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAuth()
    {
        return $this->render('auth');
    }
        /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCart()
    {
        return $this->render('cart');
    }
        /**
     * Displays about page.
     *
     * @return string
     */
    public function actionError()
    {
        return $this->render('error');
           
     
    }
    /** Displays about page.
     *
     * @return string
     */
    public function actionPanel()
    {
        return $this->render('panel');
    }
        /** Displays about page.
     *
     * @return string
     */
    public function actionProfile()
    {
        return $this->render('profile');
    }
}
