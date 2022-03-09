<?php
use yii\helpers\Url;
/** @var yii\web\View $this */
use yii\bootstrap4\Html;
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
