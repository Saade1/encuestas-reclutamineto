function toggleQuestions(selectElement) {
    var questionContainer = document.getElementById("question-container-main");
    var answerContainer = document.getElementById("answer-container-main");

    if (selectElement.value !== "") {
        questionContainer.style.display = "block";
        if (selectElement.value !== "1") {
            // Ocultar el contenedor de respuestas si no es pregunta abierta
            answerContainer.style.display = "block";
        } else {
            answerContainer.style.display = "none";
        }
    } else {
        questionContainer.style.display = "none";
        answerContainer.style.display = "none";
    }
}

let questionCounter = 1; // Contador de preguntas, inicia por defecto en 1

function addQuestion(btn) {
    // Clona el div que contiene los campos de pregunta y respuesta y el botón de agregar
    let questionDiv = btn.parentElement;
    let newQuestionDiv = questionDiv.cloneNode(true);

    // Limpia los campos de texto clonados y actualiza los nombres de los campos
    let camposPregunta = newQuestionDiv.querySelectorAll('input[name^="questions"]');
    let camposRespuesta = newQuestionDiv.querySelectorAll('input[name^="answers"]');

    camposPregunta.forEach(function (campo) {
        campo.value = "";
        campo.name = `questions[${questionCounter}]`;
    });

    camposRespuesta.forEach(function (campo) {
        campo.value = "";
        campo.name = `answers[${questionCounter}][]`;
    });

    // Incrementa el contador de preguntas
    questionCounter++;

    // Agrega los campos de pregunta, respuesta y un nuevo botón clonado al contenedor de preguntas
    document.getElementById("question-container-main").appendChild(newQuestionDiv);
}

function addAnswer(btn) {
    // Encuentra el div padre que contiene la pregunta actual
    let questionDiv = btn.closest('.input-container_question');

    // Encuentra el número de la pregunta actual
    let questionNumber = Array.from(document.querySelectorAll('.input-container_question')).indexOf(questionDiv);

    // Clona el div que contiene el campo de respuesta
    let answerDiv = btn.parentElement;
    let newAnswerDiv = answerDiv.cloneNode(true);

    // Limpia el campo de texto clonado y actualiza el nombre del campo
    let campoRespuesta = newAnswerDiv.querySelector('input[name^="answers"]');
    campoRespuesta.value = "";
    campoRespuesta.name = `answers[${questionNumber}][]`;

    // Agrega el campo de respuesta y un nuevo botón clonado al contenedor de respuestas
    questionDiv.querySelector('.answer-container-main').appendChild(newAnswerDiv);
}
