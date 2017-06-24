@extends('admin-lte.template.fixed')

@section('title', 'Sınıflar')

@include('widget.dataTables')

@section('content')
    <section class="content-header">
        <h1>Sınıf ve Katlar</h1>
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
                    <a href="{{ action('ClassroomController@addView') }}" class="btn btn-block btn-success">Bina Bilgisi Ekle</a>
                </span>
                    </div>
                    <div class="box-body">
                        <table id="student" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kodu</th>
                                <th>Kat</th>
                                <th>Sınıf</th>
                                <th  data-sortable="false">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->id }}</td>
                                    <td>{{ $classroom->code }}</td>
                                    <td>{{ $classroom->type ? $classroom->getFloorName() : $classroom->name }}</td>
                                    <td>{{ $classroom->type ? $classroom->name : "" }}</td>
                                    <td class="pull-right">
                                        <a class="btn btn-info" href="{{ action('ClassroomController@editView', $classroom->id) }}">
                                            <i class="fa fa-edit"></i> Güncelle
                                        </a>
                                        <a class="btn btn-danger" href="{{ action('ClassroomController@delete', $classroom->id) }}">
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