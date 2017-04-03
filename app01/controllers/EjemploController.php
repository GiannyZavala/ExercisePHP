<?php

namespace app\controllers;

class EjemploController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['name'=>'Efrain Alejandro']);
    }

}
