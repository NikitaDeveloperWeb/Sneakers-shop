<?php

namespace app\models;
use yii\base\Model;

class AddProduct extends Model{
  public  $title;
  public  $prise;
  public $img;
  public $count;

  public function rules(){
     return [
       [['title','prise','count'],'required','message'=>'Заполните все поля'],
     ];
  }
  
  public function addProduct(){
    $product = new Product();
    $product->title = $this->title;
    $product->prise = $this->prise;
    $product->image = $this->img;
    $product->counts = $this->count;
    return $product->save();
  }

}