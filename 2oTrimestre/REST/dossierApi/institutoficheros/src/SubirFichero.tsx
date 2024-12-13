import axios from 'axios';
import {  useState, FormEvent } from 'react'

type Props = {}

function SubirFichero({ }: Props) {

    const [mensajes, setmensajes] = useState("");

    async function subirfichero(ev: FormEvent<HTMLFormElement>) {
        ev.preventDefault();
        let formulario = ev.currentTarget;
        let file = formulario.inputfichero.files[0];
        if (file) {
            const formData = new FormData();
            formData.append("file", file);
            try {
                let response = await axios.post('http://localhost:8001/api/upload', 
                    formData, {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }
                );

                let respuesta = "";

                if (response.data) { respuesta = JSON.stringify(response.data); }

                setmensajes(respuesta);
                
            } catch (error) { console.log("error dice: " + error); }
        }
    }
    return (
        <div >
            <form onSubmit={subirfichero}>
                <label htmlFor="file" >
                    elegir fichero
                </label>
                <input id="inputfichero" type="file" />
                <button type="submit">Subir</button>
            </form>
            mensajes: {mensajes}
        </div>
    );

}

export default SubirFichero