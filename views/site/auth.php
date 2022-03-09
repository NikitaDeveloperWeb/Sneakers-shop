<?php

/** @var yii\web\View $this */

$this->title = 'Sneakers shop | регистрация';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
        <div class="forms">
          <h2>Аунтефикация</h2>
          <!-- <form action="" id="form-auth">
            <input type="text" name="" id="" placeholder="Почта" class="input-field" />
            <input type="text" name="" id="" placeholder="Пароль" class="input-field" />
          
          </form> -->
          <?php $form = ActiveForm::begin( ['options' => ['class' => 'form','id'=>"form-auth"]]); ?>
            <?= $form->field($login_model,'email')->input('email',['class'=>'input-field','placeholder'=>'Почта'])->label('');  ?>
            <?= $form->field($login_model,'password')->passwordInput(['class'=>'input-field','placeholder'=>'Пароль'])->label(''); ?>
            <input type="submit" name="" id="" title="Войти" value="Войти" class="input-button" />
          <?php ActiveForm::end(); ?>
           
          <?php $form = ActiveForm::begin( ['options' => ['class' => 'form','id'=>'form-registration'],]) ?>

            <?= $form->field($modelReg,'firstname')->textInput(['autofocus'=>true,'class'=>'input-field','placeholder'=>'Имя'])->label('') ?>
            <?= $form->field($modelReg,'lastname')->textInput(['class'=>'input-field','placeholder'=>'Фамилия'])->label('') ?>
            <?= $form->field($modelReg,'email')->input('email',['class'=>'input-field','placeholder'=>'Почта'])->label('') ?>
            <?= $form->field($modelReg,'password')->passwordInput(['class'=>'input-field','placeholder'=>'Пароль'])->label('') ?>
            <?= $form->field($modelReg,'password_repeat')->passwordInput(['class'=>'input-field','placeholder'=>'Повторите пароль'])->label('') ?>
            
            <input
              type="submit"
              name=""
              id=""
              title="Зарегистрироваться"
              value="Зарегистрироваться"
              class="input-button"
            />
       
                  
        
          <?php ActiveForm::end(); ?>
          <div class="switch" onclick="changeFormsState()"><h3></h3></div>
        </div>
        <script>
          // Auth

          let FORMS_STATE = false;
          let AUTH_FORM = document.querySelector('#form-auth');
          let REG_FORM = document.querySelector('#form-registration');
          let Switch = document.querySelector('.switch');

          function setElement(state) {
            if (state === false) {
              Switch.querySelector('h3').innerText = 'Зарегистрироваться';
              REG_FORM.style.display = 'none';
              AUTH_FORM.style.display = '';
            } else {
              Switch.querySelector('h3').innerText = 'Войти';
              AUTH_FORM.style.display = 'none';
              REG_FORM.style.display = '';
            }
          }
          setElement(FORMS_STATE);

          function setState(state) {
            FORMS_STATE = state;
            setElement(FORMS_STATE);
          }

          const changeFormsState = () => {
            if (FORMS_STATE === false) {
              setState(true);
            } else {
              setState(false);
            }
          };
        </script>
