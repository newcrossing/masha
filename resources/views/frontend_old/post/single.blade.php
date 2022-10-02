@extends('frontend_old.layouts.app')
@section('title','Правовая поддержка военнослужащих')
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
			<h1> {{ $post->name }}</h1>
		</div>
		<div class="rw-row">
			<div class="blog-single clearfix">
				<div class="entry post">
					<div class="entry-details">

						<div class="grid-container" style="margin-bottom: 5px">
							<div class="left">
								<i class="the-icon fa fa-user"></i>
								<a href="/user/{{ $post->user->login }}">{{ $post->user->login }}</a>
							</div>
							<div class="right">
								<i class="the-icon fa fa-calendar"></i>
								{{-- $Carbone->createFromFormat('Y-m-d', $post->date_public)->isoFormat('D MMMM YYYY', 'Do MMMM').' г.' --}}
								{{  $post->date_public->format('d.m.Y') }}
							</div>
						</div>


						<div class="">
							{!! str_replace('<hr />','',$post->text)   !!}
						</div>
					</div>
					<div class="clear"></div>
				</div> <!-- .entry -->
			</div>
			<div class="clear"></div>


		</div> <!-- .rw-row -->


		@if (($post->tags()->count()) )
			<div class="rw-row light border-tb">
				<div class="recipe-tags">
					<span class="tags-title">Теги:</span>
					@foreach ($post->tags as $tag)
						<span class="tag"><a href="/tag/{{ $tag->id }}"> {{ $tag->name }}</a></span>
					@endforeach
				</div>
			</div> <!-- .rw-row -->
		@endif

		@if(2>5)
			<div class="rw-row light-gray border-tb">

				<h2>Comments - 7:</h2>
				<ul class="post-comments">

					<!-- Comments level 0 -->
					<li class="comment">
						<div class="comment-avatar">
							<img src="/assets/placeholder/5.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/5.jpg"
								 class="avatar" alt=""/>
						</div>
						<div class="content">
							<div class="comment-header">
								<a href="#">Steven Hall</a><span class="comment-time">28 January 2013</span>
								<div class="comment-vote">
									<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
									<div class="counter">309</div>
									<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore a ut magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est
								tempor.</p>
						</div>

						<!-- Comments level 1 -->
						<ul>
							<li class="comment">
								<div class="comment-avatar">
									<img src="/assets/placeholder/6.jpg"
										 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/6.jpg"
										 class="avatar" alt=""/>
								</div>
								<div class="content">
									<div class="comment-header">
										<a href="#">Donna Martin</a><span class="comment-time">28 January 2013</span>
										<div class="comment-vote">
											<div class="control upvote active"><i class="fa fa-chevron-up"></i></div>
											<div class="counter">117</div>
											<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore a ut magna aliqua.</p>
								</div>

								<!-- Comments level 2 -->
								<ul>
									<li class="comment">
										<div class="comment-avatar">
											<img src="/assets/placeholder/13.jpg"
												 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/13.jpg"
												 class="avatar" alt=""/>
										</div>
										<div class="content">
											<div class="comment-header">
												<a href="#">Kenneth Clark</a><span
														class="comment-time">28 January 2013</span>
												<div class="comment-vote">
													<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
													<div class="counter negative">-214</div>
													<div class="control downvote"><i class="fa fa-chevron-down"></i>
													</div>
												</div>
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore a ut magna aliqua. Ut enim ad
												minim
												veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est
												tempor.</p>
										</div>
									</li><!-- comment end -->
								</ul>
								<!-- Comments level 2 end -->

							</li><!-- comment end -->
						</ul>
						<!-- Comments level 1 end -->

						<a href="#" class="comment-reply"><i class="fa fa-reply"></i> Reply</a>

					</li><!-- comment end -->

					<li class="comment">
						<div class="comment-avatar">
							<img src="/assets/placeholder/18.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/18.jpg"
								 class="avatar" alt=""/>
						</div>
						<div class="content">
							<div class="comment-header">
								<a href="#">Mark Wilson</a><span class="comment-time">28 January 2013</span>
								<div class="comment-vote">
									<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
									<div class="counter">158</div>
									<div class="control downvote active"><i class="fa fa-chevron-down"></i></div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore a ut magna aliqua tempor.</p>
						</div>

						<ul>
							<li class="comment">
								<div class="comment-avatar">
									<img src="/assets/placeholder/21.jpg"
										 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/21.jpg"
										 class="avatar" alt=""/>
								</div>
								<div class="content">
									<div class="comment-header">
										<a href="#">Ruth Lopez</a><span class="comment-time">28 January 2013</span>
										<div class="comment-vote">
											<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
											<div class="counter">182</div>
											<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore a ut magna aliqua tempor.</p>
								</div>
							</li><!-- comment end -->
						</ul>

						<a href="#" class="comment-reply"><i class="fa fa-reply"></i> Reply</a>

					</li><!-- comment end -->

					<li class="comment">
						<div class="comment-avatar">
							<img src="/assets/placeholder/6.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/6.jpg"
								 class="avatar" alt=""/>
						</div>
						<div class="content">
							<div class="comment-header">
								<a href="#">Susan Hill</a><span class="comment-time">28 January 2013</span>
								<div class="comment-vote">
									<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
									<div class="counter">442</div>
									<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore a ut magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do est
								tempor.</p>
						</div>

						<a href="#" class="comment-reply"><i class="fa fa-reply"></i> Reply</a>

					</li><!-- comment end -->

					<li class="comment">
						<div class="comment-avatar">
							<img src="/assets/placeholder/15.jpg"
								 tppabs="http://smartik.ws/demo/themeforest/html/gustos//assets/placeholder/15.jpg"
								 class="avatar" alt=""/>
						</div>
						<div class="content">
							<div class="comment-header">
								<a href="#">David Walker</a><span class="comment-time">28 January 2013</span>
								<div class="comment-vote">
									<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
									<div class="counter negative">-52</div>
									<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore a ut magna aliqua tempor.</p>
						</div>

						<a href="#" class="comment-reply"><i class="fa fa-reply"></i> Reply</a>

					</li><!-- comment end -->

				</ul>

			</div> <!-- .rw-row -->
		@endif

		@auth()
		<div class="rw-row">

			<!-- <h2>Leave a Reply</h2> -->
			<div id="respond" class="comment-respond clearfix">
				<div class="grid-container">
					<form action="" method="post" class="comment-form">
						<!--
						<div class="grid desk-4 alpha">
							<div class="label">Name(required)</div>
							<input name="author" type="text" class="fullwidth" />
						</div>

						<div class="grid desk-4">
							<div class="label">Email(required)</div>
							<input name="email" type="text" class="fullwidth" />
						</div>

						<div class="grid desk-4 omega">
							<div class="label">Website</div>
							<input name="url" type="text" class="fullwidth" />
						</div>
						 -->
						<div class="grid desk-12 alpha omega">
							<div class="label">Comment</div>
							<textarea name="comment"></textarea>
						</div>

						<div class="form-submit clearfix">
							<input name="submit" class="button primary" type="submit" value="Post Comment"/>
							<span class="comment-form-question"><i class="fa fa-question-circle fa-2x"></i>
							</span>
							<div class="form-allowed-tags" style="display: none;">
                            <span class="ftg-title" style="display: none">You may use these <abbr
										title="HyperText Markup Language">HTML</abbr> tags and attributes:</span>
								<code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt;</code><br/>
								<code>&lt;abbr title=&quot;&quot;&gt;</code><br/>
								<code>&lt;acronym title=&quot;&quot;&gt;</code><br/>
								<code>&lt;b&gt;</code><br/>
								<code>&lt;blockquote cite=&quot;&quot;&gt;</code><br/>
								<code>&lt;cite&gt;</code><br/>
								<code>&lt;code&gt;</code><br/>
								<code>&lt;del datetime=&quot;&quot;&gt;</code><br/>
								<code>&lt;em&gt;</code><br/>
								<code>&lt;i&gt;</code><br/>
								<code>&lt;q cite=&quot;&quot;&gt;</code><br/>
								<code>&lt;strike&gt;</code><br/>
								<code>&lt;strong&gt;</code><br/>
							</div>
						</div>
					</form>
				</div>
			</div><!-- #respond -->

		</div> <!-- .rw-row -->
		@endauth
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

		@if ($listTags->count())
			<!-- Widget -->
				<aside class="widget widget-categories">
					<div class="widget-title"><h3>Теги</h3></div>
					<ul>
						@foreach ($listTags as $tag)
							<li><a href="/tag/{{ $tag->id }}">{{ $tag->name }}
									<span class="mark light-gray">{{ $tag->hits }}</span>
								</a></li>
						@endforeach
					</ul>
				</aside> <!-- .widget -->
				<!-- / Widget -->
		@endif


		</div> <!-- .the-sidebar -->
	</div> <!-- .rw-sidebar -->
@endsection