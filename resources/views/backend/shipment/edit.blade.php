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
					Cập nhật lô hàng
				</h3>
			</div>
		</div>
	</div>
	
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
				<form class="" method="post" action="">
                <meta name="csrf-token" content="{{ csrf_token() }}">
					@csrf
					<div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Mã lô hàng (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-code" type="text" value="{{$model->code}}"  name="code" >
                                        <div class="help-code"></div>
                                        @if($errors->has('code'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('code')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Dược liệu (*)</label>
                                    <div class="col-10">
                                        <select class="js-example-basic-single form-control" name="id_medicine">
                                            @foreach ($medicines as $item)
                                            <option {{$model->id_medicine == $item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                        @if($errors->has('code_medicine'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('code_medicine')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Phần được sử dụng (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-part-use" type="text" value="{{$model->part_use}}"  name="part_use" >
                                        <div class="help-part-use"></div>
                                        @if($errors->has('part_use'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('part_use')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Ngày tạo (*)</label>
                                    <div class="col-10">
                                        <input type="date" class="form-control input-created_date" name="created_date" value="{{$model->created_date}}" required>
                                        <div class="help-created-date"></div>
                                        @if($errors->has('created_date'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('created_date')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                                
                                

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Ghi chú</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{$model->note}}"  name="note" >
                                       
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Trạng thái (*)</label>
                                    <div class="col-10">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="" disabled selected>Vui lòng chọn...</option>
                                            <option value="0" {{$model->status==0 ? 'selected' : ''}}>Đang nuôi trồng</option>
                                            <option value="1" {{$model->status==1 ? 'selected' : ''}}>Đang thu hái</option>
                                            <option value="2" {{$model->status==2 ? 'selected' : ''}}>Đang sơ chế</option>
                                            <option value="3" {{$model->status==3 ? 'selected' : ''}}>Đang bảo quản</option>
                                            <option value="4" {{$model->status==4 ? 'selected' : ''}}>Đang vận chuyển</option>
                                            <option value="5" {{$model->status==5 ? 'selected' : ''}}>Đang chế biến</option>
                                            <option value="6" {{$model->status==6 ? 'selected' : ''}}>Đã nhận</option>
                                            <option value="7" {{$model->status==7 ? 'selected' : ''}}>Đang trả lại/thu hồi</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('status')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Giá nhập (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-import-price" type="text" value="{{$model->import_price}}"  name="import_price" placeholder="Đơn vị VNĐ">
                                        <div class="help-import-price"></div>
                                        @if($errors->has('import_price'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('import_price')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Giá bán (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-price" type="text" value="{{$model->price}}"  name="price" placeholder="Đơn vị VNĐ">
                                        <div class="help-price"></div>
                                        @if($errors->has('price'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('price')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="div-ogirin">
                            <div class="form-group m-form__group row">
                                <label for="" class="col-2 col-form-label">Nguồn gốc lô hàng (*)</label>
                                <div class="col-10">
                                    <select name="origin_shipment" id="" class="form-control origin_shipment">
                                        @if($model->origin_shipment == 0)
                                            <option value="0" selected>Trong nước</option>
                                        @else
                                            <option value="1" selected>Nhập khẩu</option>
                                        @endif
                                    </select>
                                    @if($errors->has('origin_shipment'))
                                        <small class="help-block" style="color: red;">
                                        {!!$errors->first('origin_shipment')!!}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="row_origin">
                                @if($model->origin_shipment == 0)
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-2 col-form-label">Nguồn gốc dược liệu(*)</label>
                                        <div class="col-10">
                                            <input class="form-control input-origin" type="text" value="{{$domestic->origin}}"  name="origin" >
                                            <div class="help-origin"></div>
                                            @if($errors->has('origin'))
                                                <small class="help-block" style="color: red;">
                                                {!!$errors->first('origin')!!}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-2 col-form-label">Số lượng (*)</label>
                                        <div class="col-10">
                                            <input class="form-control input-quantity" type="text" value="{{$domestic->quantity}}"  name="quantity" placeholder="đơn vị kg">
                                            <div class="help-quantity"></div>
                                            @if($errors->has('quantity'))
                                                <small class="help-block" style="color: red;">
                                                {!!$errors->first('quantity')!!}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Đơn vị xử lý (*)</label>
                                        <div class="col-10">
                                            <input class="form-control input-processing-unit" type="text" value="{{$domestic->processing_unit}}"  name="processing_unit" >
                                            <div class="help-processing-unit"></div>
                                            @if($errors->has('processing_unit'))
                                                <small class="help-block" style="color: red;">
                                                {!!$errors->first('processing_unit')!!}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-2 col-form-label">Chứng chỉ kiểm định (*)</label>
                                        <div class="col-10">
                                            <input class="form-control input-certificate" type="text" value="{{$domestic->certificate}}"  name="certificate" >
                                            <div class="help-certificate"></div>
                                            @if($errors->has('certificate'))
                                                <small class="help-block" style="color: red;">
                                                {!!$errors->first('certificate')!!}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                @elseif($model->origin_shipment == 1)
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Nguồn gốc dược liệu (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-origin" type="text" value="{{$import_ship->origin}}"  name="origin" >
                                                    <div class="help-origin"></div>
                                                    @if($errors->has('origin'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('origin')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Chứng chỉ kiểm định (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-certificate" type="text" value="{{$import_ship->certificate}}"  name="certificate" >
                                                    <div class="help-certificate"></div>
                                                    @if($errors->has('certificate'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('certificate')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Mã chứng nhận nguồn gốc (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-list-CO" type="text" value="{{$import_ship->list_CO}}"  name="list_CO" >
                                                    <div class="help-list-CO"></div>
                                                    @if($errors->has('list_CO'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('list_CO')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Số giấy phép nhập khẩu (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-import-license" type="text" value="{{$import_ship->import_license}}"  name="import_license" >
                                                    <div class="help-import-license"></div>
                                                    @if($errors->has('import_license'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('import_license')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Cửa khẩu nhập khẩu (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-gate" type="text" value="{{$import_ship->gate}}"  name="gate" >
                                                    <div class="help-gate"></div>
                                                    @if($errors->has('gate'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('gate')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Số lượng cấp phép (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-number-of-licenses" type="text" value="{{$import_ship->number_of_licenses}}"  name="number_of_licenses" >
                                                    <div class="help-number-of-licenses"></div>
                                                    @if($errors->has('number_of_licenses'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('number_of_licenses')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Số lượng thực tế (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-number-of-present" type="text" value="{{$import_ship->number_of_present}}"  name="number_of_present" >
                                                    <div class="help-number-of-present"></div>
                                                    @if($errors->has('number_of_present'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('number_of_present')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
            
                                        
            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Cơ sở sản xuất (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-production-facilities" type="text" value="{{$import_ship->production_facilities}}"  name="production_facilities" >
                                                    <div class="help-production-facilities"></div>
                                                    @if($errors->has('production_facilities'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('production_facilities')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Cơ sở cung cấp (*)</label>
                                                <div class="col-10">
                                                    <input class="form-control input-facility-provided" type="text" value="{{$import_ship->facility_provided}}"  name="facility_provided" >
                                                    <div class="help-facility-provided"></div>
                                                    @if($errors->has('facility_provided'))
                                                        <small class="help-block" style="color: red;">
                                                        {!!$errors->first('facility_provided')!!}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                            </div>

                        </div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-2">
								</div>
								<div class="col-10">
									<button type="submit" class="btn btn-success">Submit</button>				
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!--end::Section-->
	</div>
	<!--end::Form-->
</div>
@stop()
@section('js')
<script type="text/javascript">
  
    
    $(document).ready(function() {
       
        var domestic_shipment = `<div class="form-group m-form__group row">
                            <label for="" class="col-2 col-form-label">Nguồn gốc dược liệu(*)</label>
                            <div class="col-10">
                                <input class="form-control input-origin" type="text" value="{{old('origin')}}"  name="origin" >
                                <div class="help-origin"></div>
                                @if($errors->has('origin'))
                                    <small class="help-block" style="color: red;">
                                    {!!$errors->first('origin')!!}
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="" class="col-2 col-form-label">Số lượng (*)</label>
                            <div class="col-10">
                                <input class="form-control input-quantity" type="text" value="{{old('quantity')}}"  name="quantity" placeholder="đơn vị kg">
                                <div class="help-quantity"></div>
                                @if($errors->has('quantity'))
                                    <small class="help-block" style="color: red;">
                                    {!!$errors->first('quantity')!!}
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Đơn vị xử lý (*)</label>
                            <div class="col-10">
                                <input class="form-control input-processing-unit" type="text" value="{{old('processing_unit')}}"  name="processing_unit" >
                                <div class="help-processing-unit"></div>
                                @if($errors->has('processing_unit'))
                                    <small class="help-block" style="color: red;">
                                    {!!$errors->first('processing_unit')!!}
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label for="" class="col-2 col-form-label">Chứng chỉ kiểm định (*)</label>
                            <div class="col-10">
                                <input class="form-control input-certificate" type="text" value="{{old('certificate')}}"  name="certificate" >
                                <div class="help-certificate"></div>
                                @if($errors->has('certificate'))
                                    <small class="help-block" style="color: red;">
                                    {!!$errors->first('certificate')!!}
                                    </small>
                                @endif
                            </div>
                        </div>`;
        var import_shipment = `<div class="row">
                                    <div class="col-6">
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nguồn gốc dược liệu (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-origin" type="text" value="{{old('origin')}}"  name="origin" >
                                                <div class="help-origin"></div>
                                                @if($errors->has('origin'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('origin')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Chứng chỉ kiểm định (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-certificate" type="text" value="{{old('certificate')}}"  name="certificate" >
                                                <div class="help-certificate"></div>
                                                @if($errors->has('certificate'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('certificate')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Mã chứng nhận nguồn gốc (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-list-CO" type="text" value="{{old('list_CO')}}"  name="list_CO" >
                                                <div class="help-list-CO"></div>
                                                @if($errors->has('list_CO'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('list_CO')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Số giấy phép nhập khẩu (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-import-license" type="text" value="{{old('import_license')}}"  name="import_license" >
                                                <div class="help-import-license"></div>
                                                @if($errors->has('import_license'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('import_license')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cửa khẩu nhập khẩu (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-gate" type="text" value="{{old('gate')}}"  name="gate" >
                                                <div class="help-gate"></div>
                                                @if($errors->has('gate'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('gate')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Số lượng cấp phép (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-number-of-licenses" type="text" value="{{old('number_of_licenses')}}"  name="number_of_licenses" >
                                                <div class="help-number-of-licenses"></div>
                                                @if($errors->has('number_of_licenses'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('number_of_licenses')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Số lượng thực tế (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-number-of-present" type="text" value="{{old('number_of_present')}}"  name="number_of_present" >
                                                <div class="help-number-of-present"></div>
                                                @if($errors->has('number_of_present'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('number_of_present')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
        
                                       
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cơ sở sản xuất (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-production-facilities" type="text" value="{{old('production_facilities')}}"  name="production_facilities" >
                                                <div class="help-production-facilities"></div>
                                                @if($errors->has('production_facilities'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('production_facilities')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Cơ sở cung cấp (*)</label>
                                            <div class="col-10">
                                                <input class="form-control input-facility-provided" type="text" value="{{old('facility_provided')}}"  name="facility_provided" >
                                                <div class="help-facility-provided"></div>
                                                @if($errors->has('facility_provided'))
                                                    <small class="help-block" style="color: red;">
                                                    {!!$errors->first('facility_provided')!!}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

        
        
        $('.js-example-basic-single').select2();  
        
        // if(origin_ship == 0){
        //     $('.row_origin').html(domestic_shipment);
        // }else if(origin_ship == 1){
        //     $('.row_origin').html(import_shipment);
        // }
        $('.origin_shipment').change(function(){
            var org = $(this).val();
            if(org == 0){
                $('.row_origin').html(domestic_shipment);
            }else if(org == 1){
                $('.row_origin').html(import_shipment);
            }
        });

        //validate mã lô hàng
        $(document).on('blur','.input-code',function(){
            var code = $(this).val();
            if(code == ''){
                var html = '<small class="help-block" style="color: red;">Mã lô hàng không được để trống</small>';
                $('.help-code').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-code').html(html);
            }
        });  

        //validate phần được sử dụng
        $(document).on('blur','.input-part-use',function(){
            var part_use = $(this).val();
            if(part_use == ''){
                var html = '<small class="help-block" style="color: red;">Phần được sử dụng không được để trống</small>';
                $('.help-part-use').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-part-use').html(html);
            }
        });  

        //validate đơn vị xử lý
        $(document).on('blur','.input-processing-unit',function(){
            var processing_unit = $(this).val();
            if(processing_unit == ''){
                var html = '<small class="help-block" style="color: red;">Đơn vị xử lý không được để trống</small>';
                $('.help-processing-unit').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-processing-unit').html(html);
            }
        });  

        //validate giá nhập
        $(document).on('blur','.input-import-price',function(){
            var import_price = $(this).val();
            if(import_price == ''){
                var html = '<small class="help-block" style="color: red;">Giá nhập không được để trống</small>';
                $('.help-import-price').html(html);
            }else if(!$.isNumeric(import_price)){
                var html = '<small class="help-block" style="color: red;">Giá nhập phải là một số</small>';
                $('.help-import-price').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-import-price').html(html);
            }
        });  

        //validate giá bán
        $(document).on('blur','.input-price',function(){
            var price = $(this).val();
            if(price == ''){
                var html = '<small class="help-block" style="color: red;">Giá nhập không được để trống</small>';
                $('.help-price').html(html);
            }else if(!$.isNumeric(price)){
                var html = '<small class="help-block" style="color: red;">Giá nhập phải là một số</small>';
                $('.help-price').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-price').html(html);
            }
        });  

        //validate nguồn gốc dược liệu
        $(document).on('blur','.input-origin',function(){
            var origin = $(this).val();
            if(origin == ''){
                var html = '<small class="help-block" style="color: red;">Nguồn gốc dược liệu không được để trống</small>';
                $('.help-origin').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-origin').html(html);
            }
        });

        //validate số lượng
        $(document).on('blur','.input-quantity',function(){
            var quantity = $(this).val();
            if(quantity == ''){
                var html = '<small class="help-block" style="color: red;">Số lượng không được để trống</small>';
                $('.help-quantity').html(html);
            }else if(!$.isNumeric(quantity)){
                var html = '<small class="help-block" style="color: red;">Số lượng phải là một số</small>';
                $('.help-quantity').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-quantity').html(html);
            }
        });

        //validate chứng chỉ kiểm định
        $(document).on('blur','.input-certificate',function(){
            var certificate = $(this).val();
            if(certificate == ''){
                var html = '<small class="help-block" style="color: red;">Chứng chỉ kiểm định không được để trống</small>';
                $('.help-certificate').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-certificate').html(html);
            }
        });

        //validate chứng nhận nguồn gốc
        $(document).on('blur','.input-list-CO',function(){
            var list_CO = $(this).val();
            if(list_CO == ''){
                var html = '<small class="help-block" style="color: red;">Mã chứng nhận nguồn gốc không được để trống</small>';
                $('.help-list-CO').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-list-CO').html(html);
            }
        });

        //validate số giấy phép nhập khẩu
        $(document).on('blur','.input-import-license',function(){
            var import_license = $(this).val();
            if(import_license == ''){
                var html = '<small class="help-block" style="color: red;">Giấy phép nhập khẩu không được để trống</small>';
                $('.help-import-license').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-import-license').html(html);
            }
        });

        //validate số lượng cấp phép
        $(document).on('blur','.input-number-of-licenses',function(){
            var number_of_licenses = $(this).val();
            if(number_of_licenses == ''){
                var html = '<small class="help-block" style="color: red;">Số lượng cấp phép không được để trống</small>';
                $('.help-number-of-licenses').html(html);
            }else if(!$.isNumeric(number_of_licenses)){
                var html = '<small class="help-block" style="color: red;">Số lượng cấp phép phải là một số</small>';
                $('.help-number-of-licenses').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-number-of-licenses').html(html);
            }
        });

        //validate số lượng thực tế
        $(document).on('blur','.input-number-of-present',function(){
            var number_of_licenses = $('.input-number-of-licenses').val();
            var number_of_present = $(this).val();
            if(number_of_present == ''){
                var html = '<small class="help-block" style="color: red;">Số lượng thực tế không được để trống</small>';
                $('.help-number-of-present').html(html);
            }else if(!$.isNumeric(number_of_present)){
                var html = '<small class="help-block" style="color: red;">Số lượng thực tế phải là một số</small>';
                $('.help-number-of-present').html(html);
            }else if(number_of_present > number_of_licenses){
                var html = '<small class="help-block" style="color: red;">Số lượng thực tế không được lớn hơn số lượng cấp phép</small>';
                $('.help-number-of-present').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-number-of-present').html(html);
            }
        });

       

        //validate cửa khẩu
        $(document).on('blur','.input-gate',function(){
            var gate = $(this).val();
            if(gate == ''){
                var html = '<small class="help-block" style="color: red;">Cửa khẩu không được để trống</small>';
                $('.help-gate').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-gate').html(html);
            }
        });

        //validate cơ sở sản xuất
        $(document).on('blur','.input-production-facilities',function(){
            var production_facilities = $(this).val();
            if(production_facilities == ''){
                var html = '<small class="help-block" style="color: red;">Cơ sở sản xuất không được để trống</small>';
                $('.help-production-facilities').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-production-facilities').html(html);
            }
        });

        //validate cơ sở cung cấp
        $(document).on('blur','.input-facility-provided',function(){
            var facility_provided = $(this).val();
            if(facility_provided == ''){
                var html = '<small class="help-block" style="color: red;">Cơ sở cung cấp không được để trống</small>';
                $('.help-facility-provided').html(html);
            }else{
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-facility-provided').html(html);
            }
        });


    });
</script>
@stop()
