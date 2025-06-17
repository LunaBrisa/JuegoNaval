<template>
  <div class="naval-menu-container">
    <!-- Fondo animado igual que en el layout -->
    <div class="naval-background">
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="ship"></div>
      <div class="ship ship-2"></div>
    </div>

    <!-- Menú de opciones -->
    <div class="naval-options">
      <button 
        class="naval-option neon-blue"
        @click="$emit('nueva-partida')"
      >
        <span class="option-icon">🚢</span>
        <span class="option-text">Nueva Partida</span>
      </button>

      <button 
        class="naval-option neon-green"
        @click="$emit('mis-partidas')"
      >
        <span class="option-icon">📋</span>
        <span class="option-text">Mis Partidas</span>
      </button>

      <button 
        class="naval-option neon-purple"
        @click="$emit('unirse-partida')"
      >
        <span class="option-icon">🤝</span>
        <span class="option-text">Unirse a Partida</span>
      </button>

      <button 
        class="naval-option neon-red"
        @click="$emit('historial')"
      >
        <span class="option-icon">🏆</span>
        <span class="option-text">Historial</span>
      </button>
    </div>
  </div>
</template>

<style scoped>
.naval-menu-container {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

/* Reutilizando estilos del fondo del layout */
.naval-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

/* Opciones del menú */
.naval-options {
  position: relative;
  z-index: 2;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 2rem;
  max-width: 800px;
  padding: 2rem;
}

.naval-option {
  position: relative;
  border: none;
  border-radius: 15px;
  padding: 2rem;
  cursor: pointer;
  overflow: hidden;
  transition: all 0.3s;
  min-height: 150px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  backdrop-filter: blur(5px);
}

/* Efectos neon */
.neon-blue {
  background: rgba(0, 42, 85, 0.5);
  border: 2px solid #00d4ff;
  box-shadow: 0 0 15px #00d4ff, inset 0 0 10px #00d4ff;
  color: #00d4ff;
}

.neon-green {
  background: rgba(0, 85, 42, 0.5);
  border: 2px solid #00ff88;
  box-shadow: 0 0 15px #00ff88, inset 0 0 10px #00ff88;
  color: #00ff88;
}

.neon-purple {
  background: rgba(85, 0, 85, 0.5);
  border: 2px solid #b300ff;
  box-shadow: 0 0 15px #b300ff, inset 0 0 10px #b300ff;
  color: #b300ff;
}

.neon-red {
  background: rgba(85, 0, 42, 0.5);
  border: 2px solid #ff0055;
  box-shadow: 0 0 15px #ff0055, inset 0 0 10px #ff0055;
  color: #ff0055;
}

.naval-option:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 25px currentColor, inset 0 0 15px currentColor;
}

.option-icon {
  font-size: 3rem;
  margin-bottom: 1rem;
  filter: drop-shadow(0 0 5px currentColor);
  transition: all 0.3s;
}

.naval-option:hover .option-icon {
  transform: scale(1.2) rotate(10deg);
}

.option-text {
  font-size: 1.3rem;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  text-shadow: 0 0 10px currentColor;
}

/* Responsive */
@media (max-width: 768px) {
  .naval-options {
    grid-template-columns: 1fr;
    width: 90%;
  }
  
  .option-icon {
    font-size: 2rem;
  }
  
  .option-text {
    font-size: 1.1rem;
  }
}
</style>