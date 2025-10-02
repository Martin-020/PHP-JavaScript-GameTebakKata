const levelSelect = document.getElementById('level');
const newWordBtn = document.getElementById('new-word');
const hangmanDiv = document.getElementById('hangman');
const wordDisplay = document.getElementById('word-display');
const lettersDiv = document.getElementById('letters');
const scoreDiv = document.getElementById('score');
let hintDiv = document.getElementById('hint');

let currentWord = '';
let displayedWord = [];
let wrongGuesses = 0;
let maxWrong = 6;
let score = 0;

const hangmanEmojis = ['😃','🙂','😐','😟','😢','😱','💀'];
const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');

newWordBtn.addEventListener('click', () => {
    fetchWord(levelSelect.value);
});

function fetchWord(level){
    fetch(`../Backend/get_word.php?level=${level}`)
    .then(res => res.json())
    .then(data => {
        currentWord = data.word.toUpperCase();
        displayedWord = Array(currentWord.length).fill('_');
        wrongGuesses = 0;
        hangmanDiv.textContent = hangmanEmojis[0];
        scoreDiv.textContent = `Skor: ${score}`;
        hintDiv.textContent = `Hint: ${data.hint}`;
        renderWord();
        renderLetters();
    });
}

function renderWord(){
    wordDisplay.textContent = displayedWord.join(' ');
}

function renderLetters(){
    lettersDiv.innerHTML = '';
    alphabet.forEach(letter => {
        const btn = document.createElement('button');
        btn.textContent = letter;
        btn.addEventListener('click', () => handleGuess(letter, btn));
        lettersDiv.appendChild(btn);
    });
}

function handleGuess(letter, btn){
    btn.disabled = true;
    if(currentWord.includes(letter)){
        for(let i=0; i<currentWord.length; i++){
            if(currentWord[i] === letter){
                displayedWord[i] = letter;
            }
        }
        btn.style.background = '#4CAF50';
        btn.style.color = '#fff';
        renderWord();
        checkWin();
    } else {
        wrongGuesses++;
        hangmanDiv.textContent = hangmanEmojis[Math.min(wrongGuesses, hangmanEmojis.length-1)];
        btn.style.background = '#f44336';
        btn.style.color = '#fff';
        checkLose();
    }
}

function checkWin(){
    if(!displayedWord.includes('_')){
        score += 10;
        scoreDiv.textContent = `Skor: ${score}`;
        setTimeout(()=>{
            alert('Selamat! Kamu menebak kata dengan benar!');
            fetchWord(levelSelect.value);
        }, 100);
    }
}

function checkLose(){
    if(wrongGuesses >= maxWrong){
        setTimeout(()=>{
            alert(`Game over! Kata sebenarnya: ${currentWord}`);
            window.location.href = '../index.php';
        }, 100);
    }
}
