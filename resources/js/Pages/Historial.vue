<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Historial de Partidas" />
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">📜 Historial de Partidas</h2>
    </template>

    <div class="p-6">
      <p class="text-gray-700">Aquí se mostrará el historial de partidas jugadas.</p>
    </div>
  </AuthenticatedLayout>
</template>
