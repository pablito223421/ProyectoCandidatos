function ListarCandidatos(){
    fetch ("../../Api/Api_Candidatos/MostrarCandidatos_api.php", {
      method:"POST", 
    }).then (response=>response.text()).then(response =>{
        resultado.innerHTML = response;

    })
}


function GuardarCandidato(){
alert ('el candidato ha sido registrado en el sistema');
btnEnviar.addEventListener("click",()=>{
 fetch ("../../Api/Api_Candidatos/AgregarCandidato_api.php", {
    method: "POST",
    body:new FormData(frm)
 }).then(response=> response.text()).then(response=>{
  frm.reset();
 })
});
}