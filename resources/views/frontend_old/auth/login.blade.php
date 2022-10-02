@extends('frontend_old.layouts.app')
@section('title','Авторизация')
@section('content')
	<div class="rw-column rw-content">
		<div class="rw-row page-breadcrumb">
			@isset($breadcrumbs)

				@foreach ($breadcrumbs as $breadcrumb)
					@if(isset($breadcrumb['link']))
						<a href="{{asset($breadcrumb['link'])}}">{{$breadcrumb['name']}}</a>&raquo;
					@else
						{{$breadcrumb['name']}}
					@endif
				@endforeach
			@endisset
		</div>
		<div class="rw-row page-title">
			<h1> Авторизация </h1>
		</div>
		<div class="rw-row">

			<div class="grid-container">
				<form method="POST" action="{{ route('login') }}">
					@csrf

					<div class="grid desk-6 alpha">
						<div class="form-label">E-mail</div>
						@error('email')
						<div class="form-description">{{ $message }}</div>
						@enderror
						<input type="text" class="fullwidth" value="{{ old('email') }}" name="email">
					</div>
					<div class="clear"></div>
					<div class="grid desk-6 alpha">
						<div class="form-label">Пароль</div>
						@error('password')
						<div class="form-description">{{ $message }}</div>
						@enderror
						<input type="text" class="fullwidth" name="password">
					</div>


					<div class="grid desk-12 both">
						<input type="submit" value="Отправить" class="button primary">
					</div>

				</form>
			</div>


			<div class="clear"></div>


		</div> <!-- .rw-row -->


	</div>
@endsection


@section('sidebar')
	@parent

	<div class="rw-column rw-sidebar">
		<div class="the-sidebar">
			{{--
			<!-- Widget -->
			<aside class="widget widget-search">

				<div class="widget-title"><h3>Поиск</h3></div>

				<form method="get" class="search-form" action="">
					<input type="text" class="search-field fullwidth" name="s"
						   placeholder="Type keyword and press enter" value="">
				</form>

			</aside> <!-- .widget -->
			<!-- / Widget -->

			<!-- Widget -->
			<aside class="widget widget-posts">

				<div class="widget-title"><h3>Популярные материалы</h3></div>
				<div class="widget-posts-list">
					<!-- Entry -->
					<div class="post">
						<div class="entry-photo">
							<img src="/assets/placeholder/food/50x50/4.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/food/50x50/4.jpg"
								 alt=""/>
						</div>
						<div class="entry-title">
							<a href="#">Consectetur adipisicing elit do eiusmod</a>
						</div>
						<div class="entry-controls minimal">
							<a href="#" class="control entry-to-favorites" title="Add to favorites"> <i
										class="fa fa-heart-o"></i> </a><span class="control-tip">127</span>
							<a href="#" class="control entry-like" title="I like this!"> <i
										class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">322</span>
							<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i>
							</a> <span class="control-tip">102</span>
						</div>
					</div> <!-- .entry -->

					<!-- Entry -->
					<div class="post">
						<div class="entry-photo">
							<img src="/assets/placeholder/food/50x50/7.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/food/50x50/7.jpg"
								 alt=""/>
						</div>
						<div class="entry-title">
							<a href="#">Deliciae superbam praecustodio gualitatibus</a>
						</div>
						<div class="entry-controls minimal">
							<a href="#" class="control entry-to-favorites" title="Add to favorites"> <i
										class="fa fa-heart-o"></i> </a><span class="control-tip">169</span>
							<a href="#" class="control entry-like active" title="I like this!"> <i
										class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">452</span>
							<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i>
							</a> <span class="control-tip">87</span>
						</div>
					</div> <!-- .entry -->

					<!-- Entry -->
					<div class="post">
						<div class="entry-photo">
							<img src="/assets/placeholder/food/50x50/14.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/food/50x50/14.jpg"
								 alt=""/>
						</div>
						<div class="entry-title">
							<a href="#">Glaebam eminentiam destitutus firmare</a>
						</div>
						<div class="entry-controls minimal">
							<a href="#" class="control entry-to-favorites" title="Add to favorites"> <i
										class="fa fa-heart-o"></i> </a><span class="control-tip">127</span>
							<a href="#" class="control entry-like" title="I like this!"> <i
										class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">322</span>
							<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i>
							</a> <span class="control-tip">102</span>
						</div>
					</div> <!-- .entry -->

					<!-- Entry -->
					<div class="post">
						<div class="entry-photo">
							<img src="/assets/placeholder/food/50x50/5.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/food/50x50/5.jpg"
								 alt=""/>
						</div>
						<div class="entry-title">
							<a href="#">Suspicio inncem tantum septima ossibus</a>
						</div>
						<div class="entry-controls minimal">
							<a href="#" class="control entry-to-favorites active" title="Add to favorites"> <i
										class="fa fa-heart-o"></i> </a><span class="control-tip">255</span>
							<a href="#" class="control entry-like" title="I like this!"> <i
										class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">471</span>
							<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i>
							</a> <span class="control-tip">120</span>
						</div>
					</div> <!-- .entry -->

					<!-- Entry -->
					<div class="post">
						<div class="entry-photo">
							<img src="/assets/placeholder/food/50x50/9.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/food/50x50/9.jpg"
								 alt=""/>
						</div>
						<div class="entry-title">
							<a href="#">Incididunt ut labore et dolore magna aliqua</a>
						</div>
						<div class="entry-controls minimal">
							<a href="#" class="control entry-to-favorites" title="Add to favorites">
								<i class="fa fa-heart-o"></i> </a><span class="control-tip">127</span>
							<a href="#" class="control entry-like" title="I like this!"> <i
										class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">322</span>
							<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i>
							</a> <span class="control-tip">102</span>
						</div>
					</div> <!-- .entry -->
				</div>

			</aside> <!-- .widget -->
			<!-- / Widget -->
		--}}


		</div> <!-- .the-sidebar -->
	</div> <!-- .rw-sidebar -->
@endsection