document.addEventListener('DOMContentLoaded', function () {
    // Obtén el elemento select
    var formTypeSelect = document.getElementById('form-type');

    // Obtén el contenedor de respuestas
    var answerContainerMain = document.querySelector('.answer-container-main');

    // Muestra u oculta el contenedor de respuestas al cargar la página
    toggleAnswerContainer(formTypeSelect.value);

    // Agrega un evento change al select para manejar cambios en la selección
    formTypeSelect.addEventListener('change', function () {
        toggleAnswerContainer(formTypeSelect.value);
    });

    // Función para mostrar u ocultar el contenedor de respuestas según la selección
    function toggleAnswerContainer(selectedValue) {
        if (selectedValue === '1') { // Tipo de pregunta "Abierta"
            answerContainerMain.classList.add('hidden');
        } else {
            answerContainerMain.classList.remove('hidden');
        }
    }
});

function addQuestion(element) {
    var questionContainer = element.closest(".input-container_question");
    var newQuestionContainer = questionContainer.cloneNode(true);

    // Incrementa el índice de la nueva pregunta
    var newIndex = document.querySelectorAll(
        ".input-container_question"
    ).length;
    newQuestionContainer.querySelector('input[type="text"]').name =
        "questions[" + newIndex + "]";

    // Clear the values of the new question
    newQuestionContainer.querySelector('input[type="text"]').value = "";

    // Reset the answer index to 0 for the new question
    var existingAnswers =
        newQuestionContainer.querySelectorAll(".grupo-respuestas");
    existingAnswers.forEach(function (answerContainer, index) {
        if (index > 0) {
            answerContainer.remove(); // Elimina campos de respuesta adicionales
        } else {
            // Clear the value of the first answer
            answerContainer.querySelector('input[type="text"]').value = "";
            // Reset the answer index to 0 for the new question
            answerContainer.querySelector('input[type="text"]').name =
                "answers[" + newIndex + "][0]";
        }
    });

    // Append the new question container
    questionContainer.parentNode.appendChild(newQuestionContainer);

    // Mostrar el botón '+' en la última pregunta clonada
    var isLastQuestion =
        newIndex ===
        document.querySelectorAll(".input-container_question").length - 1;
    newQuestionContainer.querySelector(".add_Question").style.display =
        isLastQuestion ? "" : "none";

    // Append the new question container
    questionContainer.parentNode.appendChild(newQuestionContainer);

    // Ocultar el botón '+' del botón actual
    element.style.display = "none";
}

function addAnswer(element) {
    var answerContainer = element.closest(".grupo-respuestas");
    var newAnswerContainer = answerContainer.cloneNode(true);

    // Incrementa el índice de la nueva respuesta
    var questionContainer = answerContainer.closest(
        ".input-container_question"
    );
    var questionIndex = Array.from(
        document.querySelectorAll(".input-container_question")
    ).indexOf(questionContainer);
    var answerIndex =
        questionContainer.querySelectorAll(".grupo-respuestas").length;

    // Ajusta el nombre del nuevo campo de respuesta
    newAnswerContainer.querySelector('input[type="text"]').name =
        "answers[" + questionIndex + "][" + answerIndex + "]";

    // Clear the value of the new answer
    newAnswerContainer.querySelector('input[type="text"]').value = "";

    // Append the new answer container
    answerContainer.parentNode.appendChild(newAnswerContainer);
}

// Función para eliminar una pregunta
function deleteQuestion(element) {
    // Eliminar la pregunta del DOM
    element.parentNode.remove();

    // Puedes realizar acciones adicionales aquí, como enviar una solicitud AJAX para eliminar la pregunta en el servidor
}

// Función para eliminar una respuesta
function deleteAnswer(element) {
    // Eliminar la respuesta del DOM
    element.parentNode.remove();

}

function sendForm(route) {
    var formId = document.getElementsByName("form_id")[0].value;
    window.location.href = route + '?form_id=' + formId;
}

// $(document).ready(function () {
//     // Manejar la visibilidad de los botones al cargar la página
//     toggleBotones();

//     // Manejar la visibilidad de los botones cuando se hace clic en "ENVIAR CUESTIONARIO"
//     $("#enviarCuestionarioBtn").click(function () {
//         toggleBotones();
//     });
// });

// function toggleBotones() {
//     // Obtener el estado del botón "ENVIAR CUESTIONARIO"
//     var enviarCuestionarioSeleccionado = $("#enviarCuestionarioBtn").hasClass("active");

//     // Mostrar u ocultar los botones de acuerdo al estado del botón "ENVIAR CUESTIONARIO"
//     if (enviarCuestionarioSeleccionado) {
//         $("#enviarTodosBtn").show();
//         $("#seleccionarContactosBtn").show();
//     } else {
//         $("#enviarTodosBtn").hide();
//         $("#seleccionarContactosBtn").hide();
//         // También ocultar el contenedor de selección de usuarios
//         $("#seleccionarUsuariosContainer").hide();
//     }
// }

// $("#enviarCuestionarioBtn").click(function () {
//     $(this).toggleClass("active");
//     toggleBotones();
// });

// $("#seleccionarContactosBtn").click(function () {
//     // Mostrar el contenedor de selección de usuarios cuando se hace clic en "SELECCIONAR CONTACTOS"
//     $("#seleccionarUsuariosContainer").show();
// });


 // Inicializa Select2 en tu elemento select
 $(document).ready(function() {
    $('#user_id').select2();
});