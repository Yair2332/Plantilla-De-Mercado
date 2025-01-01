function rellenarModal(id_produc) {

    fetch("./php/modal.php?id=" + id_produc)
        .then(response => response.text())
        .then(data => {
            document.getElementById("modal").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    
    console.log("Holaaaaaaaaaaaaaaaaa");


    let btn_modal = document.getElementById("btn_modal")
    btn_modal.click()


}


function cambiarImagenModal(id_produc, id_imagen) {

    document.getElementById("img_modal").src = "./assets/collection/pro_" + id_produc + "/img" + id_imagen + ".png"

}