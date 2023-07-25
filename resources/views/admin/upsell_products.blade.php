@extends('admin.layouts.main')
@push('title')
    <title>Admin | Post Purchase Upsells</title>
@endpush
@push('script')
    <script src="{{ asset('assets/developer_js/admin/upsell_products.js') }}"></script>
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
			                </span> Post Purchase Upsells </h3> </div>
					<div class="col text-end">
						<ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
							<li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
							<li class="breadcrumb-item active">Post Purchase Upsells</li>
						</ul>
					</div>
				</div>
				<!-- Page Header -->
				<div class="page-header pt-3 mb-0 ">
					<div class="row">
						<div class="col">
							<div class="col-sm-6">
								<select class="form-control" name="campaign_filter" id="campaign_filter">
									@if(!empty($campaigns_data))
									<option value="" selected>Select Campagin</option>
										@foreach ($campaigns_data as $key => $val)
											<option value="{{ $key }}">{{ $val }} - {{ $key }}</option>
										@endforeach
									@endif
								</select>
								<div class="all_errors text-danger campaign_filter_error"></div>
							</div>
						</div>
						<div class="col text-end">
							<ul class="list-inline-item ps-0">
								<li class="list-inline-item">
									<button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded import_upsell_products" id="add-task">Import Campaign Upsells</button>
									{{-- <button class="add btn btn-gradient-primary font-weight-bold text-white todo-list-add-btn btn-rounded" id="add-task" data-bs-toggle="modal" data-bs-target="#add_upsell_product">New Upsell Product</button> --}}
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Content Starts -->
				<div class="row">
					<div class="col-md-12">
						<div class="card mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped table-nowrap custom-table mb-0" id="upsell_products_table">
										<thead>
											<tr>
												<th>Title</th>
												<th>CRM ID</th>
												<th>Campaign ID</th>
												<th>Price</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Content End -->
			</div>
			<!-- /Page Content -->
		</div>
		<!-- /Page Wrapper -->
	</div>
	<!-- /Main Wrapper -->
	<!-- Modal -->
	<div class="modal right fade" id="add_upsell_product" tabindex="-1" role="dialog" aria-modal="true" style="z-index: 1234">
		<div class="modal-dialog" role="document">
			<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center">Add Upsell Product</h4>
					<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form id="add_upsell_product_form">
								@csrf
								<h4>Upsell Product Details</h4>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="col-form-label">Title</label>
										<input type="text" class="form-control" name="title" placeholder="Title">
										<div class="title_error all_errors text-danger"></div>
									</div>
									<div class="col-sm-6">
										<label class="col-form-label">CRM ID</label>
										<input type="number" class="form-control" name="upsell_crm_id" placeholder="CRM ID">
										<div class="upsell_crm_id_error all_errors text-danger"></div>
									</div>
								</div>
								<div class="text-center py-3">
									<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
									<button type="button" class="btn btn-secondary btn-rounded"  data-bs-dismiss="modal">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- modal -->
	<!-- Modal -->
	<div class="modal right fade" id="import_upsell_products" tabindex="-1" role="dialog" aria-modal="true" style="z-index: 1234">
		<div class="modal-dialog" role="document">
			<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center">Select Campaign Upsells to Import</h4>
					<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form id="import_upsell_product_form">
								@csrf
								<h4>All Campaign Upsells</h4>
								<div class="form-group row upsell_product_name">

								</div>
								<div class="text-center py-3">
									<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
									<button type="button" class="btn btn-secondary btn-rounded"  data-bs-dismiss="modal">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- modal -->
	<!-- Edit Modal -->
	<div class="modal right fade" id="edit_upsell_product" tabindex="-1" role="dialog" aria-modal="true" style="z-index: 1234">
		<div class="modal-dialog" role="document">
			<button type="button" class="close md-close" data-bs-dismiss="modal" aria-label="Close"> </button>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center">Edit Post Purchase Upsell</h4>
					<button type="button" class="btn-close xs-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form id="update_upsell_product_form">
								@csrf
								<input type="hidden" name="upsell_product_id" value="" id="upsell_product_id">
								<h4>Post Purchase Upsell Details</h4>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="col-form-label">Title</label>
										<input type="text" class="form-control" name="title" placeholder="Title" id="title">
										<div class="title_error all_errors text-danger"></div>
									</div>
									<div class="col-sm-6">
										<label class="col-form-label">CRM ID</label>
										<input type="number" class="form-control" name="upsell_crm_id" placeholder="CRM ID" id="upsell_crm_id">
										<div class="upsell_crm_id_error all_errors text-danger"></div>
									</div>
								</div>
								<div class="form-group row">
                                    {{-- <div class="col-sm-6">
										<label class="col-form-label">CTA Button Title</label>
										<input type="text" class="form-control" name="btn_title" placeholder="CTA Button Title" id="btn_title">
										<div class="btn_title_error all_errors text-danger"></div>
									</div> --}}
									<div class="col-sm-6">
										<label class="col-form-label">Image</label>
										<input type="file" class="form-control" name="image" placeholder="Image">
										<div class="image_error all_errors text-danger"></div>
									</div>
									<div class="col-sm-6 image_data">

									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="col-form-label">Compare At Price</label>
										<input type="number" class="form-control" name="price" placeholder="Price" id="price" step="any">
										<div class="price_error all_errors text-danger"></div>
									</div>
									<div class="col-sm-6">
										<label class="col-form-label">Base Price</label>
										<input type="number" class="form-control" name="discounted_price" placeholder="Discounted Price" id="discounted_price" step="any">
										<div class="discounted_price_error all_errors text-danger"></div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-6">
										<label class="col-form-label">Slug</label>
										<input type="text" class="form-control" name="slug" placeholder="Slug" id="slug">
										<div class="slug_error all_errors text-danger"></div>
									</div>
									<div class="col-sm-6">
										<label class="col-form-label">Select Campagin</label>
										<select class="form-control" name="campaign_id" id="campaign_id">
											@if(!empty($campaigns_data))
											<option value="" selected>Select Campagin</option>
												@foreach ($campaigns_data as $key => $val)
													<option value="{{ $key }}">{{ $val }} - {{ $key }}</option>
												@endforeach
											@endif
										</select>
										<div class="all_errors text-danger campaign_id_error"></div>
									</div>
								</div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label">Description </label>
                                        <textarea class="form-control" rows="3" name="description" placeholder="Description" id="description"></textarea>
                                        <div class="description_error all_errors text-danger"></div>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label">Product Features </label>
                                        <textarea class="form-control" rows="3" name="features" placeholder="Separate each feature with '|' symbol" id="features"></textarea>
                                        <div class="features_error all_errors text-danger"></div>
                                    </div>
                                </div> --}}
								<div class="text-center py-3">
									<button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Save</button>&nbsp;&nbsp;
									<button type="button" class="btn btn-secondary btn-rounded"  data-bs-dismiss="modal">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- Edit modal -->

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
