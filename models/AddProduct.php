<?php

namespace app\models;
use yii\base\Model;

class AddProduct extends Model{
  public  $title;
  public  $prise;
  public $img;

  public function rules(){
     return [
       [['title','prise'],'required','message'=>'Заполните все поля'],
     ];
  }
  public function addProduct(){
    $product = new Product();
    $product->TITLE = $this->title;
    $product->PRISE = $this->prise;
    $product->IMAGE = $this->img;
  
    return $product->save();
  }

}