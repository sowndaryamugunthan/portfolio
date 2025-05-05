let questions = [
    "What is your full name?",
    "What is your gender?",
    "What is your date of birth?",
    "What is your education qualification?",
    "What is your profession?",
    "What is your mobile number?",
    "What is your email address?",
    "Tell us about your family.",
    "What are your partner preferences?"
];

let answers = [];
let currentQuestion = 0;

function showNextQuestion() {
    if (currentQuestion < questions.length) {
        let msg = document.getElementById('messages');
        let question = document.createElement('div');
        question.innerText = questions[currentQuestion];
        msg.appendChild(question);
    } else {
        document.getElementById('chatbox').style.display = 'none';
        document.getElementById('otp-section').style.display = 'block';
    }
}

function sendMessage() {
    let input = document.getElementById('user-input');
    let userAnswer = input.value.trim();
    if (userAnswer !== "") {
        answers.push(userAnswer);
        input.value = "";
        currentQuestion++;
        showNextQuestion();
    }
}

let otpCode = "";

function sendOTP() {
    let mobile = answers[5];
    let email = answers[6];

    if (mobile === "" || email === "") {
        alert("Mobile number or email missing!");
        return;
    }

    otpCode = Math.floor(1000 + Math.random() * 9000);
    alert("Your OTP is: " + otpCode);

    document.getElementById('otp-section').style.display = 'none';
    document.getElementById('otp-verify').style.display = 'block';
}

function verifyOTP() {
    let enteredOtp = document.getElementById('entered-otp').value.trim();
    if (enteredOtp === otpCode.toString()) {
        alert("OTP Verified Successfully!");

        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        axios.post('/profile-match/profile-match-laravel/public/save-profile', {
            answers: answers
        }, { headers: { 'X-CSRF-TOKEN': token } })
        .then(response => {
            alert(response.data);
            location.reload(); // after save, reload page
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to save profile.');
        });

    } else {
        alert("Invalid OTP! Please try again.");
    }
}

window.onload = showNextQuestion;
