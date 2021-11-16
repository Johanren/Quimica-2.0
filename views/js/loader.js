window.onload = function(){
      var contenedor = document.getElementById('contenedor_carga');

      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';
}

window.addEventListener('load', () => {
    const contenedor_carga = document.querySelector('.contenedor_carga')
    contenedor_carga.style.opacity = 0
    contenedor_carga.style.visibility = 'hidden'
})