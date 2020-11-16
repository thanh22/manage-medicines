@extends('backend/master')
@section('css')
<link href="{{asset('backend/css/index.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sác lô hàng
				</h3>
			</div>
		</div>
		<div>
			<form action="" method="GET" class="form-inline" role="form" style="margin-top: 10px;">
				<div class="form-group">
					<input class="form-control" name="key" placeholder="Input key">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="{{route('admin.shipment.add')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                <a href="{{route('admin.shipment.add')}}" class="btn btn-info">Ghép lô</a>
			</form>
		</div>
	</div>
	
	<div class="m-portlet__body">
	
		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã</th>
                            <th>Dược liệu</th>
                            <th>Phần sử dụng</th>
                            <th>Nguồn gốc</th>
                            <th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($shipments as $key => $model)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$model->code}}</td>
							<td>{{$model->medicine->name}}</td>
                            <td>{{$model->part_use}}</td>
                            @if($model->origin_shipment == 0)
                            <td>Trong nước</td>
                            @else
                            <td>Nhập khẩu</td>
                            @endif

                            @if($model->status == 0)
                            <td>Đang nuôi trồng &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 1)
                            <td>Đang thu hái &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 2)
                            <td>Đang sơ chế &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 3)
                            <td>Đang bảo quản &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 4)
                            <td>Đang vận chuyển &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 5)
                            <td>Đang chế biến &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 6)
                            <td>Đã nhận &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @elseif($model->status == 7)
                            <td>Đang trả lại/thu hồi &nbsp; <a href="{{route('admin.shipment.status',['id'=>$model->id])}}" class="btn btn-info btn-sm">Cập nhật </a><button type="button" class="btn btn-success btn-sm list-status" data-toggle="modal" data-target="#modalStatus">Xem</button></td>
                            @endif
                            <td>
								
								<a href="{{route('admin.shipment.edit',['id'=>$model->id])}}" class=""><i class="fa fa-edit"></i></a>
								<a href="{{route('admin.shipment.show',['id'=>$model->id])}}" class=""><i class="fa fa-eye"></i></a>
								<a href="{{route('admin.shipment.delete',['id'=>$model->id])}}" class="" onclick="return confirm('Bạn có chắc muốn xóa không')"><i class="fa fa-trash" style="color: red;"></i></a>
								
								<!-- Trigger the modal with a button -->
  								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tách</button>
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<form action="{{route('admin.shipment.detached')}}" method="post">
												@csrf
												<input type="hidden" name="id" value="{{$model->id}}" class="id-shipment">
												<input type="hidden" id="rs_code" name="code_shipment_child">
												<input type="hidden" id="rs_quantity" name="quantity">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Tách lô hàng</h4>
													</div>
													<div class="modal-body " style="border: 0;height: 600px;overflow-y: auto;width: 100%">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Mã lô hàng gốc</label>
															<div class="col-10">
																<div class="form-control code_ship_ment">{{$model->code}}</div>
															</div>
														</div>
			
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Số lượng lô hàng gốc</label>
															<div class="col-10">
																@if ($model->origin_shipment == 0)
																<div class="form-control quantity_ship_ment">{{number_format($model->domestic_shipment->quantity)}}</div>
																@else
																<div class="form-control quantity_ship_ment">{{number_format($model->import_shipment->number_of_present)}}</div>
																@endif
																
															</div>
														</div>
														<div class="modal-body-shipment">
															<div class="ship-modal">
																<div class="form-group m-form__group row">
																	<label for="example-text-input" class="col-2 col-form-label">Mã lô hàng tách (*)</label>
																	<div class="col-10">
																		<input class="form-control input-code-child" type="text" value="DEV_{{$model->code}}_1">
																		<div class="help-code-shipment-child"></div>
																		@if($errors->has('code_shipment_child'))
																			<small class="help-block" style="color: red;">
																			{!!$errors->first('code_shipment_child')!!}
																			</small>
																		@endif
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label for="example-text-input" class="col-2 col-form-label">Số lượng (*)</label>
																	<div class="col-10">
																		<input class="form-control input-quantity" type="text" value="{{old('quantity')}}"  placeholder="Đơn vị kg">
																		<div class="help-quantity-shipment-child"></div>
																		@if($errors->has('quantity'))
																			<small class="help-block" style="color: red;">
																			{!!$errors->first('quantity')!!}
																			</small>
																		@endif
																	</div>
																</div>
																
															</div>
															
														</div>
														<div>Số lượng còn lại : <span class="remaining-amount"></span></div>
														<a class="btn btn-success  add-ship"><i class="fa fa-plus"></i>Thêm lô con</a>
														
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-success btn-submit">Submit</button>
														<a class="btn btn-default" data-dismiss="modal">Đóng</a>
													</div>
											</form>
											
										</div>
									</div>
								</div>
								
                            </td>
						</tr>
						<!-- Modal -->
						<div id="modalStatus" class="modal fade" role="dialog">
							<div class="modal-dialog modal-status">
						
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body"  style="border: 0;height: 600px;overflow-y: auto;width: 100%">
										<h3>Trạng thái lô hàng</h3>
										<div class="form-group m-form__group row">
											<label for="example-text-input" class="col-2 col-form-label">Mã lô hàng</label>
											<div class="col-10">
												<div class="form-control">{{$model->code}}</div>
											</div>
										</div>
										<div class="modal-status">
											{{-- <div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Ngày tháng</label>
												<div class="col-10">
													
													<div class="form-control"></div>
													
													
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Trạng thái</label>
												<div class="col-10">
													
													<div class="form-control"></div>
													
													
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Ảnh</label>
												<div class="col-10">
													<div class="row">
														<div class="col-3">
															<img src="" alt="">
														</div>
													</div>
												</div>
											</div> --}}
										</div>
										
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
		<!--end::Section-->
	</div>
	{{$shipments->links()}}
	<!--end::Form-->
