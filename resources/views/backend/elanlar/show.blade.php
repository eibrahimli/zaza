@extends('backend.layout.app')

@section('title',$elan->title.' başlıqlı elana aid məlumatlar')
@section('whereiam',"{ ".$elan->title." }".' başlıqlı elana aid məlumatlar')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}...
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if(count($photos) > 0)
                    <div class="col-md-12">
                        <div class="row page-titles">
                            <h4 class="text-center theme-cl">Elan Post Şəkilləri</h4>
                        </div>
                    </div>
                    @foreach($photos as $photo)
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                               data-image="{{ asset('storage/'.$photo->photo) }}"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="{{ asset('storage/'.$photo->photo) }}"
                                     alt="Post Şəkli">
                            </a>
                            <div class="text-center py-1"><a href="{{ url('admin/elangallerydel/'.$photo->id) }}" class="btn btn-dark">Sil</a></div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center"> {{ $photos->links() }}</div>
            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                            </button>

                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-img-overlap">
                    <img class="card-img-top" src="{{ asset('storage/'.$elan->photo) }}" alt="Card image cap" />
                </div>
                <div class="card-block padd-0 translateY-50 text-center">
                    <h5 style="margin-top: 90px;" class="font-normal mrg-bot-0 font-18 card-title">{{ $elan->name }}</h5>
                    <p class="card-small-text">{{ $elan->email }}</p>
                </div>
            </div>

            <!-- About Me Box -->
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Hakkında</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <strong><i class="fas fa-map-marker margin-r-5"></i> Adress</strong>

                    <p class="text-muted">{{ $elan->adress }}</p>

                    <hr>
                    <strong><i class="fas fa-dollar-sign margin-r-5"></i> Qiymət</strong>

                    <p class="text-muted">{{ $elan->price }} azn</p>

                    <hr>
                    <strong><i class="fas fa-phone margin-r-5"></i> Telefon</strong>

                    <p class="text-muted">{{ $elan->tel }}</p>

                    <hr>
                    <strong><i class="fas fa-flag margin-r-5"></i> Ölkə</strong>

                    <p class="text-muted">{{ $elan->country }}</p>

                    <hr>
                    <strong><i class="fas fa-city margin-r-5"></i> Şəhər</strong>

                    <p class="text-muted">{{ $elan->city }}</p>

                    <hr>
                    <strong><i class="fas fa-user margin-r-5"></i> Əlavə Edən</strong>

                    <p class="text-muted">{{ $elan->name }}</p>

                    <hr>

                    <strong><i class="fas fa-file-text-o margin-r-5"></i> Açıqlama</strong>

                    <p>{{ $elan->info  }}</p>
                    <hr>
                    <form action="{{ url('admin/elan/'.$elan->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Elanı Sil</button>
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
                        <form action="{{ url('admin/elan/'.$elan->id) }}" method="post" id="form" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="inputName" class="control-label col-sm-2">Elan Başlığı</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('title') ?? $elan->title }}" name="title" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('title')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('title') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">Kategoriya</label>
                                <div class="col-sm-10">
                                    <select class="js-example-basic-single col-md-12" name="category">
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{ $elan->category == $cat->id ? 'selected' : null }}>{{ $cat->az_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('category')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('category') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="control-label col-sm-2">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('email') ?? $elan->email }}" name="email" class="form-control" id="inputEmail" data-error="Bruh, that email address is invalid">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('email')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPrice" class="control-label col-sm-2">Qiymət</label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{ old('price') ?? $elan->price }}" name="price" class="form-control" id="inputPrice">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('price')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('price') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPrice" class="control-label col-sm-2">İnfo</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="info" id="exampleTextarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 91px;">{{ old('info') ?? $elan->info }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('info')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('info') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputphone" class="control-label col-sm-2">Telefon</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tel" value="{{ old('tel') ?? $elan->tel }}" class="form-control" id="inputphone">
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('tel')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('tel') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2" class="control-label col-sm-3">Elan Növü</label>
                                <div class="col-sm-10">
                                    <select multiple="" name="type" class="form-control" id="exampleSelect2">
                                        <option value="vip" {{ $elan->type == 'vip' ? 'selected': null }}>Vip</option>
                                        <option value="adi" {{ $elan->type == 'adi' ? 'selected': null }}>Adi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('type')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('type') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputOlke" class="control-label col-sm-2">Ölkə</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('country') ?? $elan->country }}" name="country" class="form-control" id="inputOlke">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('country')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('country') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputCity" class="control-label col-sm-2">Şəhər</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('city') ?? $elan->city }}" name="city" class="form-control" id="inputCity">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('city')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('city') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="control-label col-sm-2">Adress</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('adress') ?? $elan->adress }}" name="adress" class="form-control" id="inputAddress">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('adress')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('adress') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="control-label col-sm-3">Əlavə Edən</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ old('name') ?? $elan->name }}" name="name" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('name')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2" class="control-label col-sm-3">Elan Aktivliyi</label>
                                <div class="col-sm-10">
                                    <select multiple="" name="status" class="form-control" id="exampleSelect2">
                                        <option value="1" {{ $elan->status == 1 ? 'selected': null }}>Aktiv</option>
                                        <option value="0" {{ $elan->status == 0 ? 'selected': null }}>Passiv</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('status')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('status') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="custom-file" class="control-label">fsdddddddddsdfsdfsdfgdfsfsdf
                                        <input type="file" name="photo" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Elan İndeks Şəkli</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('photo')
                                    <div class="alert alert-warning" role="alert">
                                        {{ $errors->first('photo') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="custom-file" class="control-label">fsdddddddddsdfsdfsdfgdfsfsdf
                                        <input type="file" multiple name="gallery[]" id="file" class="custom-file-input">
                                        <span class="custom-file-control">Elan Post Şəkilləri</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                @error('photo')
                                <div class="alert alert-warning" role="alert">
                                    {{ $errors->first('photo') }}
                                </div>
                                @enderror
                            </div>
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

@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style type="text/css">
        .btn:focus, .btn:active, button:focus, button:active {
            outline: none !important;
            box-shadow: none !important;
        }

        #image-gallery .modal-footer{
            display: block;
        }

        .thumb{
            margin-top: 15px;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('js')

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

    </script>

@endsection

@section('js')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        let modalId = $('#image-gallery');

        $(document)
            .ready(function () {

                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }

                /**
                 *
                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                 * @param setClickAttr  Sets the attribute for the click handler.
                 */

                function loadGallery(setIDs, setClickAttr) {
                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function () {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function () {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function () {
                            updateGallery($(this));
                        });
                }
            });

        // build key actions
        $(document)
            .keydown(function (e) {
                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });

    </script>
@endsection

