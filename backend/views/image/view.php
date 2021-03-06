<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\Util;
/* @var $this yii\web\View */
/* @var $model common\models\Image */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tourId',
              [
                'attribute'=>'name',
                'value'=>  Util::getUrlImage($model->name),
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ]) ?>

</div>
