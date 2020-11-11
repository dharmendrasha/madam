@extends('layouts.front')
@section('content')


<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
        <div class="col-lg-8">
					<div class="user-profile-details">
						<div class="order-history">
							<div class="header-area">
								<h4 class="title">
									{{ $langg->lang277 }}
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ $langg->lang278 }}</th>
														<th>{{ $langg->lang279 }}</th>
														<th>{{ $langg->lang280 }}</th>
														<th>{{ $langg->lang281 }}</th>
														<th>{{ $langg->lang282 }}</th>
														<th>Product Config</th>
													</tr>
												</thead>
												<tbody>
													 @foreach($orders as $order)
													<tr>
														<td>
																{{$order->order_number}}
														</td>
														<td>
																{{date('d M Y',strtotime($order->created_at))}}
														</td>
														<td>
																{{$order->currency_sign}}{{ round($order->pay_amount * $order->currency_value , 2) }}
														</td>
														<td>
															<div class="order-status {{ $order->status }}">
																	{{ucwords($order->status)}}
															</div>
														</td>
														<td>
															<a class="mybtn2 sm" href="{{route('user-order',$order->id)}}">
																	{{ $langg->lang283 }}
															</a>
														</td>
														<td>
															@if (ucwords($order->status) == 'Completed')
															<select class="nice" id="after_sell">
																<option data-display="{{ $order->after_delivery }}" value="{{ route('order_update_after_sell', ['order_number' => $order->order_number, 'status' => 'return']) }}">Return</option>
																<option {{ $order->after_delivery == 'cancel' ? 'selected' : null }} value="{{ route('order_update_after_sell', ['order_number' => $order->order_number, 'status' => 'cancel']) }}">Cancel</option>
																<option {{ $order->after_delivery == 'replace' ? 'selected' : null }} value="{{ route('order_update_after_sell', ['order_number' => $order->order_number, 'status' => 'replace']) }}">Replace</option>
															</select>
															@else
															-- -- --
															@endif
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


@section('scripts')
<script>
	$('#after_sell').change( async function(e){
		//show loading
		toastr.info('Loading.....')
		console.log('value', e.target.value)
		const b =  e.target.value; //the value of the current select options
		const a = await fetch(b);
		const c = await a.status == 200 ? await a.text() : "0";
		toastr.remove();
		if(c == "0"){
			toastr.error('Something happen wrong please try again', 'Again!')
		}else{
		toastr.success('Order updated success');
		console.log(c);
		return c;
		}
	})
</script>
@endsection