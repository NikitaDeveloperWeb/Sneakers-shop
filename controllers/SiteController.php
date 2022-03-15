<?php

namespace app\controllers;

use app\models\AddOrder;
use app\models\AddProduct;
use app\models\AddProductOrder;
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
          return $this->redirect('profile');
        }
      }
        return $this->render('auth',['modelReg'=>$modelReg,'login_model'=>$login_model]);
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
      $userModel = Yii::$app->user->identity;
      if($userModel['typeUser'] != 'Admin'){
        return $this->redirect('profile');
      }
        return $this->render('panel');
    }
        /** Displays about page.
     *
     * @return string
     */
    public function actionProfile()
    {   
      $userModel = Yii::$app->user->identity;
      if($userModel['typeUser'] != 'User'){
        return $this->redirect('panel');
      }
      
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


    public function actionCart(){
    
      $session = Yii::$app->session;
      //        $session->destroy();
              $session->open();
        
      
              if($session->has('productsSession')){
                  $productsSession = $session->get('productsSession');
              }
              else{
                  $productsSession = array();
              }
      
              if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                  $productsArray = Product::find()->where(['id' => $_GET['id']])->asArray()->one();
      
                  if(is_array($productsArray) && count($productsArray) > 0){
      
                      $flag = false;
                      for($i = 0; $i < count($productsSession); $i++){
                          if($productsSession[$i]['id'] == $_GET['id']){
                              $flag = true;
                              if($productsArray['counts'] >= $productsSession[$i]['count'] + 1){
      
                                  $productsSession[$i]['count']++;
                              }
                              break;
                          }
                      }
                      if(!$flag){
                          array_push($productsSession, ['id' => $_GET['id'], 'count' => 1 ]);
                      }
                  }
              }
              
              $session->set('productsSession', $productsSession);
              $productsSession = $session->get('productsSession');
      
              $arrayID = array();
      
              foreach($productsSession as $value){
                  array_push($arrayID, $value['id']);
              }
      
              $products = Product::find()->where(['id' => $arrayID])->asArray()->All();
      
              foreach($products as $key => $value){
                  $products[$key]['count_cart'] = $productsSession[$key]['count'];
                  
              }
              // print_r($products);
      
              return $this->render('cart', compact('products'));
    }
    
    public function actionDeletecartprod($id){

    $session = Yii::$app->session;

              $session->open();
        
      
              if($session->has('productsSession')){
                  $productsSession = $session->get('productsSession');
              }
              else{
                  $productsSession = array();
              }
      
              if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
                  $productsArray = Product::find()->where(['id' => $_GET['id']])->asArray()->one();
      
                  if(is_array($productsArray) && count($productsArray) > 0){
      
                      $flag = false;
                      for($i = 0; $i < count($productsSession); $i++){
                          if($productsSession[$i]['id'] == $_GET['id']){
                              $flag = true;
                              if($productsArray['counts'] >= $productsSession[$i]['count'] && $productsSession[$i]['count'] >= 1){
                                  $productsSession[$i]['count']--;
                                  
                              }else{
                                $productsSession[$i]['count']= 0;
                              }
                              break;
                          }
                      }
                      if(!$flag){
                          array_push($productsSession, ['id' => $_GET['id'], 'count' => 1 ]);
                      }
                  }
              }
              
              $session->set('productsSession', $productsSession);
              $productsSession = $session->get('productsSession');
      
              $arrayID = array();
      
              foreach($productsSession as $value){
                  array_push($arrayID, $value['id']);
              }
      
              $products = Product::find()->where(['id' => $arrayID])->asArray()->All();
      
              foreach($products as $key => $value){
                  $products[$key]['count_cart'] = $productsSession[$key]['count'];
                  
              }
              return $this->render('cart', compact('products','productsSession'));
    }
    public function actionAddorder(){
       $userModel = Yii::$app->user->identity;
       $summa = 0;
      if(!Yii::$app->user->isGuest){
        $session = Yii::$app->session;
        $session->open();
        if($session->has('productsSession')){
            $productsSession = $session->get('productsSession');
        }
        else{
            $productsSession = array();
        }
        foreach ($productsSession as $value) {
         $prise  = Product::findOne($value['id'])['prise'];
         $summa = $summa + $prise*$value['count'];
        }
        // print_r($productsSession);
        $modelAddOrder = new AddOrder();
        $modelAddOrder->user = $userModel['id'];
        $modelAddOrder->date = date('Y-m-d H:i:s');
        $modelAddOrder->summa = $summa;
        if(isset($_POST['AddOrder'])){
          $modelAddOrder->attributes = Yii::$app->request->post('AddOrder'); 
        }

        if($modelAddOrder->validate() &&  $id_order = $modelAddOrder->addOrder()){
          $modelAddOrderProd = new AddProductOrder();
         
          if(isset($_POST['AddProductOrder'])){
            $modelAddOrderProd->attributes = Yii::$app->request->post('AddProductOrder'); 
          
          }  
          for ($i = 0; $i < count($productsSession);$i++) {
            $modelAddOrderProd->product_id = $productsSession[$i]['id'];
            $modelAddOrderProd->order_id = $id_order;
            $modelAddOrderProd->count_prod = $productsSession[$i]['count'];
            if($modelAddOrderProd->validate() &&  $modelAddOrderProd->addProductOrder()){
            }
          }
          $productsSession = [];
          return $this->redirect('profile');
        }

      }
      return $this->redirect('cart');
    }
   

}