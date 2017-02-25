<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JogadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jogadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogada-index">

    <div id="board"></div>
    <div id="points"></div>


    <script type="text/javascript">
var constBoard = 20,
    limitBoard = constBoard - 1,
    level = 6,
    intensity = 1200,
    snake = [[5,0]],
    direction = 2,
    mx = parseInt(Math.random() * constBoard),
    my = parseInt(Math.random() * constBoard),
    vivo = true;

function cl() {
    var getDirection = function(key) { 
        if (key == 37) {
            
            if (direction == 2) {
                return;
            }

            direction = 0;
        }
        
        if (key == 38) {
            if (direction == 3) {
                return;
            }

            direction = 1;
        }
        
        if (key == 39) {
            if (direction == 0) {
                return;
            }

            direction = 2;
        }
        
        if (key == 40) {
            if (direction == 1) {
                return;
            }

            direction = 3;
        }
    }
    return getDirection;    
}

var clou = cl();

window.onkeydown = function(event) {
    clou(event.keyCode);
};

function buildBoard() {
    tabuleiro = "<table>";

    for (var x = 0; x < constBoard; x++) {
        tabuleiro += "<tr>";
        
        for (var y = 0; y < constBoard; y++) {
            tabuleiro += "<td id='block-" + x + "_" + y + "''> </td>";
        }

        tabuleiro += "</tr>";
    }

    tabuleiro += "</table>";

    document.getElementById('board').innerHTML = tabuleiro;
}

function move() {
    document.getElementById('block-' + snake[snake.length - 1][0] + '_' + snake[snake.length - 1][1]).style.background = "#FFF";
    
    if (mx == snake[snake.length - 1][0] && 
        my == snake[snake.length - 1][1]) {
        mx = parseInt(Math.random() * constBoard);
        my = parseInt(Math.random() * constBoard);
        snake[snake.length] = [constBoard, constBoard];
        level++;

        document.getElementById('points').innerHTML = "Você está com " + (level - 6) + " ponto(s).";
    }

    for (var x = snake.length - 1; x > 0; x--) {
        snake[x][0] = snake[x - 1][0];
        snake[x][1] = snake[x - 1][1];
    }

    if (direction == 0) {
        snake[0][1]--;
    }

    if (direction == 1) {
        snake[0][0]--;
    }

    if (direction == 2) {
        snake[0][1]++;
    }

    if (direction == 3) {
        snake[0][0]++;
    }
    
    for (var x = 1, count = snake.length; x < count; x++) {
        if (snake[0][0] == snake[x][0] &&
            snake[0][1] == snake[x][1]) {
            vivo = false;
        }
    }
    
    if (snake[0][0] < 0 ||
        snake[0][1] < 0 ||
        snake[0][0] > limitBoard ||
        snake[0][1] > limitBoard) {
        vivo = false;
    }
    
    if (vivo) {
        setTimeout('move();', (intensity/level));
    } else {
        document.getElementById('board').innerHTML = "PERDEU<br /> Você fez " + (level - 6) + " ponto(s).<br /> Recarregue a página para iniciar.";
        document.getElementById('points').innerHTML = "";

        location.href = "./index.php?r=jogada/save&pontuacao=" + (level - 6);
    }

    document.getElementById('block-' + snake[0][0] + '_' + snake[0][1]).style.background = "gray";
    document.getElementById('block-' + mx + '_' + my).style.background = "red";    
} 

buildBoard(); 

move();
</script>
<style type="text/css">
#board {
    margin: 0 auto;
    width: 600px;
    border: 1px solid #000;
}

#board td {
    width: 30px; 
    height: 30px;
}

#points, h1 {
    width: 600px;
    margin: 40px auto;
}

</style>
</div>
