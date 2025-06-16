<template>
  <div class="naval-menu-container">
    <div class="naval-menu-box">
      <div class="naval-options">
        <button class="naval-option" @click="$emit('nueva-partida')">
          <span class="option-icon">🚢</span>
          <span class="option-text">Nueva Partida</span>
        </button>

        <button class="naval-option" @click="$emit('mis-partidas')">
          <span class="option-icon">📋</span>
          <span class="option-text">Mis Partidas</span>
        </button>

        <button class="naval-option" @click="$emit('unirse-partida')">
          <span class="option-icon">🤝</span>
          <span class="option-text">Unirse a Partida</span>
        </button>

        <button class="naval-option" @click="$emit('historial')">
          <span class="option-icon">🏆</span>
          <span class="option-text">Historial</span>
        </button>
      </div>

      <div class="naval-footer">
        <p>¡Prepara tus barcos para la batalla!</p>
      </div>
    </div>
  </div>
</template>

<style>
.naval-menu-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.naval-menu-box {
  background: rgba(255, 255, 255, 0.92);
  padding: 3rem;
  border-radius: 15px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
  border: 4px solid #0a4e9b;
  backdrop-filter: blur(5px);
  width: 90%;
  max-width: 700px;
}

.naval-options {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 2rem;
  margin: 3rem 0;
}

.naval-option {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1.8rem;
  background: linear-gradient(145deg, #0a4e9b, #0082a1);
  color: white;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.3s;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  min-height: 140px;
  border: 2px solid rgba(255, 255, 255, 0.3);
}

.naval-option:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
  background: linear-gradient(145deg, #00b4db, #0a4e9b);
}

.option-icon {
  font-size: 2.5rem;
  margin-bottom: 0.8rem;
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.option-text {
  font-size: 1.3rem;
  font-weight: bold;
  text-align: center;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.naval-footer {
  text-align: center;
  margin-top: 2.5rem;
  color: #0a4e9b;
  font-size: 1.3rem;
  font-weight: bold;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
  .naval-menu-box {
    padding: 2rem;
    width: 95%;
  }
  
  .naval-options {
    grid-template-columns: 1fr;
  }
}
</style>