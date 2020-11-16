@extends('backend/master')
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sách tài khoản
				</h3>
			</div>
		</div>
		<div>
			<form action="" method="GET" class="form-inline" role="form" style="margin-top: 10px;">
				<div class="form-group">
					<input class="form-control" name="key" placeholder="Input key">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="{{route('admin.user.add')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
							<th>Tên</th>
							<th>Email</th>
							<th>Loại tài khoản</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $key => $model)
						<tr>
							<td>{{$key+1}}</td>
							<td>
								{{$model->name}}
								
							</td>
							<td>{{$model->email}}</td>
							@if($model->type == 0)
                            <td>Cá nhân</td>
                            @else
                            <td>Cơ quan</td>
                            @endif
							<td>
								
								<!-- <a href="{{route('admin.user.addRole',['id'=>$model->id])}}" class="btn btn-success btn-sm">+ role</a>
								<a href="{{route('admin.user.addPermission',['id'=>$model->id])}}" class="btn btn-success btn-sm">+ permission</a>

								<a href="{{route('admin.user.getRole',['id'=>$model->id])}}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> role</a>
								<a href="{{route('admin.user.getPer',['id'=>$model->id])}}" class="btn btn-info btn-sm" ><i class="fa fa-eye"></i> permis..</a> -->
								
								<a href="{{route('admin.user.edit',['id'=>$model->id])}}" class=""><i class="fa fa-edit"></i></a>
								
								<a href="{{route('admin.user.delete',['id'=>$model->id])}}" class="" onclick="return confirm('Bạn có chắc muốn xóa không')"><i class="fa fa-trash" style="color: red;"></i></a>
                                <a href="{{route('admin.user.edit_pass',['id'=>$model->id])}}" class="btn btn-warning btn-sm">Đổi mk</a>
                            </td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<!--end::Section-->
	</div>
	{{-- {{$users->links()}} --}}
	<!--end::Form-->
</div>
@stop()
@section('js')
<script>
    setTimeout(function(){ $(".alert-success").remove(); }, 3000);
</script>
@endsection