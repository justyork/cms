<?php

namespace backend\controllers;

use common\models\FormCallback;
use Yii;
use common\models\FormOrder;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormOrderController implements the CRUD actions for FormOrder model.
 */
class FormController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['*']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['callback', 'view-callback'],
                        'roles' => ['FORM_CALLBACK'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['order', 'view-order'],
                        'roles' => ['FORM_ORDER'],
                    ],
                ]
            ]
        ];
    }

    //----------------------- Callback
    /**
     * @return string
     */
    public function actionCallback(){
        $dataProvider = new ActiveDataProvider([
            'query' => FormCallback::find(),
        ]);
        return $this->render('callback', compact('dataProvider'));
    }

    public function actionViewCallback($id)
    {
        $model = FormCallback::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('view-callback', [
                'model' => $model,
            ]);
        }
    }


    //----------------------- Order
    /**
     * @return string
     */
    public function actionOrder(){
        $dataProvider = new ActiveDataProvider([
            'query' => FormOrder::find(),
        ]);
        return $this->render('order', compact('dataProvider'));
    }

    public function actionViewOrder($id)
    {
        $model = FormOrder::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('view-order', [
                'model' => $model,
            ]);
        }
    }

}
