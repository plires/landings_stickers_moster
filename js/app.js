import AOS from 'aos';

AOS.init()

function validateForm() {
	// Validacion del Formulario
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
    if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      return true
    }
    form.classList.add('was-validated');
      return false
  });
}

var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);

if ( filename === 'index.php') { // Seccion de index
	//
}



