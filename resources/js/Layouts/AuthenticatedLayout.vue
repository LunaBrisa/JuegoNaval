<script>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    ApplicationLogo,
    Dropdown,
    DropdownLink,
    Link
  },
  data() {
    return {
      showingNavigationDropdown: false
    };
  }
};
</script>

<template>
  <div class="naval-layout">
    <!-- Fondo animado mejorado -->
    <div class="naval-background">
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="waves"></div>
      <div class="ship"></div>
      <div class="ship ship-2"></div>
      <div class="lighthouse"></div>
      <div class="seagulls"></div>
      <div class="bubbles"></div>
    </div>

    <!-- Barra de navegación con diseño de videojuego -->
    <nav class="naval-navbar">
      <div class="naval-nav-container">
        <!-- Logo con efecto neon -->
        <Link :href="route('dashboard')" class="naval-logo">
          <span class="logo-icon">⚓</span>
          <span class="logo-text">BATALLA NAVAL</span>
        </Link>

        <!-- Menú de usuario mejorado -->
        <div class="naval-user-menu">
          <Dropdown align="right" width="48">
            <template #trigger>
              <button class="naval-profile-btn">
                <span class="profile-icon">👨‍✈️</span>
                <span class="profile-name">{{ $page.props.auth.user.name }}</span>
                <svg class="dropdown-arrow" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </template>

            <template #content>
              <DropdownLink :href="route('profile.edit')" class="naval-dropdown-item">
                <span class="item-icon">👤</span> 
                <span class="item-text">Perfil</span>
              </DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button" class="naval-dropdown-item">
                <span class="item-icon">🚪</span> 
                <span class="item-text">Cerrar sesión</span>
              </DropdownLink>
            </template>
          </Dropdown>
        </div>
      </div>
    </nav>

    <!-- Contenido principal -->
    <main class="naval-main-content">
      <slot />
    </main>
  </div>
</template>

<style scoped>
/* Estilos base del layout */
.naval-layout {
  min-height: 100vh;
  position: relative;
  overflow-x: hidden;
  background: linear-gradient(135deg, #0a1128, #001f54, #034078);
}

/* Fondo animado mejorado */
.naval-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
  overflow: hidden;
}

.waves {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 150px;
  background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%2300a8e8"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%2300a8e8"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%2300a8e8"/></svg>');
  background-size: 1200px 150px;
  animation: wave 15s linear infinite;
}

.waves:nth-child(1) {
  bottom: 0;
  opacity: 0.7;
  animation-delay: 0s;
}

.waves:nth-child(2) {
  bottom: 20px;
  opacity: 0.5;
  animation-delay: -5s;
  animation-duration: 20s;
}

.waves:nth-child(3) {
  bottom: 30px;
  opacity: 0.3;
  animation-delay: -2s;
  animation-duration: 25s;
}

.ship {
  position: absolute;
  bottom: 180px;
  left: -200px;
  width: 200px;
  height: 100px;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="%23ffffff" d="M496.1 384c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm-144-16c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm208 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm-80-208c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-48V160c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-48V160c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H96v-32c0-17.7-14.3-32-32-32H16C7.2 144 0 136.8 0 128s7.2-16 16-16h48c35.3 0 64 28.7 64 64v32h480v-32c0-35.3 28.7-64 64-64h48c8.8 0 16 7.2 16 16s-7.2 16-16 16h-48c-17.7 0-32 14.3-32 32v32H512v-48zM96 352h448c17.7 0 32-14.3 32-32v-96H64v96c0 17.7 14.3 32 32 32zm544-32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v-96c0-17.7 14.3-32 32-32h576c17.7 0 32 14.3 32 32v96z"/></svg>');
  background-repeat: no-repeat;
  background-size: contain;
  animation: ship 30s linear infinite;
  filter: drop-shadow(0 0 10px rgba(0, 168, 232, 0.7));
}

.ship-2 {
  bottom: 220px;
  width: 150px;
  height: 75px;
  animation: ship 40s linear infinite;
  animation-delay: 10s;
  opacity: 0.8;
}

.lighthouse {
  position: absolute;
  right: 5%;
  bottom: 120px;
  width: 80px;
  height: 120px;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="%23ffffff" d="M381.1 44.4c5.1-8.9 4.1-20-2.5-27.7S365.7 0 356.3 0H27.7C18.3 0 8.9 5.7 3.3 13.4S-2 35.5 3.1 44.4L137.6 442.6c5.1 8.9 15 14.6 25.2 14.6s20.1-5.7 25.2-14.6L381.1 44.4zM84.3 80h215.4L192 311.8 84.3 80z"/></svg>');
  background-repeat: no-repeat;
  background-size: contain;
  animation: light 4s infinite alternate, swing 6s infinite alternate;
  transform-origin: bottom;
  filter: drop-shadow(0 0 15px rgba(255, 215, 0, 0.7));
}

