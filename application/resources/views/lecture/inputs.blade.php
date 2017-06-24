<div class="box-body row">
    <div class="form-group col-md-3">
        {!! Form::label('Kod*')  !!}
        {!! Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'Kod giriniz']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('Ad*')  !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ad giriniz']) !!}
    </div>

    <div class="clearfix"></div>
    <div class="form-group col-md-3">
        {!! Form::label('Sınıf*')  !!}
        {!! Form::select('classroom_id', $classroom, null, ['class'=>'form-control', 'placeholder'=>'Sınıf seçiniz']) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::label('Ögretim Görevlisi*')  !!}
        {!! Form::select('faculty_member_id', $facultyMember, null, ['class'=>'form-control', 'placeholder'=>'Öğretim Görevlisi seçiniz']) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::label('Gün*')  !!}
        {!! Form::select('day', \App\Enums\Day::getDay(), null, ['class'=>'form-control', 'placeholder'=>'Gün seçiniz']) !!}
    </div>

    <div class="form-group col-md-3">
        {!! Form::label('Saat*')  !!}
        {!! Form::select('time', array('9:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00', '17:00'), null, ['class'=>'form-control', 'placeholder'=>'Saat seçiniz']) !!}
    </div>

    <div class="form-group col-md-12">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('is_mandatory', '0') }} Zorunlu mu?
            </label>
        </div>
    </div>

</div>