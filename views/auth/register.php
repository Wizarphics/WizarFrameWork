<?php
use app\models\User;
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
/** @var $model User  */

use wizarphics\wizarframework\View;

/**
 * @var View $this
 */
$this->title = 'Register';

?>
<div class="container py-5">
    <h1>Register</h1>
    <?php $form = wizarphics\wizarframework\form\Form::begin('', 'post') ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'lastname') ?>
        </div>
    </div>
    <?= $form->field($model, 'email')->emailField() ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <?= $form->field($model, 'passwordConfirm')->passwordField() ?>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?= \wizarphics\wizarframework\form\Form::end() ?>
</div>


