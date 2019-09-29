@extends('backend.layout.app')

@section('title', 'Kateqoriya redaktə et')
@section('whereiam', 'Kateqoriya redaktə et')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" >
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('status') }}... <a href="{{ url('admin/elankat') }}">Burdan</a> bütün kateqoriyalara baxa bilərsiniz.
                </div>
            @endif
            <div class="card">
                <!-- form start -->
                <form action="{{ url('admin/elankat/'.$category->id) }}" method="POST" enctype="multipart/form-data" class="padd-20">
                    <!-- Token place -->
                    @csrf
                    @method('patch')
                    <div class="row mrg-0">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Kateqoriya Adı ( Azəricə )</label>
                                <input type="text" required pattern="[A-Za-zŞÜÖĞƏÇİşüöğçıə ]{2,}" title="Ən azı 2 simvol olmalıdır.." value="{{ old('az_name') ?? $category->az_name }}" name="az_name" class="form-control" id="inputName" placeholder="Azəricə kateqoriya adını daxil edin..">
                            </div>
                            @error('az_name')
                            <div class="alert alert-warning" role="alert">
                                {{ $errors->first('az_name') }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputName" class="control-label">Kateqoriya Adı ( Rusca )</label>
                                <input type="text" required pattern="[A-Za-zŞÜÖĞƏÇİşüöğçıə ]{2,}" title="Ən azı 2 simvol olmalıdır.." value="{{ old('ru_name') ?? $category->ru_name }}" name="ru_name" class="form-control" id="inputName" placeholder="Rusca kateqoriya adını daxil edin..">
                            </div>
                            @error('ru_name')
                            <div class="alert alert-warning" role="alert">
                                {{ $errors->first('ru_name') }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mrg-0">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="custom-file">İconuuuuuuuuuuuuuuuu
                                    <input type="file" name="icon" id="file" class="custom-file-input">
                                    <span class="custom-file-control">Kateqoriya İconu</span>
                                </label>
                            </div>
                            @error('icon')
                            <div class="alert alert-warning" role="alert">
                                {{ $errors->first('icon') }}
                            </div>
                            @enderror
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

@section('js')
    <script>
        $('input[type="text"]')[0]
            .on('invalid', function(){
                return this.setCustomValidity('Boş olmaz');
            })
            .on('input', function(){
                return this.setCustomValidity('');
            });
        $('input[type="text"]')[1]
            .on('invalid', function(){
                return this.setCustomValidity('Boş olmaz');
            })
            .on('input', function(){
                return this.setCustomValidity('');
            });
    </script>
@endsection
