<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicinesController extends Controller
{
    public function index(Request $request)
    {
        $medicines = Medicines::paginate(10);
		if ($request->key) {
			$medicines = Medicines::where('name','LIKE','%'.$request->key.'%')->paginate(10);
		}
        return view('backend.medicines.index',compact('medicines'));
    }

    public function show($id)
    {
        $model = Medicines::find($id);
        return view('backend.medicines.show',compact('model'));
    }

    public function add()
    {
        return view('backend.medicines.add');
    }

    public function post_add(Request $request)
    {
        
        $this->validate($request,[
            'name'                          => 'required',
            'code'                          => 'required',
            'science_name'                  => 'required',
            'feature_image'                 => 'required',
            'part_used'                     => 'required',
            'description'                   => 'required',
            'purpose_use'                   => 'required',
            'pharmaceutical_substance'      => 'required',
            'quality_classification'        => 'required'
        ],[
            'name.required'                     => 'Tên không được để trống',
            'code.required'                     => 'Mã không được để trống',
            'science_name.required'             => 'Tên khoa học không được để trống',
            'feature_image.required'            => 'Ảnh không được để trống',
            'part_used.required'                => 'Phần sử dụng không được để trống',
            'description.required'              => 'Mô tả không được để trống',
            'purpose_use.required'              => 'Mục đích sử dụng không được để trống',
            'pharmaceutical_substance.required' => 'Dược chất không được để trống',
            'quality_classification.required'   => 'Vui lòng chọn chất lượng'
        ]);

        $feature_image = str_replace(asset(''),'',$request->feature_image);

        $medicines                            = new Medicines;
        $medicines->name                      = $request->name;
        $medicines->code                      = $request->code;
        $medicines->science_name              = $request->science_name;
        $medicines->feature_image             = $feature_image;
        $medicines->purpose_use               = $request->purpose_use;
        $medicines->part_used                 = $request->part_used;
        $medicines->description               = $request->description;
        $medicines->pharmaceutical_substance  = $request->pharmaceutical_substance;
        $medicines->quality_classification    = $request->quality_classification;
        $medicines->save();

        return redirect()->route('admin.medicines.index')->with('ok','Thêm mới dược liệu thành công!');
    }

    public function edit($id)
    {
        $model = Medicines::find($id);
        return view('backend.medicines.edit',compact('model'));
    }

    public function post_edit(Request $request , $id)
    {
        $this->validate($request,[
            'name'                          => 'required',
            'code'                          => 'required',
            'science_name'                  => 'required',
            'feature_image'                 => 'required',
            'part_used'                     => 'required',
            'description'                   => 'required',
            'purpose_use'                   => 'required',
            'pharmaceutical_substance'      => 'required',
            'quality_classification'        => 'required'
        ],[
            'name.required'                     => 'Tên không được để trống',
            'code.required'                     => 'Mã không được để trống',
            'science_name.required'             => 'Tên khoa học không được để trống',
            'feature_image.required'            => 'Ảnh không được để trống',
            'part_used.required'                => 'Phần sử dụng không được để trống',
            'description.required'              => 'Mô tả không được để trống',
            'purpose_use.required'              => 'Mục đích sử dụng không được để trống',
            'pharmaceutical_substance.required' => 'Dược chất không được để trống',
            'quality_classification.required'   => 'Vui lòng chọn chất lượng'
        ]);
        
        $feature_image = str_replace(asset(''),'',$request->feature_image);

        $medicines                            = Medicines::find($id);
        $medicines->name                      = $request->name;
        $medicines->code                      = $request->code;
        $medicines->science_name              = $request->science_name;
        $medicines->feature_image             = $feature_image;
        $medicines->purpose_use               = $request->purpose_use;
        $medicines->part_used                 = $request->part_used;
        $medicines->description               = $request->description;
        $medicines->pharmaceutical_substance  = $request->pharmaceutical_substance;
        $medicines->quality_classification    = $request->quality_classification;
        $medicines->save();

        return redirect()->route('admin.medicines.index')->with('ok','Cập nhật dược liệu thành công!');
    }

    public function delete($id)
    {
        Medicines::find($id)->delete();
        return redirect()->route('admin.medicines.index')->with('ok','Xóa dược liệu thành công!');
    }
}
