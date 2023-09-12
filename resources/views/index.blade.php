@extends('index_main')
@section('content')
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h2 class="text-black font-w600 mb-0">Dashboard</h2>
						<p class="mb-0">Welcome to Tiffino Admin!<br>From this dashboard, you can view and edit all the food items, monthly subscriptions, and orders.</p>
					</div>
				</div>
                <div class="row">
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card manage-food">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<div class="media-body">
										<h4 class="mb-0 text-black">Manage Food</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card manage-db">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<div class="media-body">
										<h4 class="mb-0 text-black">Manage Delivery Boys</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card manage-orders">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<div class="media-body">
										<h4 class="mb-0 text-black">Manage Orders</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card manage-subs">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<div class="media-body">
										<h4 class="mb-0 text-black">Manage Subscriptions</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				 </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
@section('jscontent')
	<script>
		$(document).ready(function(){
			$('.manage-food').click(function(){
				window.location.href = "{{ Route('food.index') }}";
			});
			$('.manage-db').click(function(){
				window.location.href = "{{ Route('db.index') }}";
			});
			$('.manage-orders').click(function(){
				window.location.href = "#";
			});
			$('.manage-subs').click(function(){
				window.location.href = "{{ Route('subs.index') }}";
			});
		});
	</script>
@endsection