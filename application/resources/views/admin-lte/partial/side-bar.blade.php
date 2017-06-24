<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menüler</li>

            @if(Privilege::hasOnly(Role::Master, Role::Student))
                <li>
                    <a href="{{ action('HomeController@show') }}">
                        <i class="fa fa-dashboard"></i> <span>Kontrol Paneli</span>
                    </a>
                </li>
            @endif
            @if(Privilege::hasOnly(Role::Master))
            <li>
                <a href="{{ action('LectureController@show') }}">
                    <i class="fa fa-edit"></i> <span>Dersler</span>
                </a>
            </li>
            <li>
                <a href="{{ action('FacultyMemberController@show') }}">
                    <i class="fa fa-graduation-cap"></i> <span>Ögretim Görevlileri</span>
                </a>
            </li>
            <li>
                <a href="{{ action('ClassroomController@show') }}">
                    <i class="fa fa-building"></i> <span>Sınıflar</span>
                </a>
            </li>
            <li>
                <a href="{{ action('StudentController@show') }}">
                    <i class="fa fa-users"></i> <span>Öğrenciler</span>
                </a>
            </li>
            @endif

            @if(Privilege::hasOnly(Role::Student))
            <li>
                <a href="{{ action('LectureRegisterController@view') }}">
                    <i class="fa fa-edit"></i> <span>Ders Kayıt</span>
                </a>
            </li>
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>