<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub" class="{{ $title === 'Dashboard' ? 'active' : ''}}">
                    <a class="js-arrow" href="{{route('customer.index')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a class="{{ $title === 'Kantin' ? 'active' : ''}}" href="{{ route('customer.kantin')}}">
                        <i class="fa fa-coffee"></i> Kantin</a>
                </li>
                <li>
                    <a  class="{{ $title === 'Keranjang' ? 'active' : ''}}" href="{{ route('customer.keranjang')}}">
                        <i class="fa fa-shopping-cart"></i> Keranjang</a>
                </li>
                <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fa fa-folder"></i>Laporan
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a class="{{ $title === 'Topup' ? 'active' : ''}}" href="{{ route('customer.riwayat.topup')}}">topUp</a>
                            </li>
                            <li>
                                <a class="{{ $title === 'Transaksi' ? 'active' : ''}}" href="{{ route('customer.riwayat.transaksi')}}">Transaksi</a>
                            </li>
                            <li>
                                <a class="{{ $title === 'Withdrawal' ? 'active' : ''}}" href="{{ route('customer.riwayat.withdrawal')}}">Tarik Tunai</a>
                            </li>
                        </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->