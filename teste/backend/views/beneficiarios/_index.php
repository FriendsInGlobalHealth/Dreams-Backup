<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\ComiteZonal;
use app\models\ComiteDistrital;
use kartik\select2\Select2;
use app\models\ComiteLocalidades;
use app\models\ComiteCirculos;
use app\models\ComiteCelulas;
use app\models\Us;
use app\models\ServicosBeneficiados;
use yii\widgets\Pjax;


use kartik\grid\EditableColumn;
use app\models\ServicosDream;
use app\models\Utilizadores;

use app\models\Beneficiarios;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BeneficiariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Beneficiários DREAMS';
$this->params['breadcrumbs'][] = $this->title;
//echo Yii::$app->user->identity->IsUserAdmin;


  //contabilizar o numero de servicos Core por Beneficiario
/*  function core($k){

  $cors = ServicosDream::find()->where(['=','core_service',1])->distinct()->all();
  $coreServicos=0;
  foreach($cors as $cor) {
  	$coreServicos = $coreServicos+ServicosBeneficiados::find()
     ->where(['=','beneficiario_id',intval($k)])
     ->andWhere(['=', 'servico_id', intval($cor->id)])
     ->andWhere(['=', 'status', 1])
     ->select('servico_id')->distinct()
     ->count();
  }
  return $coreServicos;
}*/


$tcliservicos= ServicosDream::find()->where(['servico_id'=>1])
->andWhere(['criado_por'=> Yii::$app->user->identity->id])->andWhere(['=', 'status', 1])->asArray()->all();

$ids=ArrayHelper::getColumn($tcliservicos,'beneficiario_id');
$total = Beneficiarios::find()->where(['NOT IN','member_id',$ids])->andWhere(['=', 'emp_status', 1])->count();
?>


<div class="beneficiarios-index">

    <h2 align="center">
 <?= Html::img('@web/img/users/bandeira.jpg',['class' => 'img-default','width' => '75px','alt' => 'DREAMS']) ?>   <br>

     <br>Lista de <?= Html::encode($this->title) ?>


    </h2>
    <?php    $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


