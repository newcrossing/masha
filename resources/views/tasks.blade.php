@extends('layouts.site.app')

@section('content')

вапва
    <!-- Текущие задачи -->
    @if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($users as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->Text_Content }}</div>

                            </td>


                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
