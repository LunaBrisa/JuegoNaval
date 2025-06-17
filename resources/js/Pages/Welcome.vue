<script>
import { Head, Link } from '@inertiajs/vue3';

export default {
    name: 'WelcomePage',
    props: {
        canLogin: {
            type: Boolean,
            default: false,
        },
        canRegister: {
            type: Boolean,
            default: false,
        },
        laravelVersion: {
            type: String,
            default: '',
        },
        phpVersion: {
            type: String,
            default: '',
        },
    },
    components: {
        Head,
        Link,
    },
};
</script>

<template>
    <Head title="Batalla Naval" />

    <div class="naval-welcome-container">
        <!-- Fondo animado alternativo -->
        <div class="naval-background">
            <div class="water-surface"></div>
            <div class="underwater-bubbles"></div>
            <div class="submarine"></div>
            <div class="fish fish-1">🐠</div>
            <div class="fish fish-2">🐟</div>
            <div class="fish fish-3">🐡</div>
            <div class="sunlight"></div>
        </div>

        <!-- Barra de navegación lateral -->
        <div v-if="canLogin" class="naval-sidebar">
            <div class="sidebar-content">
                <div class="naval-logo">
                    <span class="logo-icon">⚓</span>
                    <span class="logo-text">Batalla Naval</span>
                </div>

                <div class="naval-auth-buttons">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="naval-btn naval-btn-primary"
                    >
                        <span class="btn-icon">👨‍✈️</span>
                        <span class="btn-text">Dashboard</span>
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="naval-btn naval-btn-primary"
                        >
                            <span class="btn-icon">🔑</span>
                            <span class="btn-text">Iniciar Sesión</span>
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="naval-btn naval-btn-secondary"
                        >
                            <span class="btn-icon">✏️</span>
                            <span class="btn-text">Registrarse</span>
                        </Link>
                    </template>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <main class="naval-main-content">
            <div class="naval-hero">
                <h1 class="hero-title">
                    <span class="title-part-1">Batalla</span>
                    <span class="title-part-2">Naval</span>
                </h1>
                <p class="hero-subtitle">Domina los mares en la batalla estratégica definitiva</p>
                
                <div class="hero-buttons">
                    <button class="naval-btn naval-btn-large naval-btn-blue">
                        <span class="btn-icon">🎮</span>
                        <span class="btn-text">Jugar Ahora</span>
                    </button>
                    <button class="naval-btn naval-btn-large naval-btn-transparent">
                        <span class="btn-icon">📖</span>
                        <span class="btn-text">Cómo Jugar</span>
                    </button>
                </div>
            </div>

            <!-- Sección de características -->
            <div class="naval-features">
                <div class="feature-card feature-card-1">
                    <div class="feature-icon">🚢</div>
                    <h3 class="feature-title">Flota Personalizable</h3>
                    <p class="feature-text">Crea y personaliza tu propia flota de barcos</p>
                </div>
                
                <div class="feature-card feature-card-2">
                    <div class="feature-icon">🌊</div>
                    <h3 class="feature-title">Batallas Épicas</h3>
                    <p class="feature-text">Enfréntate a jugadores de todo el mundo</p>
                </div>
                
                <div class="feature-card feature-card-3">
                    <div class="feature-icon">🏆</div>
                    <h3 class="feature-title">Sistema de Rangos</h3>
                    <p class="feature-text">Asciende en el ranking y demuestra tu habilidad</p>
                </div>
            </div>
        </main>

        <!-- Pie de página -->
        <footer class="naval-footer">
            <div class="footer-content">
                <div class="version-info">
                    Laravel v{{ laravelVersion }} | PHP v{{ phpVersion }}
                </div>
                <div class="footer-links">
                    <a href="#" class="footer-link">Términos</a>
                    <a href="#" class="footer-link">Privacidad</a>
                    <a href="#" class="footer-link">Contacto</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* Estilos base */
.naval-welcome-container {
    position: relative;
    min-height: 100vh;
    display: grid;
    grid-template-columns: auto 1fr;
    background: linear-gradient(to bottom, #0a2463, #3e92cc);
    font-family: 'Agency FB', 'Arial Narrow', Arial, sans-serif;
    color: white;
    overflow: hidden;
}

/* Fondo animado alternativo */
.naval-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.water-surface {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        to bottom, 
        rgba(10, 36, 99, 0.8) 0%, 
        rgba(62, 146, 204, 0.5) 50%, 
        rgba(10, 36, 99, 0.3) 100%
    );
}

