@extends('admin-lte.template.fixed')

@section('title', 'Öğrenci Düzenle')

@include('widget.input-mask')

@section('content')
    <section class="content-header">
        <h1>Öğrenci Düzenle</h1>
    </section>
    <section class="content">
        <div class='row'>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('partial.messages')
                    </div>
                    <div class="box-body">
                        {!! Form::model($student, ['action' => ['StudentController@edit', $student->id]]) !!}
                        @include('student.inputs', ['isEdit' => true])
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Düzenle</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection