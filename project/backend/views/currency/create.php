<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Currency */
/* @var $billings array */

$this->title = 'Create Currency';
$this->params['breadcrumbs'][] = ['label' => 'Currencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'billings' => $billings,
    ]) ?>

</div>
