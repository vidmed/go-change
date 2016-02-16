<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Billing */

$this->title = 'Update Billing: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Billings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="billing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
