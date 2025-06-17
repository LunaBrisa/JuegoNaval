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
    verHistorial(id) {
      router.visit(`/historial/${id}`);
    }
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="Mis Partidas" />

    <!-- Fondo animado naval -->
    <div class="naval-background">
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="ship"></div>
      <div class="ship ship-2"></div>
    </div>

    <div class="naval-content-container">
      <h2 class="naval-title neon-blue">⚓ Mis Partidas</h2>

      <div class="naval-table-container neon-purple">
        <table class="naval-table">
          <thead>
            <tr>
              <th class="neon-blue">
                <span class="option-icon">👤</span>
                <span class="option-text">Tu Nombre</span>
              </th>
              <th class="neon-red">
                <span class="option-icon">🧨</span>
                <span class="option-text">Enemigo</span>
              </th>
              <th class="neon-green">
                <span class="option-icon">👁️</span>
                <span class="option-text">Ver</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr 
              v-for="(partida, index) in partidas" 
              :key="index" 
              class="naval-table-row"
              :class="{'neon-yellow': index % 2 === 0, 'neon-blue': index % 2 !== 0}"
            >
              <td>{{ usuario.name }}</td>
              <td>{{ partida.enemigo }}</td>
              <td class="text-center">
                <button 
                  @click="verHistorial(partida.id)"
                  class="naval-table-button neon-green"
                >
                  <span class="option-icon">👁️</span>
                </button>
              </td>
            </tr>
            <tr v-if="partidas.length === 0">
              <td colspan="3" class="naval-table-empty neon-yellow">
                <span class="option-icon">🚫</span>
                <span class="option-text">No hay partidas registradas</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style>
/* Contenedor principal */
.naval-content-container {
  position: relative;
  z-index: 2;
  padding: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

/* Fondo animado */
.naval-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

/* Título */
.naval-title {
  text-align: center;
  font-size: 2.5rem;
  margin-bottom: 2rem;
  padding: 1rem;
  border-radius: 15px;
  backdrop-filter: blur(5px);
  animation: float 3s ease-in-out infinite;
}

/* Contenedor de la tabla */
.naval-table-container {
  padding: 1.5rem;
  border-radius: 15px;
  backdrop-filter: blur(5px);
  transition: all 0.3s;
  overflow: hidden;
}

.naval-table-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 25px currentColor, inset 0 0 15px currentColor;
}

/* Estilos de la tabla */
.naval-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  text-align: left;
}

.naval-table th {
  padding: 1.5rem;
  font-size: 1.2rem;
  text-transform: uppercase;
  letter-spacing: 1px;
  backdrop-filter: blur(5px);
  position: relative;
  overflow: hidden;
}

.naval-table th::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.2);
  z-index: -1;
}

.naval-table td {
  padding: 1.2rem 1.5rem;
  font-size: 1.1rem;
  transition: all 0.3s;
}

.naval-table-row:hover td {
  transform: translateX(5px);
  text-shadow: 0 0 10px currentColor;
}

/* Botón de acción */
.naval-table-button {
  border: none;
  background: transparent;
  cursor: pointer;
  padding: 0.5rem 1rem;
  border-radius: 50px;
  transition: all 0.3s;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.naval-table-button:hover {
  transform: scale(1.2);
  box-shadow: 0 0 15px currentColor;
}

/* Celda vacía */
.naval-table-empty {
  text-align: center;
  padding: 2rem;
  font-size: 1.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

/* Efectos neon (reutilizados) */
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

.option-icon {
  filter: drop-shadow(0 0 5px currentColor);
  margin-right: 0.5rem;
}

.option-text {
  text-shadow: 0 0 10px currentColor;
}

/* Animaciones */
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Responsive */
@media (max-width: 768px) {
  .naval-content-container {
    padding: 1rem;
  }
  
  .naval-table th, 
  .naval-table td {
    padding: 0.8rem;
    font-size: 0.9rem;
  }
  
  .naval-title {
    font-size: 1.8rem;
  }
  
  .option-icon {
    display: none;
  }
}
</style>