<template>
  <div>
    <label>Escribe algo:</label>
    <input type="text" v-model="mensaje" @input="enviarAlPadre" />
  </div>
</template>

<script>
export default {
  name: 'CampoTexto',
  data() {
    return {
      mensaje: ''
    }
  },
  methods: {
    enviarAlPadre() {
      this.$emit('texto-escrito', this.mensaje)
    }
  }
}
</script>