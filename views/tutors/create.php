<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tutors */

$this->title = 'Create Tutors';
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
