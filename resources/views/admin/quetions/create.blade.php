<!DOCTYPE html>
<html>
<head>
    <title>Создание вопроса</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-5">
    <h1>Создание вопроса</h1>
    <form method="post" action="{{ route('questions.testStore') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="manual_answer" name="manual_answer">
    <label class="form-check-label" for="manual_answer">Ручной ответ</label>
</div>
    <!--<div class="form-group">
        <label for="course_number">Введите номер курса:</label>
        <input type="text" class="form-control" id="course_number" name="course_number" required>
    </div>-->

    <div class="form-group">
        <label for="chapter_number">Введите номер главы:</label>
        <input type="text" class="form-control" id="chapter_number" name="chapter_number" required>
    </div>
    <div class="form-group">
        <label for="image">Выберите изображение:</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
    <div class="question form-group">

    <label for="question_1">Вопрос:</label>
    <input type="text" class="form-control" id="question_1" name="questions[1][question]" required>
    <fieldset required>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="1"  >
        <label class="form-check-label" for="answer_1_1">Ответ 1:</label>
        <input type="text" class="form-control" id="answer_1_1" name="questions[1][answers][1]" required >
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="2"  >
        <label class="form-check-label" for="answer_1_2">Ответ 2:</label>
        <input type="text" class="form-control" id="answer_1_2" name="questions[1][answers][2]" >
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="3"  >
        <label class="form-check-label" for="answer_1_3">Ответ 3:</label>
        <input type="text" class="form-control" id="answer_1_3" name="questions[1][answers][3]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="4"  >
        <label class="form-check-label" for="answer_1_4">Ответ 4:</label>
        <input type="text" class="form-control" id="answer_1_4" name="questions[1][answers][4]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="5"  >
        <label class="form-check-label" for="answer_1_5">Ответ 5:</label>
        <input type="text" class="form-control" id="answer_1_5" name="questions[1][answers][5]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="6"  >
        <label class="form-check-label" for="answer_1_6">Ответ 6:</label>
        <input type="text" class="form-control" id="answer_1_6" name="questions[1][answers][6]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="7"  >
        <label class="form-check-label" for="answer_1_7">Ответ 7:</label>
        <input type="text" class="form-control" id="answer_1_7" name="questions[1][answers][7]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="8"  >
        <label class="form-check-label" for="answer_1_8">Ответ 8:</label>
        <input type="text" class="form-control" id="answer_1_8" name="questions[1][answers][8]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="9"  >
        <label class="form-check-label" for="answer_1_9">Ответ 9:</label>
        <input type="text" class="form-control" id="answer_1_9" name="questions[1][answers][9]" >
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="10"  >
        <label class="form-check-label" for="answer_1_10">Ответ 10:</label>
        <input type="text" class="form-control" id="answer_1_10" name="questions[1][answers][10]">
    </div>

 </div>




    <br><br>

    <button type="submit" class="btn btn-primary">Сохранить вопрос</button>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#manual_answer').change(function() {
            if(this.checked) {
                $('.form-check.answer input[type="checkbox"]').css('pointer-events', 'none');
                $('.form-check.answer input[type="text"]').prop('readonly', true);

            } else {
                $('.form-check.answer input[type="checkbox"]').css('pointer-events', 'auto');
                $('.form-check.answer input[type="text"]').prop('readonly', false);
            }
        });

    });
</script>


</body>
</html>