.underwater-bubbles {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle, white 2%, transparent 2%);
    background-size: 30px 30px;
    animation: bubbles-float 15s linear infinite;
    opacity: 0.3;
}

.submarine {
    position: absolute;
    bottom: 15%;
    left: -200px;
    width: 200px;
    height: 80px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="%23ffffff" d="M496 224c-44.2 0-80 35.8-80 80s35.8 80 80 80 80-35.8 80-80-35.8-80-80-80zm-176 80c0-5.3.4-10.6 1.1-15.8-15.5-6.3-32.3-10-49.9-10.5C289.3 264.4 288 256.3 288 248v-16c0-8.3 1.3-16.4 3.2-24.2 17.6-.5 34.4-4.2 49.9-10.5-.7-5.2-1.1-10.5-1.1-15.8 0-61.9 50.1-112 112-112 8.4 0 16.5 1 24.2 2.9C464.4 57.1 480 40.2 480 20c0-11-9-20-20-20-20.2 0-37.1 15.6-39.1 35.8-7.7-1.9-15.8-2.9-24.2-2.9-61.9 0-112 50.1-112 112 0 5.3.4 10.6 1.1 15.8-15.5 6.3-32.3 10-49.9 10.5C286.7 183.6 288 191.7 288 200v16c0 8.3-1.3 16.4-3.2 24.2-17.6.5-34.4 4.2-49.9 10.5.7 5.2 1.1 10.5 1.1 15.8 0 61.9-50.1 112-112 112-8.4 0-16.5-1-24.2-2.9C175.6 374.9 160 391.8 160 412c0 11 9 20 20 20 20.2 0 37.1-15.6 39.1-35.8 7.7 1.9 15.8 2.9 24.2 2.9 61.9 0 112-50.1 112-112 0-5.3-.4-10.6-1.1-15.8 15.5-6.3 32.3-10 49.9-10.5 1.9 7.7 3.2 15.8 3.2 24.2v16c0 8.3-1.3 16.4-3.2 24.2-17.6.5-34.4 4.2-49.9 10.5.7 5.2 1.1 10.5 1.1 15.8zM208 304c-61.9 0-112-50.1-112-112S146.1 80 208 80s112 50.1 112 112-50.1 112-112 112z"/></svg>');
    background-repeat: no-repeat;
    background-size: contain;
    animation: submarine-move 40s linear infinite;
    filter: drop-shadow(0 0 5px rgba(0, 168, 232, 0.7));
}

.fish {
    position: absolute;
    font-size: 2rem;
    animation: fish-swim 20s linear infinite;
    filter: drop-shadow(0 0 3px rgba(255, 255, 255, 0.7));
}

.fish-1 {
    top: 20%;
    left: -50px;
    animation-delay: 0s;
    animation-duration: 25s;
}

.fish-2 {
    top: 30%;
    left: -50px;
    animation-delay: 5s;
    animation-duration: 30s;
}

.fish-3 {
    top: 40%;
    left: -50px;
    animation-delay: 10s;
    animation-duration: 35s;
}

.sunlight {
    position: absolute;
    top: 0;
    left: 50%;
    width: 300%;
    height: 300%;
    background: radial-gradient(circle at center, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    transform: translateX(-50%);
    animation: sunlight-shimmer 15s ease-in-out infinite alternate;
}

/* Animaciones */
@keyframes bubbles-float {
    0% { background-position: 0 0; }
    100% { background-position: 30px 300px; }
}

@keyframes submarine-move {
    0% { transform: translateX(-200px) rotateY(0deg); }
    49% { transform: translateX(calc(100vw + 200px)) rotateY(0deg); }
    50% { transform: translateX(calc(100vw + 200px)) rotateY(180deg); }
    99% { transform: translateX(-200px) rotateY(180deg); }
    100% { transform: translateX(-200px) rotateY(0deg); }
}

@keyframes fish-swim {
    0% { transform: translateX(-50px) rotateY(0deg); }
    49% { transform: translateX(calc(100vw + 50px)) rotateY(0deg); }
    50% { transform: translateX(calc(100vw + 50px)) rotateY(180deg); }
    99% { transform: translateX(-50px) rotateY(180deg); }
    100% { transform: translateX(-50px) rotateY(0deg); }
}

@keyframes sunlight-shimmer {
    0% { transform: translateX(-50%) rotate(0deg); }
    100% { transform: translateX(-50%) rotate(5deg); }
}

/* Barra lateral */
.naval-sidebar {
    position: relative;
    z-index: 2;
    width: 280px;
    background: rgba(0, 42, 99, 0.7);
    backdrop-filter: blur(10px);
    border-right: 1px solid rgba(0, 212, 255, 0.3);
    box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
    padding: 2rem;
    display: flex;
    flex-direction: column;
}

.sidebar-content {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.naval-logo {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    margin-bottom: 3rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(0, 212, 255, 0.3);
}

.logo-icon {
    font-size: 2rem;
    color: #00d4ff;
    text-shadow: 0 0 10px #00d4ff;
}

.logo-text {
    font-size: 1.5rem;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.naval-auth-buttons {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: auto;
}

/* Botones */
.naval-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.8rem;
    padding: 0.8rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
}

.naval-btn-primary {
    background: linear-gradient(135deg, #00a8e8, #0077b6);
    color: white;
    box-shadow: 0 4px 15px rgba(0, 168, 232, 0.4);
}

.naval-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 168, 232, 0.6);
}

.naval-btn-secondary {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.naval-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-3px);
}

