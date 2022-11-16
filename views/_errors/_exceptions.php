<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: 16/11/22, 03:45 PM
 * Last Modified at: 6/30/22, 03:45 PM
 * Time: 03:45
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */

/**
 * @var $exception \Exception
 */

?>


<div class="text-center" style="min-height: 50vh; display: grid; place-items: center;">
    <div class="">
        <h1 class="display-2 fw-bolder"><?= $exception->getCode() ?></h1>
        <p class="fs-3"> <?= $exception->getMessage() ?> </p>
    </div>
</div>