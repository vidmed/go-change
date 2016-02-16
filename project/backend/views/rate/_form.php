<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rate */
/* @var $currencies array */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_currency_id')->dropDownList($currencies) ?>

    <?= $form->field($model, 'to_currency_id')->dropDownList($currencies) ?>

    <?= $form->field($model, 'from_amount')->textInput() ?>

    <?= $form->field($model, 'to_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
