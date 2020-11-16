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
					Đổi mật khẩu
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
                            <label for="example-password-input" class="col-2 col-form-label">Mật khẩu mới</label>
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
                        
                        <div class="form-group m-form__group row div-confirm">
                            <label for="example-password-input" class="col-2 col-form-label">Xác nhận mật khẩu </label>
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
            // $('.div-confirm').show();
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