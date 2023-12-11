<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <h1>Lista de Nombres</h1>
    <ul>
      <li v-for="item in nombres" :key="item.id">
        {{ item.id }} - {{ item.nombre }}
      </li>
    </ul>
    <form @submit.prevent="agregarNombre">
      <label for="nombre">Nuevo Nombre:</label>
      <input type="text" v-model="nuevoNombre" required>
      <button type="submit">Agregar Nombre</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
// Configuración para permitir solicitudes CORS
axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
axios.defaults.headers.common['Access-Control-Allow-Methods'] = 'GET, POST, PUT, DELETE';
axios.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, Content-Type, X-Auth-Token';


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
        const response = await axios.get('/api/get_nombre', { withCredentials: true });

        //console.log('Respuesta del servidor:', response);
        this.nombres = response.data;
      } catch (error) {
        console.error('Error en la petición:', error);
      }
    },
    async agregarNombre() {
      try {
        // Realizar la solicitud POST para agregar un nuevo nombre
        const response = await axios.post('/api/post_nombre', { nombre: this.nuevoNombre }, { withCredentials: true });

        // Limpiar el campo después de agregar el nombre
        this.nuevoNombre = "";

        // Actualizar la lista de nombres
        this.obtenerNombres();

        //console.log('Respuesta del servidor:', response);
      } catch (error) {
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
