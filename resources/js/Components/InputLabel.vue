<script>
export default {
    props: {
        type: {
            type: String,
            default: 'text',
        },
        value: String,
    },
};
</script>

<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
