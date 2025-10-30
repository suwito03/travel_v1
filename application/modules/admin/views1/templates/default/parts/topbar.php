<!-- Logo -->
<a href="<?php echo site_url( 'admin/dashboard' ); ?>" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini">DAT</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo">DEMO</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a> -->

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
<!--             add notification-->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">2</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">Anda Mempunyai 2 Notifikasi</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 2 Order baru butuh dikonfirmasi
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-credit-card text-red"></i> 2 Data Pembayaran butuh di verifikasi
                                    </a>
                                </li>
                            </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 196.078px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<b><?php echo $_SESSION['username']; ?></b>
					<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li class="user-header">
					 <?php  $user = $this->ion_auth->user($id)->row();?>
                <img class="profile-user-img "
							     src="<?php echo base_url( $user->file_path ); ?>"
							     style="margin-left: 10px; border: 5px solid #fff; box-shadow: #000000"
							     width="70px"
							     height="90px"/>
					 <p><?php echo "Level Pengguna : ".$this->ion_auth->get_users_groups($data['id'])->row()->name; ?></p>
					</li>
					<li class="user-footer">
						<div class="pull-left">
							<a href="<?php echo site_url( 'admin/dashboard/profile' ); ?>"
							   class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
							<a href="<?php echo site_url( 'auth/logout' ); ?>"
							   class="btn btn-default btn-flat">Sign out</a>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
<style>
    .logo img{
        max-width: 55%;
        margin-left: auto;
        margin-right: auto;
    }
    .dataTables_wrapper {
	   overflow: auto;
}
</style>
