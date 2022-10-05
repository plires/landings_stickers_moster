<!-- Mensaje Exito -->
<?php if (isset($msg_contacto)): ?>
  <div id="msg_contacto" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>¡Datos recibidos!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <ul style="padding: 0;">
        <li>- <?php echo $msg_contacto; ?></li>
    </ul>
  </div>
<?php endif ?>
<!-- Mensaje Exito end -->