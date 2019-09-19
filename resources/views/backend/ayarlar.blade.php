@extends('backend.layout.app')

@section('whereiam','Sayt ayarları')

@section('title','Zaza.az | Admin Panel')

@section('content')
    <form action="{{ url('/admin/ayarlar/'.$ayarlar->id) }}" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-6 col-12">

                            <div class="form-group">
                                <div class="contact-img">
                                    <img src="{{ asset('storage/'.$ayarlar->logo) }}" class="img-circle img-responsive" alt="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" value="{{ old('title') ?? $ayarlar->title  }}" class="form-control">
                                </div>
                                {{ $errors->first('title') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Saytın Açıqlaması</label>
                                    <input name='desc' type="text"  value="{{ old('desc') ?? $ayarlar->desc  }}" class="form-control">
                                </div>
                                {{ $errors->first('desc') }}

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text"  value="{{ old('email') ?? $ayarlar->email  }}" class="form-control">
                                </div>
                                {{ $errors->first('email') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input name='tel' type="text"  value="{{ old('tel') ?? $ayarlar->tel  }}" class="form-control">
                                </div>
                                {{ $errors->first('tel') }}
                            </div>

                        </div>

                        <!-- col-md-6 -->
                        <div class="col-md-6 col-12 padd-top-20">

                            <!-- col-md-12 -->
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input name="face" type="text" value="{{ old('face') ?? $face }}" class="form-control">
                                        </div>
                                        {{ $errors->first('face') }}
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input name="insta" type="text" value="{{ old('insta') ?? $insta }}" class="form-control">
                                        </div>
                                        {{ $errors->first('insta') }}
                                    </div>
                                </div>

                            </div>
                            <!-- col-md-12 -->

                            <!-- col-md-12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Açar Sözlər</label>
                                    <input name='keyw' type="text" value="{{ old('keyw') ?? $ayarlar->keyw }}" class="form-control">
                                </div>
                                {{ $errors->first('keyw') }}
                            </div>
                            <!-- col-md-12 -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input name='location' type="text" value="{{ old('location') ?? $ayarlar->location }}" class="form-control">
                                </div>
                                {{ $errors->first('location') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="custom-file" class="control-label">
                                        <input type="file" name="logo" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Sayt Logosu</span>
                                    </label>
                                </div>
                                {{ $errors->first('logo') }}
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Təsdiqlə</button>
                                </div>
                            </div>                                                    

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>


@endsection
