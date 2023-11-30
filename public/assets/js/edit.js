function addQuestion(element) {
    var questionContainer = element.closest('.input-container_question');
    var newQuestionContainer = questionContainer.cloneNode(true);

    // Clear the values of the new question
    newQuestionContainer.querySelector('input[type="text"]').value = '';

    // Clear the values of the new answers
    var answerInputs = newQuestionContainer.querySelectorAll('input[name^="answers"]');
    answerInputs.forEach(function (input, index) {
        if (index > 0) {
            input.parentElement.remove(); // Elimina campos de respuesta adicionales
        } else {
            input.value = ''; // Limpia el primer campo de respuesta
        }
    });

    // Append the new question container
    questionContainer.parentNode.appendChild(newQuestionContainer);
}

function addAnswer(element) {
    var answerContainer = element.closest('.grupo-respuestas');
    var newAnswerContainer = answerContainer.cloneNode(true);

    // Clear the value of the new answer
    newAnswerContainer.querySelector('input[type="text"]').value = '';

    // Append the new answer container
    answerContainer.parentNode.appendChild(newAnswerContainer);
}
