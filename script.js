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

