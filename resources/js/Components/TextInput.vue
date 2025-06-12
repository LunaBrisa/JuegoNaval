<script>
import { ref } from 'vue';

export default {
  props: ['modelValue'],
  emits: ['update:modelValue'],
  data() {
    return {
      input: ref(null),
    };
  },
  mounted() {
    if (this.input?.hasAttribute('autofocus')) {
      this.input.focus();
    }
  },
  methods: {
    focus() {
      this.input.focus();
    },
  },
};
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
