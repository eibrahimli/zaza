@extends('frontend.layouts.app')

@section('tiitle', $setting->title.' | Bizimlə Əlaqə')

@section('content')

    <h2 class="h2-bottom-line" style="font-family: sans-serif">Bizimlə Əlaqə</h2>

    <div id="feedback">
        <div class="container">
            <div class="authentication__form disbox">

                <form action="{{ url('contact') }}" method="post" name="contact_form" id="contact" class="form">
                    @csrf
                    <div class="inp-group">
                        <h4 class="inp-group__title">Mövzu</h4>
                        <input id="subject" name="subject" type="text" value="" class="input">
                    </div>

                    <div class="inp-group">
                        <h4 class="inp-group__title">Mesaj</h4>
                        <textarea id="message" name="message" type="text" value="" placeholder="Ətraflı..."></textarea>
                    </div>
                    <ul id="error_list"></ul><h1></h1>
                    <div class="inp-group inp-group--no-margin">
                        <div class="input-row">
                            <div class="input-col">
                                <h4 class="inp-group__title">Ad</h4>
                                <input id="yourName" name="yourName" type="text" class="input" value="" placeholder="Adınız">
                            </div>
                            <div class="input-col">
                                <h4 class="inp-group__title">E-mail</h4>
                                <input id="yourEmail" name="yourEmail" type="email" class="input" value="" placeholder="Sizin e-mail ">
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Göndər" class="btn-center submit upcase">

                </form>
                <script type="text/javascript">
                    $(document).ready(function(){
                        // Code for form validation
                        $("form[name=contact_form]").validate({
                            rules: {
                                message: {
                                    required: true,
                                    minlength: 1
                                },
                                yourEmail: {
                                    required: true,
                                    email: true
                                }
                            },
                            messages: {
                                yourEmail: {
                                    required: "E-mail: Bu sahə boş ola bilməz.",
                                    email: "Yanlış e-mail adresi."
                                },
                                message: {
                                    required: "Mesaj: Bu sahə boş ola bilməz.",
                                    minlength: "Mesaj: Ən azı 2 simvol olmalıdır."
                                }
                            },
                            errorLabelContainer: "#error_list",
                            wrapper: "li",
                            invalidHandler: function(form, validator) {
                                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
                            },
                            submitHandler: function(form){
                                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                                form.submit();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>

@endsection
