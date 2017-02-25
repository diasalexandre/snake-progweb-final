<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Trabalho Alexandre Dias!</h1>

        <p class="lead">Cadastre-se, jogue e se divirta.</p>

        <?= Html::a('Usuario', ['user/create']) ?>
        <?= Html::a('Jogar', ['jogar']) ?>
    </div>

    <div class="body-content">

    </div>
</div>
