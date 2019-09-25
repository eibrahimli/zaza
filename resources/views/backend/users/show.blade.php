@extends('backend.layout.app')

@section('title',$user->flName.' istifadəçisinə aid məlumatlar')
@section('whereiam',"{ ".$user->flName." }".' istifadəçisinə aid məlumatlar')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}...
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-img-overlap">
                    <img class="card-img-top" src="{{ asset('storage/'.$user->photo) }}" alt="Card image cap" />
                </div>
                <div class="card-block padd-0 translateY-50 text-center">
                    <h5 style="margin-top: 90px;" class="font-normal mrg-bot-0 font-18 card-title">{{ $user->flName }}</h5>
                    <p class="card-small-text">{{ $user->email }}</p>
                </div>
            </div>

            <!-- About Me Box -->
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Hakkında</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <strong><i class="fas fa-map-marker margin-r-5"></i> Adress | <i class="fas fa-phone margin-r-5"></i> Telefon</strong>

                    <p class="text-muted">{{ $user->adress }} | {{ $user->tel }}</p>

                    <hr>
                    <strong><i class="fas fa-flag margin-r-5"></i> Ölkə</strong>

                    <p class="text-muted">{{ $user->country }}</p>

                    <hr>
                    <strong><i class="fas fa-city margin-r-5"></i> Şəhər</strong>

                    <p class="text-muted">{{ $user->city }}</p>

                    <hr>

                    <strong><i class="fas fa-file-text-o margin-r-5"></i> Açıqlama</strong>

                    <p>{{ $user->info  }}</p>
                    <hr>
                    <form action="{{ url('admin/users/'.$user->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">İstifadəçini Sil</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-md-4 -->

        <div class="col-md-8">
            <div class="nav-tabs-custom bg-white">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Redaktə Et</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="settings">
                        <!-- form -->
                        <form action="{{ url('admin/users/'.$user->id) }}" method="post" id="form" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="inputName" class="control-label col-sm-2">Login</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('name') ?? $user->name }}" name="name" class="form-control" id="inputName">
                                </div>
                            </div>
                            {{ $errors->first('name') }}

                            <div class="form-group">
                                <label for="inputName" class="control-label col-sm-3">Ad və Soyad</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('flName') ?? $user->flName }}" name="flName" class="form-control" id="inputName">
                                </div>
                            </div>
                            {{ $errors->first('flName') }}

                            <div class="form-group">
                                <label for="inputEmail" class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('email') ?? $user->email }}" name="email" class="form-control" id="inputEmail" data-error="Bruh, that email address is invalid">
                                </div>
                            </div>
                            {{ $errors->first('email') }}

                            <div class="form-group">
                                <label for="inputPass" class="control-label col-sm-2">Şifrə</label>
                                <div class="col-sm-10">
                                    <input type="password" value="{{ old('password') }}" placeholder="Yeni şifrə yazın" name="password" class="form-control" id="inputPass">
                                </div>
                            </div>
                            {{ $errors->first('password') }}

                            <div class="form-group">
                                <label for="inputphone" class="control-label col-sm-2">Telefon</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tel" value="{{ old('tel') ?? $user->tel }}" class="form-control" id="inputphone">
                                </div>
                            </div>
                            {{ $errors->first('tel') }}

                            <div class="form-group">
                                <label for="inputOlke" class="control-label col-sm-2">Ölkə</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('country') ?? $user->country }}" name="country" class="form-control" id="inputOlke">
                                </div>
                            </div>
                            {{ $errors->first('country') }}

                            <div class="form-group">
                                <label for="inputCity" class="control-label col-sm-2">Şəhər</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('city') ?? $user->city }}" name="city" class="form-control" id="inputCity">
                                </div>
                            </div>
                            {{ $errors->first('city') }}

                            <div class="form-group">
                                <label for="inputAddress" class="control-label col-sm-2">Adress</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('adress') ?? $user->adress }}" name="adress" class="form-control" id="inputAddress">
                                </div>
                            </div>
                            {{ $errors->first('adress') }}

                            <div class="form-group">
                                <label for="exampleSelect2" class="control-label col-sm-2">Şəxs</label>
                                <div class="col-sm-10">
                                    <select multiple="" name="tip" class="form-control" id="exampleSelect2">
                                        @foreach($user->options() as $key => $value)
                                            <option value="{{ $key }}" {{ $user->tip == $key ? 'selected' : null }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{ $errors->first('tip') }}

                            <div class="form-group">
                                <label for="exampleSelect24" class="control-label col-sm-3">İstifadəçi Rütbəsi</label>
                                    <div class="col-sm-10">
                                        <select multiple="" name="level" class="form-control" id="exampleSelect24">
                                            <option value="user" {{ $user->level == 'user' ? 'selected' : null }}>User</option>
                                            <option value="moderator" {{ $user->level == 'moderator' ? 'selected' : null }}>Moderator</option>
                                            <option value="admin" {{ $user->level == 'admin' ? 'selected' : null }}>Admin</option>
                                        </select>
                                    </div>
                            </div>
                            {{ $errors->first('level') }}

                            <div class="form-group">
                                <label for="exampleTextarea" class="control-label col-sm-2">Məlumat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="info" id="exampleTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 91px;">{{ old('info') ?? $user->info }}</textarea>
                                </div>
                            </div>
                            {{ $errors->first('info') }}

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="custom-file" class="control-label">
                                        <input type="file" name="photo" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Profil şəkli</span>
                                    </label>
                                </div>
                            </div>
                            {{ $errors->first('photo') }}

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Yenilə</button>
                                </div>
                            </div>

                        </form>
                        <!-- /form -->
                    </div>

                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col-md-8 -->
    </div>
    <!-- /row -->
@endsection

@section('js')
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/messages_az.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js"></script>
    <!--
    <script>
        $(document).ready(function(){
           $('#form').validate();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
           $('#form').ajaxForm({
               beforeSubmit: function () {

               },
               success: function (response) {
                   if(response.tip == 'ok') {
                       Swal.fire(
                           'Good job!',
                           'You clicked the button!',
                           'success'
                       )
                   }
               }
           })
        });
    </script>
    -->
@endsection
