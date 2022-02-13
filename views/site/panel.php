<?php

/** @var yii\web\View $this */

$this->title = 'Sneakers shop | административная панель';
?>
        <h2>Панель управления</h2>
        <div class="panels">
          <aside>
            <button onclick="changeOrder()">Заказы</button>
            <button onclick="changeUser()">Пользователи</button>
          </aside>
          <div class="panels_data">
            <div class="users">
              <table>
                <tr>
                  <td><strong>ID:</strong> 1</td>
                  <td><strong>Имя:</strong> Никита</td>
                  <td><strong>Фамилия:</strong> Русаков</td>
                  <td><strong>Почта:</strong> rusakdeveloper@gmail.com</td>
                  <td><img src="./img/delete.png" alt="" class="icon" /></td>
                </tr>
                <tr>
                  <td><strong>ID:</strong> 1</td>
                  <td><strong>Имя:</strong> Никита</td>
                  <td><strong>Фамилия:</strong> Русаков</td>
                  <td><strong>Почта:</strong> rusakdeveloper@gmail.com</td>
                  <td><img src="./img/delete.png" alt="" class="icon" /></td>
                </tr>
              </table>
            </div>
            <div class="orders">
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
                  <td><img src="./img/delete.png" alt="" class="icon" /></td>
                </tr>
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
                  <td><img src="./img/delete.png" alt="" class="icon" /></td>
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
        let PANELS_STATE = false;

        function setElement(state) {
          if (state === false) {
            PANELS_USER.style.display = '';
            PANELS_ORDERS.style.display = 'none';
          } else {
            PANELS_USER.style.display = 'none';
            PANELS_ORDERS.style.display = '';
          }
        }
        setElement(PANELS_STATE);

        function setState(state) {
          PANELS_STATE = state;
          setElement(PANELS_STATE);
        }

        const changeUser = () => {
          setState(false);
        };
        const changeOrder = () => {
          setState(true);
        };
      </script>
