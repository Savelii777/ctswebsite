@extends('layouts.admin_layout')

@section('title', 'Главная')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Заказы</h1>
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
            <a href="{{ route('order.export')}}" class="btn btn-success float-right" style="margin-right: 10px;"><img src="/images/excel.png" width="32" height="32"> Скачать</a>

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

    <form style="max-width:100%; height:40px; margin: 20px; border:1px solid #6b7fe3; border-radius:5px" action="/admin/tests" method="GET">
    <input  type="text" name="keyword" placeholder="Введите ключевое слово" style="width:100%; font-size:23px">
    <button style="position:absolute;top:198px;right:20px;height:39px;border:1px solid #6b7fe3;border-radius:5px" type="submit">Поиск</button>
</form>
  <table class="table">
  <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Товар</th>
            <th>Заказчик</th>
            <th>Дата заказа</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
           <tr>
           <td>
            {{$question->id}}
            </td>
 <td>
            @php
        $orderInfo = json_decode($question->order_info, true);
        $totalPrice = 0;
    @endphp
    @foreach ($orderInfo as $item)
    @php
        $itemPrice = $item['price'] * $item['quantity'];
        $totalPrice += $itemPrice;
    @endphp
    <p><strong>{{ $loop->index + 1 }}</strong> {{ $item['title'] }}, {{ $item['price'] }}, {{ $item['quantity'] }}</p>
    @endforeach
    <p><strong>Итого: </strong>{{$totalPrice}}</p>

</td>
<td>
@php
        $userInfo = json_decode($question->user_info, true);
    @endphp

    @foreach ($userInfo as $key => $value)
@if ($key == 'name' || $key == 'email' || $key == 'city' || $key == 'place_of_work')
{{ $value }},
@endif
@endforeach
</td>
<td>
    {{$question->created_at}}
</td>
           </tr>
        @endforeach
    </tbody>
    </table>
@endsection
