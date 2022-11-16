<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 8:25 PM
 * Last Modified at: 6/30/22, 8:25 PM
 * Time: 8:25
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

use wizarphics\wizarframework\form\TextAreaField;
use wizarphics\wizarframework\View;

/**
 * @var View $this
 */
$this->title = 'Contact';

?>
<div class="container py-5">
    <h1>Contact Form</h1>
    <?php $form = wizarphics\wizarframework\form\Form::begin('', 'post') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'email')->emailField() ?>
        <?= new TextAreaField($model, 'body') ?>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Contact Us</button>
        </div>
    <?= $form::end() ?>
</div>