<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiciodescuentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Serviciodescuentos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="serviciodescuento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Serviciodescuento'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serdes_id',
            'serdes_fkcat_descuento',
            'serdes_fkcitaservicio',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Serviciodescuento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'serdes_id' => $model->serdes_id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
