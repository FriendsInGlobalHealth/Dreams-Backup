<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use dektrium\user\widgets\Connect;
use kartik\form\ActiveForm;
/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

//$this->title = Yii::t('user', ' ADMINISTRAÇÃO DO SISTEMA');
$this->title = Yii::t('user', ' BEM-VINDO A PLATAFORMA DREAMS');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-user"></i><b><?= Html::encode($this->title) ?></b></h3>
            </div>
            <div class="panel-body">
				
				<p align="center">
<i class="glyphicon glyphicon-warning-sign"></i><b> ATEN&Ccedil;&Atilde;O!</b>
  <br>

<small> O Acesso a esta Plataforma &eacute; restrito ao pessoal com uma cred&ecirc;ncial v&aacute;lida e activa. <br> <i> Para mais informa&ccedil;&otilde;es, contacte o Administrador do Sistema </small>


<a href="http://dreams.co.mz/teste/backend/web/index.php/site/login.dreams" class="btn btn-info  btn-lg" role="button">Entrar no Sistema <i class="glyphicon glyphicon-menu-right"></i></a>
</p>
          <!--      <?php $form = ActiveForm::begin([
                    'id'                     => 'login-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnChange'       => false,
                ]) ?>

                <?= $form->field($model, 'login', [  'feedbackIcon' => [
        'default' => 'user',
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

                <?= $form->field($model, 'password', [  'feedbackIcon' => [
        'default' => 'lock',
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],'inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ' (' . Html::a(Yii::t('user', 'Esqueceu a password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')') ?>

                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>

                <?php ActiveForm::end(); ?>

-->
            </div>
        </div>
  <!--      <?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Ainda não recebeu a menssagem de confirmação?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>
        <?= Connect::widget([  'baseAuthUrl' => ['/user/security/auth']
        ]) ?>
-->
    </div>
</div>
