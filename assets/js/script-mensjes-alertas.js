$("#mensaje").click (function(){
    swal.fire({
        position: "center",
        icon: "error",
        title: "Usuario o contraseña incorrecta intenta de nuevo por favor...",
        showConfirmButton: true,
        confirmButtonText: "volver"
        }).then(function(result){
            if(result.value){
             window.location = "index.php";
            }
        })
});

$("#btn3").click(function(){
swal.fire('Any fool can use a computer')
});	