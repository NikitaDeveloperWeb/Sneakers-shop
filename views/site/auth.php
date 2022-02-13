<?php

/** @var yii\web\View $this */

$this->title = 'Sneakers shop | регистрация';
?>
        <div class="forms">
          <h2>Аунтефикация</h2>
          <form action="" id="form-auth">
            <input type="text" name="" id="" placeholder="Почта" class="input-field" />
            <input type="text" name="" id="" placeholder="Пароль" class="input-field" />
            <input type="submit" name="" id="" title="Войти" value="Войти" class="input-button" />
          </form>
          <form action="" id="form-registration">
            <input type="text" name="" id="" placeholder="Ваша почта" class="input-field" />
            <input type="text" name="" id="" placeholder="Ваше имя" class="input-field" />
            <input type="text" name="" id="" placeholder="Ваша фамилия" class="input-field" />
            <input type="text" name="" id="" placeholder="Пароль" class="input-field" />
            <input type="text" name="" id="" placeholder="Повторите пароль" class="input-field" />
            <input
              type="submit"
              name=""
              id=""
              title="Зарегистрироваться"
              value="Зарегистрироваться"
              class="input-button"
            />
          </form>
          <div class="switch" onclick="changeFormsState()"><h3></h3></div>
        </div>
        <script>
          // Auth

          let FORMS_STATE = false;
          let AUTH_FORM = document.querySelector('#form-auth');
          let REG_FORM = document.querySelector('#form-registration');
          let Switch = document.querySelector('.switch');

          function setElement(state) {
            if (state === false) {
              Switch.querySelector('h3').innerText = 'Зарегистрироваться';
              REG_FORM.style.display = 'none';
              AUTH_FORM.style.display = '';
            } else {
              Switch.querySelector('h3').innerText = 'Войти';
              AUTH_FORM.style.display = 'none';
              REG_FORM.style.display = '';
            }
          }
          setElement(FORMS_STATE);

          function setState(state) {
            FORMS_STATE = state;
            setElement(FORMS_STATE);
          }

          const changeFormsState = () => {
            if (FORMS_STATE === false) {
              setState(true);
            } else {
              setState(false);
            }
          };
        </script>
