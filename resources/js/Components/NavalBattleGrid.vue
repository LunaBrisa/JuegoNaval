<template>
  <div class="naval-battle-grid-container">
    <!-- Tablero del jugador -->
    <div class="naval-board" :class="playerBoardClass">
      <h3 class="board-title">
        <span class="board-icon">🛳️</span>
        <span class="board-text">Mi Flota</span>
      </h3>
      <div class="grid-board">
        <div 
          v-for="(fila, i) in playerGrid"
          :key="'player-row-'+i"
          class="board-row"
        >
          <div
            v-for="(celda, j) in fila"
            :key="'player-cell-'+i+'-'+j"
            class="board-cell"
            :class="getCellClass(celda, false)"
            @click="handlePlayerCellClick(i, j)"
          >
            <span v-if="celda === 1">🚢</span>
            <span v-else-if="celda === 3">💥</span>
            <span v-else-if="celda === 2">❌</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tablero del oponente -->
    <div class="naval-board" :class="opponentBoardClass">
      <h3 class="board-title">
        <span class="board-icon">🎯</span>
        <span class="board-text">Flota Enemiga</span>
      </h3>
      <div class="grid-board">
        <div 
          v-for="(fila, i) in opponentGrid"
          :key="'opponent-row-'+i"
          class="board-row"
        >
          <div
            v-for="(celda, j) in fila"
            :key="'opponent-cell-'+i+'-'+j"
            class="board-cell"
            :class="getCellClass(celda, true)"
            @click="handleOpponentCellClick(i, j)"
          >
            <span v-if="celda === 3">💥</span>
            <span v-else-if="celda === 2">❌</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'NavalBattleGrid',
  props: {
    playerGrid: {
      type: Array,
      required: true,
      default: () => Array(8).fill().map(() => Array(8).fill(0))
    },
    opponentGrid: {
      type: Array,
      required: true,
      default: () => Array(8).fill().map(() => Array(8).fill(0))
    },
    playerBoardClass: {
      type: String,
      default: 'neon-blue'
    },
    opponentBoardClass: {
      type: String,
      default: 'neon-red'
    },
    interactive: {
      type: Boolean,
      default: true
    }
  },
  methods: {
    getCellClass(cellValue, isOpponent) {
      if (isOpponent && cellValue === 1) return 'water'; // No mostrar barcos enemigos
      
      return {
        0: 'water',
        1: 'ship',
        2: 'miss',
        3: 'hit'
      }[cellValue] || 'water';
    },
    handlePlayerCellClick(row, col) {
      if (this.interactive) {
        this.$emit('player-cell-click', { row, col });
      }
    },
    handleOpponentCellClick(row, col) {
      if (this.interactive) {
        this.$emit('opponent-cell-click', { row, col });
      }
    }
  }
}
</script>

<style>
/* Contenedor principal */
.naval-battle-grid-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2rem;
  margin: 2rem 0;
}

/* Estilos de los tableros */
.naval-board {
  padding: 1.5rem;
  border-radius: 15px;
  min-width: 350px;
  backdrop-filter: blur(5px);
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
}

.naval-board::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.2);
  z-index: -1;
  border-radius: inherit;
}

.naval-board:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 25px currentColor, inset 0 0 15px currentColor;
}

/* Título del tablero */
.board-title {
  text-align: center;
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  text-shadow: 0 0 10px currentColor;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.board-icon {
  filter: drop-shadow(0 0 5px currentColor);
}

.board-text {
  font-weight: bold;
}

/* Grid del tablero */
.grid-board {
  display: grid;
  grid-template-columns: repeat(8, 1fr);
  gap: 0.2rem;
}

.board-row {
  display: contents;
}

.board-cell {
  width: 40px;
  height: 40px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s;
  font-size: 1.2rem;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.board-cell::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: currentColor;
  opacity: 0.1;
  z-index: -1;
}

.board-cell:hover {
  transform: scale(1.1);
  box-shadow: 0 0 10px currentColor;
}

/* Estados de las celdas */
.water {
  color: #00d4ff;
  border: 1px solid rgba(0, 212, 255, 0.5);
}

.ship {
  color: #00ff88;
  border: 1px solid rgba(0, 255, 136, 0.5);
  box-shadow: 0 0 10px #00ff88;
}

.miss {
  color: #9e9e9e;
  border: 1px solid rgba(158, 158, 158, 0.5);
}

.hit {
  color: #ff0055;
  border: 1px solid rgba(255, 0, 85, 0.5);
  box-shadow: 0 0 15px #ff0055;
  animation: hit-animation 1s infinite;
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

.neon-purple {
  background: rgba(85, 0, 85, 0.3);
  border: 2px solid #b300ff;
  box-shadow: 0 0 15px #b300ff, inset 0 0 10px #b300ff;
  color: #b300ff;
}

/* Animaciones */
@keyframes hit-animation {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.2); opacity: 0.8; }
  100% { transform: scale(1); opacity: 1; }
}

/* Responsive */
@media (max-width: 768px) {
  .naval-battle-grid-container {
    flex-direction: column;
    align-items: center;
  }
  
  .naval-board {
    width: 100%;
    min-width: auto;
  }
  
  .board-cell {
    width: 30px;
    height: 30px;
    font-size: 1rem;
  }
}
</style>