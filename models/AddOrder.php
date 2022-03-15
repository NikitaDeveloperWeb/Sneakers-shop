<?php

namespace app\models;
use yii\base\Model;

class AddOrder extends Model{
  public  $user;
  public  $date;
  public $summa;
  public $id;

  public function rules(){
     return [
       [['user','date','summa'],'required','message'=>'Заполните все поля'],
     ];
  }
  
  public function addOrder(){
    $order = new Order();
    $order->id_user = $this->user;
    $order->date = $this->date;
    $order->summa = $this->summa;
    $order->save();
    if($order->save()){
      return $order->id;
    }
  }

}