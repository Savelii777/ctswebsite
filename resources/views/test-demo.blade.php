@extends('layouts.main_layout')

@section('content')
    @include('partials.header')
    <div class="toppanel">
    @include('partials.test_top', ['chapter' => $test->chapter])
    </div>
    
<head>
<style>
            .toppanel{
                
                background-color: #f5f5f5;
                color: #fff;
                padding-top: 3%;
                padding-bottom: 2%;
                padding-left:15%;
                padding-right:15%;

            }
            .header{
                background-color: #f5f5f5;
            }
            .account-block{
                display: flex;
                justify-content: space-between;
            }
            #structure{
                background: #f5f5f5;
    padding-bottom: 0;
            }
            
            h1 {
                font-size: 32px;
                font-weight: bold;
                text-align: center;
                margin-top: 50px;
            }
            h3{
                color:black;
            }
            .theform
            {
                color:#f5f5f5;
                background: #f5f5f5;
                margin-top: 50px;
            padding: 20px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;

            box-shadow: 0px 3px 5px rgba(0,0,0,0.1);
            margin-left: 20%;
            margin-right: 20%;
            }
            form {
                margin-top: 50px;
                padding: 20px;
                border: 2px solid #ccc;
                border-radius: 10px;
                
            }

            ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            li {
                margin-bottom: 10px;
                color: black;

            }

            label {
                display: inline-block;
                vertical-align: middle;
                margin-left: 10px;
                font-size: 18px;
                color: black;
            }

            button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4a4a4a;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0px 3px 5px rgba(0,0,0,0.3);
        }

        button[type="submit"]:hover {
            background-color: #3a3a3a;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.5);
        }}
        </style>



<h1>Тест по береговым ракетным комплексам (БРК)</h1>
<div class = "theform">
<form method="post" action="{{ url('/test/check') }}">
    {{ csrf_field() }}
    <input type="hidden" name="test" value="{{ json_encode($test) }}">
    <?php $questionNumber = 1; ?>
    @foreach ($questions as $key => $question)
    <h3>{{ $questionNumber }}. {{ $question['question'] }}</h3>
    <ul>
        <?php $answerNumber = 1; ?>
        @foreach ($question['answers'] as $answer)
        <li>
            <input type="radio" id="answer{{ $key }}{{ $answerNumber }}" name="answer{{ $key }}" value="{{ $answer }}">
            <label for="answer{{ $key }}{{ $answerNumber }}">{{ $answer }}</label>
        </li>
        <?php $answerNumber++; ?>
        @endforeach
    </ul>
    <?php $questionNumber++; ?>
    @endforeach
    <button type="submit">Завершить тест</button>я
</form>
</div>

@include('partials.footer')
@endsection
