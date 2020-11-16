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
					Thêm mới tài khoản
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
                                        <input class="form-control " type="text" value="{{old('name')}}"  name="name" >
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
                                            <option value="0">Cá nhân</option>
                                            <option value="1">Cơ quan</option>
                                        </select>
                                        @if($errors->has('type'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('type')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group m-form__group row div-gender">
                                    <label for="" class="col-2 col-form-label">Giới tính</label>
                                    <div class="col-10 ">
                                        <input type="radio" class="gender"  name="gender" value="0">
                                        <label for="da_ky">Nam</label>
                                        <input type="radio"  class="gender"  name="gender" value="1">
                                        <label for="dang_van_chuyen">Nữ</label>
                                        <input type="radio"  class="gender"  name="gender" value="2">
                                        <label for="dang_van_chuyen">Giới tính khác</label>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row div-birthday">
                                    <label for="birthday" class="col-2 col-form-label">Ngày sinh</label>
                                    <div class="col-10">
                                        <input class="form-control " type="date" value="{{old('birthday')}}" id="birthday" name="birthday">
                                        
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group m-form__group row">
                                    <label for="" class="col-2 col-form-label">Điện thoại (*)</label>
                                    <div class="col-10">
                                        <input class="form-control input-phone " type="text" value="{{old('phone')}}"  name="phone" >
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
                                        <input class="form-control input-email" type="email" value="{{old('email')}}" id="example-email-input" name="email">
                                        <div class="help-email"></div>
                                        @if($errors->has('email'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('email')!!}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label for="example-password-input" class="col-2 col-form-label">Mật khẩu (*)</label>
                                    <div class="col-10 div-password">
                                        <input class="form-control " type="password" value="" id="password" name="password">
                                        @if($errors->has('password'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('password')!!}
                                            </small>
                                        @endif
                                        <div id="pswd_info">
                                            <ul>
                                                <li id="letter" class="invalid">Chứa ít nhất một chữ cái</li>
                                        <li id="capital" class="invalid">Chứa ít nhất một chữ in hoa</li>
                                        <li id="number" class="invalid">Chứa ít nhất một số</li>
                                        <li id="length" class="invalid">Tối thiểu 8 ký tự></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group m-form__group row">
                                    <label for="example-password-input" class="col-2 col-form-label">Xác nhận mật khẩu (*)</label>
                                    <div class="col-10">
                                        <input class="form-control " type="password" value="" id="confirm_password" name="confirm_password">
                                        <div class="help-confirm"></div>
                                        @if($errors->has('confirm_password'))
                                            <small class="help-block" style="color: red;">
                                            {!!$errors->first('confirm_password')!!}
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
        $(".gender").prop('disabled', true);
        $("#birthday").prop('disabled', true);
        $('.div-gender').hide();
        $('.div-birthday').hide();
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

        //kiểm tra email
        $('.input-email').blur(function(){
            var mail = $(this).val();
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

        //kiểm tra password
        $('input#password').keyup(function() {
            // keyup code here
            // set password variable
            var pswd = $(this).val();
            //validate the length
            if ( pswd.length < 8 ) {
                $('#length').removeClass('valid').addClass('invalid');
            } else {
                $('#length').removeClass('invalid').addClass('valid');
            }
            //validate letter
            if ( pswd.match(/[A-z]/) ) {
                $('#letter').removeClass('invalid').addClass('valid');
            } else {
                $('#letter').removeClass('valid').addClass('invalid');
            }

            //validate capital letter
            if ( pswd.match(/[A-Z]/) ) {
                $('#capital').removeClass('invalid').addClass('valid');
            } else {
                $('#capital').removeClass('valid').addClass('invalid');
            }

            //validate number
            if ( pswd.match(/\d/) ) {
                $('#number').removeClass('invalid').addClass('valid');
            } else {
                $('#number').removeClass('valid').addClass('invalid');
            }

        }).focus(function() {
            $('#pswd_info').show();
        }).blur(function() {
            $('#pswd_info').hide();
        });

        //kiểm tra nhập lại password
        $('input#confirm_password').keyup(function() {
            var pwd = $('input#password').val();
            var confirm_pwd = $(this).val();
            if(pwd == confirm_pwd){
                var html = '<i class="fa fa-check-circle" style="color: chartreuse"></i>';
                $('.help-confirm').html(html);
            }else{
                var html = '<small class="help-block" style="color: red;">Xác nhận mật khẩu không khớp</small>';
                $('.help-confirm').html(html);
            }
        });
    });
</script>
@stop()