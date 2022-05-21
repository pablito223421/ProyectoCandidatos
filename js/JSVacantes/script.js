

function ListarVacantes(){
    fetch ("../../Api/Api_Vacantes/MostrarVacantes_api.php", {
      method:"POST", 
    }).then (response=>response.text()).then(response =>{
        resultado.innerHTML = response;

    })
}


function GuardarVacante(){
alert ('La vacante ha sido registrada en el sistema');
btnVacante.addEventListener("click",()=>{
 fetch ("../../Api/Api_Vacantes/AgregarVacante_api.php", {
    method: "POST",
    body:new FormData(frm)
 }).then(response=> response.text()).then(response=>{
        ListarVacantes();
        frm.reset();
     
 })
});
}

function EliminarVacante(){
    alert('La vacante ha sido eliminada');
btnEliminar.addEventListener("click",()=>{
            fetch ("../../Api/Api_Vacantes/EliminarVacante_api.php", {
                method: "POST",
                body:id
             })
        });
    }


    function ActualizarVacante(){
        alert ('La vacante ha sido modificada en el sistema');
        btnActualiza.addEventListener("click",()=>{
         fetch ("../../Api/Api_Vacantes/ModificarVacante_api.php", {
            method: "POST",
            body:new FormData(frm)
         }).then(response=> response.text()).then(response=>{
                ListarVacantes();
                frm.reset();
         })
        });
        }




