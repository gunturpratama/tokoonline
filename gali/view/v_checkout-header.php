<ul class="nav nav-pills nav-justified">
	<?php
	if ($page == "checkout1") {
		echo "
		<li class='active'><a href='#'><i class='fa fa-map-marker'></i><br>Alamat</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-truck'></i><br>Metode Pengiriman</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-money'></i><br>Metode Pembayaran</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-eye'></i><br>Ulasan Pesanan</a>
		</li>
	</ul>
	";
	}
	elseif ($page == "checkout2") {
		echo "
		<li class='disabled'><i class='fa fa-map-marker'></i><br>Alamat
		</li>
		<li class='active'><a href='#'><i class='fa fa-truck'></i><br>Metode Pengiriman</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-money'></i><br>Metode Pembayaran</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-eye'></i><br>Ulasan Pesanan</a>
		</li>
	</ul>
	";
	}
	elseif ($page == "checkout3") {
		echo "
		<li class='disabled'><i class='fa fa-map-marker'></i><br>Alamat
		</li>
		<li class='disabled'><i class='fa fa-truck'></i><br>Metode Pengiriman
		</li>
		<li class='active'><a href='#'><i class='fa fa-money'></i><br>Metode Pembayaran</a>
		</li>
		<li class='disabled'><a href='#'><i class='fa fa-eye'></i><br>Ulasan Pesanan</a>
		</li>
	</ul>
	";
	}
	elseif ($page == "checkout4") {
		echo "
		<li class='disabled'><i class='fa fa-map-marker'></i><br>Alamat
		</li>
		<li class='disabled'><i class='fa fa-truck'></i><br>Metode Pengiriman
		</li>
		<li class='disabled'><i class='fa fa-money'></i><br>Metode Pembayaran
		</li>
		<li class='active'><a href='#'><i class='fa fa-eye'></i><br>Ulasan Pesanan</a>
		</li>
	</ul>
	";
	}


?>
