<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Tour;
use common\components\Util;
use common\models\Type;
use common\models\Address;
/* @var $this yii\web\View */
/* @var $model common\models\Tour */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tours', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-view">

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
        
      //  'types' => $model->types,
        'attributes' => [
            'id',
            'name',
            'dayTour',
            'info',
            'itinerary:ntext',
            [
                'label' => 'Types',
                'value' => Tour::getTypesName($model),
            ],
            [
                'format' => 'html',
                'attribute' => 'Adresses',
                'value' => Tour::getAddressesName($model),
            ],
            [
                'attribute'=>'image',
                'value'=>  Util::getUrlImage($model->avatar),
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],
            'created_at:date',
            'updated_at:date',
            // 'deleted_at',    
        ],
    ]) 
    ?>
   

</div>