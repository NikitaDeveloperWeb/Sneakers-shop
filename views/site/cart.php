 <?php

/** @var yii\web\View $this */
use yii\bootstrap4\Html;
use yii\helpers\Url;
$this->title = 'Sneakers shop | корзина';
?>


<div class="col-lg-12 top_cart_block">
  <?php
  $c;

    foreach ($products as $value) {
      $c = $c + $value['count_cart']; 

    }
  ?>
    <div>
        <p>Состояние корзины</p>
        <p>Ваша корзина содержит: <?php echo $c;?> товар</p>
    </div>
</div>

<div class="col-lg-12">
    <?php if( $c == 0):?>
            <p>В корзине нет товаров</p>
        </div>
    <?php else: $sum = 0?>


    <table class="table table-bordered">
        <tr class="cart_prod_head">
            <td class="img_cart">Товар</td>
            <td class="title_cart">Описание</td>
            <td class="price_cart">Цена за единицу</td>
            <td class="value_cart">Кол-во</td>
            <td class="rez_price_cart">Стоимость</td>
        </tr>

        <?php foreach($products as $value):?>
            <tr class="cart_prod_content">
                <td class="img_cart"><img src="<?php echo $value['image'];?>"></td>
                <td class="title_cart"><?php echo $value['title'];?></td>
                <td class="price_cart"><?php echo $value['prise'];?> руб</td>
                <td class="value_cart">
                    <div>
                        <input type="text" value="<?php echo $value['count_cart']?>">
                        <div class="links">
                          <a href="<?=Url::toRoute(['site/deletecartprod', 'id' => $value['id'] ]);?>" class="cart_link">-</a>
                          <a href="<?=Url::toRoute(['site/cart', 'id' => $value['id'] ]);?>" class="cart_link">+</a>
                      </div>
                    
                    </div>
                </td>
                <td class="rez_price_cart"><?php
                                            $sum += $value['prise'] * $value['count_cart'];
                                            echo $value['prise'] * $value['count_cart'];?> руб</td>
            </tr>
        <?php endforeach;?>
        <tr class="cart_prod_footer">
            <td colspan="2" class="null_cart"></td>
            <td colspan="2" class="rez_title_cart">Итого, к оплате:</td>
            <td class="rez_price_cart"><?php echo $sum;?> руб</td>
        </tr>
    </table>
</div>
<div class="col-lg-12 btn_cart_wrap" style="display: flex;  justify-content:space-between;">
    <a href="<?php echo Url::toRoute('site/index');?>" class="btn_cart_zakaz">Продолжить покупки<i class="glyphicon glyphicon-chevron-right"></i></a>
    <a href="<?php echo Url::toRoute(['site/addorder']);?>" class="btn_cart_zakaz">Оформить заказ<i class="glyphicon glyphicon-chevron-right"></i></a>
</div>
<?php endif;?>