<div class="col-left">
    <div class="left-menu">
        <div class="profile-demo">
            <img class="avatar" style="border: 1px solid rgb(221, 221, 221); background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 4px; margin-bottom: 5px;" width="130" src="{{ asset('storage/'.auth()->user()->photo) }}">
            <strong class="profile-demo__title">İstifadəçi Məlumatları</strong>
            <a href="{{ route('user.edit',auth()->id()) }}"><strong>{{ auth()->user()->flName }}</strong></a>
        </div>
        <ul>
            <script type="text/javascript">
                $(".user_menu > :first-child").addClass("first");$(".user_menu > :last-child").addClass("last");
            </script>
            <ul class="user_menu">
                <li class="opt_items active"><a href="{{ route('user.index',auth()->id()) }}">Elanlarım</a></li>
                <li class="opt_account"><a href="{{ route('user.edit',auth()->id()) }}">Ayarlar</a></li>
                <li class="opt_logout"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ 'Çıxış Et' }}</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </ul>
    </div>
</div>
