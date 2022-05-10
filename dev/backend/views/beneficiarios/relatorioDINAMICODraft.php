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
			<div class="panel-heading"><i class="fa fa-dashboard  text-primary"></i> <strong> Layering de Beneficiarios Dreams Desagregados por Tempo Registo e Idade: </strong></div>
			<div class="panel-body">

				<div class="row">

					<div class="col-lg-2"></div>

					<div class="col-lg-2">

						<?php

						$form = ActiveForm::begin();

						echo $form->field($model, 'user_location', [
							'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
							'options' => ['class' => 'input-group drp-container']
						])->widget(DateRangePicker::classname(), [
							'useWithAddon' => true,
							'pluginOptions' => [
								'language' => 'pt',
								'singleDatePicker' => true,
								'hideInput' => true,
								'showDropdowns' => true,
								'autoclose' => true,
								'minYear' => 2017,
								'locale' => ['format' => 'DD/MM/YYYY'],
							]
						]);
						?>
					</div>

					<div class="col-lg-2">
						<?php
						echo $form->field($model, 'user_location2', [
							'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
							'options' => ['class' => 'input-group drp-container']
						])->widget(DateRangePicker::classname(), [
							'useWithAddon' => true,
							'pluginOptions' => [
								'language' => 'pt',
								'singleDatePicker' => true,
								'hideInput' => true,
								'showDropdowns' => true,
								'autoclose' => true,
								'minYear' => 2017,
								'locale' => ['format' => 'DD/MM/YYYY'],
							]
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
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<!-- <h3>116.210</h3> -->
                              	<h3>147.527</h3>
                              
                              
								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa fa-group"></i>
							</div>
							<a class="small-box-footer">Adolescentes Jovens Activos </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<!-- <h3>83.503</h3> -->
                              	<h3>123.687</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa  fa-female"></i>
							</div>
							<a class="small-box-footer">Adolescentes e Jovens do sexo feminino </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<!-- <h3>61.850</h3> -->
                              	<h3>121.590</h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a class="small-box-footer">Beneficiarias </a>
						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->
				<div class="row" style="margin-top:4%;">
					<div class="col-lg-12">

						<button class="btn btn-primary btn-block  mb1 black bg-darken-1" style="padding-left:5%;text-align:left;"><b>Relatorio Distrital | Provincia - Distrito</b></button>

					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->

				<div class="row" style="padding-top:5%;">
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<!-- <h3>116.210</h3> -->
								<h3> - </h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa fa-group"></i>
							</div>
							<a class="small-box-footer">Adolescentes Jovens Activos </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<!-- <h3>83.503</h3> -->
								<h3> - </h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="fa  fa-female"></i>
							</div>
							<a class="small-box-footer">Adolescentes e Jovens do sexo feminino </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3> - </h3>

								<p>User Registrations</p>
							</div>
							<div class="icon">
								<i class="fa  fa-male"></i>
							</div>
							<a class="small-box-footer">Adolescentes e Jovens do sexo masculino </a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<!-- <h3>61.850</h3> -->
								<h3> - </h3>

								<p>Total</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a class="small-box-footer">Beneficiarias </a>
						</div>
					</div>
					<!-- ./col -->
				</div>
				<!-- /.row -->

				<!-- Tabela que responde aos pararantro -->
				<table width="100%" class="table table-dashed">


					<tr>
						<td colspan="5" bgcolor="#FFFFFF" style="margin-top:2%;"><b>Numerador</b></td>
					</tr>

					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>

					<tr>
						<td width="706" colspan="5" bgcolor="#CD5C5C"><b>Número de Beneficiários DREAMS que receberam TODO pacote primário de serviços E pelos um serviço adicional do pacote secundário </b> </td>
					</tr>
					<tr>
						<td width="174" bgcolor="#FFE4E1">Tempo de registo como beneficiário DREAMS </td>
						<td bgcolor="#FFE4E1">10--14</td>
						<td bgcolor="#FFE4E1">15-19</td>
						<td bgcolor="#FFE4E1">20-24</td>
						<td bgcolor="#FFE4E1">25-29</td>
					</tr>
					<tr>
						<td bgcolor="#CD9B9B">0-6 meses </td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "46";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "1";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFE4E1">7-12 meses </td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#CD9B9B">13-24 meses </td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#CD9B9B">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFE4E1">25 meses ou +</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFE4E1">
							<?php
							echo "0";
							?>
						</td>
					</tr>

					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>

					<tr>
						<td width="706" colspan="5" bgcolor="#F4A460"><b>Número de Beneficiários DREAMS que receberam TODO pacote primário de serviços mas não receberam nenhum serviço além do pacote primário
							</b> </td>
					</tr>
					<tr>
						<td width="174" bgcolor="#FAEBD7">Tempo de registo como beneficiário DREAMS </td>
						<td bgcolor="#FAEBD7">10--14</td>
						<td bgcolor="#FAEBD7">15-19</td>
						<td bgcolor="#FAEBD7">20-24</td>
						<td bgcolor="#FAEBD7">25-29</td>
					</tr>
					<tr>
						<td bgcolor="#FFDEAD">0-6 meses </td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "5";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "1";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FAEBD7">7-12 meses </td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FFDEAD">13-24 meses </td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FFDEAD">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#FAEBD7">25 meses ou +</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#FAEBD7">
							<?php
							echo "0";
							?>
						</td>
					</tr>

					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>


					<tr>
						<td colspan="5" bgcolor="#32CD32"><b>Número de Beneficiários DREAMS que completaram pelo menos um serviço DREAMS mais não completaram o pacote primário de serviços </b></td>
					</tr>
					<tr>
						<td width="174" bgcolor="#F0FFF0">Tempo de registo como beneficiário DREAMS </td>
						<td bgcolor="#F0FFF0">10--14</td>
						<td bgcolor="#F0FFF0">15-19</td>
						<td bgcolor="#F0FFF0">20-24</td>
						<td bgcolor="#F0FFF0">25-29</td>
					</tr>
					<tr>
						<td bgcolor="#98FB98">0-6 meses </td>
						<td bgcolor="#98FB98">
							<?php
							echo "1164";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "505";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "206";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "2";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#F0FFF0">7-12 meses </td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "13";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "3";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#98FB98">13-24 meses </td>
						<td bgcolor="#98FB98">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#98FB98">
							<?php
							echo "0";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#F0FFF0">25 meses ou +</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
						<td bgcolor="#F0FFF0">
							<?php
							echo "0";
							?>
						</td>
					</tr>


					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>

					<tr>
						<td colspan="5" bgcolor="#FFFFFF"><b>Denominador</b></td>
					</tr>

					<tr>
						<td colspan="5" height="40" bgcolor="#FFFFFF"><b> </b></td>
					</tr>

					<tr>
						<td width="706" colspan="5" bgcolor="#1874CD"><b>Número de Beneficiários DREAMS que completaram pelo menos um serviço DREAMS</b> </td>
					</tr>
					<tr>
						<td width="174" bgcolor="#CAE1FF">Tempo de registo como beneficiário DREAMS </td>
						<td bgcolor="#CAE1FF">10--14</td>
						<td bgcolor="#CAE1FF">15-19</td>
						<td bgcolor="#CAE1FF">20-24</td>
						<td bgcolor="#CAE1FF">25-29</td>
					</tr>
					<tr>
						<td bgcolor="#6495ED">0-6 meses </td>
						<td bgcolor="#6495ED">
							<?php
							echo "1215";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "507";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "206";
							?>
						</td>
						<td bgcolor="#6495ED">
							<?php
							echo "2";
							?>
						</td>
					</tr>
					<tr>
						<td bgcolor="#CAE1FF">7-12 meses </td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "13";
							?>
						</td>
						<td bgcolor="#CAE1FF">
							<?php
							echo "3";
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
						<td bgcolor="#6495ED">13-24 meses </td>
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
						<td bgcolor="#CAE1FF">25 meses ou +</td>
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

				</table>
			</div>


		</div>

	</div>
</div>

</div>