<?php 
if($total>0) {
?>
<div class="row" style="animation:blink 700ms infinite alternate;">
<span class="label label-danger" style="display:block;width:100%;animation:blink 700ms infinite alternate;">

<h4><p> <b> ALERTA!</b>&nbsp;</p> <p> A sua conta tem <a href="#" class="btn btn-warning"> <?= $total;   ?> </a> Beneficiarios cadastrados sem Servi&ccedil;os registados. Por favor regularize todos os cadastros de Beneficiarios com servi&ccedil;os


</span>
</div>

<?php } else {} ?>
<?php
Pjax::begin(['enablePushState'=>false]); ?>
<?php
    // Generate a bootstrap responsive striped table with row highlighted on hover
    echo GridView::widget([
        'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,

    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //  'id',
       // 'emp_number',

       [
                               'class' => 'kartik\grid\ExpandRowColumn',
                               'expandAllTitle' => 'Expand all',
                               'collapseTitle' => 'Collapse all',
                               'expandIcon'=>'<span class="glyphicon glyphicon-expand"></span>',
                               'value' => function ($model, $key, $index, $column) {
                                       return GridView::ROW_COLLAPSED;
                               },
                               'detail'=>function ($model, $key, $index, $column) {
                                 return Yii::$app->controller->renderPartial('_expand.php', ['model'=>$model]);
                               },

                   'detailOptions'=>[
                       'class'=> 'kv-state-enable',
                   ],
                       ],

                [
       'attribute'=> 'member_id',
    'format' => 'html',
       'label'=>'Código do Beneficiário',
        'value' => function ($model) {
    return  $model->member_id>0 ?  '<font color="#cd2660"><b>'.$model->distrito['cod_distrito'].'/'.$model->member_id.'</b></font>': "-";
  },
    ],

['attribute' => 'emp_firstname',
  'label'=>'Nome do Beneficiário',
  'format' => 'raw',
  'value' => function ($model) {
    return  Yii::$app->user->identity->role==20 ?  $model->emp_firstname.' '.$model->emp_middle_name.' '.$model->emp_lastname: "<font color=#261657><b>DREAMS</b></font><span class='label label-success'><font size=+1>".intval($model->member_id)."</font></span>";
  },
],
     [
       'attribute'=>'emp_gender',
       'format' => 'raw',
        'filter'=>array("1"=>"M","2"=>"F"),
        'value' => function ($model) {
    return  $model->emp_gender==1 ? '<i class="fa fa-male"></i><span style="display:none !important">M</span>': '<i class="fa fa-female"></i><span style="display:none !important">F</span>';
  },
    ],

    [
       'attribute'=>'ponto_entrada',
   'format' => 'raw',
   'label'=>'PE',
        'filter'=>array("1"=>"US","2"=>"CM","3"=>"ES"),
        'value' => function ($model) {
   //	return $model->ponto_entrada;
      if($model->ponto_entrada==1) {return "US";} elseif($model->ponto_entrada==2){return "CM";} else {return "ES";}
   },
    ],
  /*   [
        'attribute'=>'us_id',
        'value'=>'us.name',
        'filter'=> ArrayHelper::map(Us::find()->orderBy('name ASC')->asArray()->all(), 'id', 'name'),

      ],*/


     [
       'attribute'=>'emp_birthday',
       'label'=>'idade',
       'filter'=>array(
         ""=>"Todos",
         "2008"=>"10",
         "2007"=>"11",
         "2006"=>"12",
         "2005"=>"13",
         "2004"=>"14",
         "2003"=>"15",
         "2002"=>"16",
         "2001"=>"17",
         "2000"=>"18",
         "1999"=>"19",
         "1998"=>"20",
         "1997"=>"21",
         "1996"=>"22",
         "1995"=>"23",
         "1994"=>"24",
         "1993"=>"25",
         "1993"=>"26",

       ),
        'value' => function ($model) {
if(!$model->emp_birthday==NULL) {
    $newDate = substr(date($model->emp_birthday, strtotime($model->emp_birthday)),-4);

   return  date("Y")-$newDate." anos";} else {
return  $model->idade_anos." anos";
}
  },
    ],

[
  'label'=>'#Interv',
  'format' => 'raw',
  'value' => function ($model) {
  $conta = ServicosBeneficiados::find()->where(['beneficiario_id' => $model->id])->distinct()->count();
if($conta==0){return  '<span class="label label-danger"> <i class="fa fa-medkit"></i>&nbsp;['.$conta.']</span>';}
  elseif ($conta<5) {return  '<span class="label label-warning"> <i class="fa fa-medkit"></i>&nbsp;['.$conta.']</span>';}
  elseif ($conta<10) {return  '<span class="label label-info"> <i class="fa fa-medkit"></i>&nbsp;['.$conta.']</span>';}
  else {
    return  '<span class="label label-success"> <i class="fa fa-medkit"></i>&nbsp;['.$conta.']</span>';}


  },
'filter'=>array("0"=>"0","5"=>"5"),
],

[
  'label'=>'#Prim',
  'format' => 'raw',
  'value' => function ($model) {
  $conta = ServicosBeneficiados::find()->where(['beneficiario_id' => $model->id])->distinct()->count();
if($conta==0){return  '<span class="label label-danger"> <i class="fa fa-medkit"></i>&nbsp;['.core( $model->id).']</span>';}
  elseif ($conta<3) {return  '<span class="label label-warning"> <i class="fa fa-medkit"></i>&nbsp;['.core( $model->id).']</span>';}
  elseif ($conta<5) {return  '<span class="label label-info"> <i class="fa fa-medkit"></i>&nbsp;['.core( $model->id).']</span>';}
  else {
    return  '<span class="label label-success"> <i class="fa fa-medkit"></i>&nbsp;['.core( $model->id).']</span>';}


  },
'filter'=>array("0"=>"0","5"=>"5"),
],
 [
            'attribute'=>'criado_por',
				 'format'=>'raw',
            'value'=> function ($model) { return Yii::$app->user->identity->role==20 ? '<small>'.$model->user['username'].'</small>':'<small>'.$model->user['username'].'</small>'; },
            'filter'=> ArrayHelper::map(Utilizadores::find()->where(['>','provin_code',0])->distinct()->orderBy('username ASC')->asArray()->all(), 'id', 'username'),
				 
          ],
		 [
            'attribute'=>'actualizado_por',
			 'label'=>'#Update',
			'format'=>'raw',
            'value'=> function ($model) { return Yii::$app->user->identity->role==20 ? '<small>'.$model->update['username'].'</small>':'<small>'.$model->update['username'].'</small>'; },
            'filter'=> ArrayHelper::map(Utilizadores::find()->where(['>','provin_code',0])->distinct()->orderBy('username ASC')->asArray()->all(), 'id', 'username'),
				 
          ],

/*
[
            'attribute' => 'criado_em',
'label'=>'Data Criação',
'value' => function ($model) {
return  substr($model->criado_em,0,10); 
},
            'filter' => \yii\jui\DatePicker::widget(['language' => 'us', 'dateFormat' => 'Y-m-d']),
          
 // 'format' => 'raw',
        ],
*/
        ['class' => 'yii\grid\ActionColumn',
        'template'=>'{view} {update}',
                        'buttons'=>[
                          'create' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                    'title' => Yii::t('yii', 'Create'),
                            ]);

                          }
                      ]/**/],
    ],
