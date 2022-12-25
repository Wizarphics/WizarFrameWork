<?php

use wizarphics\wizarframework\View;
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 11:57 PM
 * Last Modified at: 6/30/22, 11:57 PM
 * Time: 11:57
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */


/**
 * @var View $this
 */
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auth :: <?= $this->title ?></title>
    <?php yieldSection('css'); ?>
    <link href="/css/style.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            width: 100%;
            background: #efefef;
        }

        #authBody {
            height: auto;
            width: 100%;
            margin: auto;
        }

        .input-pin {
            appearance: none;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: rgb(255, 36, 0);
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(255, 36, 0, .25);
        }
    </style>
    <script defer>
        const codeFields = document.querySelectorAll('input[data-name="code"]');
        const inputField = document.getElementById('pin');
        const form = document.querySelector('form');

        codeFields.forEach((codeField, index) => {
            codeField.dataset.id = index

            codeField.addEventListener('keyup', (e) => {

                if (codeField.value.length == 1) {
                    if (codeFields[codeFields.length - 1].value.length == 1) {
                        for (i = 0; i < codeFields.length; i++) {
                            prevValue = inputField.value;
                            inputField.value = prevValue + codeFields[i].value;
                        }
                    }
                    codeFields[parseInt(codeField.dataset.id) + 1].focus();
                }
            })
        })
    </script>

</head>

<body>

    <div class="container vh-100">
        <header>
            <button class="btn btn-link text-danger text-decoration-none position-fixed top-0 start-0 p-3" onclick="history.back()">
                <i class="fs-4">&lAarr;</i>
            </button>
        </header>
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-8 col-lg-5">
                <div class="w-100 text-center">
                    <?php yieldSection('pageHeading') ?>
                </div>
                <!-- Begin page content -->
                <div class="card p-5 shadow text-bg-black rounded-3 border-0" id="authBody">
                    <?php yieldSection('form') ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    // dd($_SESSION);
    if (session()->hasFlash('success')) :
        $s = flash('success');
    ?>
        <div class="toast-container p-3 top-0 end-0" id="toastPlacement">
            <div class="toast text-bg-dark">
                <div class="toast-header">
                    <img src="/images/Icon.png" class="rounded me-2" alt="..." height="30px">
                    <strong class="me-auto">WFW</strong>
                    <small><?= time_ago($s->time_set) ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= $s->message ?>
                </div>
            </div>
        </div>
    <?php elseif (session()->hasFlash('error')) :
        $s = flash('error');
    ?>
        <div class="toast-container p-3 top-0 end-0" id="toastPlacement">
            <div class="toast text-bg-danger">
                <div class="toast-header">
                    <img src="/images/Icon.png" class="rounded me-2" alt="..." height="30px">
                    <strong class="me-auto">WFW</strong>
                    <small><?= time_ago($s->time_set) ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?= $s->message ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script src="/js/app.min.js"></script>
    <script>
        const option = {
            autohide: true,
            delay: 50000,
        };
        const toastElList = document.querySelectorAll('.toast')
        const toastList = [...toastElList].map(
            toastEl => {
                const Toast = new bootstrap.Toast(toastEl, option)
                Toast.show()
            }
        )
    </script>
</body>

</html>