<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    mobile: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <div v-if="status" class="alert alert-info">
            {{ status }}
        </div>

        <div class="">
            <div class="main-signup-header">
                <h2>Get Started</h2>
                <h6 class="font-weight-semibold mb-4">
                    It's free to signup and only takes a minute.
                </h6>
                <div class="panel panel-primary">
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" placeholder="Enter your first name" type="text"
                                v-model="form.first_name">
                            <div class="text-danger" v-if="form.errors.first_name">
                                {{ form.errors.first_name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" placeholder="Enter your last name" type="text"
                                v-model="form.last_name">
                            <div class="text-danger" v-if="form.errors.last_name">
                                {{ form.errors.last_name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="Enter your email" type="text" v-model="form.email">
                            <div class="text-danger" v-if="form.errors.email">
                                {{ form.errors.email }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input class="form-control" placeholder="Enter your mobile number" type="text"
                                v-model="form.mobile">
                            <div class="text-danger" v-if="form.errors.mobile">
                                {{ form.errors.mobile }}
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
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" placeholder="Confirm your password" type="text"
                                v-model="form.password_confirmation">
                            <div class="text-danger" v-if="form.errors.password_confirmation">
                                {{ form.errors.password_confirmation }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" :disabled="form.processing">
                            <i class="fas " :class="{ 'fa-spinner fa-spin': form.processing }"></i>
                            Register
                        </button>
                    </form>
                    <div class="main-signup-footer mt-3 text-center">
                        <p>
                            Already have an account?
                            <Link :href="route('login')">
                            Sign In
                            </Link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
