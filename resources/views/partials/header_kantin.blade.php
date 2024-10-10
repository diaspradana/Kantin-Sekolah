<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="{{ asset('images/icon/logo-white.png')}}" alt="CoolAdmin" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a class="{{ $title === 'Dashboard' ? 'active' : ''}}" href="{{route('kantin.index')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ $title === 'Data Produk' ? 'active' : ''}}" href="{{ route('produk.index')}}">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="bot-line"></span>Produk</a>
                    </li>
                    <li>
                        <a class="{{ $title === 'Data Kategori' ? 'active' : ''}}" href="{{ route('kategori.index')}}">
                            <i class="fa fa-ellipsis-h"></i>
                            <span class="bot-line"></span>Kategori</a>
                    </li>
                    <li class="has-sub">
                        <a href="{{route('kantin.transaksi')}}">
                            <i class="fa fa-folder"></i>
                            <span class="bot-line"></span>Laporan</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="">Laporan Transaksi</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{ asset('images/icon/admin.png')}}" alt="kantin" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{ auth()->user()->name }}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ asset('images/icon/admin.png')}}" alt="kantin" />
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
                                <a href="{{route('logout')}}">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->