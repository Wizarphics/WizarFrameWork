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


?>
<div class="container py-5">
    <h1>Contact Form</h1>
    <form class="row g-3" action="" method="post">
        <div class="col-md-12">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Contact Us</button>
        </div>
    </form>
</div>
