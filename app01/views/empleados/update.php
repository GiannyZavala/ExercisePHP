<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = 'Update Empleados: ' . $model->empleado_id;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empleado_id, 'url' => ['view', 'id' => $model->empleado_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
