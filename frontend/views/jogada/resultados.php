<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jogada */

$this->params['breadcrumbs'][] = ['label' => 'Jogadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogada-view">

    <h1>Resultados</h1>

    <table>
    <thead>
    <tr>
        <td>ID Usuario</td>
        <td>Pontuacao</td>
    </tr>
    </thead>

    <tbody>
    <?php
        foreach ($resultados as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value->id_user . "</td>";
            echo "<td>" . $value->pontuacao . "</td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>


</div>