.naval-btn-large {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.naval-btn-blue {
    background: linear-gradient(135deg, #00a8e8, #0077b6);
    color: white;
    box-shadow: 0 4px 15px rgba(0, 168, 232, 0.4);
}

.naval-btn-transparent {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.btn-icon {
    font-size: 1.2rem;
}

.btn-text {
    font-size: 0.95rem;
}

/* Contenido principal */
.naval-main-content {
    position: relative;
    z-index: 1;
    padding: 3rem;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.naval-hero {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    padding: 2rem 0;
    animation: fadeIn 1.5s ease-out;
}

.hero-title {
    font-size: 5rem;
    margin-bottom: 1rem;
    line-height: 1;
}

.title-part-1 {
    display: inline-block;
    color: #00d4ff;
    text-shadow: 0 0 15px #00d4ff;
    animation: float 4s ease-in-out infinite;
}

.title-part-2 {
    display: inline-block;
    color: #00ff88;
    text-shadow: 0 0 15px #00ff88;
    animation: float 4s ease-in-out infinite reverse;
}

.hero-subtitle {
    font-size: 1.5rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 2rem;
    animation: fadeIn 2s ease-out;
}

.hero-buttons {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    margin-top: 2rem;
}

/* Sección de características */
.naval-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 3rem auto 0;
}

.feature-card {
    background: rgba(0, 20, 40, 0.6);
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s;
    backdrop-filter: blur(5px);
    border: 1px solid transparent;
    animation: float 6s ease-in-out infinite;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: inline-block;
    animation: bounce 2s infinite;
}

.feature-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: white;
}

.feature-text {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1rem;
}

.feature-card-1 {
    border-color: #00d4ff;
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.3);
}

.feature-card-2 {
    border-color: #00ff88;
    box-shadow: 0 0 15px rgba(0, 255, 136, 0.3);
    animation-delay: 0.5s;
}

.feature-card-3 {
    border-color: #b300ff;
    box-shadow: 0 0 15px rgba(179, 0, 255, 0.3);
    animation-delay: 1s;
}

/* Pie de página */
.naval-footer {
    position: relative;
    z-index: 2;
    margin-top: auto;
    padding: 2rem;
    background: rgba(0, 20, 40, 0.7);
    backdrop-filter: blur(5px);
    border-top: 1px solid rgba(0, 212, 255, 0.2);
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.version-info {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

.footer-links {
    display: flex;
    gap: 1.5rem;
}

.footer-link {
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    transition: color 0.3s;
    font-size: 0.9rem;
}

.footer-link:hover {
    color: #00d4ff;
}

/* Animaciones adicionales */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Responsive */
@media (max-width: 1024px) {
    .naval-welcome-container {
        grid-template-columns: 1fr;
    }
    
    .naval-sidebar {
        width: 100%;
        padding: 1rem;
        border-right: none;
        border-bottom: 1px solid rgba(0, 212, 255, 0.3);
    }
    
    .naval-logo {
        margin-bottom: 1.5rem;
    }
    
    .naval-auth-buttons {
        flex-direction: row;
        justify-content: flex-end;
    }
    
    .hero-title {
        font-size: 3.5rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 768px) {
    .naval-main-content {
        padding: 1.5rem;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
    }
    
    .naval-features {
        grid-template-columns: 1fr;
    }
    
    .footer-content {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>