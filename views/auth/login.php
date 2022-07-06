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
?>
<div class="container py-5">
    <h1>Login</h1>
    <?php $form = app\core\form\Form::begin('', 'post') ?>
    <?= $form->field($model, 'email')->emailField() ?>
    <?= $form->field($model, 'password')->passwordField() ?>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?= \app\core\form\Form::end() ?>
</div>


