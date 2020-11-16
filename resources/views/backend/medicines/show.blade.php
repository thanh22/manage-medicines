@extends('backend/master')
@section('main')
<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Chi tiết dược liệu
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
                <a href="{{route('admin.medicines.index')}}" class="btn btn-default btn-danhsach"><i class="fa fa-list"></i></a>
			</form>
		</div>
	</div>
	
	<div class="m-portlet__body">

		<!--begin::Section-->
		<div class="m-section">
			<div class="m-section__content">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                        
                            <tr>
                                <th>Tên</th>
                                <td>
                                    {{$model->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>Mã</th>
                                <td>
                                    {{$model->code}}
                                </td>
                                
                            </tr>
                            <tr>
                                <th>Tên khoa học</th>
                                <td>{{$model->science_name}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh</th>
                                <td><img src="{{asset($model->feature_image)}}" alt="" width="100%"></td>
                            </tr>
                            
                            
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Mô tả</th>
                                <td>{{$model->description}}</td>
                            </tr>
                            <tr>
                                <th>Mục đích sử dụng</th>
                                <td>{{$model->purpose_use}}</td>
                            </tr>
                            <tr>
                                <th>Dược chất</th>
                                <td>{{$model->pharmaceutical_substance}}</td>
                            </tr>
                            <tr>
                                <th>Phần sử dụng</th>
                                <td>{{$model->part_used}}</td>
                            </tr>
                            <tr>
                                <th>Phân loại chất lượng</th>
                                @if($model->quality_classification == 0)
                                <td>Loại 1</td>
                                @elseif($model->quality_classification == 1)
                                <td>Loại 2</td>
                                @elseif($model->quality_classification == 2)
                                <td>Loại 3</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
                
			</div>
		</div>

		<!--end::Section-->
	</div>
	
	<!--end::Form-->
</div>
@stop()
