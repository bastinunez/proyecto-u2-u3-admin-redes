import { useState, useEffect} from 'react'
import './App.css'
import axios from 'axios';
function App() {
  const [usuarios, setUsuarios] = useState([]);
  const [nombre, setNombre] = useState();
  const [csrfToken, setCsrfToken] = useState('');
  const direccion = "http://backend:3000/api"

  const datos = async () =>{
    try {
      const respuesta = await axios.get(`${direccion}/get_nombre`)
      //console.log(respuesta.data)
      if(respuesta.data){
        //console.log("pasa aqui")
        setUsuarios(respuesta.data)
      }
    } catch (error) {
      console.log(error)
    }
  }
  const subirDatos = async (e) => {
    e.preventDefault()
    try {
      const response = await axios.post(`${direccion}/post_nombre`,{
          nombre: nombre,
        }
      );
      console.log(response.data);
    } catch (error) {
      console.error('Error al enviar los datos', error);
    }
  }

  useEffect( () => {
    datos();
  },[subirDatos])

  return (
    <>
      <div>
        <div className=''>
          <h2>Proyecto U2 y U3 - Administración de redes</h2>
        </div>
        <div>
          <ul>
            {usuarios.map((usuario) => (
              <li key={usuario.id}>
                {usuario.id}: {usuario.nombre}
              </li>
            ))}
          </ul>
        </div>
        <div>
          <div>
            <h5>Agrega otro nombre</h5>
          </div>
          <form className="row g-3" onSubmit={subirDatos}>
            <div className="col-auto">
              <label for="inputPassword2" className="visually-hidden">Password</label>
              <input type="text" className="form-control" id="inputPassword2" placeholder="Ingresa nombre" onChange={(e) => setNombre(e.target.value)}/>
            </div>
            <div className="col-auto">
              <button type="submit" className="btn btn-primary mb-3">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </>
  )
}

export default App;
