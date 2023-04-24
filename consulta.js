var boton = document.getElementById("consultaReniec");

function traer(){
 var tipoDocumento = document.getElementById("tipo_documento").value;
 if(tipoDocumento === "DNI"){
    var dni = document.getElementById("numero").value;
    if (dni.length == 8) {
        fetch(
            "https://dniruc.apisperu.com/api/v1/dni/"+ dni +"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImRhbmllbHBlcmljaGU0NUBnbWFpbC5jb20ifQ.J1b1ZPU-JXHu2jQ7apjKVd4bbXq0qdd88fsAsPzI8c4"
        )
        .then((res) => res.json())
        .then((data) => {
           document.getElementById("nombre_razon_social").value=data.nombres + " " + data.apellidoPaterno +
               " " + data.apellidoMaterno;
        });
    } else{
        alert("El documento ingresado es incorrecto. Por favor, verifique y vuelva a intentarlo.");
    }

    } else if (tipoDocumento === "RUC"){
        var ruc = document.getElementById("numero").value;
        if(ruc.length == 11){
            fetch(
                "https://dniruc.apisperu.com/api/v1/ruc/"+ ruc +"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImRhbmllbHBlcmljaGU0NUBnbWFpbC5jb20ifQ.J1b1ZPU-JXHu2jQ7apjKVd4bbXq0qdd88fsAsPzI8c4"
            )
            .then((res) => res.json())
            .then((data) => {
              document.getElementById("nombre_razon_social").value=data.razonSocial;
              document.getElementById("direccion").value=data.direccion;
              document.getElementById("departamento").value=data.departamento;
              document.getElementById("telefono").value=data.telefonos;
            });
        } else{
            alert("El documento ingresado es incorrecto. Por favor, verifique y vuelva a intentarlo.");
        }
    } 
}
boton.addEventListener("click", traer);

function mostrarAlerta() {
    var modal = document.createElement('div');
    modal.innerHTML = `
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg pl-3 pr-3">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Documento incorrecto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>El documento ingresado es incorrecto. Por favor, verifique y vuelva a intentarlo.</p>
            </div>
          </div>
        </div>
      </div>
    `;
    document.body.appendChild(modal);
    var myModal = new bootstrap.Modal(modal);
    myModal.show();
    console.log(myModal);
}

document.getElementById("lista").addEventListener("click", function() {
    window.location.href = "tabla.php";
});


document.getElementById("tipo_documento").addEventListener("change", function() {
    document.getElementById("numero").value = "";
    document.getElementById("nombre_razon_social").value = "";
    document.getElementById("direccion").value = "";
    document.getElementById("departamento").value = "";
    document.getElementById("telefono").value = "";
});

  

  
  