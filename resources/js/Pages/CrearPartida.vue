<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head
  },

  data() {
    return {
      nombrePartida: '',
      colorTablero: '#3498db',
      colorAgua: '#1e88e5',
      colorBarco: '#4caf50',
      colorImpacto: '#f44336',
      colorFallo: '#9e9e9e',
      tableroJugador: this.crearTableroVacio(),
      tableroOponente: this.crearTableroVacio(),
      buscandoOponente: true,
      oponenteEncontrado: false
    }
  },

  mounted() {
    // Simular búsqueda de oponente y reproducir sonido
    setTimeout(() => {
      this.buscandoOponente = false;
      this.oponenteEncontrado = true;

      const audio = new Audio('/sounds/battle.mp3');
      audio.play().catch(e => console.warn('No se pudo reproducir el sonido:', e));
    }, 5000);
  },

  methods: {
    crearTableroVacio() {
      return Array(8).fill().map(() => Array(8).fill(0));
    },

    crearPartida() {
      console.log('Partida creada:', this.nombrePartida, this.colorTablero);
      router.visit('/dashboard');
    },

    colorCelda(celda, esOponente = false) {
      if (esOponente && celda === 1) return this.colorAgua;

      switch (celda) {
        case 0: return this.colorAgua;
        case 1: return this.colorBarco;
        case 2: return this.colorFallo;
        case 3: return this.colorImpacto;
        default: return 'white';
      }
    }
  },

  computed: {
    vistaOponente() {
      return this.tableroOponente.map(fila =>
        fila.map(celda => celda === 1 ? 0 : celda)
      );
    }
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Crear Partida" />

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Nueva Partida</h2>
    </template>

    <!-- Estado de búsqueda -->
    <div class="flex justify-center mb-6">
      <div v-if="buscandoOponente" class="bg-yellow-100 text-yellow-800 font-semibold px-6 py-3 rounded-full shadow animate-pulse flex items-center gap-1 text-lg">
        🔎 Buscando oponente
        <span class="dot">.</span>
        <span class="dot delay-1">.</span>
        <span class="dot delay-2">.</span>
      </div>
      <div v-else-if="oponenteEncontrado" class="bg-green-100 text-green-800 font-bold px-6 py-3 rounded-full shadow-lg text-lg animate-bounce">
        ⚔️ ¡Oponente encontrado! Prepárate para la batalla.
      </div>
    </div>
    <div v-if="oponenteEncontrado" class="flex justify-center mt-4">
  <div class="battle-scene relative w-full max-w-2xl h-32 overflow-hidden">
    <!-- Barco izquierdo -->
    <div class="absolute left-0 bottom-4 text-3xl animate-ship-left">🚢</div>

    <!-- Disparo -->
    <div class="absolute left-12 bottom-6 text-xl animate-cannonball">💣</div>

    <!-- Explosión -->
    <div class="absolute left-1/2 bottom-6 text-2xl animate-explosion">💥</div>

    <!-- Disparo de regreso -->
    <div class="absolute right-12 bottom-10 text-xl animate-cannonball-reverse">💣</div>

    <!-- Barco derecho -->
    <div class="absolute right-0 bottom-4 text-3xl animate-ship-right">🚢</div>
  </div>
  </div>

    <!-- CONTENEDOR de ambos tableros uno al lado del otro -->
<div class="flex justify-center gap-8 flex-wrap md:flex-nowrap mt-8">
  <!-- Tablero del jugador -->
  <div class="bg-blue-100 p-6 rounded-xl shadow-lg border-2 border-blue-300 w-full md:w-1/2">
    <h3 class="text-lg font-bold mb-4 text-center text-blue-800">🛳️ Mi Flota</h3>
    <div class="grid grid-cols-8 gap-1 mx-auto" style="width: fit-content;">
      <div 
        v-for="(fila, i) in tableroJugador"
        :key="'jugador-fila-'+i"
        class="contents"
      >
        <div
          v-for="(celda, j) in fila"
          :key="'jugador-celda-'+i+'-'+j"
          class="w-12 h-12 border border-blue-200 rounded-md flex items-center justify-center transition duration-300"
          :class="{
            'bg-blue-300': celda === 0,
            'bg-green-600 text-white': celda === 1,
            'bg-gray-400': celda === 2,
            'bg-red-600 animate-ping-slow text-white': celda === 3
          }"
        >
          <span v-if="celda === 1">🚢</span>
          <span v-else-if="celda === 3">💥</span>
          <span v-else-if="celda === 2">❌</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Tablero del oponente -->
  <div class="bg-red-100 p-6 rounded-xl shadow-lg border-2 border-red-300 w-full md:w-1/2">
    <h3 class="text-lg font-bold mb-4 text-center text-red-800">🎯 Flota Enemiga</h3>
    <div class="grid grid-cols-8 gap-1 mx-auto" style="width: fit-content;">
      <div 
        v-for="(fila, i) in vistaOponente"
        :key="'oponente-fila-'+i"
        class="contents"
      >
        <div
          v-for="(celda, j) in fila"
          :key="'oponente-celda-'+i+'-'+j"
          class="w-12 h-12 border border-red-200 rounded-md flex items-center justify-center cursor-pointer transition duration-300 hover:scale-105"
          :class="{
            'bg-blue-300': celda === 0,
            'bg-gray-400': celda === 2,
            'bg-red-600 animate-ping-slow text-white': celda === 3
          }"
        >
          <span v-if="celda === 3">💥</span>
          <span v-else-if="celda === 2">❌</span>
        </div>
      </div>
    </div>
  </div>
</div>

  </AuthenticatedLayout>
</template>

<style scoped>
@keyframes ping-slow {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.2); opacity: 0.6; }
  100% { transform: scale(1); opacity: 1; }
}

.animate-ping-slow {
  animation: ping-slow 1s infinite;
}

.dot {
  animation: blink 1.5s infinite;
  font-weight: bold;
}
.delay-1 {
  animation-delay: 0.2s;
}
.delay-2 {
  animation-delay: 0.4s;
}

@keyframes blink {
  0% { opacity: 0 }
  20% { opacity: 1 }
  100% { opacity: 0 }
}


@keyframes cannonball {
  0% { transform: translateX(0); opacity: 1; }
  100% { transform: translateX(400px); opacity: 0; }
}

@keyframes cannonball-reverse {
  0% { transform: translateX(0); opacity: 1; }
  100% { transform: translateX(-400px); opacity: 0; }
}

@keyframes ship-left {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@keyframes ship-right {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@keyframes explosion {
  0% { transform: scale(0.5); opacity: 0; }
  50% { transform: scale(1.2); opacity: 1; }
  100% { transform: scale(1); opacity: 0; }
}

.animate-cannonball {
  animation: cannonball 1.5s ease-in forwards;
}

.animate-cannonball-reverse {
  animation: cannonball-reverse 1.5s ease-in forwards;
}

.animate-ship-left {
  animation: ship-left 2s infinite ease-in-out;
}

.animate-ship-right {
  animation: ship-right 2s infinite ease-in-out;
}

.animate-explosion {
  animation: explosion 1.5s ease-in-out forwards;
}

</style>
