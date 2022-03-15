<?php

/** @var yii\web\View $this */

$this->title = 'Sneakers shop | регистрация';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
        <div class="forms">
          <h2>Добавить товар</h2>
           
          <?php $form = ActiveForm::begin( ['options' => ['class' => 'form','id'=>'form-addProd'],]) ?>

            <?= $form->field($modelAddProd,'title')->textInput(['autofocus'=>true,'class'=>'input-field','placeholder'=>'Наименование'])->label('') ?>
            <?= $form->field($modelAddProd,'prise')->textInput(['class'=>'input-field','placeholder'=>'Цена'])->label('') ?>
            <?= $form->field($modelAddProd,'count')->textInput(['class'=>'input-field','placeholder'=>'Кол-во'])->label('') ?>
            <?= $form->field($modelAddProd,'img')->textInput(['class'=>'input-field','placeholder'=>'Изображение'])->label('') ?>
            <input
              type="submit"
              name=""
              id=""
              title="Добавить продукт"
              value="Добавить продукт"
              class="input-button"
            />
        
          <?php ActiveForm::end(); ?>
    
        </div>

