<?php

/** @var yii\web\View $this */
use yii\bootstrap4\Html;
use app\models\Product;
use yii\helpers\Url;
$this->title = 'Sneakers shop | главная';
?>
 <main>
   <? 
   
   ?>
        <h2>Каталог товаров</h2>
        <div class="sneakers-list">
        <?php 
          $prodAll=Product::find()->all(); 
          
          foreach($prodAll as $prod ) { 
                  $id = $prod['id']; ?>
          <div class="sneakers-cart">
            <img
              src=<?=$prod['image'] ?>
              alt=""
            />
            <h3><?=$prod['title'] ?></h3>
            <h3>На складе: <?=$prod['counts'] ?></h3>
            <span>
              <p>
                <strong>Цена:</strong><br />
                <?=$prod['prise'] ?>
              </p>
             
             <a href="<?=Url::toRoute(['site/cart', 'id' => $id ]);?>" class="cart">   <?= Html::img('@web/img/add.png', ['alt'=>'В корзину']);?> </a>
            </span>
            
          </div>
         <? }?>
        
        </div>
      </main>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
        
      
      on('click',function (e) {
          e.preventDefault();
          var id = $(this.data('id'));
          $.ajax({
            url:'/site/addbasket',
            data:{id: id},
            type: 'P',
            success: function (res) {
              console.log(res);
            },
            error: function () {
              alert('ERROR');
              }
          })
        })
      </script> -->