<?php
/*
 * Copyright (c) 2022.
 * User: Fesdam
 * project: WizarFrameWork
 * Date Created: $file.created
 * 6/30/22, 8:37 PM
 * Last Modified at: 6/30/22, 8:37 PM
 * Time: 8:37
 * @author Wizarphics <Wizarphics@gmail.com>
 *
 */


/**
 * @var \wizarphics\wizarframework\View $this
 */

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff0000">
    <meta name="msapplication-TileColor" content="#ff0000">
    <meta name="theme-color" content="#ff0000">
    <title><?= $this->title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <?php yieldSection('css') ?>
    <link href="/css/style.min.css" rel="stylesheet">
    <style type="text/css">
		<?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(ERROR_PATH . DIRECTORY_SEPARATOR . 'prism.css')) ?>
    </style>
    <script type="text/javascript">
		<?= file_get_contents(ERROR_PATH . DIRECTORY_SEPARATOR . 'prism.js') ?>
	</script>
</head>

<body class="d-flex flex-column h-100">

    
    <?= $this->include('layouts/header');?>
    <!-- Begin page content -->
    <div class="">
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
        {{content}}
    </div>
    
    <?= $this->include('layouts/footer');?>
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