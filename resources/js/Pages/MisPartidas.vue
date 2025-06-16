<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head
  },
  props: {
    partidas: Array,
    usuario: Object
  },
  methods: {
    verHistorial() {
      router.visit('/historial');
    }
  }
}
</script>


<template>
  <AuthenticatedLayout>
    <Head title="Mis Partidas" />

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">⚓ Mis Partidas</h2>
    </template>

    <div class="p-6">
      <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4 border border-gray-300">
        <table class="min-w-full table-auto">
          <thead class="bg-blue-200 text-blue-900 font-bold">
            <tr>
              <th class="px-4 py-2 text-left">👤 Tu Nombre</th>
              <th class="px-4 py-2 text-left">🧨 Enemigo</th>
              <th class="px-4 py-2 text-center">👁️ Ver</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(partida, index) in partidas" :key="index" class="border-t hover:bg-blue-50 transition">
              <td class="px-4 py-2">{{ usuario.name }}</td>
              <td class="px-4 py-2">{{ partida.enemigo }}</td>
              <td class="px-4 py-2 text-center">
<td class="px-4 py-2 text-center">
  <button 
    @click="verHistorial"
    class="text-blue-600 hover:text-blue-900 transition transform hover:scale-110"
  >
    👁️
  </button>
</td>

              </td>
            </tr>
            <tr v-if="partidas.length === 0">
              <td colspan="3" class="text-center text-gray-500 py-4">No hay partidas registradas.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
