<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import NavalBattleGrid from '@/Components/NavalBattleGrid.vue';

export default {
  components: {
    AuthenticatedLayout,
    Head,
    NavalBattleGrid
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

    onPlayerCellClick({row, col}) {
      console.log('Celda jugador clickeada:', row, col);
      // Lógica para colocar barcos
    },

    onOpponentCellClick({row, col}) {
      console.log('Celda oponente clickeada:', row, col);
      // Lógica para disparar
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

    <!-- Fondo animado naval -->
    <div class="naval-background">
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="ship"></div>
      <div class="ship ship-2"></div>
    </div>

    <div class="naval-content-container">
      <!-- Estado de búsqueda -->
      <div class="flex justify-center mb-6">
        <div v-if="buscandoOponente" class="searching-indicator neon-yellow">
          <span class="option-icon">🔎</span>
          <span class="option-text">Buscando oponente</span>
          <span class="dot">.</span>
          <span class="dot delay-1">.</span>
          <span class="dot delay-2">.</span>
        </div>
        <div v-else-if="oponenteEncontrado" class="found-indicator neon-green">
          <span class="option-icon">⚔️</span>
          <span class="option-text">¡Oponente encontrado! Prepárate para la batalla.</span>
        </div>
      </div>

      <!-- Escena de batalla animada -->
      <div v-if="oponenteEncontrado" class="battle-scene">
        <!-- Barco izquierdo -->
        <div class="ship-left">🚢</div>
        <!-- Disparo -->
        <div class="cannonball">💣</div>
        <!-- Explosión -->
        <div class="explosion">💥</div>
        <!-- Disparo de regreso -->
        <div class="cannonball-reverse">💣</div>
        <!-- Barco derecho -->
        <div class="ship-right">🚢</div>
      </div>

      <!-- Componente de tableros de batalla -->
      <NavalBattleGrid
        :player-grid="tableroJugador"
        :opponent-grid="vistaOponente"
        player-board-class="neon-blue"
        opponent-board-class="neon-red"
        @player-cell-click="onPlayerCellClick"
        @opponent-cell-click="onOpponentCellClick"
      />
    </div>
  </AuthenticatedLayout>
</template>

<style>
/* Estilos base del contenedor */
.naval-content-container {
  position: relative;
  z-index: 2;
  padding: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

/* Fondo animado (reutilizado del menú) */
.naval-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

/* Indicadores de estado */
.searching-indicator,
.found-indicator {
  padding: 1rem 2rem;
  border-radius: 50px;
  font-weight: bold;
  display: flex;
  align-items: center;
  gap: 1rem;
  backdrop-filter: blur(5px);
  margin-bottom: 2rem;
  animation: float 3s ease-in-out infinite;
}

.searching-indicator {
  background: rgba(255, 255, 0, 0.1);
  border: 2px solid #ffeb3b;
  box-shadow: 0 0 15px #ffeb3b, inset 0 0 10px #ffeb3b;
  color: #ffeb3b;
}

.found-indicator {
  background: rgba(0, 255, 0, 0.1);
  border: 2px solid #4caf50;
  box-shadow: 0 0 15px #4caf50, inset 0 0 10px #4caf50;
  color: #4caf50;
  animation: bounce 2s ease infinite;
}

/* Escena de batalla */
.battle-scene {
  position: relative;
  width: 100%;
  height: 120px;
  margin: 2rem 0;
  overflow: hidden;
}

.ship-left,
.ship-right,
.cannonball,
.cannonball-reverse,
.explosion {
  position: absolute;
  font-size: 2.5rem;
  filter: drop-shadow(0 0 5px currentColor);
}

.ship-left {
  left: 10%;
  bottom: 20px;
  animation: ship-float 3s infinite ease-in-out;
}

.ship-right {
  right: 10%;
  bottom: 20px;
  animation: ship-float 3s infinite ease-in-out reverse;
}

.cannonball {
  left: 20%;
  bottom: 40px;
  animation: cannon-fire 2s forwards;
}

.cannonball-reverse {
  right: 20%;
  bottom: 40px;
  animation: cannon-fire-reverse 2s forwards;
}

.explosion {
  left: 50%;
  bottom: 40px;
  transform: translateX(-50%);
  animation: explosion 1.5s forwards;
  z-index: 2;
}

/* Animaciones */
@keyframes ship-float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}

@keyframes cannon-fire {
  0% { transform: translateX(0); opacity: 1; }
  100% { transform: translateX(300px); opacity: 0; }
}

@keyframes cannon-fire-reverse {
  0% { transform: translateX(0); opacity: 1; }
  100% { transform: translateX(-300px); opacity: 0; }
}

@keyframes explosion {
  0% { transform: translateX(-50%) scale(0.5); opacity: 0; }
  50% { transform: translateX(-50%) scale(1.5); opacity: 1; }
  100% { transform: translateX(-50%) scale(1); opacity: 0; }
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

@keyframes bounce {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
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

/* Efectos neon */
.neon-blue {
  background: rgba(0, 42, 85, 0.3);
  border: 2px solid #00d4ff;
  box-shadow: 0 0 15px #00d4ff, inset 0 0 10px #00d4ff;
  color: #00d4ff;
}

.neon-red {
  background: rgba(85, 0, 42, 0.3);
  border: 2px solid #ff0055;
  box-shadow: 0 0 15px #ff0055, inset 0 0 10px #ff0055;
  color: #ff0055;
}

.neon-green {
  background: rgba(0, 85, 42, 0.3);
  border: 2px solid #00ff88;
  box-shadow: 0 0 15px #00ff88, inset 0 0 10px #00ff88;
  color: #00ff88;
}

.neon-yellow {
  background: rgba(85, 85, 0, 0.3);
  border: 2px solid #ffeb3b;
  box-shadow: 0 0 15px #ffeb3b, inset 0 0 10px #ffeb3b;
  color: #ffeb3b;
}

/* Responsive */
@media (max-width: 768px) {
  .naval-content-container {
    padding: 1rem;
  }
  
  .searching-indicator,
  .found-indicator {
    padding: 0.8rem 1.5rem;
    font-size: 0.9rem;
  }
  
  .option-icon {
    font-size: 1.2rem;
  }
}
</style>