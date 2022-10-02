@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Пользователи')
{{-- vendor style --}}
@section('vendor-styles')

	<link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="/adm/app-assets/vendors/css/tables/datatable/datatables.min.css">

@endsection
{{-- page style --}}
@section('page-styles')
	<link rel="stylesheet" type="text/css" href="{{asset('/adm/app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')

	<!-- account setting page start -->
	<section id="page-account-settings">
		@if(session('success'))
			<div class="alert bg-rgba-success alert-dismissible mb-2" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="d-flex align-items-center">
					<i class="bx bx-like"></i>
					<span>  {{session('success')}}  </span>
				</div>
			</div>
		@endif
		@if ($errors->any())
			<div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="d-flex align-items-center">
					<i class="bx bx-error"></i>
					<span>
                        @foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
                    </span>
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col-12">
				<div class="row">
					<!-- left menu section -->
					<!-- right content section -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
											<form action="{{ (isset($user->id))? route('user.update',$user->id):route('user.store')  }}" method="POST" enctype="multipart/form-data">
												@csrf
												@if(isset($user->id))
													@method('PUT')
												@endif
												<div class="media">

													<a href="javascript: void(0);">
														<img src="{{ Storage::url('/avatars/300/'.(!empty($user->foto)?$user->foto:'000.png')) }}" class="rounded mr-75" alt="profile image" height="64">
													</a>
													<div class="media-body mt-25">
														<div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
															<label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
																<span>Загрузить фото</span>
																<input id="select-files" type="file" name="image" hidden>
															</label>
															<button type="submit" name="reset_foto" value="1" class="btn btn-sm btn-light-secondary ml-50">
																Сбросить
															</button>
														</div>
														<p class="text-muted ml-1 mt-50">
															<small>Допускаются фото .jpg , .bmp , .png</small></p>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Логин</label>
																<input type="text" class="form-control" name="login" value="{{old('login',$user->login)}}" required @isset($user->id) readonly @endisset >
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Пароль</label>
																<input type="text" class="form-control" name="password" @empty($user->id) required @endempty >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Имя</label>
																<input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}">
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>Город</label>
																<input type="text" class="form-control" name="city" value="{{old('city',$user->city)}}">
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Телефон</label>
															<input type="text" class="form-control" name="tel" value="{{old('tel',$user->tel)}}">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<div class="controls">
																<label>E-mail</label>
																<input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}">
															</div>
														</div>
													</div>

													<h6 class="m-1">Уведомления</h6>
													<div class="col-12 mb-1">
														<div class="custom-control custom-switch custom-control-inline">
															<input type="checkbox" name="notify_sms" class="custom-control-input" id="accountSwitchSms" {{ $user->notify_sms  ? 'checked' : '' }} >
															<label class="custom-control-label mr-1" for="accountSwitchSms"></label>
															<span class="switch-label w-100">Уведомление по СМС</span>
														</div>
													</div>
													<div class="col-12 mb-1">
														<div class="custom-control custom-switch custom-control-inline">
															<input type="checkbox" name="notify_email" class="custom-control-input" id="accountSwitchEmail" {{ $user->notify_email  ? 'checked' : '' }} >
															<label class="custom-control-label mr-1" for="accountSwitchEmail"></label>
															<span class="switch-label w-100">Уведомление по Email</span>
														</div>
													</div>
													<div class="col-12 mb-1">
														<div class="custom-control custom-switch custom-control-inline">
															<input type="checkbox" name="notify_tel" class="custom-control-input" id="accountSwitchTel" {{ $user->notify_tel  ? 'checked' : '' }}>
															<label class="custom-control-label mr-1" for="accountSwitchTel"></label>
															<span class="switch-label w-100">Уведомление по телефону</span>
														</div>
													</div>


													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<button type="submit" name="redirect" value="apply" class="btn btn-primary glow mr-sm-1 mb-1">
															Применить
														</button>

														<button type="submit" name="redirect" value="save" class="btn btn-primary glow mr-sm-1 mb-1">
															Сохранить
														</button>

														<button type="submit" name="redirect" value="saveadd" class="btn btn-primary glow mr-sm-1 mb-1">
															Сохранить & Добавить
														</button>

														<button type="submit" name="redirect" value="cancel" class="btn btn-light glow mr-sm-1 mb-1">
															Отменить
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- account setting page ends -->




@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
	<script src="/adm/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
	<script src="/adm/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>


@endsection
{{-- page scripts --}}
@section('page-scripts')
	<script src="/adm/app-assets/js/scripts/datatables/datatable.js"></script>

@endsection
