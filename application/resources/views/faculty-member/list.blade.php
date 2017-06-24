@extends('admin-lte.template.fixed')

@section('title', 'Öğretim Görevlileri')

@include('widget.dataTables')

@section('content')
    <section class="content-header">
        <h1>Öğretim Görevlileri</h1>
    </section>
    <section class="content">
        <div class='row'>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                <span class="pull-right" style="padding:15px;">
                    <a href="{{ action('FacultyMemberController@addView') }}" class="btn btn-block btn-success">Öğretim Görevlisi Ekle</a>
                </span>
                    </div>
                    <div class="box-body">
                        <table id="facultyMember" class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kodu</th>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>Email</th>
                                <th  data-sortable="false">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($facultyMembers as $facultyMember)
                                <tr>
                                    <td>{{ $facultyMember->id }}</td>
                                    <td>{{ $facultyMember->code }}</td>
                                    <td>{{ $facultyMember->name }}</td>
                                    <td>{{ $facultyMember->surname }}</td>
                                    <td>{{ $facultyMember->email }}</td>
                                    <td class="pull-right">
                                        <a class="btn btn-info" href="{{ action('FacultyMemberController@editView', $facultyMember->id) }}">
                                            <i class="fa fa-edit"></i> Güncelle
                                        </a>
                                        <a class="btn btn-danger" href="{{ action('FacultyMemberController@delete', $facultyMember->id) }}">
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
        $("#facultyMember").toDataTable();
    });
</script>
@endpush