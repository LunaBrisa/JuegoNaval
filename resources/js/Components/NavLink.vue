<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
    props: {
        href: {
            type: String,
            required: true,
        },
        active: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        getClasses() {
            return this.active
                ? 'text-gray-500 hover:text-gray-700 focus:text-gray-700 focus:outline-none'
                : 'text-gray-700 hover:text-gray-900 focus:text-gray-900 focus:outline-none';
        },
    },
};
</script>

<template>
    <Link :href="href" :class="getClasses()">
        <slot />
    </Link>
</template>
