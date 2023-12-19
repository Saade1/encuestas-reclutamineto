document.addEventListener("DOMContentLoaded", function () {
    // Obtén el formulario, el botón y el botón de confirmación
    var deleteForm = document.getElementById("deleteForm");
    var deleteButton = document.getElementById("deleteButton");
    var confirmDeleteButton = document.getElementById("confirmDeleteButton");
    var modalTitle = document.getElementById("modalTitle");

    // Agrega un event listener al botón de eliminar
    deleteButton.addEventListener("click", function () {
        // Actualiza el título del modal con el ID de la encuesta

        // Muestra el modal cuando se hace clic en el botón de eliminar
        var myModal = new bootstrap.Modal(document.querySelector(".modal"));
        myModal.show();
    });

    // Agrega un event listener al botón de confirmación de borrar
    confirmDeleteButton.addEventListener("click", function () {
        // Envía el formulario de eliminación al confirmar
        deleteForm.submit();
    });
});
