@extends('admin-lte.template.fixed')

@section('title', 'Dersler')

@include('widget.dataTables')

@section('content')
    <section class="content-header">
        <h1>Dersler</h1>
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
                    <a href="{{ action('LectureController@addView') }}" class="btn btn-block btn-success">Ders Ekle</a>
                </span>
                    </div>
                    <div class="box-body">
                        <table id="lectures" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kodu</th>
                                <th>Adı</th>
                                <th>Sınıf</th>
                                <th>Öğretim Görevlisi</th>
                                <th>Gün</th>
                                <th>Saat</th>
                                <th  data-sortable="false">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lectures as $lecture)
                                <tr>
                                    <td>{{ $lecture->id }}</td>
                                    <td>{{ $lecture->code }}</td>
                                    <td>{{ $lecture->name }}</td>
                                    <td>{{ $lecture->classroom->name }}</td>
                                    <td>{{ $lecture->faculty_member->name }}</td>
                                    <td>{{ \App\Enums\Day::getDay()[$lecture->day] }}</td>
                                    <td>{{ array('9:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00')[$lecture->time] }}</td>
                                    <td class="pull-right">
                                        <a class="btn btn-info" href="{{ action('LectureController@editView', $lecture->id) }}">
                                            <i class="fa fa-edit"></i> Güncelle
                                        </a>
                                        <a class="btn btn-danger" href="{{ action('LectureController@delete', $lecture->id) }}">
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
        $("#lectures").toDataTable();
    });
</script>
@endpush