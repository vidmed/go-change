<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Currency */
/* @var $billings array */

$this->title = 'Update Currency: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Currencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'billings' => $billings,
    ]) ?>

</div>
