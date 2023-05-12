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
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="1"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 1)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_1">Ответ 1:</label>

        <input type="text" class="form-control" id="answer_1_1" name="questions[1][answers][1]"
        @if(isset($data[0]['answers'][0]))
            value="{{$data[0]['answers'][0]}}"
        @endif>
    </div>


    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="2"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 2)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_2">Ответ 2:</label>
        <input type="text" class="form-control" id="answer_1_2" name="questions[1][answers][2]"
        @if(isset($data[0]['answers'][1]))
            value="{{$data[0]['answers'][1]}}"
        @endif>
    </div>

    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="3"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 3)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_3">Ответ 3:</label>
        <input type="text" class="form-control" id="answer_1_3" name="questions[1][answers][3]"
        @if(isset($data[0]['answers'][2]))
            value="{{$data[0]['answers'][2]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="4"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 4)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_4">Ответ 4:</label>
        <input type="text" class="form-control" id="answer_1_4" name="questions[1][answers][4]"
        @if(isset($data[0]['answers'][3]))
            value="{{$data[0]['answers'][3]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="5"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 5)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_5">Ответ 5:</label>
        <input type="text" class="form-control" id="answer_1_5" name="questions[1][answers][5]"
        @if(isset($data[0]['answers'][4]))
            value="{{$data[0]['answers'][4]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="6"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 6)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_6">Ответ 6:</label>
        <input type="text" class="form-control" id="answer_1_6" name="questions[1][answers][6]"
        @if(isset($data[0]['answers'][5]))
            value="{{$data[0]['answers'][5]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="7"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 7)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_7">Ответ 7:</label>
        <input type="text" class="form-control" id="answer_1_7" name="questions[1][answers][7]"
        @if(isset($data[0]['answers'][6]))
            value="{{$data[0]['answers'][6]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="8"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 8)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_8">Ответ 8:</label>
        <input type="text" class="form-control" id="answer_1_8" name="questions[1][answers][8]"
        @if(isset($data[0]['answers'][7]))
            value="{{$data[0]['answers'][7]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="9"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 9)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_9">Ответ 9:</label>
        <input type="text" class="form-control" id="answer_1_9" name="questions[1][answers][9]"
        @if(isset($data[0]['answers'][8]))
            value="{{$data[0]['answers'][8]}}"
        @endif>
    </div>
    <div class="form-check answer">
        <input type="checkbox" class="form-check-input" name="questions[1][correct_answer][]" value="10"
        @foreach($data as $item)
            @foreach($item['correct_answer'] as $index => $answer)
                @if($answer == 10)
                    checked
                @endif
            @endforeach
        @endforeach>
        <label class="form-check-label" for="answer_1_10">Ответ 10:</label>
        <input type="text" class="form-control" id="answer_1_10" name="questions[1][answers][10]"
        @if(isset($data[0]['answers'][9]))
            value="{{$data[0]['answers'][9]}}"
        @endif>
    </div>

</div>


    <br><br>

    <button type="submit" class="btn btn-primary">Сохранить вопрос</button>
</form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
