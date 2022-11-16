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

use wizarphics\wizarframework\Application;
use wizarphics\wizarframework\View;

/**
 * @var View $this
 */

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title ?></title>
    <link href="/css/app.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header class="pb-5">
        <!-- Fixed navbar -->
        <nav class=" navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">WizarFrameWork</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                    <?php if (Application::isGuest()) : ?>
                        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        </ul>
                    <?php else : ?>
                        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/profile"><?= Application::$app->user->getDisplayName() ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <div class="container py-5">
        <?php

        if (Application::$app->session->getFlash('success')) : ?>
            <div class="alert alert-success">
                <?= Application::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>
        {{content}}
    </div>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
    <script src="/js/app.min.js"></script>
</body>

</html>