</div>
@stop()
@section('js')
<script>
	setTimeout(function(){ $(".alert-success").remove(); }, 3000);
	
	$(document).ready(function(){
		var num   = 1;
		var total = 0;
		$('.add-ship').click(function(){
			++num;
			var code_ship       = $('.code_ship_ment').text();
			var html_ship_modal = `<div class="ship-modal modal-2">
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-2 col-form-label">Mã lô hàng tách (*)</label>
													<div class="col-10">
														<input class="form-control input-code-child" type="text" value="DEV_`+code_ship+`_`+num+`">
														<div class="help-code-shipment-child"></div>
														@if($errors->has('code_shipment_child'))
															<small class="help-block" style="color: red;">
															{!!$errors->first('code_shipment_child')!!}
															</small>
														@endif
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-2 col-form-label">Số lượng (*)</label>
													<div class="col-10">
														<input class="form-control input-quantity" type="text" value="{{old('quantity')}}"  placeholder="Đơn vị kg">
														<div class="help-quantity-shipment-child"></div>
														@if($errors->has('quantity'))
															<small class="help-block" style="color: red;">
															{!!$errors->first('quantity')!!}
															</small>
														@endif
													</div>
												</div>
												<a class="btn btn-danger btn-sm  remove-ship"><i class="fa fa-minus-circle"></i></a>
											</div>`;
			console.log(code_ship);
			$('.modal-body-shipment').append(html_ship_modal);
		});


		$(document).on('blur','.input-quantity',function(){
			
			var quantity_parent = parseInt($('.quantity_ship_ment').text());
			var quantity_child  = parseInt($(this).val());
			if($(this).val() == ''){
				var html        = '<small class="help-block" style="color: red;">Số lượng lô tách không được để trống</small>';
                $(this).parent().find('.help-quantity-shipment-child').html(html);
			}else if(!$.isNumeric($(this).val())){
				var html = '<small class="help-block" style="color: red;">Số lượng lô tách phải là một số</small>';
                $(this).parent().find('.help-quantity-shipment-child').html(html);
			}else {
				var html        = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
				$(this).parent().find('.help-quantity-shipment-child').html(html);

				

				if(quantity_child >= quantity_parent){
					var html    = '<small class="help-block" style="color: red;">Số lượng lô tách phải nhỏ hơn số lượng lô gốc</small>';
					$(this).parent().find('.help-quantity-shipment-child').html(html);
				}else{
					total = total + quantity_child;
					var html    = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
					$(this).parent().find('.help-quantity-shipment-child').html(html);
					

					if(total > quantity_parent){
						total   = total - quantity_child;
						var html = '<small class="help-block" style="color: red;">Đã vượt quá số lượng gốc, vui lòng xem lại</small>';
						$(this).parent().find('.help-quantity-shipment-child').html(html);
					}else if(total <= quantity_parent){
						$('.remaining-amount').html(quantity_parent-total);

						if(quantity_parent-total == 0){
							$('.add-ship').prop( "disabled", true );

						}
					}

					
				}
			}

			
			console.log(total);
		});

		$(document).on('click','.remove-ship',function(){
			$(this).closest('.modal-2').toggleClass('strike').fadeOut('slow', function() { 
				var removeItem = $(this)[0].innerText;

				$(this).remove();
				num--; 
			});
			
		});

		$('.btn-submit').click(function(e){
			var code = [];
			var quantity = [];
			$( "input.input-code-child" ).each(function( index ) {
				code[index] = $(this).val();	
			});
			$( "input.input-quantity" ).each(function( index ) {
				quantity[index] = $(this).val();	
			});
			console.log(JSON.stringify(code));
			console.log(JSON.stringify(quantity));
			$('#rs_code').val(JSON.stringify(code));
			$('#rs_quantity').val(JSON.stringify(quantity));
		});

		$('.list-status').click(function(){
			var id_shipment = $('.id-shipment').val();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url : "{{route('ajax.get_status')}}",
				type : "post",
				dataType:"json",
				data : {
						id : id_shipment
				},
				success : function (result){
					
					$.each(result, function (index, value) {
						console.log(value);
						var img = JSON.parse(value.list_image);
						
						var html_status = `<div class="div-on-status"><div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Ngày tháng</label>
												<div class="col-10">
													
													<div class="form-control">`+value.created+`</div>
													
													
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label for="example-text-input" class="col-2 col-form-label">Trạng thái</label>
												<div class="col-10">
													
													<div class="form-control">`+value.status+`</div>
													
													
												</div>
											</div>
											</div>`;
						$('.modal-status').append(html_status);
					});
					
				}
			});
		});
	});
</script>
@endsection