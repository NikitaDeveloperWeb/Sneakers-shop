<?php

namespace app\models;
use yii\base\Model;

class Signup extends Model{

  public  $firstname;
  public  $lastname;
  public $typeUser;
  public $email;
  public $password;
  public $password_repeat;
  public function rules(){
     return [
       [['email','password','lastname','firstname','password_repeat','typeUser'],'required','message'=>''],
       ['email','email'],
       [['password'],'string','min'=>5,'max'=>100,'message'=>'Пароль должен содержать не менее 5 символов.'],
       ['password', 'compare', 'compareAttribute' => 'password_repeat','message'=>'Пароли не совпадают'],
     ];
  }
  public function signup(){
    $user = new User();
    $user->firstname = $this->firstname;
    $user->lastname = $this->lastname;
    $user->email = $this->email;
    $user->typeUser = $this->typeUser;
    $user->setPassword( $this->password);
    $user->password_repeat = sha1($this->password_repeat);
    return $user->save();
  }

}