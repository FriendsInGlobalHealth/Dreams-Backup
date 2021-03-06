<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


use app\models\ReferenciasServicosReferidos;
use app\models\ServicosBeneficiados;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ReferenciasDreams */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Referencias Dreams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referencias-dreams-view">

<?php  if(Yii::$app->user->identity->id==$model->criado_por||Yii::$app->user->identity->role>10) { ?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-info">
    <div class="panel-heading">
<b><i class="fa fa-check-circle" aria-hidden="true"></i> <?= $model->nota_referencia; ?>
 | <?= $model->beneficiario->distrito['cod_distrito'].'/'.$model->beneficiario['member_id'];
?>
<?=
Yii::$app->user->identity->role==20 ?  " | ".$model->beneficiario['emp_firstname'].' '.$model->beneficiario['emp_middle_name'].' '.$model->beneficiario['emp_lastname']: " "


  ?>
 </b>
  </div>
    <div class="panel-body">

      <table class="table table-condensed">
        <thead>
          <th>Data Registo</th>
          <th>Referente</th>
          <th>Contacto</th>
          <th>N<sup>o</sup> do Livro</th>
          <th>Organiza&ccedil;&atilde;o</th>
          <th>Cod Refer&ecirc;ncias</th>
          <th>Tipo Serviço</th>
          <th>Status</th>
        </thead>

        <tbody>

          <tr>
            <td><?= $model->criado_em; ?> </td>
            <td><?= $model->nreferente['name']; ?> </td>
            <td><?= $model->referente['phone_number']; ?></td>
            <td><?= $model->num_livro; ?></td>
            <td><?= $model->projecto; ?></td>
            <td><?= $model->ref_livro; ?></td>
            <td><?= $model->tservico['name']; ?></td>
            <td><?= $model->status==0 ?  '<font color="green"><b>Referido</b></font>': '<font color="red">Pendente</font>'; ?></td>
          </tr>
        </tbody>
      </table>
      <?php  $model->beneficiario->distrito['cod_distrito'].'/'.$model->beneficiario['member_id']; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8">
    <div class="panel panel-primary">
    <div class="panel-heading">
<b><i class="fa fa-envelope" aria-hidden="true"></i> Intervensões Solicitadas

  </b>
  </div>
    <div class="panel-body">

      <table class="table table-condensed">
        <thead>
          <th>#</th>
          <th>Cod Refer&ecirc;ncia</th>
          <th>Intervens&atilde;o</th>
          <th>Status</th>
          <?php if(Yii::$app->user->identity->id==$model->criado_por) {} else{?>    <th>Atender</th> <?php } ?>
        </thead>

        <tbody>

<?php
$query = ReferenciasServicosReferidos::find()
                  ->where(['=','referencia_id',$model->id])
                  ->orderBy('id ASC')
                  ->all();
                  $i=0;
foreach($query as $serv) {  $i++;  ?>
          <tr>
            <td> <?= $i; ?> </td>
            <td><?= $model->ref_livro; ?> </td>
            <td> <?= $serv->servico['name']; ?></td>
            <td>
<?php  $conta= ServicosBeneficiados::find()
                                  ->where(['=','beneficiario_id',$model->beneficiario_id])
                                  ->andWhere(['servico_id'=>$serv->servico_id])
                                  ->andWhere(['status' => 1])
                                  ->count();
if($conta>0) {?>
              <i class="fa fa-check-square-o" style="color:green;" aria-hidden="true"></i><sup>
            <?= $conta; ?>
              </sup>
<?php } else { ?>
              <i class="fa fa-times" style="color:red;" aria-hidden="true"></i>
<?php } ?>
            </td>
<?php if(Yii::$app->user->identity->id==$model->criado_por) {} else{?>
            <td>
            <a href="<?= Url::toRoute('beneficiarios/'.$model->beneficiario_id); ?>">  <i class="fa fa-edit" style="color:#faa001;" aria-hidden="true"></i>
            </a>
            </td>
<?php } ?>

          </tr>
<?php } ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
<div class="row" align="right">
<?php if(Yii::$app->user->identity->id==$model->criado_por) {?>

<?= Html::a('<i class="fa fa-plus fa-danger"> </i> Intervensão', ['referencias-servicos-referidos/create.dreams?cr='.$model->ref_livro.'&m='.$model->beneficiario['member_id'].'&r='.$model->id.'&ts='.$model->servico_id.'&nr='.$model->nota_referencia.'&'], ['data-toggle'=>'modal', 'data-target'=>'#referModal', 'class' => 'label label-primary']) ?>&nbsp;
  <?php } else {} ?>
</div>
      </div>
    </div>
  </div>
</div>

    <p>
        <?= Html::a(Yii::t('app', 'Salvar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'Apagar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


<?php  } else { ?>
  <div class="row">
      <div class="alert alert-warning">
  <strong>Aten&ccedil;&atilde;o!</strong>
  A sua conta de Utilizador n&atilde;o tem acesso a esta refer&ecirc;ncia.
  <?= Html::a('<i class="glyphicon glyphicon-backward"></i> Voltar', ['referencias-dreams/index'], ['class' => 'btn btn-success']) ?>
  </div>

  </div>

<?php } ?>

</div>


<!-- Modal -->
<div class="modal modal-lg fade" id="referModal" tabindex="-1" role="dialog" aria-labelledby="referModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="referModalTitle">Solicitar Intervens&atilde;o para Benefici&aacute;rio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php  ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Salvars</button>
      </div>
    </div>
  </div>
</div>
