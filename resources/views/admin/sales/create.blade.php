@extends('admin.layouts.app')


@push('page-css')

@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Edit Sale</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Edit Sale</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
                <!-- Create Sale -->
                <form method="POST" action="{{route('sales.store')}}">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>Customer Name <span class="text-danger">*</span></label>
								<input type="text" placeholder="Customer Name" class="form-control" name="name">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Customer Phone <span class="text-danger">*</span></label>
								<input type="number" placeholder="Customer Phone" class="form-control" name="phone">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 1 <span class="text-danger">*</span></label>
								<select class="select2 form-select form-control" name="product_id">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity <span class="text-danger">*</span></label>
								<input type="number" value="1" class="form-control" name="quantity">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 2</label>
								<select class="select2 form-select form-control" name="product_id_2">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_2">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 3</label>
								<select class="select2 form-select form-control" name="product_id_3">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_3">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 4</label>
								<select class="select2 form-select form-control" name="product_id_4">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_4">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 5</label>
								<select class="select2 form-select form-control" name="product_id_5">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_5">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 6</label>
								<select class="select2 form-select form-control" name="product_id_6">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_6">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 7</label>
								<select class="select2 form-select form-control" name="product_id_7">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_7">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 8</label>
								<select class="select2 form-select form-control" name="product_id_8">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_8">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 9</label>
								<select class="select2 form-select form-control" name="product_id_9">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_9">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Product 10</label>
								<select class="select2 form-select form-control" name="product_id_10">
                                    <option disabled selected > Select Product</option>
									@foreach ($products as $product)
										@if (!empty($product->purchase))
											@if (!($product->purchase->quantity <= 0))
												<option value="{{$product->id}}">{{$product->purchase->product}}</option>
											@endif
										@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" class="form-control" name="quantity_10">
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
                <!--/ Create Sale -->
			</div>
		</div>
	</div>
</div>
@endsection


@push('page-js')

@endpush
