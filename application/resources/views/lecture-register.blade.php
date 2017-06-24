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
                        <h3 class="box-title">Ders Kayıt</h3><br>
                        <span><b class="text-red">Zorunlu</b> dersler kırmızı <b class="text-green">Seçmeli</b> dersler yeşil arkaplanlıdır.</span>
                    </div>
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Kodu</th>
                                <th>Ders Adı</th>
                                <th>Sınıf Adı</th>
                                <th>Ögretim Görevlisi</th>
                                <th>Gün</th>
                                <th>Saat</th>
                                <th>İşlemler</th>
                            </tr>
                            @foreach($lectures as $lecture)
                                <tr @if($lecture->is_mandatory) class="bg-red" @else class="bg-green" @endif>
                                    <td>{{ $lecture->id }}</td>
                                    <td>{{ $lecture->code }}</td>
                                    <td>{{ $lecture->name }}</td>
                                    <td>{{ $lecture->classroom->name }}</td>
                                    <td>{{ $lecture->faculty_member->name }}</td>
                                    <td>{{ \App\Enums\Day::getDay()[$lecture->day] }}</td>
                                    <td>{{ array('9:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00')[$lecture->time] }}</td>
                                    <td >
                                        <a class="btn btn-info" href="{{ action('LectureRegisterController@add', $lecture->id) }}">
                                             Seç
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