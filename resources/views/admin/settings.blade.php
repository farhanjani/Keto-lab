@extends('admin.layouts.main')
@push('title')
    <title>Admin | Settings</title>
@endpush
@push('script')
    <script src="{{ asset('assets/developer_js/admin/settings.js') }}"></script>
@endpush
@section('main-section')
    		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<!-- Page Content -->
			<div class="content container-fluid">
				<div class="crms-title row bg-white">
					<div class="col">
						<h3 class="page-title m-0">
			                <span class="page-title-icon bg-gradient-primary text-white me-2">
			                  <i class="feather-grid"></i>
			                </span> Settings </h3> </div>
					<div class="col text-end">
						<ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
							<li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Settings</li>
						</ul>
					</div>
				</div>
                <div class="row">
                    <form id="update_setting_form">
                        @csrf
                        <div class="mt-4">
                            <h4>Setting Details</h4> 
                        </div>
                        <input type="hidden" name="setting_id" value="{{$settings->id}}">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-form-label">API Username</label>
                                <input type="text" class="form-control" name="api_username" placeholder="API Username" value="{{$settings->api_username}}">
                                <div class="api_username_error all_errors text-danger"></div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">API Password</label>
                                <input type="text" class="form-control" name="api_password" placeholder="API Password" value="{{$settings->api_password}}">
                                <div class="api_password_error all_errors text-danger"></div>
                            </div>
                        
                        </div>

						<div class="form-group row">
							<div class="col-sm-6">
								<select class="form-control" name="template" id="template">
									<option value="" selected>Select Template</option>
									<option value="1" <?=$settings->template == 1 ? ' selected="selected"' : '';?>>Template 1</option>
									<option value="2" <?=$settings->template == 2 ? ' selected="selected"' : '';?>>Template 2</option>
									<option value="3" <?=$settings->template == 3 ? ' selected="selected"' : '';?>>Template 3</option>
									<option value="4" <?=$settings->template == 4 ? ' selected="selected"' : '';?>>Template 4</option>
								</select>
							</div>
							<div class="template_error all_errors text-danger"></div>
						</div>
                        <div class="text-center py-3">
                            <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary btn-rounded"  data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
	<!-- modal -->

	<!--theme settings modal-->
	<div class="modal right fade settings" id="settings" role="dialog" aria-modal="true">
		<div class="toggle-close">
			<div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i> </div>
		</div>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header p-3">
					<h4 class="modal-title" id="myModalLabel2">Theme Customizer</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
				</div>
				<div class="modal-body pb-3">
					<div class="scroll">
						<div>
							<ul class="list-group">
								<li class="list-group-item border-0">
									<div class="row">
										<div class="col">
											<h5 class="pb-2">Primary Skin</h5> </div>
										<div class="col text-end d-none"> <a class="reset text-white bg-dark" id="ChangeprimaryDefault">Reset Default</a> </div>
									</div>
									<div class="theme-settings-swatches">
										<div class="themes">
											<div class="themes-body">
												<ul id="theme-changes" class="theme-colors border-0 list-inline-item list-unstyled mb-0">
													<li class="theme-title">Solid Color</li>
													<li class="list-inline-item"><span onclick="toggleTheme('style')" class="theme-defaults bg-warnings"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-green')" class="theme-solid-purple bg-warnings"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-blue')" class="theme-solid-black bg-blue"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-orange')" class="theme-solid-pink bg-orange"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-pink')" class="theme-solid-pink bg-pink"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-purple')" class="theme-solid-purle bg-purple"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-red')" class="theme-solid-danger bg-danger"></span></li>
													<li>
														<br />
													</li>
													<li>
														<hr />
													</li>
													<li class="theme-title">Gradient Color</li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-gradient-blue')" class="theme-orange bg-sunny-mornings"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-gradient-green')" class="theme-blue bg-tempting-azures"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-gradient-maroon')" class="theme-grey bg-amy-crisps"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-gradient-orange')" class="theme-lgrey bg-mean-fruits"></span></li>
													<li class="list-inline-item"><span onclick="toggleTheme('style-gradient-pink')" class="theme-dblue bg-malibu-beachs"></span></li>
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div>
							<ul class="list-group">
								<li class="list-group-item border-0">
									<div class="row">
										<div class="col">
											<h5 class="pb-2">Header Style</h5> </div>
										<div class="col text-end"> <a class="reset text-white bg-dark" id="ChageheaderDefault">Reset Default</a> </div>
									</div>
									<div class="theme-settings-swatches">
										<div class="themes">
											<div class="themes-body">
												<ul id="theme-change1" class="theme-colors border-0 list-inline-item list-unstyled mb-0">
													<li class="theme-title">Solid Color</li>
													<li class="list-inline-item"><span class="header-solid-black bg-black"></span></li>
													<li class="list-inline-item"><span class="header-solid-pink bg-primary"></span></li>
													<li class="list-inline-item"><span class="header-solid-orange bg-secondary1"></span></li>
													<li class="list-inline-item"><span class="header-solid-purple bg-success"></span></li>
													<!-- <li class="list-inline-item"><span class="header-solid-blue bg-info"></span></li> -->
													<li class="list-inline-item"><span class="header-solid-green bg-warnings"></span></li>
													<li>
														<br>
													</li>
													<li>
														<hr>
													</li>
													<li class="theme-title">Gradient Color</li>
													<li class="list-inline-item"><span class="header-gradient-color1 bg-sunny-morning"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color2 bg-tempting-azure"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color3 bg-amy-crisp"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color4 bg-mean-fruit"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color5 bg-malibu-beach"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color6 bg-ripe-malin"></span></li>
													<li class="list-inline-item"><span class="header-gradient-color7 bg-plum-plate"></span></li>
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div>
							<ul class="list-group m-0">
								<li class="list-group-item border-0">
									<div class="row">
										<div class="col">
											<h5 class="pb-2">Apps Sidebar Style</h5> </div>
										<div class="col  text-end"> <a class="reset text-white bg-dark" id="ChagesidebarDefault">Reset Default</a> </div>
									</div>
									<div class="theme-settings-swatches">
										<div class="themes">
											<div class="themes-body">
												<ul id="theme-change2" class="theme-colors border-0 list-inline-item list-unstyled">
													<li class="theme-title">Solid Color</li>
													<li class="list-inline-item"><span class="sidebar-solid-black bg-black"></span></li>
													<li class="list-inline-item"><span class="sidebar-solid-pink bg-primary"></span></li>
													<li class="list-inline-item"><span class="sidebar-solid-orange bg-secondary1"></span></li>
													<li class="list-inline-item"><span class="sidebar-solid-purple bg-success"></span></li>
													<!-- <li class="list-inline-item"><span class="sidebar-solid-blue bg-info"></span></li> -->
													<li class="list-inline-item"><span class="sidebar-solid-green bg-warnings"></span></li>
													<li>
														<br>
													</li>
													<li>
														<hr>
													</li>
													<li class="theme-title">Gradient Color</li>
													<li class="list-inline-item"><span class="sidebar-gradient-color1 bg-sunny-morning"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color2 bg-tempting-azure"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color3 bg-amy-crisp"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color4 bg-mean-fruit"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color5 bg-malibu-beach"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color6 bg-ripe-malin"></span></li>
													<li class="list-inline-item"><span class="sidebar-gradient-color7 bg-plum-plate"></span></li>
												</ul>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div class="row Default-font">
								<div class="col">
									<h5 class="pb-2">Font Style</h5> </div>
								<div class="col text-end"> <a class="reset text-white bg-dark font-Default">Reset Default</a> </div>
							</div>
							<ul class="list-inline-item list-unstyled font-family border-0 p-0" id="theme-change">
								<li class="list-inline-item roboto-font">Roboto</li>
								<li class="list-inline-item poppins-font">Poppins</li>
								<li class="list-inline-item montserrat-font">Montserrat</li>
								<li class="list-inline-item inter-font">Inter</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--theme settings-->
	<div class="sidebar-contact">
		<div class="toggle" data-bs-toggle="modal" data-bs-target="#settings"><i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i></div>
	</div>
@endsection
