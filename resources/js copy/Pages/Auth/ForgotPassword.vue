<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>

        <Head title="Forgot Password" />

        <div class="alert alert-primary">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset
            link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="alert alert-info">
            {{ status }}
        </div>

        <div class="">
            <div class="main-signup-header">
                <h2>Forgot Password!</h2>
                <h6 class="font-weight-semibold mb-4">
                    Please Enter Your Email
                </h6>
                <div class="panel panel-primary">
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="Enter your email" type="text" v-model="form.email">
                            <div class="text-danger" v-if="form.errors.email">
                                {{ form.errors.email }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" :disabled="form.processing">
                            <i class="fas " :class="{'fa-spinner fa-spin': form.processing}"></i>
                            Email Password Reset Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
