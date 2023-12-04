function addQuestion(element) {
    var questionContainer = element.closest('.input-container_question');
    var newQuestionContainer = questionContainer.cloneNode(true);

    // Incrementa el índice de la nueva pregunta
    var newIndex = document.querySelectorAll('.input-container_question').length;
    newQuestionContainer.querySelector('input[type="text"]').name = 'questions[' + newIndex + ']';

    // Clear the values of the new question
    newQuestionContainer.querySelector('input[type="text"]').value = '';

    // Reset the answer index to 0 for the new question
    var existingAnswers = newQuestionContainer.querySelectorAll('.grupo-respuestas');
    existingAnswers.forEach(function (answerContainer, index) {
        if (index > 0) {
            answerContainer.remove(); // Elimina campos de respuesta adicionales
        } else {
            // Clear the value of the first answer
            answerContainer.querySelector('input[type="text"]').value = '';
            // Reset the answer index to 0 for the new question
            answerContainer.querySelector('input[type="text"]').name = 'answers[' + newIndex + '][0]';
        }
    });

    // Append the new question container
    questionContainer.parentNode.appendChild(newQuestionContainer);
}

function addAnswer(element) {
    var answerContainer = element.closest('.grupo-respuestas');
    var newAnswerContainer = answerContainer.cloneNode(true);

    // Incrementa el índice de la nueva respuesta
    var questionContainer = answerContainer.closest('.input-container_question');
    var questionIndex = Array.from(document.querySelectorAll('.input-container_question')).indexOf(questionContainer);
    var answerIndex = questionContainer.querySelectorAll('.grupo-respuestas').length;
    
    // Ajusta el nombre del nuevo campo de respuesta
    newAnswerContainer.querySelector('input[type="text"]').name = 'answers[' + questionIndex + '][' + answerIndex + ']';

    // Clear the value of the new answer
    newAnswerContainer.querySelector('input[type="text"]').value = '';

    // Append the new answer container
    answerContainer.parentNode.appendChild(newAnswerContainer);
}
