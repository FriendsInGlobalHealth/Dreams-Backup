<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\widgets\DatePicker;
use kartik\form\ActiveForm;
use common\models\User;
use app\models\Educacao;
use app\models\TituloProfissional;
use app\models\ComiteProvincial;
use app\models\ComiteDistrital;
use app\models\ComiteNacionalidade;
use app\models\ComiteCidades;
use app\models\ComiteZonal;
use app\models\ComiteCirculos;
use app\models\ComiteCelulas;
use app\models\ComiteLocalidades;
use app\models\TipoCargos;
use app\models\JobCategory;
use app\models\ServicosBeneficiados;
use app\models\ReferenciasDreams;
use app\models\Beneficiarios;
use app\models\FaixaEtaria;
use app\models\FaixaEtariaServico;
use app\models\Provincias;
use app\models\Distritos;
use kartik\select2\Select2;


use kartik\daterange\DateRangePicker;



use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Membros */

$this->title = "INDICADORES DREAMS";
$this->params['breadcrumbs'][] = ['label' => 'Beneficiários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<?php
if ($model->id == 1) {
	if (isset(Yii::$app->user->identity->role) && Yii::$app->user->identity->role == 20) {
		$firsts = Beneficiarios::find()
			->where(['=', 'emp_birthday', ''])
			->andWhere('idade_anos <> :idade_anos', [':idade_anos' => 0])
			->andWhere(['=', 'emp_status', 1])
			->all();


		$todos = Beneficiarios::find()
			->where(['=', 'emp_birthday', ''])
			->andWhere('idade_anos <> :idade_anos', [':idade_anos' => 0])
			->andWhere(['=', 'emp_status', 1])
			->count();


		echo 'Todos=' . $todos . '<br>';
		foreach ($firsts as $first) {

			echo $first->id . '-' . $first->idade_anos . '-' . $first->emp_birthday . '<br>';

			if ($first->emp_birthday > 0) {
			} else {

				$ano = substr($first->criado_em, 0, 4) - $model->idade_anos;
				$mes = substr($first->criado_em, 5, 2);
				$dia = substr($first->criado_em, 8, 2);
				$data = $mes . '/' . $dia . '/' . $ano;
				// update an existing row of data
				//  $benef = Beneficiarios::find()->where('id'=$first->id);
				//echo $first->id.'ttttttt';
				$benef = Beneficiarios::find()->where(['=', 'id', $first->id])->one();
				$first->emp_birthday = $data;
				$first->save();
				$customer = Beneficiarios::findOne($first->id);
				$customer->emp_birthday = $data;
				$customer->save();
			}
		}
		$this->title = $model->emp_firstname . " " . $model->emp_middle_name . " " . $model->emp_lastname;
	} else {

		$this->title = $model->distrito['cod_distrito'] . '/' . $model->member_id;
	}
} //model id=1
?>

<?php

$todosActivos = Beneficiarios::find()
	->where(['=', 'emp_status', 1])
	->andWhere(['emp_gender' => 2])
	->andWhere(['gravida' => 1])
	->andWhere(['<', 'idade_anos', 18])
	->asArray()
	->all();

$beneficiarios = ArrayHelper::getColumn($todosActivos, 'id');


$faixaEt = FaixaEtariaServico::find()->where(['=', 'status', 1])->andWhere(['IN', 'faixa_id', [1, 4, 7]])->asArray()->all();
$faixaEtSer = ArrayHelper::getColumn($faixaEt, 'servico_id');

$Servicos = ServicosBeneficiados::find()
	->where(['=', 'status', 1])
	->andWhere(['=', 'servico_id', 9])
	->andWhere(['IN', 'beneficiario_id', $beneficiarios])
	->andWhere(['IN', 'servico_id', $faixaEtSer])
	->distinct('beneficiario_id')
	->count();
//echo $Servicos;

//foreach($faixaEt as  $faixa)
//{echo " ".$faixa['id']." ";}

?>


<?php

function periodo($data_r)
{

	$hoje = date("Y-m-d H:i:s");


	$earlier = new DateTime($hoje);
	$later = new DateTime($data_r);

	$periodo = $later->diff($earlier)->format("%a");

	return $periodo;
} ?>


<?php periodo("2019-03-01 14:12:06");

$meses = ServicosBeneficiados::find()
	->where(['=', 'status', 1])
	->andWhere(['IN', 'beneficiario_id', $beneficiarios])
	->asArray()->all();


foreach ($meses as $dias) {
	periodo($dias["criado_em"]) . "<br>";
}

?>

<h2>
	<?php
	//echo "Todos Beneficiarios ACtivos, do Sexo F, Que ja ja esteve Gravida, idade <18: <br> ".$todosActivos;
	?></h2>


<div class="membros-view">

	<div class="col-lg-12">

		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-dashboard  text-primary"></i> <strong> Layering de Dados Programaticos Desagregados por Tempo Registo e Faixa Etaria: </strong></div>
			<div class="panel-body">

				<div class="row">

					<div class="col-lg-2"></div>

					<div class="col-lg-2">

						<?php

						$form = ActiveForm::begin();
						?>
                        
                        <label class="control-label" for="beneficiarios-user_location">Periodo</label>
						<?=
							Select2::widget([
								'name' => 'user_location',
                                                                'data' => [1 => "FY19", 2 => "FY20_Q1", 3 => "FY20_Q2"],
								'value' => '', // value to initialize
								'options' => ['multiple' => false, 'placeholder' => 'Selecione o Periodo ...'],
							]);

						?>
					</div>

					<div class="col-lg-2">
                    <label class="control-label" for="beneficiarios-user_location1">Relatorio</label>
						<?=
							Select2::widget([
								'name' => 'user_location1',
								'value' => '', // value to initialize
								'data' => '',
								'options' => ['multiple' => false, 'placeholder' => 'Selecione o Report ...'],
							]);

						?>
					</div>

					<div class="col-lg-2">
						<label class="control-label" for="beneficiarios-custom10">Provincia</label>
						<?=
							Select2::widget([
								'name' => 'custom10',
								'value' => '', // value to initialize
								'data' => ArrayHelper::map(Provincias::find()->all(), 'id', 'province_name'),
								'options' => ['multiple' => false, 'placeholder' => 'Selecione a Província ...'],
							]);

						?>
					</div>

					<div class="col-lg-2">
						<label class="control-label" for="beneficiarios-district_code">Distrito</label>



						<?php

						echo Select2::widget([
							'name' => 'Beneficiario[district_code]',
							'value' => '', // value to initialize
							'data' => ArrayHelper::map(Distritos::find()->all(), 'district_code', 'district_name'),
							'options' => ['multiple' => false, 'placeholder' => 'Selecione o Distrito ...'],
						]);


						ActiveForm::end(); ?>
					</div>

					<div class="col-lg-2"></div>

				</div>

				<div class="row" style="padding-top:5%;">
					<div class="col-lg-2"></div>
					<div class="col-lg-4">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3>127.616</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa fa-group"></i>
							</div>
							<a class="small-box-footer">Raparigas  registadas na plataforma  </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4">
						<!-- small box -->
						<div class="small-box bg-blue">
							<div class="inner">
								<h3>87.428</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa fa-female"></i>
							</div>
							<a class="small-box-footer">Raparigas inscritas: Com pelos menos 1 vulnerabilidade e assinaram consentimento</a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-2"></div>
                </div>
                
				<!-- /.row -->
                <div class="row" style="padding-top:2%;">
                
					<!-- ./col -->
					<div class="col-lg-1"></div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>87.428</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a class="small-box-footer">Beneficiaria DREAMS (Raparigas vulneraveis + servico)</a>
						</div>
                    </div>
					<!-- ./col -->
					<div class="col-lg-4">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>35.547</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa fa-group"></i>
							</div>
							<a class="small-box-footer">Beneficiario DREAMS Activo</a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<h3>51.881</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa  fa-female"></i>
							</div>
							<a class="small-box-footer">Beneficiarias DREAMS Inactivas</a>
						</div>
					</div>
					
					<!-- ./col -->
				</div>
                <!-- /.row -->
                

				<!-- /.row -->
				<div class="row" style="margin-top:4%;">
					<div class="col-lg-12">

						<button class="btn btn-primary btn-block  mb1 black bg-darken-1" style="padding-left:5%;text-align:left;"><b>Relatorio Distrital | Provincia - Distrito</b></button>

					</div>
					<!-- ./col -->
				</div>

				<!-- Tabela que responde aos pararantro -->
				<table width="100%" class="table table-dashed">


					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>


					<tr>
						<td width="174" bgcolor="#1874CD" style="color:azure">Tempo de registo como beneficiário DREAMS </td>
						<td bgcolor="#1874CD" style="color:azure">10 - 14</td>
						<td bgcolor="#1874CD" style="color:azure">15 - 19</td>
						<td bgcolor="#1874CD" style="color:azure">20 - 24</td>
						<td bgcolor="#1874CD" style="color:azure">25 - 29</td>
					</tr>
					
					<tr>
						<td bgcolor="#CAE1FF">0-6 meses </td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
                    </tr>
                    
					<tr>
						<td bgcolor="#6495ED">7-12 meses </td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#CAE1FF">13-24 meses </td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "0";
							?>
						</td>
                    </tr>
                    <tr>
						<td bgcolor="#6495ED">25 meses ou + </td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "0";
							?>
						</td>
					</tr>

				</table>
			</div>


		</div>

	</div>
</div>

</div>
