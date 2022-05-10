
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
/* @var $this yii\web\View */
/* @var $model app\models\Membros */
if (isset(Yii::$app->user->identity->role)&&Yii::$app->user->identity->role==20) {
$this->title = $model->emp_firstname." ".$model->emp_middle_name." ".$model->emp_lastname; } else {

  $this->title = $model->distrito['cod_distrito'].'Dados Programaticos'.$model->member_id;
}
$this->params['breadcrumbs'][] = ['label' => 'Beneficiários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<p> Test </p>



 <iframe src="https://www.google.co.mz" title="W3Schools Free Online Web Tutorials"></iframe> 


<iframe src="https://www.google.com/search?q=%http://197.249.4.129:8080/pentaho/api/repos/%3Apublic%3ADLT%3ADados_Programaticos%3ADados_Programaticos.wcdf/generatedContent?userid=dreams&password=1234" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" frameborder="1" marginheight="0px" marginwidth="0px" height="100%" width="100%" allowfullscreen></iframe>


