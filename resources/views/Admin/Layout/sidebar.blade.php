<div class="sidebar sidebar-style-2">
			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('Admin/assets/img/jm_denis.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{request()->is('kategori') ? 'active' : ''}} {{request()->is('subKategori') ? 'active' : ''}}">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li class="nav-item {{request()->is('data_kategori') ? 'active' : ''}}">
                                <a href="/data_kategori">
                                    <span class="sub-item">Kategori</span>
                                </a>
                            </li>
                            <li class="nav-item {{request()->is('subKategori') ? 'active' : ''}}">
                                <a href="/subKategori">
                                    <span class="sub-item">Sub Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{request()->is('pemasok') ? 'active' : ''}}">
					<a href="/pemasok">
						<i class="fas flaticon-agenda-1"></i>
						<p>Pemasok</p>
					</a>
				</li>
                <li class="nav-item {{request()->is('produk') ? 'active' : ''}}">
					<a href="/produk">
						<i class="fas flaticon-agenda-1"></i>
						<p>Produk</p>
					</a>
				</li>
                <li class="nav-item {{request()->is('pesanan') ? 'active' : ''}}">
					<a href="/pesanan">
						<i class="fas flaticon-agenda-1"></i>
						<p>Pesanan</p>
					</a>
				</li>
                <li class="nav-item {{request()->is('slider') ? 'active' : ''}}">
					<a href="/slider">
						<i class="fas flaticon-agenda-1"></i>
						<p>Slider</p>
					</a>
				</li>
            </ul>
        </div>
    </div>
</div>