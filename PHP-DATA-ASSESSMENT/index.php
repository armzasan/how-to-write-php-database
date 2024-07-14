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
            font-family: Arial, sans-serif;
            background: #f4f4f9;
        }
        #question, #editor, #result {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
            background: #fff;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #question h3 {
            margin: 0;
            color: #333;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
        }
        iframe {
            width: 100%;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #0056b3;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        #feedback {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        #solution-code {
            display: none;
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
            font-family: 'Courier New', Courier, monospace;
        }
        #score-summary {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
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
        <pre id="solution-code"></pre>
        <div id="score-summary" style="display: none;"></div>
    </div>
    <script>
        let currentQuestionIndex = 0;
        let questions = [];
        let attempts = 0;
        let score = 0;
        let startTime, endTime;

        window.onload = function() {
            fetch('questions.php')
                .then(response => response.json())
                .then(data => {
                    questions = data;
                    loadQuestion();
                    startTime = new Date(); // Start timer
                });
        }

        function loadQuestion() {
            if (currentQuestionIndex < questions.length) {
                document.getElementById('question-text').innerText = questions[currentQuestionIndex].question;
                document.getElementById('feedback').innerText = '';
                document.getElementById('code').value = '';
                document.getElementById('solution-code').style.display = 'none';
                attempts = 0;
            } else {
                endTime = new Date();
                showSummary();
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
            attempts++;
            if (output === correctAnswer) {
                document.getElementById('feedback').innerText = 'ถูกต้อง! ไปยังข้อถัดไป';
                updateScore();
                currentQuestionIndex++;
                loadQuestion();
            } else {
                document.getElementById('feedback').innerText = 'ผิดพลาด! ลองอีกครั้ง';
            }
        }

        function updateScore() {
            let questionScore = 100;
            if (attempts > 2 && attempts <= 5) {
                questionScore = 80;
            } else if (attempts > 5 && attempts <= 10) {
                questionScore = 60;
            } else if (attempts > 10) {
                questionScore = 40;
            }
            score += questionScore;
        }

        function showAnswer() {
            if (currentQuestionIndex < questions.length) {
                document.getElementById('feedback').innerText = `คำตอบ: ${questions[currentQuestionIndex].answer}`;
                document.getElementById('solution-code').innerText = questions[currentQuestionIndex].code;
                document.getElementById('solution-code').style.display = 'block';
            }
        }

        function showSummary() {
            const totalQuestions = questions.length;
            const averageScore = score / totalQuestions;
            const timeTaken = (endTime - startTime) / 1000; // in seconds

            document.getElementById('question-text').innerText = 'คุณทำโจทย์ทั้งหมดเสร็จแล้ว!';
            document.getElementById('code').disabled = true;
            document.getElementById('score-summary').innerText = 
                `คะแนนรวม: ${score} / ${totalQuestions * 100} (${averageScore}%)\n` +
                `เวลาที่ใช้: ${timeTaken} วินาที`;
            document.getElementById('score-summary').style.display = 'block';
        }
    </script>
</body>
</html>
