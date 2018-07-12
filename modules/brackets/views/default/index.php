<div class="country-form">

    <?php use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Validate', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
