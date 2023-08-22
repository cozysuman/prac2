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

function init()
{
    const player= document.getElementById("player-name");
    player.innerHTML=getUrlParam("name");
    console.log(getUrlParam("name"))
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

      // Replace placeholder content with actual question data
    questionText.textContent = questions[0]["question"];
    choiceA.textContent = questions[0]["choiceA"];
    choiceB.textContent = questions[0]["choiceB"];
    choiceC.textContent = questions[0]["choiceC"];
}

init();
