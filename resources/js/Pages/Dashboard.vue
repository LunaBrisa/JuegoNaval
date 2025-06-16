<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3'; 
import MenuInicioNaval from '@/Components/MenuInicioNaval.vue';

export default {
  components: {
    AuthenticatedLayout,
    Head,
    MenuInicioNaval
  },
  methods: {
    nuevaPartida() {
      // Redireccionar a la vista "CrearPartida"
      router.visit('/crear-partida');
    },
    misPartidas() {
      router.visit('/Mis-partidas');
    },
    unirsePartida() {
      console.log('Uniéndose a partida');
    },
    historial() {
    router.visit('/Graficas');
    }
  }
};
</script>

    
 <template>
  <AuthenticatedLayout>
    <Head title="Dashboard" />

    <!-- Encabezado -->
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <!-- Contenido principal (debe ir aquí, no dentro de #header) -->
    <div class="py-4 px-6">
      <MenuInicioNaval 
        @nueva-partida="nuevaPartida"
        @mis-partidas="misPartidas"
        @unirse-partida="unirsePartida"
        @historial="historial"
        class="min-h-[calc(100vh-64px)]"
      />
    </div>
  </AuthenticatedLayout>
</template>
