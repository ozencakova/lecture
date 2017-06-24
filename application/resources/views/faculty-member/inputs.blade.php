<div class="box-body row">
    <div class="form-group col-md-4">
        {!! Form::label('Kod*')  !!}
        {!! Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'Kod giriniz']) !!}
    </div>

    <div class="form-group col-md-4">
        {!! Form::label('Ad*')  !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ad giriniz']) !!}
    </div>

    <div class="form-group col-md-4">
        {!! Form::label('Soyad*')  !!}
        {!! Form::text('surname', null, ['class'=>'form-control', 'placeholder'=>'Soyad giriniz']) !!}
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('email')  !!}
        {!! Form::text('email' , null, ['class'=>'form-control date-input', 'data-inputmask'=>"'alias': 'email'", 'data-mask']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('Doğum Tarihi')  !!}
        {!! Form::text('start_date' , null, ['class'=>'form-control date-input', 'data-inputmask'=>"'alias': 'yyyy-mm-dd'", 'data-mask']) !!}
    </div>
</div>