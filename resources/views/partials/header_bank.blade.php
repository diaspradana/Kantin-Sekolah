<!-- HEADER DESKTOP-->
<header class="header-desktop4">
    <div class="container">
        <div class="header4-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="{{ asset('images/icon/logo-blue.png')}}" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{ asset('images/icon/admin1.png')}}" alt="bank" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ asset('images/icon/admin1.png')}}" alt="bank" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">{{ auth()->user()->name }}</a>
                                    </h5>
                                    <span class="email">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a  href="{{route('logout')}}">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP -->