<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

export default {
  components: {
    GuestLayout,
    InputError,
    InputLabel,
    PrimaryButton,
    TextInput,
    Head,
  },
  data() {
    return {
      form: {
        password: '',
        errors: {},
        processing: false,
      },
    };
  },
  methods: {
    submit() {
      this.form.processing = true;
      router.post(
        route('password.confirm'),
        { password: this.form.password },
        {
          onError: (errors) => {
            this.form.errors = errors;
          },
          onFinish: () => {
            this.form.processing = false;
          },
        }
      );
    },
  },
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />

        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Confirm
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
