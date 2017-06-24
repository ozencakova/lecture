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

    <div class="form-group col-md-4">
        {!! Form::label('Email*')  !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email giriniz']) !!}
    </div>

    <div class="form-group col-md-4">
        {!! Form::label('Şifre')  !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

</div>