
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AppAsset::register($this);
$isAuth = false;

if(substr($_COOKIE['Auth'],0,4) === 'true'){
  $isAuth = true;
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Кодировка -->
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/logo.ico" type="image/x-icon" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <title>Sneakers shop</title>
  </head>
  <body>
  <?php $this->beginBody() ?>
    <div class="wrapper">
      <header>
        <a class="logo" href=<?=  Url::to(['site/']);?> title="На главную">
        
          <?= Html::img('@web/img/logo.png', ['alt'=>'На галвную']);?>
          <div class="logo-text">
            <h1>SNEAKERS SHOP</h1>
            <p>Магазин лучших кроссовок</p>
          </div>
 
        </a>
        <div class="icons">
          <a class="cart" href=<?=  Url::to(['site/cart']);?> title="В корзину">
            <?= Html::img('@web/img/shopping-cart.png', ['alt'=>'В корзину']);?>
          </a>  
          <?php if ($isAuth): ?>
            <a class="avatar" href=<?=  Url::to(['site/profile']);?> title="Профиль">
            H
          </a>
          <?php endif; ?>
            
          <?php if (!$isAuth): ?>
              <a class="user" href=<?=  Url::to(['site/auth']);?> title="Авторизация">
               
                <?= Html::img('@web/img/user.png', ['alt'=>'Авторизация']);?>
              </a>
          <?php endif; ?>
        </div>
      </header>
      <main>
      <?=$content  ?>
      </main>
    </div>
    <footer>
      <h3>SNEAKERS SHOP - все права защищены. 2022г &copy;</h3>
    </footer>
    <?php $this->endBody() ?>
  </body>
  <script src="script.js"></script>
</html>
<?php $this->endPage() ?>