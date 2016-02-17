<?php
namespace frontend\controllers;

use frontend\models\Billing;
use frontend\models\Currency;
use frontend\models\Rate;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'currency' => ['post'],
                    'rate' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $billings = Billing::getAssocBillings();

        return $this->render('index', [
            'billings' => $billings,
        ]);
    }

    public function actionCurrency()
    {
        $depdrop_parents = Yii::$app->request->post('depdrop_parents');

        if (!empty($depdrop_parents) && isset($depdrop_parents[0])) {
            $billing_id = $depdrop_parents[0];
            $out        = Currency::getCurrenciesByBilling($billing_id);
            echo Json::encode(['output' => $out, 'selected' => '']);
            Yii::$app->end();
        }
        echo Json::encode(['output' => null, 'selected' => '']);
    }

    public function actionRate()
    {
        $from = Yii::$app->request->post('from');
        $to   = Yii::$app->request->post('to');

        if ($from && $to) {
            $out = Rate::getRateByCurrencies($from, $to);
            echo Json::encode(['result' => $out]);
            Yii::$app->end();
        }
        echo Json::encode(['result' => null]);
    }
}
