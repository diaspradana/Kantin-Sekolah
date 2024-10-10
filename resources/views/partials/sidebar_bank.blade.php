<div class="col-xl-3">
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar3 js-spe-sidebar">
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" class="{{ $title === 'Dashboard' ? 'active' : ''}}" href="{{route('bank.index')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a class="js-arrow" class="{{ $title === 'Top Up' ? 'active' : ''}}" href="{{ route('bank.topup')}}">
                        <i class="fa fa-plus"></i>Top Up</a>
                </li>
                <li>
                    <a class="js-arrow" class="{{ $title === 'Tarik Tunai' ? 'active' : ''}}" href="{{ route('bank.withdrawal')}}">
                        <i class="fa fa-briefcase"></i>Tarik Tunai</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fa fa-folder"></i>Laporan
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{ $title === 'Topup' ? 'active' : ''}}" href="{{ route('topup.harian')}}">topUp</a>
                        </li>
                        <li>
                            <a class="{{ $title === 'Withdrawal' ? 'active' : ''}}" href="{{ route('withdrawal.harian')}}">Tarik Tunai</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- END MENU SIDEBAR-->
</div>