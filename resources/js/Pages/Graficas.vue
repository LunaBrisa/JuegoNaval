<script>
import { Bar, Line } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement
} from 'chart.js'

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement
)

export default {
  components: {
    AuthenticatedLayout,
    Head,
    BarChart: Bar,
    LineChart: Line
  },
  data() {
    return {
      barData: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
        datasets: [{
          label: 'Partidas Jugadas',
          backgroundColor: '#60A5FA',
          borderColor: '#3B82F6',
          data: [10, 20, 15, 25],
          borderRadius: 8,
          hoverBackgroundColor: '#2563EB'
        }]
      },
      lineData: {
        labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
        datasets: [{
          label: 'Victorias',
          data: [2, 5, 4, 6],
          fill: true,
          backgroundColor: 'rgba(59, 130, 246, 0.2)',
          borderColor: '#3B82F6',
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            labels: {
              color: '#1E3A8A',
              font: {
                size: 14
              }
            }
          },
          tooltip: {
            backgroundColor: '#1E40AF',
            titleColor: '#F9FAFB',
            bodyColor: '#F9FAFB'
          }
        },
        animation: {
          duration: 1500,
          easing: 'easeInOutQuart'
        }
      }
    }
  }
}
</script>

<template>
  <AuthenticatedLayout>
    <Head title="📊 Gráficas" />

    <template #header>
      <h2 class="font-bold text-2xl text-indigo-900">📊 Estadísticas del Capitán</h2>
    </template>

    <div class="p-6 space-y-10 bg-blue-50 rounded-xl shadow-xl">
      <!-- Gráfico de Barras -->
      <div class="bg-white rounded-xl shadow-md p-6 hover:scale-[1.02] transition">
        <h3 class="text-lg font-semibold mb-4 text-blue-800">Partidas Jugadas por Mes</h3>
        <BarChart :data="barData" :options="options" />
      </div>

      <!-- Gráfico de Líneas -->
      <div class="bg-white rounded-xl shadow-md p-6 hover:scale-[1.02] transition">
        <h3 class="text-lg font-semibold mb-4 text-blue-800">Victorias Semanales</h3>
        <LineChart :data="lineData" :options="options" />
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
h3 {
  animation: fadeIn 1s ease;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