'pjax'=>Yii::$app->user->identity->role==20 ? true:false, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar'=> [
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Add Book', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
        ],
        '{export}',
        '{toggleData}',
    ],
    // parameters from the demo form

  //  'showPageSummary'=>$pageSummary,
    'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
      //  'heading'=>$heading,
    ],
    'persistResize'=>true,
    //'exportConfig'=>$exportConfig,
      //  'responsive'=>true,
        'hover'=>true
    ]);


?>
<?php Pjax::end(); ?>



   <p>
     <?= Html::a('<i class="glyphicon glyphicon-home"></i>', ['site/index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> Novo Beneficiário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
</div>

</div>

<script type="text/javascript">
window.onload = function () {

$(document).ready(function() {});

$.getScript('http://www.chartjs.org/assets/Chart.js',function(){

var data = [
<?php
$tcliservicos= ServicosDream::find()->where(['servico_id'=>1])->andWhere(['=', 'status', 1])->count();
$cliservicos= ServicosDream::find()->where(['servico_id'=>1])->andWhere(['=', 'status', 1])->all();
$cliServices=0;
foreach ($cliservicos as $core) {

  $cliServices = $cliServices+ServicosBeneficiados::find()
//   ->where(['=','beneficiario_id',$model->member_id])
   ->andWhere(['=', 'servico_id', $core->id])
   ->andWhere(['=', 'status', 1])
   ->select('servico_id')->distinct()
   ->count();

?>

{
   value: <?= $cliServices?>,
   color: "#F7464A"
}, {
   value: 50,
   color: "#E2EAE9"
}, {
   value: 100,
   color: "#D4CCC5"
}, {
   value: 40,
   color: "#949FB1"
}, {
   value: 120,
   color: "#4D5360"
}
<?php } ?>

]

var options = {
   animation: false
};

//Get the context of the canvas element we want to select
var c = $('#myChart');
var ct = c.get(0).getContext('2d');
var ctx = document.getElementById("myChart").getContext("2d");
/*************************************************************************/
myNewChart = new Chart(ct).Doughnut(data, options);

})



}
</script>
