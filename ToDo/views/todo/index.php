<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todo List';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Create Todo', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?php Pjax::begin(['id' => 'model-grid']); ?>
 <div class="shop-index">
     <?= GridView::widget([
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
                // 'id',
                'name',
                'description:ntext',
                'duedate',
                'createdOn',
             [
                 'class' => 'yii\grid\ActionColumn',
                 'buttons' => [
                     'update' => function ($url, $model) {
                         return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                             'class' => 'pjax-update-link',
                             'title' => Yii::t('yii', 'Update'),
                         ]);
                     },
                     'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Delete',
                            'data-pjax' => '#model-grid',
                        ]);
                    }
                 ],
             ],
         ],
     ]); ?>
 </div>
<?php Pjax::end(); ?>

<!-- <div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Todo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'duedate',
            'createdOn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div> -->
