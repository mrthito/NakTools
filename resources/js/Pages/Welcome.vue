<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div v-if="$page.props.auth.user">
        You're logged in!
    </div>
    <div v-else>
        <Link v-if="canLogin" :href="route('login')"
            class="btn btn-lg btn-primary fw-bold border-white bg-white text-primary">
            Fucl you
        Login
        </Link>
        <Link v-if="canRegister" :href="route('register')"
            class="btn btn-lg btn-primary fw-bold border-white bg-white text-primary">
        Register
        </Link>
    </div>
</template>
