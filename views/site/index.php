<?php

/** @var yii\web\View $this */

use app\models\Product;

$this->title = 'Sneakers shop | главная';
?>
 <main>
        <h2>Каталог товаров</h2>
        <div class="sneakers-list">
        <?php $prodAll=Product::find()->all(); 
          foreach($prodAll as $prod ) { 
                  $id = $prod['ID']; ?>
          <div class="sneakers-cart">
            <img
              src=<?=$prod['IMAGE'] ?>
              alt=""
            />
            <h3><?=$prod['TITLE'] ?></h3>
            <span>
              <p>
                <strong>Цена:</strong><br />
                <?=$prod['PRISE'] ?>
              </p>
              <img src="./img/add.png" alt="" id="add_item" />
            </span>
          </div>
         <? }?>
        </div>
      </main>
