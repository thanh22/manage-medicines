@extends('backend/master')
@section('css')
<link href="{{asset('backend/css/add_user.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Cập nhật dược liệu
				</h3>
			</div>
		</div>
	</div>
	
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
				<form class="" method="post" action="">
					@csrf
					<div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Tên (*)</label>
                                    <div class="col-10">
                                        <input class="form-control " type="text" value="{{$model->name}}"  name="name" >
                                        @if($errors->has('name'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('name')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Mã dược liệu (*)</label>
                                    <div class="col-10">
                                        <input class="form-control " type="text" value="{{$model->code}}"  name="code" >
                                        @if($errors->has('code'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('code')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Tên khoa học(*)</label>
                                    <div class="col-10">
                                        <input class="form-control " type="text" value="{{$model->science_name}}"  name="science_name" >
                                        @if($errors->has('science_name'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('science_name')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                               

                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="input-group">
                                        <input type="" name="feature_image" class="form-control" id="image"  value="{{asset($model->feature_image)}}">
                                        <div class="input-group-addon">
                                            <a data-toggle="modal" href='#modal-id' class="btn btn-success">Chọn</a>
                                        </div>
                                    </div>
                                    <img src="{{asset($model->feature_image)}}" id="show_img" alt="" width="100">
                                    @if($errors->has('feature_image'))
                                        <small class="help-block" style="color: red;">
                                          {!!$errors->first('feature_image')!!}
                                        </small>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Mục đích sử dụng (*)</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{$model->purpose_use}}"  name="purpose_use" >
                                        @if($errors->has('purpose_use'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('purpose_use')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Phần được sử dụng(*)</label>
                                    <div class="col-10">
                                        <input class="form-control " type="text" value="{{$model->part_used}}"  name="part_used" >
                                        @if($errors->has('part_used'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('part_used')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Mô tả (*)</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{$model->description}}"  name="description" >
                                        @if($errors->has('description'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('description')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Dược chất (*)</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="{{$model->pharmaceutical_substance}}"  name="pharmaceutical_substance" >
                                        @if($errors->has('pharmaceutical_substance'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('pharmaceutical_substance')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Phân loại chất lượng (*)</label>
                                    <div class="col-10">
                                        <select name="quality_classification" id="" class="form-control">
                                            <option value="0" {{$model->quality_classification == 0 ? 'selected' : ''}}>Loại 1</option>
                                            <option value="1" {{$model->quality_classification == 1 ? 'selected' : ''}}>Loại 2</option>
                                            <option value="2" {{$model->quality_classification == 2 ? 'selected' : ''}}>Loại 3</option>
                                        </select>
                                        @if($errors->has('quality_classification'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('quality_classification')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

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
    $('#modal-id').on('hide.bs.modal',function(){
        var img_src = $('input#image').val();
        $('img#show_img').attr('src',img_src);
    });
    
</script>
@stop()
