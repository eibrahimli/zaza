@extends ('backend.layout.app')

@section('whereiam','Yeni elan əlavə et')

@section('title','Zaza.az | Yeni elan əlavə et')

@section('content')

    <form action="{{ url('/admin/elan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="row">
                        <!-- col-md-6 -->
                        <div class="col-md-6 col-12 padd-top-20">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Elan Başlığı</label>
                                    <input name="title" required type="text" value="{{ old('title') }}" class="form-control">
                                </div>
                                {{ $errors->first('title') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategoriya</label>
                                    <select class="js-example-basic-single col-md-12" name="category">
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->az_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{ $errors->first('category') }}

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" required  value="{{ old('email') }}" class="form-control">
                                </div>
                                {{ $errors->first('email') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Qiymət</label>
                                    <input name='price' type="number" required value="{{ old('price')}}" class="form-control">
                                </div>
                                {{ $errors->first('price') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleTextarea">Məlumat</label>
                                    <textarea class="form-control" name="info" id="exampleTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 91px;">{{ old('info') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Telefon Nömrəsi</label>
                                    <input name='tel' type="text" required value="{{ old('tel')}}" class="form-control">
                                </div>
                                {{ $errors->first('tel') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelect2" class="control-label">Elan Növü</label>
                                    <select multiple="" name="type" class="form-control" id="exampleSelect2">
                                        <option value="vip">Vip</option>
                                        <option value="adi">Adi</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- col-md-6 -->
                        <div class="col-md-6 col-12 padd-top-20">

                            <!-- col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ölkə</label>
                                    <input name='country' type="text" value="{{ old('country')}}" class="form-control">
                                </div>
                                {{ $errors->first('country') }}
                            </div>
                            <!-- col-md-12 -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Şəhər</label>
                                    <input name='city' type="text" value="{{ old('city')}}" class="form-control">
                                </div>
                                {{ $errors->first('city') }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Adres</label>
                                    <input name='adress' type="text" value="{{ old('adress')}}" class="form-control">
                                </div>
                                {{ $errors->first('adress') }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Əlavə Edən</label>
                                    <input name='name' type="text" value="{{ old('name')}}" class="form-control">
                                </div>
                                {{ $errors->first('name') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelect2" class="control-label">Elanın Aktivliyi</label>
                                    <select multiple="" name="status" class="form-control" id="exampleSelect2">
                                        <option value="1">Aktiv</option>
                                        <option value="0">Passiv</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""></label>
                                    <label class="custom-file" class="control-label">Elan İndeks Şəkli Yüklə. Məsləhət görülür (560x450)
                                        <input type="file" name="photo" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Elan İndeks Şəkli</span>
                                    </label>
                                </div>
                                {{ $errors->first('photo') }}
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="custom-file" class="control-label">Elan Post Şəkilləri Yüklə. Məsləhət görülür (560x450)
                                        <input type="file" name="galery[]" multiple id="file" class="custom-file-input">
                                        <span class="custom-file-control">Elan Post Şəkilləri</span>
                                    </label>
                                </div>
                                {{ $errors->first('photos') }}
                            </div>

                        </div>

                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Əlavə Et</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

@endsection

