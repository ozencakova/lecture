@extends("admin-lte.template.fixed")

@section("content")
    <section class="content-header">
        <h1>Kontrol Paneli</h1>
    </section>

    @if(Privilege::hasOnly(Role::Master))
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dersler</span>
                        <a href="{{ action('LectureController@show') }}" >
                            <span class="btn btn-primary" style="margin-top: 15px;">İncele</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-graduation-cap"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ögretim Görevlileri</span>
                        <a href="{{ action('FacultyMemberController@show') }}">
                            <span class="btn btn-primary" style="margin-top: 15px;">İncele</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-building"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sınıflar</span>
                        <a href="{{ action('ClassroomController@show') }}">
                            <span class="btn btn-primary" style="margin-top: 15px;">İncele</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Öğrenciler</span>
                        <a href="{{ action('StudentController@show') }}">
                            <span class="btn btn-primary" style="margin-top: 15px;">İncele</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    @endif

    @if(Privilege::hasOnly(Role::Student))
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-edit"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Ders Kayıt</span>
                        <a href="{{ action('LectureRegisterController@view') }}" >
                            <span class="btn btn-primary" style="margin-top: 15px;">Ders Seç</span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
    </section>
    @endif

@endsection