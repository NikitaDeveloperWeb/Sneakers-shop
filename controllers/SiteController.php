<?php

namespace app\controllers;

use app\models\AddProduct;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\Order;
use app\models\Product;
use app\models\Signup;
use app\models\User;


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
     * Displays homepage.
     *
     * @return string
     */
   public function actionLogout()
   {  
 
      Yii::$app->user->logout();
      setcookie("Auth", "");
      return $this->redirect(['index']);
  
   }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAuth()
    {
      $modelReg = new Signup();
      $modelReg->typeUser = 'User';
      if(isset($_POST['Signup'])){
        $modelReg->attributes = Yii::$app->request->post('Signup'); 
      }
      if($modelReg->validate() &&  $modelReg->signup()){
        return $this->redirect('index');
      }
      // auth
      if(!Yii::$app->user->isGuest)
      {
          return $this->redirect('panel');
      }
      $login_model = new Login();
      if(Yii::$app->request->post('Login') )
      {
        $login_model->attributes = Yii::$app->request->post('Login');
        if($login_model->validate())
        {
          setcookie("Auth", "true");  
          Yii::$app->user->login($login_model->getUser());  
          return $this->redirect('panel');
        };
      }
        return $this->render('auth',['modelReg'=>$modelReg,'login_model'=>$login_model]);
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
    public function actionProduct()
    {    
      $modelAddProd  = new AddProduct();
      if(isset($_POST['AddProduct'])){
        $modelAddProd->attributes = Yii::$app->request->post('AddProduct'); 
      }
      if($modelAddProd->validate() &&  $modelAddProd->addProduct()){
        return $this->redirect('panel');
      }
        return $this->render('product',['modelAddProd'=>$modelAddProd]);
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
        Product::find()->all(); 
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
    
    public function  actionEditeuser($id)
    {
      $model = User::findOne($id);
      if($model){
        $model->update();
      }
        return $this->redirect(['profile','id'=>$id]);
    }

    public function  actionDeleteuser($id)
    {
      $model = User::findOne($id);
      if($model){
        $model->delete();
      }
        return $this->redirect(['panel','id'=>$id]);
    }

    public function  actionDeleteprod($id)
    {
      $model = Product::findOne($id);
      if($model){
        $model->delete();
      }
        return $this->redirect(['panel','id'=>$id]);
    }

    public function  actionDeleteord($id)
    {
      $model = Order::findOne($id);
      if($model){
        $model->delete();
      }
        return $this->redirect(['panel','id'=>$id]);
    }
}
