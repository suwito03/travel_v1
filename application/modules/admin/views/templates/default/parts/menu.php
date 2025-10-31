<section class="sidebar fixed ">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <!--        <li class="header">MAIN NAVIGATION</li>-->
        <li class="treeview">
            <a href="<?php echo site_url('admin/dashboard'); ?>">
                <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="header">Master Data</li>
        <?php if ($this->ion_auth->is_admin() || $this->ion_auth->is_staff_bst() ): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>Agent</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/agent'); ?>">
                            <i class="fa fa-user"></i> <span>Agent Non Badan</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/agent/badan'); ?>">
                            <i class="fa fa-building-o"></i> <span>Agent Badan</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/agents/login'); ?>">
                            <i class="fa fa-sign-in"></i> <span>Pengaturan Login</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Data</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/master/banks'); ?>">
                            <i class="fa fa-university"></i> <span>Bank</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/master/bus'); ?>">
                            <i class="fa fa-bus"></i> <span>Bus</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/master/hotels'); ?>">
                            <i class="fa fa-bed"></i> <span>Hotel</span>
                        </a>
                    </li>
                    <li class="treeview"><a  href="<?php echo site_url('admin/paket/includes'); ?>">
                            <i class="fa fa-suitcase"></i>Item Include</a></li>
                    <li class="treeview"><a href="<?php echo site_url('admin/paket/free'); ?>">
                            <i class="fa fa-thumbs-o-up"></i>Item Free</a></li>
                    <li class="treeview">
                        <a href="<?php echo site_url( 'admin/jamaah' ); ?>">
                            <i class="fa fa-id-badge"></i> <span>Jamaah</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/master/airlines'); ?>">
                            <i class="fa fa-plane"></i> <span>Maskapai Penerbangan</span>
                        </a>
                    </li>
<!--                    <li class="treeview">-->
<!--                        <a href="--><?php //echo site_url('admin/master/addons'); ?><!--">-->
<!--                            <i class="fa fa-edit"></i> <span>Paket Tambahan</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="treeview">-->
<!--                        <a href="--><?php //echo site_url('admin/master/addtours'); ?><!--">-->
<!--                            <i class="fa fa-edit"></i> <span>Tour Tambahan</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="treeview">-->
<!--                        <a href="--><?php //echo site_url('admin/master/lounges'); ?><!--">-->
<!--                            <i class="fa fa-edit"></i> <span>Lounge</span>-->
<!--                        </a>-->
<!--                    </li>-->


                </ul>
            </li>
            <li class="header">Umroh</li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-folder-o"></i> <span>Paket Umroh</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu" style="display: none;">
                                    <li><a href="<?php echo site_url('admin/umroh/'); ?>">
                                        <i class="fa fa-check-square-o"></i>Paket</a></li>
                                    <li>
                                        <a href="<?php echo site_url( 'admin/qouta' ); ?>">
                                            <i class="fa fa-calendar-check-o"></i> <span>Kuota Umroh</span>
                                        </a>
                                    </li>

                                 </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-folder-open-o"></i> <span>Paket Umroh Kostum</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="treeview">
                        <a href="<?php echo site_url( 'admin/costum' ); ?>">
                            <i class="fa fa-file-text-o"></i> <span>Request Kostum</span>
                        </a>
                    </li>
