<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/inertia-vue3'
// i have shared user data from controller. Now lets use it
console.log(usePage().user)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-15"><a href="{{ route('u.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
                    </ol>
                </div>
            </div>
        </template>

        <div class="row">
            <div class="col-xxl-5 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-7 col-md-6 col-sm-12 mb-sm-0 mb-4">
                                        <div class="text-justified align-items-center">
                                            <h3 class="text-dark fw-semibold mb-2 mt-0">
                                                Hi, Welcome Back
                                                <span class="text-primary">Nick!</span>
                                            </h3>
                                            <p class="text-dark fs-14 mb-3 lh-3">
                                                You have used the 85% of free plan
                                                storage. Please upgrade your plan to get unlimited storage.
                                            </p>
                                            <button class="btn btn-primary shadow">Upgrade Now</button>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xl-3 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center justify-content-center upgrade-chart-circle">
                                        <div class="chart-circle" data-color>
                                            <div id="radialbar-basic1">

                                            </div>
                                            <div class="chart-circle-value circle-style">
                                                <div class="fs-18 fw-semibold">85%</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="card sales-card">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4">
                                        <div class="">
                                            <span class="mb-2 fs-12 fw-semibold d-block">Today Orders</span>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h4 class="fs-20 fw-semibold mb-2">5,472</h4>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">Last week<i
                                                    class="bx bx-caret-up mx-2 text-success"></i>
                                                <span class="text-success fw-semibold"> +427</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div
                                        class="circle-icon bg-primary-transparent text-center align-self-center overflow-hidden">
                                        <i class="fe fe-shopping-bag fs-16 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="card sales-card">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4">
                                        <div class="">
                                            <span class="mb-2 fs-12 fw-semibold d-block">Today Earnings</span>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h4 class="fs-20 fw-semibold mb-2">$7,589</h4>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">Last week<i
                                                    class="bx bx-caret-down mx-2 text-danger"></i>
                                                <span class="fw-semibold text-danger"> -453</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div
                                        class="circle-icon bg-info-transparent text-center align-self-center overflow-hidden">
                                        <i class="fe fe-dollar-sign fs-16 text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="card sales-card">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4">
                                        <div class="">
                                            <span class="mb-2 fs-12 fw-semibold d-block">Profit Gain</span>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h4 class="fs-20 fw-semibold mb-2">$8,943</h4>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">Last week<i
                                                    class="bx bx-caret-up mx-2 text-success"></i>
                                                <span class=" text-success fw-semibold"> +788</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div
                                        class="circle-icon bg-secondary-transparent text-center align-self-center overflow-hidden">
                                        <i class="fe fe-external-link fs-16 text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="card sales-card">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-4 pt-4 pe-3 pb-4">
                                        <div class="">
                                            <span class="mb-2 fs-12 fw-semibold d-block">Total Earnings</span>
                                        </div>
                                        <div class="pb-0 mt-0">
                                            <div class="d-flex">
                                                <h4 class="fs-20 fw-semibold mb-2">$57.2M</h4>
                                            </div>
                                            <p class="mb-0 fs-12  text-muted">Last week<i
                                                    class="bx bx-caret-down mx-2 text-danger"></i>
                                                <span class="text-danger fw-semibold"> -693</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div
                                        class="circle-icon bg-warning-transparent text-center align-self-center overflow-hidden">
                                        <i class="fe fe-credit-card fs-16 text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-header pb-1">
                                <h3 class="card-title mb-2">Browser Usage</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="browser-stats">
                                    <div class="d-flex align-items-center item  border-bottom my-2">
                                        <div class="d-flex">
                                            <img src="../../../assets/images/svgicons/chrome.svg" alt="img"
                                                class="ht-30 wd-30 me-2">
                                            <div class="truncate">
                                                <h6 class="">Chrome</h6>
                                                <span class="text-muted fs-12">Google, Inc.</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-flex">
                                                <span class="me-4 mt-1 fw-semibold fs-16">35,502</span>
                                                <span class="text-success fs-13 my-auto"><i
                                                        class="fe fe-trending-up text-success mx-2 my-auto"></i>12.75%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center item  border-bottom my-2">
                                        <div class="d-flex">
                                            <img src="../../../assets/images/svgicons/edge.svg" alt="img"
                                                class="ht-30 wd-30 me-2">
                                            <div class="truncate">
                                                <h6 class="">Edge</h6>
                                                <span class="text-muted fs-12">Microsoft Corporation, Inc.</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-flex">
                                                <span class="me-4 mt-1 fw-semibold fs-16">25,364</span>
                                                <span class="text-success"><i
                                                        class="fe fe-trending-down text-danger mx-2 my-auto"></i>24.37%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center item  border-bottom my-2">
                                        <div class="d-flex">
                                            <img src="../../../assets/images/svgicons/firefox.svg" alt="img"
                                                class="ht-30 wd-30 me-2">
                                            <div class="truncate">
                                                <h6 class="">Firefox</h6>
                                                <span class="text-muted fs-12">Mozilla Foundation, Inc.</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-flex">
                                                <span class="me-4 mt-1 fw-semibold fs-16">14,635</span>
                                                <span class="text-success"><i
                                                        class="fe fe-trending-up text-success mx-2 my-auto"></i>15,63%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center item  border-bottom my-2">
                                        <div class="d-flex">
                                            <img src="../../../assets/images/svgicons/safari.svg" alt="img"
                                                class="ht-30 wd-30 me-2">
                                            <div class="truncate">
                                                <h6 class="">Safari</h6>
                                                <span class="text-muted fs-12">Apple Corporation, Inc.</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-flex">
                                                <span class="me-4 mt-1 fw-semibold fs-16">35,657</span>
                                                <span class="text-danger"><i
                                                        class="fe fe-trending-up text-success mx-2 my-auto"></i>12.54%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center item my-2 pb-3">
                                        <div class="d-flex">
                                            <img src="../../../assets/images/svgicons/opera.svg" alt="img"
                                                class="ht-30 wd-30 me-2">
                                            <div class="truncate">
                                                <h6 class="">Opera</h6>
                                                <span class="text-muted fs-12">Opera, Inc.</span>
                                            </div>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-flex">
                                                <span class="me-4 mt-1 fw-semibold fs-16">12,563</span>
                                                <span class="text-danger"><i
                                                        class="fe fe-trending-down text-danger mx-2 my-auto"></i>15.12%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <div>
                            <h3 class="card-title mb-2 ">Project Budget</h3> <span
                                class="d-block fs-12 mb-0 text-muted"></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="statistics1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-xl-6">
                        <div class="card overflow-hidden">
                            <div class="card-header pb-1">
                                <h3 class="card-title mb-2">Recent Customers</h3>
                            </div>
                            <div class="card-body p-0 customers mt-1">
                                <div class="list-group list-lg-group list-group-flush">
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/2.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Samantha Melon</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1234</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p fs-14">
                                                            <span class="float-end badge bg-success-transparent">
                                                                <span class="op-7 text-success fw-semibold">paid
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/1.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-1">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Allie Grater</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1234</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p fs-14">
                                                            <span class="float-end badge bg-danger-transparent ">
                                                                <span class="op-7 text-danger fw-semibold">Pending</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/5.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-1">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Gabe Lackmen</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1234</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p  fs-14">
                                                            <span class="float-end badge bg-danger-transparent ">
                                                                <span class="op-7 text-danger fw-semibold">Pending</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/7.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-1">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Manuel Labor</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1234</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p fs-14">
                                                            <span class="float-end badge bg-success-transparent ">
                                                                <span class="op-7 text-success fw-semibold">Paid</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/9.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-1">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Hercules Bing</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1754</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p fs-14">
                                                            <span class="float-end badge bg-success-transparent ">
                                                                <span class="op-7 text-success fw-semibold">Paid</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="border-0">
                                        <div class="list-group-item list-group-item-action p-3 border-0">
                                            <div class="media mt-0">
                                                <img class="avatar-lg rounded-circle me-3 my-auto shadow"
                                                    src="../../../assets/images/faces/11.jpg" alt="Image description">
                                                <div class="media-body flex-fill">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-1">
                                                            <h5 class="mb-1 fs-13 font-weight-sembold text-dark">
                                                                Manuel Labor</h5>
                                                            <p class="mb-0 fs-12 text-muted">User ID: #1234</p>
                                                        </div>
                                                        <span class="ms-auto wd-45p fs-14">
                                                            <span class="float-end badge bg-danger-transparent ">
                                                                <span class="op-7 text-danger fw-semibold">Pending</span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-header pb-3">
                                <h3 class="card-title mb-2">MAIN TASKS</h3>
                            </div>
                            <div class="card-body p-0 customers mt-1">
                                <div class="">
                                    <label class="p-2 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            accurate information at any given point.
                                        </span>
                                        <span class="ms-auto"><span
                                                class="badge bg-primary-transparent fw-semibold px-2 py-1 fs-11 me-2">Today</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked01">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            sharing the information with clients or stakeholders.
                                        </span>
                                        <span class="ms-auto"><span
                                                class="badge bg-primary-transparent fw-semibold px-2 py-1 fs-11 me-2">Today</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            Hearing the information and responding .
                                        </span>
                                        <span class="ms-auto"><span
                                                class="badge bg-primary-transparent fw-semibold px-2 py-1 fs-11 me-2 float-end">22
                                                hrs</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            Setting up and customizing your own sales.
                                        </span>
                                        <span class="ms-auto"> <span
                                                class="badge bg-light-transparent fw-semibold px-2 py-1 fs-11 me-2">1
                                                Day</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked05"
                                                checked="">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            To have a complete 360° overview of sales information, having.
                                        </span>
                                        <span class="ms-auto"> <span
                                                class="badge bg-light-transparent fw-semibold px-2 py-1 fs-11 me-2">2
                                                Days</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked07">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            sharing the information with clients or stakeholders.
                                        </span>
                                        <span class="ms-auto"><span
                                                class="badge bg-primary-transparent fw-semibold px-2 py-1 fs-11 me-2">Today</span></span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked06"
                                                checked="">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            New Admin Launched.
                                        </span>
                                    </label>
                                    <label class="p-2 mt-1 d-flex">
                                        <span class="form-check mb-0 ms-2">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked08"
                                                checked="">
                                        </span>
                                        <span class="mx-3 my-auto">
                                            To maximize profits and improve productivity.
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>

        <div class="row row-sm">
            <div class="col-sm-12 col-lg-12 col-xl-6 col-xxl-3">
                <div class="card">
                    <div class="card-header pb-3">
                        <h3 class="card-title mb-2">SALES ACTIVITY</h3>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="country-card pt-0">
                            <div class="mb-4">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">India</span>
                                    <div class="ms-auto"><span class="text-danger mx-1"><i
                                                class="fe fe-trending-down"></i></span><span
                                            class="number-font">$32,879</span> (65%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width: 60%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex mb-1">
                                    <span class="fs-13 fw-semibold">Russia</span>
                                    <div class="ms-auto"><span class="text-info mx-1"><i
                                                class="fe fe-trending-up"></i></span><span
                                            class="number-font">$22,710</span> (55%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                        style="width: 50%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">Canada</span>
                                    <div class="ms-auto"><span class="text-danger mx-1"><i
                                                class="fe fe-trending-down"></i></span><span
                                            class="number-font">$56,291</span> (69%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">Brazil</span>
                                    <div class="ms-auto"><span class="text-success mx-1"><i
                                                class="fe fe-trending-up"></i></span><span
                                            class="number-font">$34,209</span> (60%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        style="width: 60%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">United States</span>
                                    <div class="ms-auto"><span class="text-success mx-1"><i
                                                class="fe fe-trending-up"></i></span><span
                                            class="number-font">$45,870</span> (86%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                        style="width: 80%"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">Germany</span>
                                    <div class="ms-auto"><span class="text-success mx-1"><i
                                                class="fe fe-trending-up"></i></span><span
                                            class="number-font">$67,357</span> (73%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        style="width: 70%"></div>
                                </div>
                            </div>
                            <div class="mb-0 pb-2">
                                <div class="d-flex">
                                    <span class="fs-13 fw-semibold">U.A.E</span>
                                    <div class="ms-auto"><span class="text-danger mx-1"><i
                                                class="fe fe-trending-down"></i></span><span
                                            class="number-font">$56,291</span> (69%)</div>
                                </div>
                                <div class="progress ht-7 br-5 mt-2">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-purpple"
                                        style="width: 80%"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-3 col-md-12 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header pb-1">
                        <div class="card-title mb-2">Warehouse Operating Costs</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group projects-list border-0">
                            <div class="list-group-item list-group-item-action flex-column align-items-start border-0">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Order Picking</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">3,876</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted fs-12"><i class="bx bx-caret-up text-success me-1"></i>
                                        <span class="text-success">03%</span> last month</span>
                                    <span class="text-muted  fs-11">5 days ago</span>
                                </div>
                            </div>
                            <div
                                class="list-group-item list-group-item-action flex-column align-items-start border-bottom-0  border-start-0 border-end-0 border-top">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Storage</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">2,178</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted  fs-12"><i class="bx bx-caret-down text-danger me-1"></i><span
                                            class="text-danger">
                                            16%</span> last month</span>
                                    <span class="text-muted  fs-11">2 days ago</span>
                                </div>
                            </div>
                            <div
                                class="list-group-item list-group-item-action flex-column align-items-start border-bottom-0  border-start-0 border-end-0 border-top">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Shipping</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">1,367</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted  fs-12"><i class="bx bx-caret-up text-success me-1"></i><span
                                            class="text-success">
                                            06%</span> last month</span>
                                    <span class="text-muted  fs-11">1 days ago</span>
                                </div>
                            </div>
                            <div
                                class="list-group-item list-group-item-action flex-column align-items-start border-bottom-0  border-start-0 border-end-0 border-top">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Receiving</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">678</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted  fs-12"><i class="bx bx-caret-down text-danger me-1"></i><span
                                            class="text-danger">
                                            25%</span> last month</span>
                                    <span class="text-muted  fs-11">10 days ago</span>
                                </div>
                            </div>
                            <div
                                class="list-group-item list-group-item-action flex-column align-items-start border-bottom-0  border-start-0 border-end-0 border-top">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Review</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">578</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted  fs-12"><i class="bx bx-caret-up text-success me-1"></i><span
                                            class="text-success">
                                            55%</span> last month</span>
                                    <span class="text-muted  fs-11">11 days ago</span>
                                </div>
                            </div>
                            <div
                                class="list-group-item list-group-item-action flex-column align-items-start border-bottom-0  border-start-0 border-end-0 border-top pb-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="fs-13 mb-2 fw-semibold text-dark">Profit</p>
                                    <h4 class="text-dark mb-0 fw-semibold text-dark fs-18">$27,215</h4>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span class="text-muted  fs-12"><i class="bx bx-caret-up text-success me-1"></i><span
                                            class="text-success">
                                            32%</span> last month</span>
                                    <span class="text-muted  fs-11">11 days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 col-xxl-3">
                <div class="card">
                    <div class="card-header bg-transparent pb-0">
                        <div>
                            <h3 class="card-title mb-2">Timeline</h3>
                        </div>
                    </div>
                    <div class="card-body mt-0">
                        <div class="latest-timelines mt-4">
                            <ul class="timelines mb-0">
                                <li>
                                    <div class="featured_icon danger">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">23 Sep, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Anita Letterback</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                                <li>
                                    <div class="featured_icon success">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">16 Aug, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Paddy O'Furniture</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                                <li>
                                    <div class="featured_icon primary">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">23 Feb, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Olive Yew</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                                <li>
                                    <div class="featured_icon warning">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">21 june, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Maureen Biologist</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt. </p>
                                </li>
                                <li>
                                    <div class="featured_icon teal">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">04 Aug, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Peg Legge</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                                <li>
                                    <div class="featured_icon info">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity">
                                    <div><span class="fs-11 text-muted float-end">04 Aug, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Letterbac</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                                <li>
                                    <div class="featured_icon danger">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </li>
                                <li class="mt-0 activity mb-0">
                                    <div><span class="fs-11 text-muted float-end">23 Sep, 2021</span></div>
                                    <a href="javascript:void(0);" class="fs-12 text-dark">
                                        <p class="mb-1 fw-semibold text-dark fs-13">Anita Letterback</p>
                                    </a>
                                    <p class="text-muted mt-0 mb-0 fs-12">Lorem ipsum dolor tempor incididunt . </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-3 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title mb-2">Weekly Visitors</h3>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="text-muted fs-12 text-center mb-2">Average Male Visitors</div>
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <span class="me-3 fs-26 fw-semibold">2,132</span>
                                    <span class="text-success fw-semibold"><i class="fa fa-caret-up me-2"></i>0.23%</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-muted fs-12 text-center mb-2">Average Female Visitors</div>
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <span class="me-3 fs-26 fw-semibold">1,053</span>
                                    <span class="text-danger fw-semibold"><i class="fa fa-caret-down me-2"></i>0.11%</span>
                                </div>
                            </div>
                        </div>
                        <div id="Viewers"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Summary</h4>
                    </div>
                    <div class="card-body pt-0 example1-table">
                        <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
                            <div>
                                <input class="form-control form-control-sm" type="text" placeholder="Search Here"
                                    aria-label=".form-control-sm example">
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);"
                                    class="btn btn-primary btn-sm btn-wave waves-effect waves-light"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort By<i class="ri-arrow-down-s-line align-middle d-inline-block"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">New</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Popular</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Relevant</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  table-bordered text-nowrap mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Purchase Date</th>
                                        <th>Client Name</th>
                                        <th>Product ID</th>
                                        <th>Product</th>
                                        <th>Product Cost</th>
                                        <th>Payment Mode</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">#01</td>
                                        <td>Sean Black</td>
                                        <td>PRO12345</td>
                                        <td>Mi LED Smart TV 4A 80</td>
                                        <td>$14,500</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#02</td>
                                        <td>Evan Rees</td>
                                        <td>PRO8765</td>
                                        <td>Thomson R9 122cm (48 inch) Full HD LED TV </td>
                                        <td>$30,000</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge bg-primary">Add Cart</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#03</td>
                                        <td>David Wallace</td>
                                        <td>PRO54321</td>
                                        <td>Vu 80cm (32 inch) HD Ready LED TV</td>
                                        <td>$13,200</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge bg-orange">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#04</td>
                                        <td>Julia Bower</td>
                                        <td>PRO97654</td>
                                        <td>Micromax 81cm (32 inch) HD Ready LED TV</td>
                                        <td>$15,100</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge bg-secondary">Delivering</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#05</td>
                                        <td>Kevin James</td>
                                        <td>PRO4532</td>
                                        <td>HP 200 Mouse &amp; Wireless Laptop Keyboard </td>
                                        <td>$5,987</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge bg-danger">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#06</td>
                                        <td>Theresa Wright</td>
                                        <td>PRO6789</td>
                                        <td>Digisol DG-HR3400 Router </td>
                                        <td>$11,987</td>
                                        <td>Cash on delivered</td>
                                        <td><span class="badge bg-secondary">Delivering</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#07</td>
                                        <td>Sebastian Black</td>
                                        <td>PRO4567</td>
                                        <td>Dell WM118 Wireless Optical Mouse</td>
                                        <td>$4,700</td>
                                        <td>Online Payment</td>
                                        <td><span class="badge bg-info">Add to Cart</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">#08</td>
                                        <td>Kevin Glover</td>
                                        <td>PRO32156</td>
                                        <td>Dell 16 inch Laptop Backpack </td>
                                        <td>$678</td>
                                        <td>Cash On delivered</td>
                                        <td><span class="badge bg-pink">Delivered</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
