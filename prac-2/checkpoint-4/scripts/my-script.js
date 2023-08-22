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

    // Check if there are remaining questions
    if (currentQuestionNumber < questions.length) {
        clearSelection("choices"); // Clear selected option
        getQuestion(); // Display the next question
    } else {
        // No more questions, hide the Next button
        const nextButton = document.querySelector(".button");
        nextButton.style.display = "none";

        // Display final score or other message in the results div
        const resultsDiv = document.getElementById("results");
        resultsDiv.innerHTML = `Congratulations, you've completed the quiz!`;
    }
}
function clearSelection(name)
{
    const elem = document.querySelector(`input[name="${name}"]:checked`);
    if (elem)
        elem.checked = false;
}


init();
