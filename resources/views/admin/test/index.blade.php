@extends('layouts.admin_layout')

@section('title', 'Главная')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Тесты</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

                <p>Добавить</p>
              </div>
               
        
              <a href="/admin/questions/create" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  
  <table class="table">
  <thead>
        <tr>
            <th>Номер главы</th>
            <th>Вопрос</th>
            <th>Ответы</th>
            <th>Правильный ответ</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
            @php
                $data = json_decode($question->data, true);
            @endphp
            @foreach ($data as $questionData)
                <tr>
                    <td>{{ $question->test_id }}</td>
                    <td>{{ $questionData['question'] }}</td>
                    <td>
                        <ul>
                            @foreach ($questionData['answers'] as $answer)
                                <li>{{ $answer }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $questionData['correct_answer'] }}</td>
                    <td>
    <div class="d-flex">
    <form action="{{ route('questions.edit', $question->id) }}" method="GET">
        <button type="submit" class="btn btn-primary mr-2">Редактировать</button>
    </form>
         <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот вопрос?')">Удалить</button>
        </form>
    </div>
</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
    </table>
@endsection
 