const form_delete = document.getElementById('form-delete');
const form_submit = document.getElementById('form-submit');

const eliminarProducto = (event) =>
{
    event.preventDefault();
    if(confirm('Se modificará el estado del juego ¿Desea continuar?')){
       form_delete.submit();
    }
}

form_submit.addEventListener('click', eliminarProducto);