<script >
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CampoTexto from '@/Components/CampoTexto.vue';

export default {
  components: {
    AuthenticatedLayout,
    Head,
    CampoTexto
  },
  data() {
    return {
      textoRecibido: ''
    }
  },
  methods: {
    actualizarTexto(valor) {
      this.textoRecibido = valor
    }
  }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div>
                <h1>Texto recibido:</h1>
                     <p>{{ textoRecibido }}</p>

                <CampoTexto @texto-escrito="actualizarTexto" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>