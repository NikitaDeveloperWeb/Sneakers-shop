<?php

/** @var yii\web\View $this */
use yii\bootstrap4\Html;
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
              <table>
                <tr>
                  <td><strong>ID:</strong> 1</td>
                  <td><strong>Имя:</strong> Никита</td>
                  <td><strong>Фамилия:</strong> Русаков</td>
                  <td><strong>Почта:</strong> rusakdeveloper@gmail.com</td>
                  <td>  <?= Html::img('@web/img/delete.png', ['alt'=>'Авторизация','class'=>'icon']);?></td>
                </tr>
               
              </table>
            </div>
            <div class="products">
              <table>
                <tr>
                  <td><strong>ID:</strong> 1</td>
                  <td>
                    <strong>Название:</strong> Кроссовки Унисекс Adidas Yeezy Boost 350 V2 GID
                    'Glow'
                  </td>
                  <td><strong>Цена:</strong> 6990 р.</td>
                  <td>
                    <strong>Изображение:</strong>
                    <img
                      src="https://cdn-images.farfetch-contents.com/14/57/28/35/14572835_22281968_480.jpg"
                      alt=""
                    />
                  </td>
                  <td>  <?= Html::img('@web/img/delete.png', ['alt'=>'Авторизация','class'=>'icon']);?></td>
                </tr>
               
              </table>
            </div>
            <div class="orders">
              <table>
               
                <tr>
                  <td><strong>ID:</strong> 1</td>
                  <td><strong>Заказчик:</strong> Никита Русаков</td>
                  <td>
                    <strong>Товары:</strong> Кроссовки Унисекс Adidas Yeezy Boost 350 V2 GID
                    'Glow'
                  </td>
                  <td><strong>Сумма:</strong> 6990 р.</td>
                  <td><strong>Дата:</strong> 24.02.2022г.</td>
                  <td>  <?= Html::img('@web/img/delete.png', ['alt'=>'Авторизация','class'=>'icon']);?></td>
                </tr>
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
