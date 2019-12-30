@extends('frontend.layouts.app')

@section('tiitle', $setting->title.' | Bizimlə Əlaqə')

@section('content')

    <h2 class="h2-bottom-line" style="font-family: sans-serif">Bizimlə Əlaqə</h2>

    <div id="feedback">
        <div class="container">
            <div class="authentication__form disbox">
                @if(session('status'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert" >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('status') }}
                    </div>

                @endif

                <form action="{{ url('contact') }}" method="post" name="contact_form" id="contact" class="form">
                    @csrf
                    <div class="inp-group">
                        <h4 class="inp-group__title">Mövzu</h4>
                        <input id="subject" name="subject" required pattern="[A-Za-zŞÜÖĞÇİşüöğçı ]{3,}" title="Ən azı 3 simvol olmalıdır.." type="text" value="" class="input">
                    </div>
                    @error('subject')
                        <div class="inp-group">
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                    <div class="inp-group">
                        <h4 class="inp-group__title">Mesaj</h4>
                        <textarea id="message" name="message" required pattern="[A-Za-zŞÜÖĞÇİşüöğçı ]{3,}" title="Ən azı 3 simvol olmalıdır.." type="text" value="" placeholder="Ətraflı..."></textarea>
                    </div>

                    @error('message')
                        <div class="inp-group">
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror
                    @if(auth()->check() == false)
                        <div class="inp-group inp-group--no-margin">
                            <div class="input-row">
                                <div class="input-col">
                                    <h4 class="inp-group__title">Ad</h4>
                                    <input id="yourName" name="flName" required pattern="[A-Za-zŞÜÖĞÇİşüöğçı ]{2,}" title="Ən azı 2 simvol olmalıdır.." type="text" class="input" value="" placeholder="Adınız">
                                </div>
                                @error('flName')
                                    <div class="inp-group">
                                        <div class="alert alert-warning">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                                <div class="input-col">
                                    <h4 class="inp-group__title">E-mail</h4>
                                    <input id="yourEmail" name="email" type="text" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email olmalıdır" class="input" value="" placeholder="Sizin e-mail ">
                                </div>
                                @error('email')
                                    <div class="inp-group">
                                        <div class="alert alert-warning">
                                            {{ $message }}
                                        </div>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        <input type="hidden" name="flName" value="{{ auth()->user()->flName }}">
                    @endif
                    <input type="submit" value="Göndər" class="btn-center submit upcase">

                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@endsection

