<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UtilizadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Utilizadores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizadores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Utilizadores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'username',
            'email:email',
            'name',
            'provin_code',
            'district_code',// 'city_code',
             'localidade_id',
             'us_id',
             'parceiro_id',
            // 'user_location2',
            // 'password_hash',
            // 'auth_key',
            // 'password_reset_token',
             'ccord_id',
             'role',
            // 'status', 
            // 'created_at',
            // 'updated_at',
            // 'confirmed_at',
            // 'blocked_at',
            // 'confirmation_token',
            // 'confirmation_sent_at',
            // 'unconfirmed_email:email',
            // 'recovery_token',
            // 'recovery_sent_at',
            // 'registered_from',
            // 'logged_in_from',
            // 'logged_in_at',
            // 'registration_ip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
