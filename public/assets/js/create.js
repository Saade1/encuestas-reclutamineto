function toggleQuestions(selectElement) {
    var questionContainer = document.getElementById("question-container-main");
    var answerContainer = questionContainer.querySelector(
        ".answer-container-main"
    );
    var addButton = questionContainer.querySelector(".add_Question");
    var questionTypeSelect = questionContainer.querySelector(".custom-select");

    if (selectElement.value !== "") {
        questionContainer.style.display = "block";

        if (selectElement.value === "4") {
            addButton.style.display = "none";
            questionTypeSelect.style.display = "block";
        } else {
            addButton.style.display = "block";
            questionTypeSelect.style.display = "none";
            if (selectElement.value !== "1") {
                // Mostrar el contenedor de respuestas si no es pregunta abierta
                answerContainer.style.display = "block";
            } else {
                answerContainer.style.display = "none";
            }
        }
    } else {
        questionContainer.style.display = "none";
        answerContainer.style.display = "none";
        addButton.style.display = "none";
        questionTypeSelect.style.display = "none";
    }
}

let questionCounter = 1; // Contador de preguntas, inicia por defecto en 1

function addQuestion(btn) {
    // Clona el div que contiene los campos de pregunta y respuesta y el botón de agregar
    let questionDiv = btn.parentElement;
    let newQuestionDiv = questionDiv.cloneNode(true);

    // Elimina el botón de pregunta del contenedor original
    questionDiv.querySelector(".add_Question").remove();

    // Limpia los campos de texto clonados y actualiza los nombres de los campos de pregunta
    let questions_Fields = newQuestionDiv.querySelectorAll(
        'input[name^="questions"]'
    );
    questions_Fields.forEach(function (campo) {
        campo.value = "";
        campo.name = `questions[${questionCounter}]`;
    });

    // Encuentra el contenedor de respuestas de la pregunta actual y elimina los campos de respuesta adicionales
    let answerContainer = newQuestionDiv.querySelector(
        ".answer-container-main"
    );
    let responseFields = answerContainer.querySelectorAll(
        'input[name^="answers"]'
    );
    responseFields.forEach(function (campo, index) {
        if (index > 0) {
            campo.parentElement.remove(); // Elimina campos de respuesta adicionales
        } else {
            campo.value = ""; // Limpia el primer campo de respuesta
        }
        campo.name = `answers[${questionCounter}][]`;
    });

    // Incrementa el contador de preguntas
    questionCounter++;

    // Agrega los campos de pregunta, respuesta y un nuevo botón clonado al contenedor de preguntas
    document
        .getElementById("question-container-main")
        .appendChild(newQuestionDiv);

    // Muestra el botón "+" de respuestas para la pregunta actual
    let answerButton = newQuestionDiv.querySelector(".add_Answer");
    answerButton.style.display = "block";
}

function addAnswer(btn) {
    // Encuentra el div padre que contiene la pregunta actual
    let questionDiv = btn.closest(".input-container_question");

    // Encuentra el número de la pregunta actual
    let questionNumber = Array.from(
        document.querySelectorAll(".input-container_question")
    ).indexOf(questionDiv);

    // Clona el div que contiene el campo de respuesta
    let answerDiv = btn.parentElement;
    let newAnswerDiv = answerDiv.cloneNode(true);

    // Limpia el campo de texto clonado y actualiza el nombre del campo
    let responses_Field = newAnswerDiv.querySelector('input[name^="answers"]');
    responses_Field.value = "";
    responses_Field.name = `answers[${questionNumber}][]`;

    // Agrega el campo de respuesta al contenedor de respuestas
    questionDiv
        .querySelector(".answer-container-main")
        .appendChild(newAnswerDiv);

    // // Oculta el botón "+" de respuestas
    btn.style.display = "none";
}
// // Obtén una referencia al botón de cancelar
// var cancelButton = document.getElementById("cancelButton");

// // Agrega un evento click al botón de cancelar
// cancelButton.addEventListener("click", function () {
//     // Obtén una referencia al formulario
//     var form = document.forms["question_type"];

//     // Restablece los valores de los campos del formulario al valor por defecto
//     form.reset();

//     // Restablece los campos de preguntas y respuestas al estado por defecto
//     resetQuestionFields();

//     // Oculta o muestra los elementos según sea necesario (puedes agregar más lógica aquí si es necesario)
//     toggleQuestions(form.querySelector("[name='form_type']"));
// });

// // Función para resetear los campos de preguntas y respuestas al estado por defecto
// function resetQuestionFields() {
//     // Encuentra todos los campos de pregunta y respuesta y restablece sus valores
//     var questionFields = document.querySelectorAll('input[name^="questions"]');
//     var answerFields = document.querySelectorAll('input[name^="answers"]');
    
//     // Itera sobre los campos de preguntas y respuestas y restablece sus valores
//     questionFields.forEach(function (campo) {
//         campo.value = "";
//     });
    
//     answerFields.forEach(function (campo) {
//         campo.value = "";
//     });
    
//     // Restablece el contador de preguntas a 1
//     questionCounter = 1;
    
//     // Elimina las preguntas adicionales si las hay
//     var additionalQuestions = document.querySelectorAll('.input-container_question');
//     additionalQuestions.forEach(function (questionDiv, index) {
//         if (index > 0) {
//             questionDiv.remove();
//         }
//     });
    
//     // Muestra el botón "+" de respuestas para la primera pregunta
//     var firstQuestionDiv = document.querySelector('.input-container_question');
//     var firstAnswerButton = firstQuestionDiv.querySelector('.add_Question');
//     if (firstAnswerButton) {
//         firstAnswerButton.style.display = "block";
//     }
// }
