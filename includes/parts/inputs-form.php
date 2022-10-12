<!-- Nombre -->
<div class="inputBox">
	<input 
		required="required" 
		type="text" 
		name="name" 
		value="<?= $name ?>">
		<span>Nombre *</span>
		<i></i>
		<div class="invalid-feedback">
      Ingresá tu nombre
    </div>
</div>
<!-- Nombre end -->

<!-- C.I. -->
<div class="inputBox">
	<input 
		required="required" 
		type="number" 
		name="ci" 
		value="<?= $ci ?>">
		<span>C.I. *</span>
		<i></i>
		<div class="invalid-feedback">
      Ingresá tu C.I.
    </div>
</div>
<!-- C.I. end -->

<!-- Email -->
<div class="inputBox">
	<input 
		required="required" 
		type="email" 
		name="email" 
		value="<?= $email ?>">
		<span>Email *</span>
		<i></i>
		<div class="invalid-feedback">
      Ingresá tu Email
    </div>
</div>
<!-- Email end -->

<!-- Teléfono -->
<div class="inputBox">
	<input 
		required="required" 
		type="text" 
		name="phone" 
		value="<?= $phone ?>">
		<span>Teléfono *</span>
		<i></i>
		<div class="invalid-feedback">
      Ingresá un teléfono
    </div>
</div>
<!-- Teléfono end -->

<div class="content_button">
	<button type="button" id="send" class="btn btn-primary">
		Enviar
		<div id="spinner" class="spinner-border spinner-border-sm" role="status">
		  <span class="visually-hidden"></span>
		</div>
	</button>
</div>