import React, { useState } from 'react'
import ReactPlayer from 'react-player';
import '../style/index.css'

type Props = {}

const Pr40 = (props: Props) => {

    const playlist = [
        {nombre:"Ezio's Family - Assassins Creed Soundtrack nº 3", url:"https://www.youtube.com/watch?v=FSVHx23ByhM&pp=ygUMZXppb3MgZmFtaWx5"}, 
        {nombre:"Everything In Its Right Place - Radiohead", url:"https://www.youtube.com/watch?v=onRk0sjSgFU&pp=ygUgZXZlcnl0aGluZyBpcyBpbiB0aGUgcmlnaHQgcGxhY2U%3D"}, 
        {nombre:"Goodbye Brother - Game of Thrones Soundtrack nº", url:"https://www.youtube.com/watch?v=spQljapBR7s&pp=ygUPZ29vZGJ5ZSBicm90aGVy"}
    ];

    const [song, setsong] = useState(playlist[0].url)

    function cambiarCancion(index: number){
        setsong(playlist[index].url);
    }

    return (
        <div className='todo'>
            <div className="player">
                <ReactPlayer
                    url={song}
                    
                    controls
                    width="600px"
                    height="600px"
                />
            </div>
            {
                playlist.map((cancion, index) => (
                    <div className='nombres'>
                        <button key={index} onClick={() => cambiarCancion(index)}>
                        {cancion.nombre}
                        </button>
                    </div>
                ))
            }
        </div>
    )
}

export default Pr40