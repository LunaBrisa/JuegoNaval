<script>
export default {
  props: {
    align: {
      type: String,
      default: 'right',
    },
    width: {
      type: [String, Number],
      default: '48',
    },
    contentClasses: {
      type: Array,
      default: () => ['py-1', 'bg-white'],
    },
  },
  emits: ['open', 'close'],
  data() {
    return {
      open: false,
    };
  },
  computed: {
    widthClass() {
      return {
        48: 'w-48',
      }[this.width.toString()];
    },
    alignmentClasses() {
      if (this.align === 'left') {
        return 'origin-top-left left-0';
      } else if (this.align === 'right') {
        return 'origin-top-right right-0';
      } else {
        return 'origin-top';
      }
    },
  },
  methods: {
    closeOnEscape(e) {
      if (this.open && e.key === 'Escape') {
        this.open = false;
      }
    },
  },
  mounted() {
    document.addEventListener('keydown', this.closeOnEscape);
  },
  unmounted() {
    document.removeEventListener('keydown', this.closeOnEscape);
  },
};
</script>

<template>
    <div class="relative">
        <div @click="open = !open">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false"></div>

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="[widthClass, alignmentClasses]"
                style="display: none"
                @click="open = false"
            >
                <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>
