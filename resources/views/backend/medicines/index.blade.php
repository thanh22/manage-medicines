@extends('backend/master')
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Danh sách dược liệu
				</h3>
			</div>
		</div>
		<div>
			<form action="" method="GET" class="form-inline" role="form" style="margin-top: 10px;">
				<div class="form-group">
					<input class="form-control" name="key" placeholder="Input key">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="{{route('admin.medicines.add')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
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
							<th>Mã</th>
                            <th>Tên khoa học</th>
                            <th>Ảnh</th>
                            <th>Phân loại chất lượng</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($medicines as $key => $model)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$model->name}}</td>
							<td>{{$model->code}}</td>
							<td>{{$model->science_name}}</td>
							<td><img src="{{asset('uploads/thumbs/'.pathinfo($model->feature_image)['filename'].'_thumb.'.pathinfo($model->feature_image)['extension'])}}" alt=""></td>
                            @if($model->quality_classification == 0)
                            <td>Loại 1</td>
                            @elseif($model->quality_classification == 1)
                            <td>Loại 2</td>
                            @elseif($model->quality_classification == 2)
                            <td>Loại 3</td>
                            @endif
                            <td>
								
								<a href="{{route('admin.medicines.edit',['id'=>$model->id])}}" class=""><i class="fa fa-edit"></i></a>
								<a href="{{route('admin.medicines.show',['id'=>$model->id])}}" class=""><i class="fa fa-eye"></i></a>
								
								<a href="{{route('admin.medicines.delete',['id'=>$model->id])}}" class="" onclick="return confirm('Bạn có chắc muốn xóa không')"><i class="fa fa-trash" style="color: red;"></i></a>
                            </td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<!--end::Section-->
	</div>
	{{$medicines->links()}}
	<!--end::Form-->
</div>
@stop()
@section('js')
<script>
    setTimeout(function(){ $(".alert-success").remove(); }, 3000);
</script>
@endsection