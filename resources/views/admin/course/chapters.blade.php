@extends('layouts.admin_layout')

@section('title', 'Главы')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-3">
                    <a href="{{ route('course.index')}}" class="btn btn-secondary">Назад</a>
                </div>
                <div class="col-sm-6">
                    <h1>Главы курса "{{$course->title}}"</h1>
                </div>
                <div class="col-sm-3">
                    <a href="{{ route('course.chapters.create', $course['id'])}}" class="btn btn-success float-right">Добавить
                        главу</a>
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
                            Название
                        </th>
                        <th>
                            Порядок
                        </th>
                        <th>
                            Файлы
                        </th>
                        <th>
                            Тесты
                        </th>
                        <th>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($course->chapters as $chapter)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td style="max-width: 300px">
                                {{ $chapter->title }}
                            </td>
                            <td>
                                {{ $chapter->order }}
                            </td>
                            <td>
                                {{ $chapter->files->count() }}
                            </td>
                            <td>
                                {{ $chapter->tests->count() }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('chapter.files', $chapter['id']) }}">
                                    <i class="fas fa-list">
                                    </i> Файлы
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('chapter.tests', $chapter['id']) }}">
                                    <i class="fas fa-list">
                                    </i> Тесты
                                </a>
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('course.chapters.edit', [$course['id'], $chapter['id']]) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <form action="{{ route('chapter.destroy', $chapter['id']) }}" method="POST"
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
    </section>
    <!-- /.content -->
@endsection
