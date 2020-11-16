@extends('backend/master')
@section('css')
<link href="{{asset('backend/css/add_shipment.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Chi tiết lô hàng
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
                <a href="{{route('admin.shipment.index')}}" class="btn btn-default btn-danhsach"><i class="fa fa-list"></i></a>
			</form>
		</div>
	</div>
	
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
                
                <div class="m-section">
                    <div class="m-section__content">
                        
                            <div class="m-portlet__body">
                                <div class="row">
                                    <div class="col-md-6">
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Mã lô hàng</label>
                                            <div class="col-10">
                                                <div class="form-control">{{$model->code}}</div>
                                               
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Dược liệu</label>
                                            <div class="col-10">
                                                <div class="form-control">{{$model->medicine->name}}</div>
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phần được sử dụng</label>
                                            <div class="col-10">
                                                <div class="form-control">{{$model->part_use}}</div>
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="" class="col-2 col-form-label">Ngày tạo</label>
                                            <div class="col-10">
                                                <div class="form-control">{{date("d-m-Y", strtotime($model->created_date))}}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="" class="col-2 col-form-label">Giá nhập</label>
                                            <div class="col-10">
                                                <div class="form-control">{{number_format($model->import_price)}} đ</div>
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="" class="col-2 col-form-label">Giá bán</label>
                                            <div class="col-10">
                                                <div class="form-control">{{number_format($model->price)}} đ</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
        
                                        <div class="form-group m-form__group row">
                                            <label for="" class="col-2 col-form-label">Ghi chú</label>
                                            <div class="col-10">
                                                <div class="form-control">{{$model->note}}</div>
                                               
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="" class="col-2 col-form-label">Trạng thái</label>
                                            <div class="col-10">
                                                @if($model->status == 0)
                                                <div class="form-control">Đang nuôi trồng</div>
                                                @elseif($model->status == 1)
                                                <div class="form-control">Đang thu hái</div>
                                                @elseif($model->status == 2)
                                                <div class="form-control">Đang sơ chế</div>
                                                @elseif($model->status == 3)
                                                <div class="form-control">Đang bảo quản</div>
                                                @elseif($model->status == 4)
                                                <div class="form-control">Đang vận chuyển</div>
                                                @elseif($model->status == 5)
                                                <div class="form-control">Đang chế biến</div>
                                                @elseif($model->status == 6)
                                                <div class="form-control">Đã nhận</div>
                                                @elseif($model->status == 7)
                                                <div class="form-control">Đang trả lại/thu hồi</div>
                                                @endif
                                                
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="">Ảnh</label>
                                            
                                            <div class="row img_list">
                                                
                                                    @foreach ($list_img as $item)
                                                        <div class="col-3">
                                                            <div class="thumbnail multi-select"><img src="{{asset($item)}}" alt="" ></div>
                                                        </div>
                                                    @endforeach
                                                    
                                                
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="div-ogirin">
        
                                    <div class="row_origin">
                                        @if($model->origin_shipment == 0)
                                            <div class="form-group m-form__group row">
                                                <label for="" class="col-2 col-form-label">Nguồn gốc lô hàng</label>
                                                <div class="col-10">
                                                    <div class="form-control">Trong nước</div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="" class="col-2 col-form-label">Nguồn gốc dược liệu</label>
                                                <div class="col-10">
                                                    <div class="form-control">{{$model->domestic_shipment->origin}}</div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group m-form__group row">
                                                <label for="" class="col-2 col-form-label">Số lượng</label>
                                                <div class="col-10">
                                                    <div class="form-control">{{$model->domestic_shipment->quantity}}</div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Đơn vị xử lý</label>
                                                <div class="col-10">
                                                    <div class="form-control">{{$model->domestic_shipment->processing_unit}}</div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group m-form__group row">
                                                <label for="" class="col-2 col-form-label">Chứng chỉ kiểm định</label>
                                                <div class="col-10">
                                                    <div class="form-control">{{$model->domestic_shipment->certificate}}</div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-group m-form__group row">
                                                <label for="" class="col-2 col-form-label">Nguồn gốc lô hàng</label>
                                                <div class="col-10">
                                                    <div class="form-control">Nhập khẩu</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Nguồn gốc dược liệu</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->origin}}</div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Chứng chỉ kiểm định</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->certificate}}</div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Mã chứng nhận nguồn gốc</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->list_CO}}</div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Số giấy phép nhập khẩu</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->import_license}}</div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Cửa khẩu nhập khẩu</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->gate}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Số lượng cấp phép</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->number_of_licenses}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Số lượng thực tế</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->number_of_present}}</div>
                                                        </div>
                                                    </div>
                    
                                                
                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Cơ sở sản xuất</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->production_facilities}}</div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group m-form__group row">
                                                        <label for="example-text-input" class="col-2 col-form-label">Cơ sở cung cấp</label>
                                                        <div class="col-10">
                                                            <div class="form-control">{{$model->import_shipment->facility_provided}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
        
                                </div>
                            </div>
                            
                    </div>
                </div>
			</div>
		</div>

		<!--end::Section-->
	</div>
	
	<!--end::Form-->
</div>
@stop()
