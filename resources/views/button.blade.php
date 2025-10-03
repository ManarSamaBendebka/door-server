<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>حالة الزر</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
            background: #f0f0f0;
        }
        .status-container {
            font-size: 28px;
            margin: 20px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .indicator {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: red; /* OFF افتراضي */
            transition: background 0.3s;
        }
        button {
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            background: #008CBA;
            color: white;
            margin-top: 30px;
        }
        button:hover {
            background: #005f73;
        }
    </style>
</head>
<body>
    <h1>🚪 حالة الزر</h1>

    <div class="status-container">
        <div class="indicator" id="indicator"></div>
        <div id="status-text">OFF</div>
    </div>

    <button id="toggleBtn">🔄 تغيير الحالة</button>

    <script>
        const btn = document.getElementById('toggleBtn');
        const statusText = document.getElementById('status-text');
        const indicator = document.getElementById('indicator');

        btn.addEventListener('click', () => {
            if (statusText.innerText === 'OFF') {
                statusText.innerText = 'ON';
                indicator.style.background = 'green';
            } else {
                statusText.innerText = 'OFF';
                indicator.style.background = 'red';
            }
        });
    </script>
</body>
</html>
