<?php

use yii\bootstrap\Html;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $billings array */

$this->title = 'My Yii Application';
$getRate     = 'var getRate = function(){
    var currencyFrom = $("#from_currency").val();
    var currencyTo = $("#to_currency").val();
    if(!!currencyFrom && !!currencyTo){
        $.ajax({
            url: "' . Url::to(['/site/rate']) . '",
            dataType: "json",
            type: "POST",
            data: {
                from: currencyFrom,
                to: currencyTo,
            },
            success: function(data){
                var text = "Данные по заданным валютам не найдены";
                if(!!data.result){
                    text = "Отдаёте " + data.result.from_amount + ", получаете " + data.result.to_amount;
                }
                $("#result").text(text);
            }
        });
    } else {
        $("#result").text("");
    }
}';
$this->registerJs($getRate, View::POS_READY, 'getRate');
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-center">Из</h2>

                <div class="form-group">
                    <?= Html::label('Платежная система', 'from_billing'); ?>
                    <?= Html::dropDownList('from_billing', null, $billings, [
                        'id'     => 'from_billing',
                        'class'  => 'form-control',
                        'prompt' => 'Выберите платежную систему...'
                    ]); ?>
                </div>

                <div class="form-group">
                    <?= Html::label('Валюта', 'from_billing'); ?>
                    <?= DepDrop::widget([
                        'name'          => 'from_currency',
                        'options'       => ['id' => 'from_currency', 'placeholder' => 'Выберите валюту...'],
                        'pluginEvents'  => [
                            'change' => 'getRate',
                        ],
                        'pluginOptions' => [
                            'depends'     => ['from_billing'],
                            'placeholder' => 'Выберите валюту...',
                            'url'         => Url::to(['/site/currency']),
                            'loadingText' => 'Загрузка ...',
                        ]
                    ]); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="text-center">В</h2>

                <div class="form-group">
                    <?= Html::label('Платежная система', 'from_billing'); ?>
                    <?= Html::dropDownList('to_billing', null, $billings, [
                        'id'     => 'to_billing',
                        'class'  => 'form-control',
                        'prompt' => 'Выберите платежную систему...'
                    ]); ?>
                </div>

                <div class="form-group">
                    <?= Html::label('Валюта', 'to_billing'); ?>
                    <?= DepDrop::widget([
                        'name'          => 'to_currency',
                        'options'       => ['id' => 'to_currency', 'placeholder' => 'Выберите валюту...'],
                        'pluginEvents'  => [
                            'change' => 'getRate',
                        ],
                        'pluginOptions' => [
                            'depends'     => ['to_billing'],
                            'placeholder' => 'Выберите валюту...',
                            'url'         => Url::to(['/site/currency']),
                            'loadingText' => 'Загрузка ...',
                        ]
                    ]); ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Результат:</h2>
                <p id="result"></p>
            </div>
        </div>

    </div>
</div>
