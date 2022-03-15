<?php
namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\bootstrap4\Html;

class CartWidget extends Widget
{
    public $count;
    function __construct(){
        $session = Yii::$app->session;
        $session->open();

        if($session->has('productsSession')){
            $productsSession = $session->get('productsSession');
        }

        if(isset($productsSession) &&
            is_array($productsSession)
            && count($productsSession) > 0){
              foreach ($productsSession as $value) {
                $this->count = $this->count + $value['count'];
              }
        }
        else{
            $this->count = 0;
        }
    }

    public function run(){
      $img =  Html::img('@web/img/shopping-cart.png', ['alt'=>'В корзину']);
      echo "<a href='".Url::toRoute('site/cart')."'>".
      $img.
      "<span>".$this->count."</span>
    </a>";
    }
}