<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

function onChange() {
    form.reset();
    // reset the form validation
    form.clearErrors();
}
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="alert alert-info">
            {{ status }}
        </div>

        <div class="">
            <div class="main-signup-header">
                <h2>Welcome back!</h2>
                <h6 class="font-weight-semibold mb-4">
                    Please sign in to continue.
                </h6>
                <div class="panel panel-primary">
                    <div class=" tab-menu-heading mb-2 border-bottom-0">
                        <div class="tabs-menu1">
                            <ul class="nav panel-tabs">
                                <li class="me-2">
                                    <a href="#emailLogin" class="active" data-bs-toggle="tab" @click="onChange()">Email</a>
                                </li>
                                <li>
                                    <a href="#mobileLogin" data-bs-toggle="tab" class="" @click="onChange()">Mobile no</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body border-0 p-3">
                        <div class="tab-content">
                            <div class="tab-pane active" id="emailLogin">
                                <form @submit.prevent="submit">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Enter your email" type="text"
                                            v-model="form.email">
                                        <div class="text-danger" v-if="form.errors.email">
                                            {{ form.errors.email }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Enter your password" type="password"
                                            v-model="form.password">
                                        <div class="text-danger" v-if="form.errors.password">
                                            {{ form.errors.password }}
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" :disabled="form.processing">
                                        <i class="fas " :class="{ 'fa-spinner fa-spin': form.processing }"></i>
                                        Sign In
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane" id="mobileLogin">
                                <div id="mobile-num" class="wrap-input100 validate-input input-group mb-2">
                                    <a href="javascript:void(0);" class="input-group-text bg-white text-muted">
                                        <span>+91</span>
                                    </a>
                                    <input class="input100 form-control" type="number" placeholder="number">
                                </div>
                                <span>Note : Login with registered mobile number to generate
                                    OTP.</span>
                                <div class="container-login100-form-btn mt-3">
                                    <a href="javascript:void(0);" class="btn login100-form-btn btn-primary"
                                        id="generate-otp">
                                        Proceed
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-signin-footer text-center mt-3">
                    <p v-if="canResetPassword">
                        <Link :href="route('password.request')" class="mb-3">
                        Forgot your password?
                        </Link>
                    </p>
                    <p>
                        Don't have an account?
                        <Link :href="route('register')">
                        Create an Account
                        </Link>
                    </p>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
