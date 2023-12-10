<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h1>Lista de Nombres</h1>
    <ul>
      
      <li v-for="item in nombres" :key="item.id">
        {{ item.id }} - {{ item.nombre }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      msg: "Hola mundo",
      nombres: [], // Aquí almacenaremos los nombres obtenidos del backend
    };
  },
  mounted() {
    // Realizar la petición al backend y actualizar la lista de nombres
    this.obtenerNombres();
  },
  methods: {
    async obtenerNombres() {
      try {
        await axios.get('http://backend:3000/get_nombre')
        .then(response => {
          // Manejar la respuesta del servidor (response.data)
          console.log('Respuesta del servidor:', response.data);
          this.nombres = response.data;  // Corregí la variable "data" a "response.data"
        })
        .catch(error => {
          // Manejar errores de la petición
          console.error('Error en la petición:', error);
        });

      } catch (error) {
        // Manejar errores de la petición
        console.error('Error en la petición:', error);
      }
    },
  },
};

// Realiza la petición




</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
