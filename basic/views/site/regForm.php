<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<p>Enter yuor name and age<b>
<?php $f = ActiveForm::begin(); ?>

	<?=$f->field($form, 'name')?>
	<?=$f->field($form, 'age')?>
	<?= Html::submitButton('OK'); ?>

<?php ActiveForm::end(); ?>