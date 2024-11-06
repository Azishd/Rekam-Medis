function toggleModal(modalID, assessmentId) {
    console.log(assessmentId);
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");

    setTimeout(function () {
        document.getElementById('assessment_id').value = assessmentId;
    }, 0);

    var notesCells = document.getElementsByClassName('notes-cell');
    for (var i = 0; i < notesCells.length; i++) {
        fetchNotesAndUpdate(notesCells[i], assessmentId);
    }

    var answerCells = document.getElementsByClassName('answer-cell');
    for (var i = 0; i < answerCells.length; i++) {
        var questionId = answerCells[i].getAttribute('data-question-id');
        fetchAnswerAndUpdate(answerCells[i], assessmentId, questionId);
    }
}

async function fetchNotesAndUpdate(notesCell, assessmentId) {
    try {
        const response = await fetch(`/assessment-notes?assessment_id=${assessmentId}`);
        const text = await response.text(); // Get the response text
        console.log('Response Text:', text); // Log the response text to the console

        // Check if the response text is valid JSON before attempting to parse it
        const data = JSON.parse(text);
        notesCell.innerText = data.notes;
    } catch (error) {
        console.error('Error fetching notes:', error);
    }
}

async function fetchAnswerAndUpdate(answerCell, assessmentId, questionId) {
    try {
        const response = await fetch(`/assessment-answer?assessment_id=${assessmentId}&question_id=${questionId}`);
        const data = await response.json();

        answerCell.innerText = data.answer;
    } catch (error) {
        console.error('Error fetching answer:', error);
    }
}