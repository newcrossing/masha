@extends('backend.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Статьи')
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

	<div class="invoice-create-btn mb-1">
		<a href="/admin/user/create" class="btn btn-primary glow invoice-create" role="button"
		   aria-pressed="true">
			Создать пользователя</a>
	</div>
	<!-- Zero configuration table -->
	<section id="basic-datatable">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Пользователи</h4>
					</div>
					<div class="card-content">
						<div class="card-body card-dashboard">
							<div class="table-responsive">
								<table class="table zero-configuration">
									<thead>
									<tr>
										<th>ID</th>
										<th>Логин</th>

										<th>Email / тел </th>

										<th>Уведомления</th>
										<th>Дата регистрации</th>
									</tr>
									</thead>
									<tbody>

									@foreach ($users as $user)
										<tr>
											<td>{{$user->id }}</td>
											<td>
												<i class="bx bxs-circle {{($user->active)?'success':'danger'}}  font-small-1 mr-50"></i>
												<a href="{{route('user.edit',$user->id)}}">{{$user->login}}</a><br>
												{{$user->name }}
											</td>


											<td>{{$user->email}}<br> {{$user->tel}}</td>

											<td>
												<i class="bx bxs-circle {{($user->active)?'success':'danger'}}  font-small-1 mr-50"></i>  Email<br>
												<i class="bx bxs-circle {{($user->notify_tel)?'success':'danger'}}  font-small-1 mr-50"></i>  Телефон<br>
												<i class="bx bxs-circle {{($user->notify_whatsup)?'success':'danger'}}  font-small-1 mr-50"></i>  Whats Up
											</td>
											<td>{{$user->created_at->format('d.m.Y')}}</td>
										</tr>
									@endforeach


									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ Zero configuration table -->

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
