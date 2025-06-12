<script>
export default {
    props: {
        value: {
            default: true,
        },
        checked: {
            default: false,
        },
    },

    emits: ['update:checked'],

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },
            set(value) {
                this.$emit('update:checked', value);
            },
        },
    },
};

</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    />
</template>
