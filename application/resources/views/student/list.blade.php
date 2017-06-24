@extends('admin-lte.template.fixed')

@section('title', 'Öğrenciler')

@include('widget.dataTables')

@section('content')
    <section class="content-header">
        <h1>Öğrenciler</h1>
    </section>
    <section class="content">
        <div class='row'>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('partial.messages')
                    </div>
                    <div class="box-header">
                <span class="pull-right" style="padding:15px;">
                    <a href="{{ action('StudentController@addView') }}" class="btn btn-block btn-success">Öğrenci Ekle</a>
                </span>
                    </div>
                    <div class="box-body">
                        <table id="student" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kodu</th>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th  data-sortable="false">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->code }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td class="pull-right">
                                        <a class="btn btn-info" href="{{ action('StudentController@editView', $student->id) }}">
                                            <i class="fa fa-edit"></i> Güncelle
                                        </a>
                                        <a class="btn btn-danger" href="{{ action('StudentController@delete', $student->id) }}">
                                            <i class="fa fa-trash"></i> Sil
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function(){
        $("#student").toDataTable();
    });
</script>
@endpush