<?php

namespace app\models;
use yii\base\Model;

class AddProductOrder extends Model{
  public  $order_id;
  public  $product_id;
  public  $count_prod;
  public function rules(){
     return [
      //  [['order_id','product_id','count_prod'],'required','message'=>'Заполните все поля'],
     ];
  }
  
  public function addProductOrder(){
    $productOrder = new ProductOrder();
    $productOrder->order_ID = $this->order_id;
    $productOrder->product_ID = $this->product_id;
    $productOrder->count_prod = $this->count_prod;
   
    return $productOrder->save();
  }

}