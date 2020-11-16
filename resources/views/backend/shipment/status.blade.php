@extends('backend/master')
@section('css')
<link href="{{asset('backend/css/status.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Cập nhật trạng thái
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
                        
                            
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Trạng thái (*)</label>
                                    <div class="col-10">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="" disabled selected>Vui lòng chọn...</option>
                                            <option value="0" {{$shipment->status == 0 ? 'disabled' : ''}}>Đang nuôi trồng</option>
                                            <option value="1" {{$shipment->status == 1 ? 'disabled' : ''}}>Đang thu hái</option>
                                            <option value="2" {{$shipment->status == 2 ? 'disabled' : ''}}>Đang sơ chế</option>
                                            <option value="3" {{$shipment->status == 3 ? 'disabled' : ''}}>Đang bảo quản</option>
                                            <option value="4" {{$shipment->status == 4 ? 'disabled' : ''}}>Đang vận chuyển</option>
                                            <option value="5" {{$shipment->status == 5 ? 'disabled' : ''}}>Đang chế biến</option>
                                            <option value="6" {{$shipment->status == 6 ? 'disabled' : ''}}>Đã nhận</option>
                                            <option value="7" {{$shipment->status == 7 ? 'disabled' : ''}}>Đang trả lại/thu hồi</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('status')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <div class="input-group">
                                        <input type="hidden" name="feature_image" class="form-control" id="image"  value="{{old('feature_image')}}">
                                        <div class=" col-3">
                                            <div class="thumbnail multi-select"><img src="{{asset('images/noimage.png')}}" alt="" ></div>
                                            
                                        </div>
                                    </div>
                                    <div class="row img_list">
                                        
                                    </div>
                                    <div class="help-image"></div>
                                    @if($errors->has('feature_image'))
                                        <small class="help-block" style="color: red;">
                                          {!!$errors->first('feature_image')!!}
                                        </small>
                                    @endif
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
    $('.multi-select').click(function(){

        $('#modal-id').modal('show');

        $('#modal-id').on('hide.bs.modal',function(){
            var test = '["';
            var img_src = $('input#image').val();
            var html = '';

            //validate số lượng ảnh
            if(img_src.indexOf(test) != -1){
                
                var img_list = $.parseJSON(img_src);
                for (var i = 0; i < img_list.length; i++) {
                        html += `<div class="col-3">
                                    <div class="thumbnail multi-select"><img src="`+img_list[i]+`" alt="" ></div>
                                </div>`;
                        $('.img_list').html(html);
                }
                if(img_list.length < 3){
                   
                    var help_img = `<small class="help-block" style="color: red;">Vui lòng chọn ít nhất 3 ảnh</small>`;
                    $('.help-image').html(help_img);
                }else{
                    
                    var help_img = `<i class="fa fa-check-circle" style="color: chartreuse"></i>`;
                    $('.help-image').html(help_img);
                }
                
            }else{
                html += `<div class="col-3">
                                <div class="thumbnail multi-select"><img src="`+img_src+`" alt="" ></div>
                            </div>`;
                $('.img_list').html(html);
                var help_img = `<small class="help-block" style="color: red;">Vui lòng chọn ít nhất 3 ảnh</small>`;
                $('.help-image').html(help_img);
            }
            
            
            
        });
    });
    
    $(document).ready(function() {
        
    });
</script>
@stop()
