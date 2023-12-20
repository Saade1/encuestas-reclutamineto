document.addEventListener("DOMContentLoaded", function () {
    // Obtén todos los botones de "Eliminar encuesta"
    var deleteButtons = document.querySelectorAll(".deleteButton");

    // Recorre todos los botones de "Eliminar encuesta"
    deleteButtons.forEach(function (deleteButton) {
        // Agrega un event listener a cada botón de "Eliminar encuesta"
        deleteButton.addEventListener("click", function () {
            // Muestra el modal correspondiente al botón de "Eliminar encuesta" clickeado
            var targetModalId = deleteButton.getAttribute("data-bs-target");
            var targetModal = new bootstrap.Modal(document.getElementById(targetModalId), {});
            targetModal.show();
        });
    });

    // Agrega un event listener al botón de confirmación de borrar
    var confirmDeleteButtons = document.querySelectorAll(".confirmDeleteButton");

    confirmDeleteButtons.forEach(function (confirmDeleteButton) {
        confirmDeleteButton.addEventListener("click", function () {
            // Envía el formulario de eliminación al confirmar
            var deleteForm = confirmDeleteButton.closest(".deleteForm");
            deleteForm.submit();
        });
    });
});
