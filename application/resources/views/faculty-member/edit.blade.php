@extends('admin-lte.template.fixed')

@section('title', 'Ögretim Görevlisi Düzenle')

@include('widget.input-mask')

@section('content')
    <section class="content-header">
        <h1>Ögretim Görevlisi Düzenle</h1>
    </section>
    <section class="content">
        <div class='row'>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('partial.messages')
                    </div>
                    <div class="box-body">
                        {!! Form::model($facultyMember, ['action' => ['FacultyMemberController@edit', $facultyMember->id]]) !!}
                        @include('faculty-member.inputs', ['isEdit' => true])
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