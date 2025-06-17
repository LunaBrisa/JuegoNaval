<script>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
    components: {
        Checkbox,
        GuestLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Head,
        Link,
    },
    props: {
        canResetPassword: {
            type: Boolean,
            default: false,
        },
        status: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            form: useForm({
                email: '',
                password: '',
                remember: false,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        },
    },
};
</script>

<template>
    <GuestLayout>
        <Head title="Acceso a la Flota" />

        <div class="naval-login-container">
            <!-- Fondo submarino animado -->
            <div class="naval-background">
                <div class="water-surface"></div>
                <div class="underwater-bubbles"></div>
                <div class="submarine"></div>
                <div class="fish fish-1">🐠</div>
                <div class="fish fish-2">🐟</div>
                <div class="sunlight"></div>
                <div class="radar">📡</div>
            </div>

            <!-- Formulario de login -->
            <div class="naval-login-box">
                <div class="naval-header">
                    <div class="naval-logo">
                        <span class="logo-icon">🔐</span>
                        <span class="logo-text">Acceso a la Flota</span>
                    </div>
                    <p class="naval-subtitle">Identifícate para tomar el mando</p>
                </div>

                <div v-if="status" class="naval-status">
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="naval-form">
                    <div class="naval-input-group">
                        <InputLabel for="email" value="Señal de Radio" class="naval-label" />
                        <TextInput
                            id="email"
                            type="email"
                            class="naval-input"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Tu correo electrónico"
                        />
                        <InputError class="naval-error" :message="form.errors.email" />
                    </div>

                    <div class="naval-input-group">
                        <InputLabel for="password" value="Código de Acceso" class="naval-label" />
                        <TextInput
                            id="password"
                            type="password"
                            class="naval-input"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            placeholder="Tu contraseña secreta"
                        />
                        <InputError class="naval-error" :message="form.errors.password" />
                    </div>

                    <div class="naval-remember">
                        <label class="naval-checkbox-label">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="naval-checkbox-text">Recordar mi acceso</span>
                        </label>
                    </div>

                    <div class="naval-actions">
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="naval-forgot"
                        >
                            ¿Perdiste tu código de acceso?
                        </Link>

                        <PrimaryButton class="naval-submit" :class="{ 'naval-submit-disabled': form.processing }" :disabled="form.processing">
                            <span class="naval-submit-text">Tomar el Mando</span>
                            <span class="naval-submit-icon">⛴️</span>
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Estilos base */
.naval-login-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to bottom, #0a2463, #3e92cc);
    font-family: 'Agency FB', 'Arial Narrow', Arial, sans-serif;
    overflow: hidden;
}

/* Fondo animado */
.naval-background {
    position: absolute;
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

.radar {
    position: absolute;
    top: 20%;
    right: 10%;
    font-size: 3rem;
    animation: radar-scan 3s linear infinite;
    filter: drop-shadow(0 0 5px #00ff88);
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

@keyframes radar-scan {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Formulario de login */
.naval-login-box {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 500px;
    background: rgba(0, 42, 99, 0.85);
    backdrop-filter: blur(10px);
    padding: 2.5rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    border: 2px solid rgba(0, 212, 255, 0.5);
    animation: fadeIn 1s ease-out;
}

.naval-header {
    text-align: center;
    margin-bottom: 2rem;
}

.naval-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.8rem;
    margin-bottom: 1rem;
}

.logo-icon {
    font-size: 2.5rem;
    color: #00d4ff;
    text-shadow: 0 0 10px #00d4ff;
    animation: pulse 2s infinite;
}

.logo-text {
    font-size: 1.8rem;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.naval-subtitle {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.1rem;
    margin-bottom: 0;
}

.naval-status {
    padding: 0.75rem;
    margin-bottom: 1.5rem;
    background-color: rgba(0, 255, 136, 0.2);
    color: #00ff88;
    border-radius: 8px;
    text-align: center;
    border: 1px solid rgba(0, 255, 136, 0.3);
    text-shadow: 0 0 5px rgba(0, 255, 136, 0.3);
}

.naval-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.naval-input-group {
    position: relative;
}

.naval-label {
    display: block;
    margin-bottom: 0.5rem;
    color: #00d4ff;
    font-weight: bold;
    font-size: 1rem;
    text-shadow: 0 0 5px rgba(0, 212, 255, 0.5);
}

.naval-input {
    width: 100%;
    padding: 0.8rem 1.2rem;
    background: rgba(0, 20, 40, 0.7);
    border: 1px solid rgba(0, 212, 255, 0.3);
    border-radius: 8px;
    font-size: 1rem;
    color: white;
    transition: all 0.3s;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.naval-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.naval-input:focus {
    outline: none;
    border-color: #00ff88;
    box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.3);
    background: rgba(0, 30, 60, 0.8);
}

.naval-error {
    color: #ff6b6b;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    text-shadow: 0 0 3px rgba(255, 0, 0, 0.3);
}

.naval-remember {
    margin: 1rem 0;
}

.naval-checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.naval-checkbox-text {
    margin-left: 0.5rem;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
}

.naval-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
}

.naval-forgot {
    color: rgba(255, 255, 255, 0.7);
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s;
}

.naval-forgot:hover {
    color: #00d4ff;
    text-shadow: 0 0 5px rgba(0, 212, 255, 0.5);
}

.naval-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.8rem 1.8rem;
    background: linear-gradient(135deg, #00a8e8, #0077b6);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    box-shadow: 0 4px 15px rgba(0, 168, 232, 0.4);
}

.naval-submit:hover {
    background: linear-gradient(135deg, #00b8f8, #0087c6);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 168, 232, 0.6);
}

.naval-submit:active {
    transform: translateY(0);
}

.naval-submit-disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none !important;
}

.naval-submit-text {
    margin-right: 0.5rem;
}

.naval-submit-icon {
    font-size: 1.2rem;
    animation: bounce 2s infinite;
}

/* Animaciones adicionales */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

/* Responsive */
@media (max-width: 768px) {
    .naval-login-box {
        padding: 1.5rem;
        margin: 1rem;
    }
    
    .naval-logo {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .naval-actions {
        flex-direction: column;
        gap: 1rem;
    }
    
    .naval-forgot {
        order: 2;
        text-align: center;
    }
    
    .naval-submit {
        order: 1;
        width: 100%;
    }
    
    .radar {
        display: none;
    }
}
</style>