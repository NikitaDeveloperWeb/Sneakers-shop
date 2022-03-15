<?php
use yii\helpers\Url;
use app\models\ProductOrder;
use app\models\Order;
use app\models\Product;
use yii\bootstrap4\Html;
use app\models\User;
$this->title = 'Sneakers shop | профиль';
?>
        <div class="profile">
          <p class="avatar-main" href="profile.html" title="Профиль">Н</p>
          <div class="profile_info">
            <h3>Никита Русаков</h3>
            <p>rusakdeveloper@gmail.com</p>
          </div>
        </div>
        <div class="panel">
          <div class="widget">
            <!-- <button onclick="changeFormsState()">Редактировать</button>
            <form action="">
              <input type="text" class="input-field" value="Никита" />
              <input type="text" class="input-field" value="Русаков" />
              <input type="text" class="input-field" value="rusakdeveloper@gmail.com" />
              <input type="submit" class="input-button" value="Редакировать" />
            </form> -->
          </div>
          <?= Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Выход',
                                ['class' => 'btn btn-link logout', 'style'=>"padding-top:10px;"]
                            )
                            . Html::endForm() ?>
        </div>
        <div class="orders">
          <h2>Мои заказы:</h2>
            <?php 
              $userModel = Yii::$app->user->identity;
              $orderAll= Order::find()->where(['id_user' => $userModel['id']])->all();
              
              ?>
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
                      $count = ProductOrder::find()->where(['order_ID' => $id,'product_ID'=>$product])->one();
                      // print_r( $count)
                 ?>
                <span style="display: flex;justify-content:space-around;"> <p > <?= $title['title'] ?> <em style="color:blue"> Х </em> <?=  $count['count_prod']?></p></span>
                 <?}?>
                  </td>
                  <td><strong>Сумма:</strong> <?=$order['summa'] ?> р.</td>
                  <td><strong>Дата:</strong> <?=$order['date'] ?></td>
                  <td>   <a  href="<?=  Url::to(['site/deleteord/','id'=>$id]);?>"><?= Html::img('@web/img/delete.png', ['alt'=>'Удалить','class'=>'icon']);?></a></td>
                </tr>
                <? }?>
              </table>
            </div>
      </main>
      <script>
        //_____________________________________________________________________________________
        // WIDGET
        let WIDGET = document.querySelector('.widget');
        let WIDGET_BUTTON = WIDGET.querySelector('button');
        let WIDGET_FORM = WIDGET.querySelector('form');
        let WIDGET_STATE = false;

        function setElement(state) {
          if (state === false) {
            WIDGET_FORM.style.display = 'none';
          } else {
            WIDGET_FORM.style.display = '';
          }
        }
        setElement(WIDGET_STATE);

        function setState(state) {
          WIDGET_STATE = state;
          setElement(WIDGET_STATE);
        }

        const changeFormsState = () => {
          if (WIDGET_STATE === false) {
            setState(true);
          } else {
            setState(false);
          }
        };
      </script>
