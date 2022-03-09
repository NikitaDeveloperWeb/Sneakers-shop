<?php

/** @var yii\web\View $this */
use yii\bootstrap4\Html;
$this->title = 'Sneakers shop | корзина';
?>
        <div class="cart">
          <ul class="cart-list">
            <li>
              <h3>Кроссовки Унисекс Adidas Yeezy Boost 350 V2 GID 'Glow'</h3>
              <img src="https://cdn-images.farfetch-contents.com/14/57/28/35/14572835_22281968_480.jpg" alt="" />
              <p>6990 р.</p>
              <?= Html::img('@web/img/delete.png', ['alt'=>'Авторизация','class'=>'icon']);?>
            </li>
          </ul>
          <div class="cart-result">
        
            <form action="">
              
              <p><strong>Итог:</strong><h3>3000 р.</h3> </p>
              <input type="submit" value="Заказать" class="input-button" />
            </form>
          </div>
        </div>
