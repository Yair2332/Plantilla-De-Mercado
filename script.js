function rellenarModal(id_produc, token) {

    fetch("./php/modal.php?id=" + id_produc + "&token=" + token)
        .then(response => response.text())
        .then(data => {
            document.getElementById("modal").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });





    let btn_modal = document.getElementById("btn_modal")
    btn_modal.click()

    cargarHistorialCarrito()
}


function cambiarImagenModal(id_produc, id_imagen) {

    document.getElementById("img_modal").src = "./assets/collection/pro_" + id_produc + "/img" + id_imagen + ".png"

}




function agregarCarrito(id, token) {

    let url = "./php/carrito.php"
    let formData = new FormData()
    formData.append('id', id);
    formData.append('token', token);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let contador = document.getElementById("contador_carrito")
                contador.innerHTML = data.numero
            }
        })

    let btn_modal = document.getElementById("btn_modal")
    btn_modal.click()
    cargarHistorialCarrito()


}


function cargarHistorialCarrito() {

    fetch("./php/historial_carrito.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("lista_item_carrito").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });



}


function eliminarProducto(productId) {
    fetch('./php/eliminar_producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: productId }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.ok) {

                let contador = document.getElementById("contador_carrito")
                contador.innerHTML = data.numero
                const producto = document.querySelector(`[data-id="${productId}"]`);
                if (producto) {
                    producto.remove();
                }
            } else {
                alert('No se pudo eliminar el producto.');
            }


        })
        .catch(error => console.error('Error al eliminar el producto:', error));
}


function cargarDetallesDeVenta() {

    fetch("./php/detalles_carrito.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("productos_detalles").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });

        calcular_precio_final()
}

function toggleCardForm() {
    const paymentMethod = document.getElementById('paymentMethod').value;
    const cardForm = document.getElementById('cardForm');
    cardForm.style.display = paymentMethod === 'card' ? 'block' : 'none';
}



function aumentarCarrito(id, accion) {
    let url = "./php/aumentar_cantidad.php";
    let formData = new FormData();
    formData.append('id', id);
    formData.append('accion', accion);

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors',
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            cargarDetallesDeVenta(); 
        } else {
            console.error('Error al procesar la acción');
        }
    })
    .catch(error => console.error('Error:', error));

    calcular_precio_final()
}


function calcular_precio_final() {
    let url = "./php/precio_final.php";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.ok) {
                document.getElementById("precio_final").innerHTML = "Total: $" + data.final;
            } else {
                console.error('Error al calcular el precio final');
            }
        })
        .catch(error => console.error('Error:', error));
}
