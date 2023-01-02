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


/**
 * @var \wizarphics\wizarframework\View $this
 */
$this->title = 'Contact Form';

?>
<div class="container py-5">
    <h1>Contact Form</h1>
    <?php form_begin('', 'post') ?>
    <?= textField($model, 'name') ?>
    <?= textField($model, 'subject') ?>
    <?= emailField($model, 'email') ?>
    <?= TextAreaField($model, 'body') ?>
    <?= submit_button($model, 'Contact Us') ?>
    <?= form_close() ?>
</div>