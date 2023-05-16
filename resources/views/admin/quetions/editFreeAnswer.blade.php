<!DOCTYPE html>
<html>
<head>
    <title>Редактирование вопроса</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Редактирование теста</h1>
    <form method="post" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!--<div class="form-group">
        <label for="course_number">Введите номер курса:</label>
        <input type="text" class="form-control" id="course_number" name="course_number" required>
    </div>-->

    <div class="form-group">
        <!--<label  for="chapter_number">Номер главы:</label>-->
        <input type="hidden" class="form-control" id="chapter_number" name="chapter_number" value={{$question["test_id"]}} required>
    </div>

            @php
                $data = json_decode($question->data, true);
            @endphp


            <div class="question form-group">
    <label for="question_1">Вопрос:</label>
    <input type="text" class="form-control" id="question_1" name="questions[1][question]" value="{{$data[0]['question']}}" required>

    <div class="form-group">
    <label for="image">Выберите изображение:</label>
    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="1" style="pointer-events : none">
        <label class="form-check-label" for="answer_1_1">Ответ 1:</label>

        <input type="text" class="form-control" id="answer_1_1" name="questions[1][answers][1]" readonly>
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="2" style="pointer-events : none">
        <label class="form-check-label" for="answer_1_2">Ответ 2:</label>
        <input type="text" class="form-control" id="answer_1_2" name="questions[1][answers][2]" readonly>
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="3"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_3">Ответ 3:</label>
        <input type="text" class="form-control" id="answer_1_3" name="questions[1][answers][3]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="4"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_4">Ответ 4:</label>
        <input type="text" class="form-control" id="answer_1_4" name="questions[1][answers][4]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="5"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_5">Ответ 5:</label>
        <input type="text" class="form-control" id="answer_1_5" name="questions[1][answers][5]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="6" style="pointer-events : none">
        <label class="form-check-label" for="answer_1_6">Ответ 6:</label>
        <input type="text" class="form-control" id="answer_1_6" name="questions[1][answers][6]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="7"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_7">Ответ 7:</label>
        <input type="text" class="form-control" id="answer_1_7" name="questions[1][answers][7]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="8"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_8">Ответ 8:</label>
        <input type="text" class="form-control" id="answer_1_8" name="questions[1][answers][8]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="9"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_9">Ответ 9:</label>
        <input type="text" class="form-control" id="answer_1_9" name="questions[1][answers][9]" readonly>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="10"  style="pointer-events : none">
        <label class="form-check-label" for="answer_1_10">Ответ 10:</label>
        <input type="text" class="form-control" id="answer_1_10" name="questions[1][answers][10]" readonly>
    </div>

</div>


    <br><br>

    <button type="submit" class="btn btn-primary">Сохранить вопрос</button>
</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>
</html>
