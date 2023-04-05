<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Результаты теста</title>
  
  <style>
    h1 {
      font-size: 2em;
      color: #333;
      text-align: center;
      margin-top: 20px;
    }
    
    p {
      font-size: 1.5em;
      color: #666;
      text-align: center;
      margin-top: 10px;
    }
    
    .back-button-wrapper {
      text-align: center;
      margin-top: 20px;
    }
    
    .back-button {
      padding: 10px 20px;
      background-color: #4a4a4a;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 18px;
      cursor: pointer;
      box-shadow: 0px 3px 5px rgba(0,0,0,0.3);
      margin-bottom: 20px;
    }
    
    .back-button:hover {
      background-color: #3a3a3a;
      box-shadow: 0px 3px 10px rgba(0,0,0,0.5);
    }
  </style>
</head>
<body>
  <h1>Результаты теста</h1>
  <p>Ваш результат: {{ $score }}%</p>
  
  <div class="back-button-wrapper">
    <a class="back-button" href="javascript:history.go(-2)">Назад</a>
  </div>
</body>
</html>
