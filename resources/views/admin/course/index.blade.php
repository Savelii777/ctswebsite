@extends('layouts.admin_layout')

@section('title', 'Курсы')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Курсы</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('course.create')}}" class="btn btn-success float-right">Добавить курс</a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            @sortablelink('title', 'Название')
                        </th>
                        <th>
                            @sortablelink('user_id', 'Эксперт')
                        </th>
                        <th>
                            Главы
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td style="max-width: 300px">
                                {{ $course->title }}
                            </td>
                            <td>
                                {{ $course->user->name }}
                            </td>
                            <td>
                                {{ $course->chapters->count() }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('course.chapters', $course['id']) }}">
                                    <i class="fas fa-list">
                                    </i> Главы
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('course.edit', $course['id']) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <form action="{{ route('course.destroy', $course['id']) }}" method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash">
                                        </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="w100 d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
    </section>
    <!-- /.content -->
@endsection
