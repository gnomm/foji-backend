<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/**@var yii\widgets\ActiveForm $form; */
/* @var $model \common\models\Photo */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Upload Photo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-upload">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Выберите фото, пожалуйста.
    </p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'image')->fileInput() ?>

            <?= $form->field($model, 'active_photo')->textInput() ?>

            <?= $form->field($model, 'main_photo')->textInput() ?>

            <?= $form->field($model, 'created_at')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
