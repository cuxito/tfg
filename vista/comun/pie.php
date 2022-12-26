<p class="bg-secondary col-12 p-3 text-center fs-1 m-0">EXAMEN Junio. Sergio Arroyo</p>
<script>
    var xhr = new XMLHttpRequest()
    var subnav = document.getElementById("subnav")
    var prod_container = document.getElementById("prod_container")


    function cargarprods(datos){
        prod_container.innerHTML=""
        datos = JSON.parse(datos)
        datos.forEach(prods => {
            //creamos la tarjeta
            card = document.createElement("DIV")
            card.setAttribute("class","card col h-100")
            card.style = "width: 18rem; border: 1px solid black"
            //creamos los elementos de la tarjeta
                //imagen
                imagen = document.createElement("IMG")
                imagen.src = "data:image/jpeg;base64,"+prods['imagen']
                imagen.setAttribute("class","card-img-top")
                imagen.setAttribute("alt", prods['nombre_prod'])
                //card body
                card_body = document.createElement("DIV")
                card_body.setAttribute("class","card_body")
                    //tittle
                    tittle = document.createElement("H5")
                    tittle.setAttribute("class", "card-tittle")
                    tittle.textContent = prods['nombre_prod']
            card_body.appendChild(tittle)
            card.appendChild(imagen)
            card.appendChild(card_body)
            prod_container.appendChild(card)
            console.log(prods["nombre_prod"])
        });
    }
</script>   
