const questions = [
    {
        question: "A popular code editor for web development is...",
         choiceA: "Word",
         choiceB: "Visual Studio Code",
         choiceC: "Photoshop",
          answer: "B",
    },
    {
        question: "What does the abbreviation JS stand for?",
         choiceA: "Hypertext Markup Language",
         choiceB: "Cascading Style Sheets",
         choiceC: "JavaScript",
          answer: "C",
    },
    {
        question: "Which company makes the Chrome browser?",
         choiceA: "Google",
         choiceB: "Mozilla",
         choiceC: "Microsoft",
          answer: "A",
    },
];

let currentQuestionNumber=0;
let correctAnswers = 0;

function init()
{
    const player= document.getElementById("player-name");
    player.innerHTML=getUrlParam("name");
    console.log(getUrlParam("name"))
    const nextButton = document.querySelector(".button");
    nextButton.addEventListener("click", next);
    getQuestion();
}
function getUrlParam(name)
{
    const params = new URLSearchParams(window.location.search);
    return params.has(name) ? params.get(name) : "";
}
function getQuestion(){
    const questionText = document.getElementById("question-text");
    const choiceA = document.getElementById("choice-A");
    const choiceB = document.getElementById("choice-B");
    const choiceC = document.getElementById("choice-C");

    if (currentQuestionNumber < questions.length) {
        questionText.textContent = questions[currentQuestionNumber]["question"];
        choiceA.textContent = questions[currentQuestionNumber]["choiceA"];
        choiceB.textContent = questions[currentQuestionNumber]["choiceB"];
        choiceC.textContent = questions[currentQuestionNumber]["choiceC"];
        // Update question number text
        const questionNo = document.querySelector(".question-no");
        questionNo.textContent = `Question ${currentQuestionNumber + 1}`;
    }
}
function next() {
    currentQuestionNumber++; // Move to the next question
    // Get the player's selection
    const playerSelection = getSelection("choices");

    // Compare player's selection with the correct answer
    if (playerSelection === questions[currentQuestionNumber - 1].answer) {
        correctAnswers++; // Increment correct answers count
    }

    // Check if there are remaining questions
    if (currentQuestionNumber < questions.length) {
        clearSelection("choices"); // Clear selected option
        getQuestion(); // Display the next question
    } else {
        // No more questions, hide the Next button
        const nextButton = document.querySelector(".button");
        nextButton.style.display = "none";

        // // Display final score or other message in the results div
        // const resultsDiv = document.getElementById("results");
        // resultsDiv.innerHTML = `Congratulations, you've completed the quiz!`;
        showResults();
    }
}
function clearSelection(name)
{
    const elem = document.querySelector(`input[name="${name}"]:checked`);
    if (elem)
        elem.checked = false;
}
function getSelection(name)
{
    const elem = document.querySelector(`input[name="${name}"]:checked`);
    return elem ? elem.value : "";
}
function showResults() {
    const resultsDiv = document.getElementById("results");
    const quizDiv = document.getElementById("quiz");

    // Calculate player's score percentage
    const scorePercentage = (correctAnswers / questions.length) * 100;

    // Generate the results message based on the score
    let resultsMessage = "";
    if (scorePercentage < 30) {
        resultsMessage = `Bad luck. Your final score was ${scorePercentage.toFixed(1)}% (${correctAnswers}/${questions.length}).`;
    } else if (scorePercentage >= 30 && scorePercentage <= 75) {
        resultsMessage = `Not bad. Your final score was ${scorePercentage.toFixed(1)}% (${correctAnswers}/${questions.length}).`;
    } else {
        resultsMessage = `Impressive. Your final score was ${scorePercentage.toFixed(1)}% (${correctAnswers}/${questions.length}).`;
    }

    // Display the results message
    resultsDiv.innerHTML = resultsMessage;

    // Hide the quiz and show the results
    quizDiv.style.display = "none";
    resultsDiv.style.display = "block";
}
init();
