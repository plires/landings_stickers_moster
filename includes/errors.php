<!-- Errores Formulario -->
<?php if ($errors): ?>

  <div id="error" class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>¡Por favor verificá los datos!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <ul style="padding: 0;">
      <?php foreach ($errors as $error) { ?>
        <li>- <?php echo $error; ?></li>
      <?php } ?>
    </ul>
  </div>

<?php endif ?>
<!-- Errores Formulario end -->