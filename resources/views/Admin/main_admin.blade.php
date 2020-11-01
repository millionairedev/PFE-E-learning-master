<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>E-learning PFE</title>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>


	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="../assets/fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<!-- Theme Styles -->
	<link href="../assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="../assets/img/favicon.ico" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script>
	

</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="/dashboard">
						<span  class="logo-default">E-learning</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
				<form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form>
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
						<!-- start language menu -->
						
						<!-- end language menu -->
						<!-- start notification dropdown -->
						
						<!-- end notification dropdown -->
						<!-- start message dropdown -->
						
						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
						<!-- end manage user dropdown -->
						<li class="dropdown dropdown-quick-sidebar-toggler">
							<a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
								data-upgraded=",MaterialButton">
								<i class="material-icons">more_vert</i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- start color quick setting -->

		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
									</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="pull-left image">
										<img src="../assets/img/dp.jpg" class="img-circle user-img-circle"
											alt="User Image" />
									</div>
									<div class="pull-left info">
										<p> Admin</p>
										<a href="#"><i class="fa fa-circle user-online"></i><span class="txtOnline">
												Online</span></a>
									</div>
								</div>
							</li>

							<li class="nav-item">
								<a href="/dashboard" class="nav-link nav-toggle">
									<i class="material-icons f-left">insert_chart</i>
									<span class="title">Chartes graphiques </span> <span class="arrow"></span>
								</a>
								
							</li>


							<li class="nav-item">
								<a href="/admin-roles" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Utilisateurs</span> <span class="arrow"></span>
								</a>
								
							</li>
							<li class="nav-item">
								<a href="/admin-professeurs" class="nav-link nav-toggle"> <i class="material-icons">person</i>
									<span class="title">Professeurs</span> <span class="arrow"></span>
								</a>
								
							</li>
							<li class="nav-item">
								<a href="/admin-etudiants" class="nav-link nav-toggle"> <i class="material-icons">face</i>
									<span class="title">Etudiants</span> <span class="arrow"></span>
								</a>
								
							</li>
							

							<li class="nav-item">
								<a href="/admin-cheffillieres" class="nav-link nav-toggle">
									<i class="material-icons">person</i>
									<span class="title">Chef filieres</span> <span class="arrow"></span>
								</a>
							
							</li>

							<li class="nav-item">
								<a href="/admin-filieres" class="nav-link nav-toggle">
								<i class="material-icons">local_library</i>
									<span class="title">Filieres</span> <span class="arrow"></span>
								</a>
							
							</li>

								<li class="nav-item">
								<a href="/admin-matieres" class="nav-link nav-toggle">
								<i class="material-icons">school</i>
									<span class="title">Matieres</span> <span class="arrow"></span>
								</a>
							
							</li>


							<li class="nav-item">
								<a href="/fullcalendareventmaster" class="nav-link nav-toggle">
								 <i class="material-icons">event</i>
									<span class="title">Gestion d'evenements</span><span class="label label-rouded label-menu label-success">new</span> <span class="arrow"></span>

								</a>
							
							</li>

								




							
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					
					@yield('content')
					
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->

									
			<!-- end chat sidebar -->
		</div>
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; par : Hatim Alkah & Miss Kawtar

				<a href="mailto:tim8.alk8@gmail.com" target="_top" class="makerCss">Contactez nous</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>

	<!-- start js include path -->
	@yield('javascript')
 	<!-- counterup -->
  	<script src="../assets/plugins/popper/popper.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	
	<!-- datatables -->
     

     <script language="JavaScript" type="text/javascript"  src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
     <script language="JavaScript" type="text/javascript"  src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" ></script>

	 
</body>

</html>