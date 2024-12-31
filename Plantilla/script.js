function rellenarModal(id_produc) {

    let btn_modal = document.getElementById("btn_modal")
    btn_modal.click()

    let img_id = document.getElementById("img_product_" + id_produc).src

    let img_modal = document.getElementById("img_modal")
    img_modal.src = img_id

    cargarImagenes(id_produc)
    cargarDatos(id_produc)

}

function cargarImagenes(id_produc) {
    document.getElementById("img_modal_1").src = "./assets/collection/pro_" + id_produc + "/img1.png"
    document.getElementById("img_modal_2").src = "./assets/collection/pro_" + id_produc + "/img2.png"
    document.getElementById("img_modal_3").src = "./assets/collection/pro_" + id_produc + "/img3.png"
    document.getElementById("img_modal_4").src = "./assets/collection/pro_" + id_produc + "/img4.png"
    document.getElementById("img_modal_5").src = "./assets/collection/pro_" + id_produc + "/img5.png"

    for (let i = 1; i <= 5; i++) {
        const img = document.getElementById("img_modal_" + i);
        img.onclick = function () {
            cambiarImagenModal(id_produc, i);
        };
    }
}

function cargarDatos(id_produc) {
    let nom_product = document.getElementById("nom_product_1").textContent
    document.getElementById("staticBackdropLabel").textContent = nom_product

    let valor_product = document.getElementById("valor_product_1").textContent
    document.getElementById("valor_modal").textContent = valor_product
}


function cambiarImagenModal(id_produc, id_imagen) {

    document.getElementById("img_modal").src = "./assets/collection/pro_" + id_produc + "/img" + id_imagen + ".png"

}