<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rate */

$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Валюта (из)',
                'attribute' => 'fromCurrency.name',
            ],
            [
                'label' => 'Валюта (в)',
                'attribute' => 'toCurrency.name',
            ],
            'from_amount',
            'to_amount',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
