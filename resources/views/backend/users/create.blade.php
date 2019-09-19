@extends('backend.layout.app')

@section('title', 'Yeni istifadəçi əlavə et')
@section('whereiam', 'Yeni istifadəçi əlavə et')

@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12">
    <div class="card">
      <!-- form start -->
      <form action="{{ url('admin/users') }}" method="POST" enctype="multipart/form-data" data-toggle="validator" class="padd-20" novalidate="true">
        <!-- Token place -->
        @csrf
        <div class="row mrg-0">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputName" class="control-label">Login</label>
              <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="inputName" placeholder="Logini daxil edin">
            </div>
              {{ $errors->first('name') }}
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputName" class="control-label">Ad və Soyad</label>
              <input type="text" value="{{ old('flName') }}" name="flName" class="form-control" id="inputName" placeholder="Adınızı və soyadınızı daxil edin">
            </div>
              {{ $errors->first('flName') }}
          </div>

        </div>

        <div class="row mrg-0">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputEmail" class="control-label">Email</label>
              <input type="text" value="{{ old('email') }}" name="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid">
              <div class="help-block with-errors"></div>
            </div>
              {{ $errors->first('email') }}
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputPass" class="control-label">Şifrə</label>
              <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="inputPass" placeholder="Şifrənizi daxil edin">
              <div class="help-block with-errors"></div>
            </div>
              {{ $errors->first('password') }}
          </div>

        </div>

        <div class="row mrg-0">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputphone" class="control-label">Telefon</label>
              <input type="text" name="tel" value="{{ old('tel') ?? '+994' }}" class="form-control" id="inputphone">
            </div>
              {{ $errors->first('tel') }}
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputOlke" class="control-label">Ölkə</label>
              <input type="text" value="{{ old('country') }}" name="country" class="form-control" id="inputOlke" placeholder="Ölkənizi daxil edin">
            </div>
              {{ $errors->first('country') }}
          </div>

        </div>

        <div class="row mrg-0">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputCity" class="control-label">Şəhər</label>
              <input type="text" value="{{ old('city') }}" name="city" class="form-control" id="inputCity" placeholder="Şəhəriniz daxil edin">
            </div>
              {{ $errors->first('city') }}
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="inputAddress" class="control-label">Adress</label>
              <input type="text" value="{{ old('adress') }}" name="adress" class="form-control" id="inputAddress" placeholder="Adresiniz..">
            </div>
              {{ $errors->first('adress') }}
          </div>

        </div>

        <div class="row mrg-0">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleSelect2" class="control-label">Şəxs</label>
              <select multiple="" name="tip" class="form-control" id="exampleSelect2">
                <option value="fiziki" {{ old('tip') == 'fiziki' ? 'selected' : null }}>Fiziki</option>
                <option value="şirkət" {{ old('tip') == 'şirkət' ? 'selected' : null }}>Şirkət</option>
              </select>
            </div>
              {{ $errors->first('tip') }}
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleTextarea">Məlumat</label>
              <textarea class="form-control" name="info" id="exampleTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 91px;">{{ old('info') }}</textarea>
            </div>
              {{ $errors->first('info') }}
          </div>

        </div>
        <div class="row mrg-0">
          <div class="col-sm-12">
            <div class="form-group">
              <label class="custom-file">
                <input type="file" name="photo" id="file" class="custom-file-input">
                <span class="custom-file-control">Profil şəkli</span>
              </label>
            </div>
              {{ $errors->first('photo') }}
          </div>
        </div>

        <div class="col-12">
          <div class="form-group">
            <div class="text-center">
            <button type="submit" class="btn gredient-btn disabled">Əlavə Et</button>
            </div>
          </div>
        </div>

      </form>

    </div>
  </div>
  <!-- /.col-md-12 -->

</div>

@endsection
