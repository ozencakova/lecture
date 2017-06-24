@extends('admin-lte.template.fixed')

@section('title', 'Ögretim Görevlisi Ekle')

@include('widget.input-mask')

@section('content')
    <section class="content-header">
        <h1>Ögretim Görevlisi Ekle</h1>
    </section>
    <section class="content">
        <div class='row'>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('partial.messages')
                    </div>
                    <div class="box-body">
                        {!! Form::open(['action' => 'FacultyMemberController@add']) !!}
                        @include('faculty-member.inputs')
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection