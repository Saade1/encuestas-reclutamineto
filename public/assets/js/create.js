function toggleQuestions(selectElement) {
    var questionContainer = document.getElementById("question-container-main");
    var answerContainer = questionContainer.querySelector(
        ".answer-container-main"
    );
    var addButton = questionContainer.querySelector(".add_Question");
    var questionTypeSelect = questionContainer.querySelector(".custom-select");

    // Obtener el valor seleccionado del segundo select
    var formTypeSelect = document.getElementsByName("form_type")[0];
    var selectedFormType = formTypeSelect.value;

    if (selectedFormType !== "") {
        questionContainer.style.display = "block";

        if (selectedFormType === "4") {
            addButton.style.display = "none";
            questionTypeSelect.style.display = "block";
        } else {
            addButton.style.display = "block";
            questionTypeSelect.style.display = "none";

            if (selectedFormType !== "1") {
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

    // Elimina el select del nuevo contenedor clonado
    let newSelect = newQuestionDiv.querySelector(".custom-select");
    if (newSelect) {
        newSelect.remove();
    }

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

document
    .getElementById("question-container-main")
    .addEventListener("change", function (event) {
        if (event.target.classList.contains("custom-select")) {
            let questionDiv = event.target.parentElement;
            let answerContainer = questionDiv.querySelector(
                ".answer-container-main"
            );
            toggleAnswerContainer(event.target, answerContainer);
        }
    });

function addQuestionMixed(btn) {
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

    // Asegúrate de mostrar el tipo de pregunta select después de clonar
    let questionTypeSelect = newQuestionDiv.querySelector(".custom-select");
    questionTypeSelect.style.display = "block";

    // Agrega un evento onchange al nuevo select de tipo de pregunta
    questionTypeSelect.addEventListener("change", function () {
        toggleAnswerContainer(this, answerContainer);
    });

    // Ejecuta la función toggleAnswerContainer para mostrar u ocultar los campos de respuesta según el tipo de pregunta
    toggleAnswerContainer(questionTypeSelect, answerContainer);
}

// Nueva función para mostrar u ocultar los campos de respuesta según el tipo de pregunta seleccionado
function toggleAnswerContainer(selectElement, answerContainer) {
    console.log("Value selected: ", selectElement.value);
    if (selectElement.value !== "") {
        if (selectElement.value !== "1") {
            // Mostrar el contenedor de respuestas si no es pregunta abierta
            answerContainer.style.display = "block";
        } else {
            answerContainer.style.display = "none";
        }
    } else {
        answerContainer.style.display = "none";
    }
}
