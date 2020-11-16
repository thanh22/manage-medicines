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
					Cập nhật thông tin
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
                                    <label for="example-text-input" class="col-2 col-form-label">Loại (*)</label>
                                    <div class="col-10">
                                        <select name="type" id="type_user" required class="form-control ">
                                            <option value="">Vui lòng chọn</option>
                                            <option value="0" {{$model->type == 0 ? 'selected' : ''}}>Cá nhân</option>
                                            <option value="1" {{$model->type == 1 ? 'selected' : ''}}>Cơ quan</option>
                                        </select>
                                        @if($errors->has('type'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('type')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                @if($model->type == 0)
                                <div class="form-group m-form__group row div-gender">
                                    <label for="" class="col-2 col-form-label">Giới tính</label>
                                    <div class="col-10 ">
                                        <input type="radio" class="gender"  name="gender" value="0" {{$model->gender == 0 ? 'checked' : ''}}>
                                        <label for="da_ky">Nam</label>
                                        <input type="radio"  class="gender"  name="gender" value="1" {{$model->gender == 1 ? 'checked' : ''}}>
                                        <label for="dang_van_chuyen">Nữ</label>
                                        <input type="radio"  class="gender"  name="gender" value="2" {{$model->gender == 2 ? 'checked' : ''}}>
                                        <label for="dang_van_chuyen">Giới tính khác</label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row div-birthday">
                                    <label for="birthday" class="col-2 col-form-label">Ngày sinh</label>
                                    <div class="col-10">
                                        <input class="form-control " type="date" value="{{$model->birthday}}" id="birthday" name="birthday">
                                        
                                    </div>
                                </div>
                                @endif
                                


                            </div>
                            <div class="col-md-6">

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Điện thoại (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-phone " type="text" value="{{$model->phone}}"  name="phone" >
                                        <div class="help-phone"></div>
                                        @if($errors->has('phone'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('phone')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-email-input" class="col-2 col-form-label">Email (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-email" type="email" value="{{$model->email}}" id="example-email-input" name="email">
                                        <div class="help-email"></div>
                                        @if($errors->has('email'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('email')!!}
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
<script>
    $(document).ready(function(){
        // $('.div-confirm').hide();
        var email_before = $('.input-email').val();
        $('#type_user').on('change',function(){
            // alert($(this).val());
            if($(this).val() !== '0'){
                $(".gender").prop('disabled', true);
                $("#birthday").prop('disabled', true);
                $('.div-gender').hide();
                $('.div-birthday').hide();
            }else{
                $(".gender").prop('disabled', false);
                $("#birthday").prop('disabled', false);
                $('.div-gender').show();
                $('.div-birthday').show();
            }
        });

        //kiểm tra số điện thoại
        $('.input-phone').blur( function() {
            
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $(this).val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false) 
                {
                    $('.help-phone').html(`<small class="help-block" style="color: red;">Số điện thoại của bạn không đúng định dạng!</small>`);
                    // alert('Số điện thoại của bạn không đúng định dạng!');
                }else{
                    $('.help-phone').html(`<i class="fa fa-check-circle" style="color: chartreuse"></i>`);
                    // alert('Số điện thoại của bạn hợp lệ!');
                }
            }else{
                $('.help-phone').html('<small class="help-block" style="color: red;">Bạn chưa điền số điện thoại!</small>');
                // alert('Bạn chưa điền số điện thoại!');
            }
        });

        $(".input-email").on("change paste keyup", function() {
            var mail = $(this).val();
            if(email !== mail){
                //kiểm tra email
                $('.input-email').blur(function(){
                    
                    function isValidEmailAddress(emailAddress) {
                        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                        return pattern.test(emailAddress);
                    }
                    if(isValidEmailAddress(mail)){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url : "{{route('ajax.check_mail')}}",
                            type : "post",
                            dataType:"text",
                            data : {
                                    email : mail
                            },
                            success : function (data){
                                if(data == 1){
                                    var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                                    $('.help-email').html(html);
                                }else if(data == 2){
                                    var html = '<small class="help-block" style="color: red;">Email đã tồn tại</small>';
                                    $('.help-email').html(html);
                                }
                            }
                        });
                    }else{
                        var html = '<small class="help-block" style="color: red;">Địa chỉ email không hợp lệ</small>';
                        $('.help-email').html(html);
                    }
                    
                });
            }
            
        });

        

       
    });
</script>
@stop()