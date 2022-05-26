

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
    frm.reset();
 })
});
}

function EliminarVacante(){
let text= "Estas seguro de eliminar la vacante";
if(confirm(text)==true){
btnEliminar.addEventListener("click",()=>{
            fetch ("../../Api/Api_Vacantes/EliminarVacante_api.php", {
                method: "POST",
                body:id
             })
        });
    return true;
    }else{
        return false;
    }
    }


    function ActualizarVacante(){
        alert ('La vacante ha sido modificada en el sistema');
        btnActualiza.addEventListener("click",()=>{
         fetch ("../../Api/Api_Vacantes/ModificarVacante_api.php", {
            method: "POST",
            body:new FormData(frm)
         })
        });
        }




