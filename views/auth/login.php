<?php
use app\models\ContactModel;
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 11:40 PM
 * Last Modified at: 6/30/22, 11:40 PM
 * Time: 11:40
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */
/** @var $model ContactModel */

use wizarphics\wizarframework\View;

/**
 * @var View $this
 */
$this->title = 'Login';

?>
<div class="container py-5">
    <h1>Login</h1>
    <?php $form = wizarphics\wizarframework\form\Form::begin('', 'post') ?>
    <?= $form->field($model, 'email')->emailField() ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?= \wizarphics\wizarframework\form\Form::end() ?>
</div>