.seagulls {
  position: absolute;
  top: 20%;
  left: 0;
  width: 100%;
  height: 50px;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="%23ffffff" opacity="0.6" d="M640 96c0-17.7-14.3-32-32-32H32C14.3 64 0 78.3 0 96s14.3 32 32 32h48l22.2 30.8c7.4 10.3 8.5 23.6 3 34.9L64 256l43 86.1c5.3 10.6 5.4 22.9.3 33.6L32 416h576l-75.3-40.3c-5.1-10.7-5-23 .3-33.6L576 256l-41.2-92.3c-5.5-11.3-4.4-24.6 3-34.9L560 128h48c17.7 0 32-14.3 32-32z"/></svg>');
  background-repeat: repeat-x;
  background-size: 200px 50px;
  animation: seagulls 60s linear infinite;
}

.bubbles {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="%23ffffff" opacity="0.2" d="M256 0c53 0 96 43 96 96s-43 96-96 96-96-43-96-96 43-96 96-96zm0 256c53 0 96 43 96 96s-43 96-96 96-96-43-96-96 43-96 96-96zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm-96-96c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm192 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32z"/></svg>');
  background-repeat: space;
  animation: bubbles 20s linear infinite;
}

/* Animaciones */
@keyframes wave {
  0% { background-position-x: 0; }
  100% { background-position-x: 1200px; }
}

@keyframes light {
  0% { opacity: 0.7; filter: drop-shadow(0 0 10px gold); }
  50% { opacity: 1; filter: drop-shadow(0 0 20px gold); }
  100% { opacity: 0.7; filter: drop-shadow(0 0 10px gold); }
}

@keyframes swing {
  0% { transform: rotate(-5deg); }
  100% { transform: rotate(5deg); }
}

@keyframes ship {
  0% { transform: translateX(-200px); }
  100% { transform: translateX(calc(100vw + 200px)); }
}

@keyframes seagulls {
  0% { background-position-x: -200px; }
  100% { background-position-x: calc(100vw + 200px); }
}

@keyframes bubbles {
  0% { background-position-y: 0; opacity: 0; }
  50% { opacity: 0.3; }
  100% { background-position-y: -1000px; opacity: 0; }
}

/* Barra de navegación estilo videojuego */
.naval-navbar {
  position: relative;
  z-index: 10;
  background: rgba(0, 42, 85, 0.8);
  backdrop-filter: blur(10px);
  border-bottom: 3px solid rgba(0, 212, 255, 0.5);
  box-shadow: 0 4px 30px rgba(0, 212, 255, 0.3);
}

.naval-nav-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0.8rem 1.5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Logo con efecto neon */
.naval-logo {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  text-decoration: none;
  transition: all 0.3s;
}

.logo-icon {
  font-size: 2rem;
  text-shadow: 0 0 10px #00d4ff;
  animation: pulse 2s infinite alternate;
}

.logo-text {
  font-size: 1.5rem;
  font-weight: bold;
  color: white;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-shadow: 0 0 10px #00d4ff, 0 0 20px #00d4ff;
  background: linear-gradient(90deg, #00d4ff, #ffffff, #00d4ff);
  background-size: 200% auto;
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  animation: shine 3s linear infinite;
}

@keyframes pulse {
  0% { transform: scale(1); }
  100% { transform: scale(1.1); }
}

@keyframes shine {
  to { background-position: 200% center; }
}

/* Botón de perfil mejorado */
.naval-profile-btn {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  background: rgba(0, 168, 232, 0.2);
  border: 2px solid rgba(0, 212, 255, 0.5);
  border-radius: 50px;
  padding: 0.7rem 1.2rem;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  backdrop-filter: blur(5px);
  box-shadow: 0 0 15px rgba(0, 212, 255, 0.3);
}

.naval-profile-btn:hover {
  background: rgba(0, 168, 232, 0.4);
  transform: translateY(-2px);
  box-shadow: 0 0 20px rgba(0, 212, 255, 0.5);
}

.profile-icon {
  font-size: 1.5rem;
  filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.7));
}

.profile-name {
  font-size: 1rem;
}

.dropdown-arrow {
  width: 1rem;
  height: 1rem;
  margin-left: 0.3rem;
  transition: transform 0.2s;
  filter: drop-shadow(0 0 2px rgba(255, 255, 255, 0.7));
}

/* Menú desplegable estilo videojuego */
.naval-dropdown-item {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  padding: 0.8rem 1.2rem;
  color: #0a4e9b;
  font-weight: 500;
  transition: all 0.2s;
  background: rgba(255, 255, 255, 0.9);
  border-left: 4px solid transparent;
}

.naval-dropdown-item:hover {
  background: #e6f2ff;
  color: #0066cc;
  border-left: 4px solid #00a8e8;
  transform: translateX(5px);
}

.item-icon {
  font-size: 1.2rem;
}

.item-text {
  font-size: 0.95rem;
}

/* Contenido principal */
.naval-main-content {
  position: relative;
  z-index: 1;
  min-height: calc(100vh - 64px);
  padding-top: 1.5rem;
}

/* Responsive */
@media (max-width: 768px) {
  .naval-nav-container {
    padding: 0.6rem 1rem;
  }
  
  .logo-text {
    font-size: 1.2rem;
  }
  
  .profile-name {
    display: none;
  }
  
  .naval-profile-btn {
    padding: 0.6rem;
  }
}
</style>