<span class="text-red">Kat bilgisi girilirken kat seçimini boş bırakınız.</span>
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
        {!! Form::label('Kat')  !!}
        {!! Form::select('parent_id', $floor, null, ['class'=>'form-control', 'placeholder'=>'Kat seçiniz']) !!}
    </div>

</div>