<?php

use yii\helpers\Html;
use yii\grid\GridView;


use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Utilizadores;
use app\models\ReferenciasDreams;

use common\models\User;
use dektrium\user\models\Profile;
use kartik\widgets\DepDrop;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferenciasDreamsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//seleciona todos os utilizadores da sua provincia
$users=ReferenciasDreams::find()->asArray()->all();
$ids = ArrayHelper::getColumn($users, 'criado_por');

$this->title = Yii::t('app', 'Referências e Contra-Referências');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referencias-dreams-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




    <table width="100%"   class="table table-bordered  table-condensed">
      <tr>
        <td   bgcolor="#261657" bgcolor="" align="center"><font color="#fff" size="+1"><b>

          <span class="fa fa-exchange" aria-hidden="true"></span> Lista de Referências e Contra-Referências
            </b></font></td>
        </tr>
      <tr>
        <td   bgcolor="#808080" align="center">
          <font color="#fff" size="+1"><b>
          </b></font>    </td>
        </tr>
      </table>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'criado_em',
	['attribute'=> 'criado_em',
'format' => 'html',
 'value' => function ($model) {
	
return date($model->criado_em);
},
],		
			
			
            'nota_referencia',
        /*    [
'attribute' => 'beneficiario_id',
'format'=>'raw',
'value' => $model->beneficiario->distrito['cod_distrito'].'/'.$model->beneficiario['member_id'],
],*/

['attribute'=> 'beneficiario_id',
'format' => 'html',
'label'=>'Código do Beneficiário',
 'value' => function ($model) {
if(isset($model->beneficiario->distrito['cod_distrito'])&&$model->beneficiario->distrito['cod_distrito']>0) {
return  $model->beneficiario_id>0 ?  '<font color="#cd2660">'.$model->beneficiario->distrito['cod_distrito'].'/'.$model->beneficiario['member_id'].'</font>': '-';
}//end if else 
{return '-'.'/'.$model->beneficiario['member_id'];}
},
],

          //  'name',
            //'projecto',
			 [
            'attribute'=>'referido_por',
            'format' => 'html',
            'value' => function ($model) {
           return  $model->beneficiario_id>0 ?  '<font color="#cd2660"><b>'.$model->nreferente['name'].'</b></font>': "-";
           },
            'filter'=>ArrayHelper::map(
              Profile::find()
            ->where(['IN','user_id',$ids])
            ->andWhere(['<>','name',''])
            ->orderBy('name ASC')
            ->all(), 'user_id', 'name'
        ),
            ],

[
          //  'attribute'=>'referido_por',
            'format' => 'html',
		'label'=>'Contacto',
            'value' => function ($model) {
           return  $model->beneficiario_id>0 ?  '<font color="#cd2660"><b>'.$model->referente['phone_number'].'</b></font>': "-";
           },
            ],

             ['attribute'=> 'notificar_ao',
             'format' => 'html',
          //   'label'=>'Código do Beneficiário',
              'value' => function ($model) {
             return  $model->beneficiario_id>0 ?  '<font color="#cd2660"><b>'.$model->nreceptor['name'].'</b></font>': "-";
             },
             ],
			
			
			
           //  'description',
            
			['attribute'=> 'status',
             'format' => 'html',
          //   'label'=>'Estado',
              'value' => function ($model) {
             return  $model->status==1 ?  '<font color="green"><b>Activo</b></font>': '<font color="red">Inactivo</font>';
             },
             ],

            // 'criado_por',
            // 'actualizado_por',
            // 'criado_em',
            // 'actualizado_em',
            // 'user_location',
            // 'user_location2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Referencias Dreams'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
