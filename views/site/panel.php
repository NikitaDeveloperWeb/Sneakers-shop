<?php

/** @var yii\web\View $this */

use app\models\Order;
use app\models\Product;
use app\models\ProductOrder;
use yii\bootstrap4\Html;
use app\models\User;
use yii\helpers\Url;
$this->title = 'Sneakers shop | административная панель';
?>
        <h2>Панель управления</h2>
        <div class="panels">
          <aside>
            <button onclick="changeProduct()">Товары</button>
            <button onclick="changeUser()">Пользователи</button>
            <button onclick="changeOrder()">Заказы</button>
           
          </aside>
          <div class="panels_data">
            <div class="users">
            <?php $usersAll=User::find()->all() ?>

              <table>
              <?  foreach($usersAll as $us ) {
              $id = $us['id'];
             
              ?>
                <tr>
                  <td><strong>ID:</strong><?=$us['id']  ?></td>
                  <td><strong>Имя:</strong> <?=$us['firstname']  ?></td>
                  <td><strong>Фамилия:</strong>  <?= $us['lastname'] ?></td>
                  <td><strong>Почта:</strong>  <?=$us['email']?></td>
                  <td>   <a  href="<?=  Url::to(['site/deleteuser/','id'=>$id]);?>"><?= Html::img('@web/img/delete.png', ['alt'=>'Удалить','class'=>'icon']);?></a></td>
                </tr>
                <? }?>
              </table>
            </div>
            <div class="products">
            <?php $prodAll=Product::find()->all() 
           ?>
            <a class="" href=<?=  Url::to(['site/product']);?> title="Добавить продукт">Добавить товар</a>
              <table>
                
              <?  foreach($prodAll as $prod ) { 
                  $id = $prod['ID']; ?>
                <tr>
                  <td><strong>ID:</strong> <?=$prod['ID']  ?></td>
                  <td>
                    <strong>Название:</strong> <?=$prod['TITLE']  ?>
                  </td>
                  <td><strong>Цена:</strong> <?=$prod['PRISE']  ?> р.</td>
                  <td>
                    <strong>Изображение:</strong>
                    <img
                      src=<?=$prod['IMAGE']  ?>
                      alt=""
                    />
                  </td>
                  <td>   <a  href="<?=  Url::to(['site/deleteprod/','id'=>$id]);?>"><?= Html::img('@web/img/delete.png', ['alt'=>'Удалить','class'=>'icon']);?></a></td>
                </tr>
                <? }?>
              </table>
            </div>
            <div class="orders">
            <?php 
              $orderAll= Order::find()->all(); ?>
              <table>
           <?     foreach($orderAll as $order ) { 
                  $id = $order['id']; 
                  $prodOrder = ProductOrder::find()->where(['order_ID' => $order['id']])->all();
                  $customer = User::findOne($order['id_user']);
                  $prod = [];
                  foreach ($prodOrder as $pr) {
                    if($pr['order_ID'] === $id){
                      array_push($prod,$pr['product_ID']);
                    }
                  } 
          ?>
                <tr>
                  <td><strong>ID:</strong><?=$order['id'] ?></td>
                  <td><strong>Заказчик:</strong><?=$customer['firstname'] . ' ' . $customer['lastname'] ?></td>
                  <td>
                    <strong>Товары:</strong>
                  <?    
                    foreach ($prod as $product) {
                      $title = Product::find()->where(['ID' => $product])->one();
                    
                    
                 ?>
                 <p><?= $title['TITLE'] ?></p>
                 <?}?>
                  </td>
                  <td><strong>Сумма:</strong> <?=$order['summa'] ?> р.</td>
                  <td><strong>Дата:</strong> <?=$order['date'] ?></td>
                  <td>   <a  href="<?=  Url::to(['site/deleteord/','id'=>$id]);?>"><?= Html::img('@web/img/delete.png', ['alt'=>'Удалить','class'=>'icon']);?></a></td>
                </tr>
                <? }?>
              </table>
            </div>
          </div>
        </div>
      </main>
      <script>
        let PANELS = document.querySelector('.panels');
        let PANELS_ORDERS = document.querySelector('.orders');
        let PANELS_USER = document.querySelector('.users');
        let PANELS_PRODUCT = document.querySelector('.products');
        let PANELS_STATE = 0;

        function setElement(state) {
          if (state === 0) {
            PANELS_USER.style.display = '';
            PANELS_ORDERS.style.display = 'none';
            PANELS_PRODUCT.style.display = 'none';
          } else if(state === 1) {
            PANELS_USER.style.display = 'none';
            PANELS_ORDERS.style.display = '';
            PANELS_PRODUCT.style.display = 'none';
          }else{
            PANELS_PRODUCT.style.display = '';
            PANELS_USER.style.display = 'none';
            PANELS_ORDERS.style.display = 'none';
          }
        }
        setElement(PANELS_STATE);

        function setState(state) {
          PANELS_STATE = state;
          setElement(PANELS_STATE);
        }

        const changeUser = () => {
          setState(0);
        };
        const changeOrder = () => {
          setState(1);
        };
        const changeProduct = () => {
          setState(2);
        };
      </script>
