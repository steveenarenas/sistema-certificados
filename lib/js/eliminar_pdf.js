// Función para mostrar una alerta de confirmación antes de eliminar
  function alerta_eliminar(pdf) {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'No podrás revertir esta acción',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar!',
      confirmButtonText: 'Sí, eliminarlo!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si se confirma la eliminación, redirige al usuario a la página de eliminación
        window.location.href = '../../../controllers/personas/delete.php?pdf=' + pdf;
      }
    });
  }
