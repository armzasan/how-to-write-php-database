<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Code Editor</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            height: 100vh;
        }
        #editor, #question, #result {
            width: 100%;
            height: 33.33%;
            padding: 10px;
            box-sizing: border-box;
        }
        textarea {
            width: 100%;
            height: 70%;
        }
        iframe {
            width: 100%;
            height: 70%;
        }
        button {
            width: 49%;
            padding: 10px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div id="question">
        <h3 id="question-text"></h3>
    </div>
    <div id="editor">
        <textarea id="code" placeholder="Write your PHP code here..."></textarea>
        <div class="buttons">
            <button onclick="runCode()">Run Code</button>
            <button onclick="showAnswer()">Show Answer</button>
        </div>
    </div>
    <div id="result">
        <iframe id="output"></iframe>
        <p id="feedback"></p>
        <pre id="solution-code" style="display: none;"></pre>
    </div>
    <script>
        let currentQuestionIndex = 0;
        let questions = [];

        window.onload = function() {
            fetch('questions.php')
                .then(response => response.json())
                .then(data => {
                    questions = data;
                    loadQuestion();
                });
        }

        function loadQuestion() {
            if (currentQuestionIndex < questions.length) {
                document.getElementById('question-text').innerText = questions[currentQuestionIndex].question;
                document.getElementById('feedback').innerText = '';
                document.getElementById('code').value = '';
                document.getElementById('solution-code').style.display = 'none';
            } else {
                document.getElementById('question-text').innerText = 'คุณทำโจทย์ทั้งหมดเสร็จแล้ว!';
                document.getElementById('code').disabled = true;
                document.getElementById('feedback').innerText = '';
            }
        }

        function runCode() {
            const code = document.getElementById('code').value;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'run.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const output = xhr.responseText.trim();
                    document.getElementById('output').srcdoc = xhr.responseText;
                    checkAnswer(output);
                }
            };
            xhr.send('code=' + encodeURIComponent(code));
        }

        function checkAnswer(output) {
            const correctAnswer = questions[currentQuestionIndex].answer;
            if (output === correctAnswer) {
                document.getElementById('feedback').innerText = 'ถูกต้อง! ไปยังข้อถัดไป';
                currentQuestionIndex++;
                loadQuestion();
            } else {
                document.getElementById('feedback').innerText = 'ผิดพลาด! ลองอีกครั้ง';
            }
        }

        function showAnswer() {
            if (currentQuestionIndex < questions.length) {
                document.getElementById('feedback').innerText = `คำตอบ: ${questions[currentQuestionIndex].answer}`;
                document.getElementById('solution-code').innerText = questions[currentQuestionIndex].code;
                document.getElementById('solution-code').style.display = 'block';
            }
        }
    </script>
</body>
</html>
