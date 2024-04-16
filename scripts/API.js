// Fetch API desde un JSON (Array)
window.addEventListener('load', obtenerDatos);

function obtenerDatos() {
        fetch('https://youtube.googleapis.com/youtube/v3/playlistItems?part=contentDetails%2Cid%2Csnippet&playlistId=UUM0wysy0K13-p4BOaZYqQ-Q&key=AIzaSyA7HbLxNSciJCCL1wWmtQJog1tCuDI4nJU') 
        .then( respuesta => {
            return respuesta.json()
        }) 
        .then(resultado => {
            mostrarHTML(resultado); 
            console.log(resultado);
        })
}
function mostrarHTML({items}){

    //~Variable para acomular el contenido HTML
    let contenidoHTML = '';

    //?Funcion para recorrer el arreglo
    items.forEach(item => {
        //?Destructuring a las variables del JSON.
        const {snippet:{title,thumbnails:{standard:{url}}}} = item;

        contenidoHTML += `  <div>
                                <h1>${title}</h1>
                                <img width:50%; src="${url}" alt="${title}">
                            </div>`;
    })
    const contenido = document.querySelector('#contenido');
    contenido.innerHTML = contenidoHTML;
}