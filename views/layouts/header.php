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


?>
<header class="pb-5">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/Icon.png" alt="WizarFrameWork" height="30px">
                <small style="color: #f00;" class="ms-2 fw-bolder">AskPHP</small>
            </a>
            <button class="btn btn-link navbar-toggler border-0">
                <i class="bi bi-moon"></i>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="navbar-brand" href="/">
                        <img src="/images/Icon.png" alt="WizarFrameWork" height="30px">
                        <small style="color: #f00;" class="ms-2 fw-bolder">WFW</small>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav m-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/news">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/documentation">Documentation</a>
                        </li>
                    </ul>
                    <?php if (auth()->isGuest()) : ?>
                        <ul class="navbar-nav mb-2 mb-md-0 gap-3">
                            <button class="btn btn-link border-0 d-none d-md-block">
                                <i class="bi bi-moon"></i>
                            </button>
                            <a class="btn btn-danger" href="/auth/register">Register</a>
                            <a class="btn btn-outline-danger" href="/auth/login">Login</a>
                        </ul>
                    <?php else : ?>
                        <ul class="navbar-nav mb-2 mb-md-0 gap-3">
                            <button class="btn btn-link border-0 d-none d-md-block">
                                <i class="bi bi-moon"></i>
                            </button>
                            <li class="nav-item">
                                <a class="text-danger nav-link" href="/profile"><?= auth()->user()->firstname ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="btn-danger btn" href="/auth/logout">Logout</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>