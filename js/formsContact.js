const btnSend = document.getElementById('send')
const spinner = document.getElementById('spinner');

document.addEventListener("DOMContentLoaded", function(event) {

  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf('/')+1);
  console.log(filename)

  if ( filename === 'tabla-ganadores.php' || filename === 'coolers-ganadores.php' || filename === 'toalla-ganadores.php' ) { 

    btnSend.addEventListener('click', function(){

      var errorsInFieldsFront = false

      // Validacion del Formulario
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var form = document.getElementById('form-contacto');

      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        errorsInFieldsFront = true
      }

      form.classList.add('was-validated');

      if (!errorsInFieldsFront) {

        // Habilitar spniner en button
        spinner.style.display = 'flex'

        grecaptcha.ready(function() {

          grecaptcha.execute(process.env.RECAPTCHA_KEY_SITE, {

            action: 'validarFormulario'
            }).then(function(token) {

              var inputToken = document.createElement("input");
              inputToken.type = "hidden";
              inputToken.name = "token";
              inputToken.value = token;
              form.appendChild(inputToken);

              var inputAction = document.createElement("input");
              inputAction.type = "hidden";
              inputAction.name = "action";
              inputAction.value = "validarFormulario";
              form.appendChild(inputAction);
              spinner.style.display = 'none'

            form.submit()

          })

        })

      }

    })

  }

})