<!--                       <li class="treeview" style="height: auto;">-->
<!--                           <a href="#">-->
<!--                               <i class="fa fa-money"></i>-->
<!--                               <span>Harga</span><i class="fa fa-angle-left pull-right"></i>-->
<!--                           </a>-->
<!--                           <ul class="treeview-menu">-->
<!--                               <li class="treeview">-->
<!--                                   <a href="--><?php //echo site_url('admin/price/airlines'); ?><!--">-->
<!--                                       <i class="fa fa-edit"></i> <span>Maskapai Penerbangan</span>-->
<!--                                   </a>-->
<!--                               </li>-->
<!--                               <li class="treeview">-->
<!--                                   <a href="--><?php //echo site_url('admin/price/addons'); ?><!--">-->
<!--                                       <i class="fa fa-edit"></i> <span>Paket Tambahan</span>-->
<!--                                   </a>-->
<!--                               </li>-->
<!--                               <li class="treeview">-->
<!--                                   <a href="--><?php //echo site_url('admin/price/addtours'); ?><!--">-->
<!--                                       <i class="fa fa-edit"></i> <span>Tour Tambahan</span>-->
<!--                                   </a>-->
<!--                               </li>-->
<!--                               <li class="treeview">-->
<!--                                   <a href="--><?php //echo site_url('admin/price/lounges'); ?><!--">-->
<!--                                       <i class="fa fa-edit"></i> <span>Lounge</span>-->
<!--                                   </a>-->
<!--                               </li>-->
<!---->
<!--                               <li class="treeview">-->
<!--                                   <a href="--><?php //echo site_url('admin/price/hotels'); ?><!--">-->
<!--                                       <i class="fa fa-edit"></i> <span>Hotel</span>-->
<!--                                   </a>-->
<!--                               </li>-->
<!--                           </ul>-->
<!--                    </li>-->
                </ul>
            </li>


            <li class="header">Transaksi</li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-shopping-cart"></i> <span>Order Umroh</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo site_url('admin/order'); ?>">
                            <i class="fa fa-folder-o"></i>Paket Umroh</a></li>
                    <li><a  href="<?php echo site_url('admin/order/costum'); ?>">
                            <i class="fa fa-folder-open-o"></i>Paket Umroh Kostum</a></li>
                </ul>
            </li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-history"></i> <span>History Order</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo site_url('admin/finish'); ?>">
                            <i class="fa fa-folder-o"></i>Paket Umroh</a></li>
                    <li><a  href="<?php echo site_url('admin/finish/costum'); ?>">
                            <i class="fa fa-folder-open-o"></i>Paket Umroh Kostum</a></li>
                </ul>
            </li>
            <li class="header">Pembayaran</li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-credit-card"></i> <span>Riwayat Pembayaran</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo site_url('admin/history'); ?>">
                            <i class="fa fa-folder-o"></i>Paket Umroh</a></li>
                    <li><a  href="<?php echo site_url('admin/history/costum'); ?>">
                            <i class="fa fa-folder-open-o"></i>Paket Umroh Kostum</a></li>
                </ul>
            </li>
            <?php if ($this->ion_auth->is_admin()) { ?>
            <li class="header">Setting</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-television"></i>
                    <span>Aplikasi</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/settings/all_settings/'); ?>">
                            <i class="fa fa-cog"></i> <span>Setting</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/cabang/'); ?>">
                            <i class="fa fa-map-marker"></i> <span>Cabang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-whatsapp"></i>
                    <span>Whatsapp</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <!--<li class="treeview">-->
                    <!--    <a href="<?php echo site_url('admin/user/'); ?>">-->
                    <!--        <i class="fa fa-users"></i> <span>Pengaturan Pengguna</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/wa/gateway/'); ?>">
                            <i class="fa fa-whatsapp"></i> <span>WhatsApp Gateway</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/wa/gateway/'); ?>">
                            <i class="fa fa-comment"></i> <span>Notif WhatsApp</span>
                        </a>
                    </li>
                </ul>
            </li>
          
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Pengaturan User</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
             
                    <li class="treeview">
                        <a href="<?php echo site_url('admin/user_groups/'); ?>">
                            <i class="fa fa-user"></i> <span>Pengaturan Hak Pengguna</span>
                        </a>
                    </li>
                     <li class="treeview">
                        <a href="<?php echo site_url('admin/user/attempts/'); ?>">
                            <i class="fa fa-address-card"></i> <span>Percobaan Login</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        <?php endif; ?>
        <?php if ($this->ion_auth->is_agent()): ?>
        <li class="treeview" style="height: auto;">
            <a href="#"><i class="fa fa-folder-o"></i> <span>Paket Umroh</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo site_url('admin/agents/harga'); ?>">
                        <i class="fa fa-money"></i>Harga</a></li>
                <li><a href="<?php echo site_url('admin/agents/jadwal'); ?>">
                        <i class="fa fa-calendar"></i>Jadwal & Qouta Umroh</a></li>
                <li><a  href="<?php echo site_url('admin/agents/'); ?>">
                        <i class="fa fa-check-square"></i>Order</a></li>
                <li><a  href="<?php echo site_url('admin/agents/riwayat_transfer'); ?>">
                        <i class="fa fa-credit-card"></i>Riwayat Pembayaran</a></li>
            </ul>
        </li>
            <li class="treeview" style="height: auto;">
                <a href="#"><i class="fa fa-folder-open-o"></i> <span>Paket Umroh Kostum</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a  href="<?php echo site_url('admin/agents/kostum'); ?>">
                            <i class="fa fa-file-o"></i>Draft Paket Umroh</a></li>
                    <li><a  href="<?php echo site_url('admin/agents/order'); ?>">
                            <i class="fa fa-check-square"></i>Order</a></li>
                    <li><a  href="<?php echo site_url('admin/agents/paid_costum'); ?>">
                            <i class="fa fa-credit-card"></i>Riwayat Pembayaran</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url( 'admin/jamaah/' ); ?>">
                    <i class="fa fa-id-badge"></i> <span>Jamaah</span>
                </a>
            </li>
        <?php endif; ?>
        <li class="header">Keluar Aplikasi</li>
        <li class="treeview">
            <a href="<?php echo site_url( 'auth/logout' ); ?>">
                    <i class="fa fa-sign-out"></i> <span>Exit</span></a>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
<script type="text/javascript">
    $(document).ready(function () {

        $('.sidebar ul li').each(function () {
            if (window.location.href.indexOf($(this).find('a:first').attr('href')) > -1) {
                $(this).closest('ul').closest('li').attr('class', 'active');
                $(this).addClass('active').siblings().removeClass('active');
            }
        });

    });
</script>