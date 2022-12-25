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

<!-- ========== Start FooterSection ========== -->
<div class="container">
    <footer class="row py-3 pt-5 px-3">
        <div class="col-lg-4 mb-3 me-auto order-last order-lg-first mt-5 mt-md-0">
            <a href="" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                <img src="/images/Icon.png" alt="WizarFrameWork" height="30px">
                <small style="color: #f00;" class="ms-2 fw-bolder">AskPHP</small>
            </a>
            <p class="mb-5 small">
                AskPHP is a PHP framework with easy and elegant syntax and Has just about everything you need as PHP developer.
            </p>
            <div class="m">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/gurudemyonline/" title="Facebook">
                            <i class="bi bi-facebook text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/gurudemy_online" title="Twitter">
                            <i class="bi bi-twitter text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://instagram.com/gurudemy_online" title="Instagram">
                            <i class="bi bi-instagram text-dark"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="WhatsApp" href="https://api.whatsapp.com/send?phone=2349064485189">
                            <i class="bi bi-whatsapp text-black"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="text-muted mt-5">&#169; <?= date('Y') ?> Gurudemy. All Right Reserved</p>
        </div>

        <div class="col-4 col-lg-2 mb-3 col-md-4">
            <h5 class="fs-6">Courses</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="<?= site_url('course/digital-marketing') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">Digital Marketing</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('course/web-development') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">Web Development</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('course/product-design') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">Product (UI/UX) Design</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('course/graphics-design') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">Graphics Design</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('course/data-analysis') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">Data Analysis</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('course/general-computing') ?>" class="nav-link p-0 small fs-6 fw-light text-muted">General Computing</a>
                </li>
            </ul>
        </div>

        <div class="col-4 col-lg-2 mb-3 col-md-4">
            <h5 class="fs-6">Programmes</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?= site_url('winatechskill') ?>" class="nav-link p-0 text-muted">#WinATechSkill</a>
                </li>
                <!-- <li class="nav-item mb-2">
					<a href="" class="nav-link p-0 text-muted">Edubank</a>
				</li> -->
                <li class="nav-item mb-2">
                    <a href="<?= site_url('affiliate-program') ?>" class="nav-link p-0 text-muted">Affilliate Program</a>
                </li>
            </ul>
        </div>

        <div class="col-4 col-lg-2 mb-3 col-md-4">
            <h5 class="fs-6">More</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?= site_url('our-plans') ?>" class="nav-link p-0 text-muted">Our Plans</a>
                </li>
                <li class="nav-item mb-2 order-last">
                    <a href="<?= site_url('contact-us') ?>" class="nav-link p-0 text-muted">Contact</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= 'ig_store' ?>" class="nav-link p-0 text-muted">Store</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= 'e_consultation' ?>" class="nav-link p-0 text-muted">Consultation</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= site_url('faqs') ?>" class="nav-link p-0 text-muted">FAQs</a>
                </li>
            </ul>
        </div>
    </footer>
</div>
<!-- ========== End FooterSection ========== -->