<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

export default {
    components: {
        GuestLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Checkbox,
        Head,
        Link,
    },
    data() {
        return {
            form: useForm({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        },
    },
};
</script>

<template>
    <GuestLayout>
        <Head title="Registro en el Puerto" />

        <div class="naval-register-container">
            <div class="naval-background">
                <div class="waves"></div>
                <div class="waves"></div>
                <div class="waves"></div>
                <div class="ship"></div>
                <div class="lighthouse"></div>
            </div>

            <div class="naval-register-box">
                <div class="naval-header">
                    <h1>Registro</h1>
                    <div class="compass-icon">🧭</div>
                </div>

                <form @submit.prevent="submit" class="naval-form">
                    <div class="naval-input-group">
                        <InputLabel for="name" value="Nombre del Capitán" class="naval-label" />
                        <TextInput
                            id="name"
                            type="text"
                            class="naval-input"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Tu nombre completo"
                        />
                        <InputError class="naval-error" :message="form.errors.name" />
                    </div>

                    <div class="naval-input-group">
                        <InputLabel for="email" value="Correo" class="naval-label" />
                        <TextInput
                            id="email"
                            type="email"
                            class="naval-input"
                            v-model="form.email"
                            required
                            autocomplete="username"
                            placeholder="Señal de identificación"
                        />
                        <InputError class="naval-error" :message="form.errors.email" />
                    </div>

                    <div class="naval-input-group">
                        <InputLabel for="password" value="Contraseña" class="naval-label" />
                        <TextInput
                            id="password"
                            type="password"
                            class="naval-input"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                            placeholder="Contraseña de acceso"
                        />
                        <InputError class="naval-error" :message="form.errors.password" />
                    </div>

                    <div class="naval-input-group">
                        <InputLabel for="password_confirmation" value="Confirmar contraseña" class="naval-label" />
                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="naval-input"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Repite tu contraseña"
                        />
                        <InputError class="naval-error" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="naval-actions">
                        <Link
                            :href="route('login')"
                            class="naval-login-link"
                        >
                            ¿Ya estás registrado?
                        </Link>

                        <PrimaryButton class="naval-submit" :class="{ 'naval-submit-disabled': form.processing }" :disabled="form.processing">
                            <span class="naval-submit-text">Registrar Embarcación</span>
                            <span class="naval-submit-icon">⛵</span>
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<style scoped>
.naval-register-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #1a2a6c, #0a4e9b, #00b4db);
    overflow: hidden;
    font-family: 'Arial', sans-serif;
}

.naval-background {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.waves {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23007cc7"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23007cc7"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23007cc7"/></svg>');
    background-size: 1200px 100px;
    animation: wave 15s linear infinite;
}

.waves:nth-child(1) {
    bottom: 0;
    opacity: 0.5;
    animation-delay: 0s;
}

.waves:nth-child(2) {
    bottom: 10px;
    opacity: 0.3;
    animation-delay: -5s;
    animation-duration: 20s;
}

.waves:nth-child(3) {
    bottom: 15px;
    opacity: 0.2;
    animation-delay: -2s;
    animation-duration: 25s;
}

@keyframes wave {
    0% { background-position-x: 0; }
    100% { background-position-x: 1200px; }
}

.ship {
    position: absolute;
    bottom: 150px;
    left: -200px;
    width: 200px;
    height: 100px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="%23ffffff" d="M496.1 384c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm-144-16c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm208 0c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm-80-208c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-48V160c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-48V160c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H96v-32c0-17.7-14.3-32-32-32H16C7.2 144 0 136.8 0 128s7.2-16 16-16h48c35.3 0 64 28.7 64 64v32h480v-32c0-35.3 28.7-64 64-64h48c8.8 0 16 7.2 16 16s-7.2 16-16 16h-48c-17.7 0-32 14.3-32 32v32H512v-48zM96 352h448c17.7 0 32-14.3 32-32v-96H64v96c0 17.7 14.3 32 32 32zm544-32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64v-96c0-17.7 14.3-32 32-32h576c17.7 0 32 14.3 32 32v96z"/></svg>');
    background-repeat: no-repeat;
    background-size: contain;
    animation: ship 30s linear infinite;
}

.lighthouse {
    position: absolute;
    right: 50px;
    bottom: 100px;
    width: 60px;
    height: 100px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="%23ffffff" d="M381.1 44.4c5.1-8.9 4.1-20-2.5-27.7S365.7 0 356.3 0H27.7C18.3 0 8.9 5.7 3.3 13.4S-2 35.5 3.1 44.4L137.6 442.6c5.1 8.9 15 14.6 25.2 14.6s20.1-5.7 25.2-14.6L381.1 44.4zM84.3 80h215.4L192 311.8 84.3 80z"/></svg>');
    background-repeat: no-repeat;
    background-size: contain;
    animation: light 4s infinite alternate;
}

@keyframes light {
    0% { opacity: 0.7; }
    100% { opacity: 1; }
}

@keyframes ship {
    0% { transform: translateX(-200px); }
    100% { transform: translateX(calc(100vw + 200px)); }
}

.naval-register-box {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 500px;
    background: rgba(255, 255, 255, 0.9);
    padding: 2.5rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    border: 3px solid #0a4e9b;
}

.naval-header {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
}

.naval-header h1 {
    color: #0a4e9b;
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.compass-icon {
    font-size: 2rem;
    color: #0a4e9b;
    animation: spin 8s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
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
    color: #0a4e9b;
    font-weight: bold;
    font-size: 1rem;
}

.naval-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #0a4e9b;
    border-radius: 5px;
    font-size: 1rem;
    transition: all 0.3s;
    background-color: rgba(255, 255, 255, 0.8);
}

.naval-input:focus {
    outline: none;
    border-color: #00b4db;
    box-shadow: 0 0 0 3px rgba(0, 180, 219, 0.3);
}

.naval-error {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.naval-terms {
    margin: 1rem 0;
}

.naval-checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.naval-checkbox-text {
    margin-left: 0.5rem;
    color: #0a4e9b;
    font-size: 0.9rem;
}

.naval-terms-link {
    color: #00b4db;
    text-decoration: none;
    font-weight: bold;
}

.naval-terms-link:hover {
    text-decoration: underline;
}

.naval-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
}

.naval-login-link {
    color: #0a4e9b;
    font-size: 0.9rem;
    text-decoration: none;
    transition: color 0.3s;
}

.naval-login-link:hover {
    color: #00b4db;
    text-decoration: underline;
}

.naval-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.75rem 1.5rem;
    background-color: #0a4e9b;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
}

.naval-submit:hover {
    background-color: #00b4db;
    transform: translateY(-2px);
}

.naval-submit:active {
    transform: translateY(0);
}

.naval-submit-disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.naval-submit-text {
    margin-right: 0.5rem;
}

.naval-submit-icon {
    font-size: 1.2rem;
}
</style>