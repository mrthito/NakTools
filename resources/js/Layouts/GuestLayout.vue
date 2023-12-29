<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="error-page1 bg-primary">
        <div class="square-box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div
                    class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
                    <div class="card-sigin">
                        <div class="main-card-signin d-md-flex">
                            <div class="wd-100p">
                                <div class="d-flex mb-4">
                                    <Link :href="route('home')">
                                    <img src="../../assets/images/brand-logos/toggle-logo.png" class="sign-favicon ht-40"
                                        alt="Nak">
                                    </Link>
                                </div>
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
