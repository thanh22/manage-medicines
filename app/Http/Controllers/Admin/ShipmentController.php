<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipments;
use App\Models\Medicines;
use App\Models\DomesticShipments;
use App\Models\ImportShipments;
use App\Models\InfoConfirms;
use App\Models\ShipmentDevs;
use App\Models\ShipmentAdds;

class ShipmentController extends Controller
{
    public function index(Request $request)
    {
        $shipments      = Shipments::paginate(10);
		if ($request->key) {
			$shipments  = Shipments::where('name','LIKE','%'.$request->key.'%')->paginate(10);
		}
        return view('backend.shipment.index',compact('shipments'));
    }

    public function show($id)
    {
        $model          = Shipments::find($id);
        $info_confirm = InfoConfirms::where('id_shipment',$id)->where('status',$model->status)->first();
        $list_img = json_decode($info_confirm->list_image);

        return view('backend.shipment.show',compact('model','list_img'));
    }

    public function add()
    {
        $medicines      = Medicines::all();
        return view('backend.shipment.add',compact('medicines'));
    }

    public function post_add(Request $request)
    {
        
        $this->validate($request,[
           
            'code'                          => 'required',
            'id_medicine'                   => 'required',
            'part_use'                      => 'required',
            'import_price'                  => 'required|numeric',
            'price'                         => 'required|numeric',
            'status'                        => 'required',
            'origin_shipment'               => 'required',
            'created_date'                  => 'required'
        ],[
            'code.required'                     => 'Mã lô không được để trống',
            'id_medicine.required'              => 'Vui lòng chọn dược liệu',
            'part_use.required'                 => 'Phần được sử dụng không được để trống',
            'import_price.required'             => 'Giá nhập không được để trống',
            'price.required'                    => 'Giá bán không được để trống',
            'status.required'                   => 'Trạng thái không được để trống',
            'origin_shipment.required'          => 'Nguồn gốc lô hàng không được để trống',
            'created_date.required'             => 'Ngày tạo không được để trống',
            'import_price.numeric'              => 'Giá nhập phải là 1 số',
            'price.numeric'                     => 'Giá bán phải là 1 số'
        ]);
       

        $shipment                            = new Shipments;
        $shipment->code                      = $request->code;
        $shipment->id_medicine               = $request->id_medicine;
        $shipment->part_use                  = $request->part_use;
        $shipment->import_price              = $request->import_price;
        $shipment->price                     = $request->price;
        $shipment->status                    = $request->status;
        $shipment->origin_shipment           = $request->origin_shipment;
        $shipment->created_date              = $request->created_date;
        $shipment->save();
        
        $id_shipment = $shipment->id;

        if($request->origin_shipment == 0){
            $domestic_shipment                            = new DomesticShipments;
            $domestic_shipment->id_shipment               = $id_shipment;
            $domestic_shipment->origin                    = $request->origin;
            $domestic_shipment->quantity                  = $request->quantity;
            $domestic_shipment->unit                      = 'kg';
            $domestic_shipment->certificate               = $request->certificate;
            $domestic_shipment->processing_unit           = $request->processing_unit;
            $domestic_shipment->save();
        }else{
            $import_shipment                              = new ImportShipments;
            $import_shipment->id_shipment                 = $id_shipment;
            $import_shipment->origin                      = $request->origin;
            $import_shipment->list_CO                     = $request->list_CO;
            $import_shipment->import_license              = $request->import_license;
            $import_shipment->certificate                 = $request->certificate;
            $import_shipment->number_of_licenses          = $request->number_of_licenses;
            $import_shipment->number_of_present           = $request->number_of_present;
            $import_shipment->gate                        = $request->gate;
            $import_shipment->production_facilities       = $request->production_facilities;
            $import_shipment->facility_provided           = $request->facility_provided;
            $import_shipment->save();
        }
       
        if($request->feature_image !== ''){
            $arr_img            = [];
            $search             = ['[',']','"'];
            $replace            = '';
            $feature_image      = str_replace($search,$replace,$request->feature_image);
            $arr                = explode(',',$feature_image);
            
            foreach ($arr as $key => $value) {
                $arr_img[$key]  = str_replace(asset(''),'',$value);
            }
            $json_img           = json_encode($arr_img);
            
            $info_confirm                = new InfoConfirms;
            $info_confirm->id_shipment = $id_shipment;
            $info_confirm->status        = $request->status;
            $info_confirm->list_image    = $json_img;
            $info_confirm->save();
        }

        return redirect()->route('admin.shipment.index')->with('ok','Thêm mới lô hàng thành công!');
    }

    public function edit($id)
    {
        $medicines      = Medicines::all();
        $model          = Shipments::find($id);
        $domestic       = DomesticShipments::where('id_shipment',$id)->first();
        $import_ship    = ImportShipments::where('id_shipment',$id)->first();
 
        return view('backend.shipment.edit',compact('model','domestic','import_ship','medicines'));
    }

    public function post_edit(Request $request , $id)
    {
        $this->validate($request,[
           
            'code'                          => 'required',
            'id_medicine'                   => 'required',
            'part_use'                      => 'required',
            'import_price'                  => 'required|numeric',
            'price'                         => 'required|numeric',
            'status'                        => 'required',
            'origin_shipment'               => 'required',
            'created_date'                  => 'required'
        ],[
            'code.required'                     => 'Mã lô không được để trống',
            'id_medicine.required'              => 'Vui lòng chọn dược liệu',
            'part_use.required'                 => 'Phần được sử dụng không được để trống',
            'import_price.required'             => 'Giá nhập không được để trống',
            'price.required'                    => 'Giá bán không được để trống',
            'status.required'                   => 'Trạng thái không được để trống',
            'origin_shipment.required'          => 'Nguồn gốc lô hàng không được để trống',
            'created_date.required'             => 'Ngày tạo không được để trống',
            'import_price.numeric'              => 'Giá nhập phải là 1 số',
            'price.numeric'                     => 'Giá bán phải là 1 số'
        ]);
        
        $shipment                            = Shipments::find($id);
        $shipment->code                      = $request->code;
        $shipment->id_medicine               = $request->id_medicine;
        $shipment->part_use                  = $request->part_use;
        $shipment->import_price              = $request->import_price;
        $shipment->price                     = $request->price;
        $shipment->status                    = $request->status;
        $shipment->origin_shipment           = $request->origin_shipment;
        $shipment->created_date              = $request->created_date;
        $shipment->save();

        if($request->origin_shipment == 0){
            $domestic_shipment                            = DomesticShipments::where('id_shipment',$id)->first();
            $domestic_shipment->origin                    = $request->origin;
            $domestic_shipment->quantity                  = $request->quantity;
            $domestic_shipment->unit                      = 'kg';
            $domestic_shipment->certificate               = $request->certificate;
            $domestic_shipment->processing_unit           = $request->processing_unit;
            $domestic_shipment->save();
        }else{
            $import_shipment                              = ImportShipments::where('id_shipment',$id)->first();
            $import_shipment->origin                      = $request->origin;
            $import_shipment->list_CO                     = $request->list_CO;
            $import_shipment->import_license              = $request->import_license;
            $import_shipment->certificate                 = $request->certificate;
            $import_shipment->number_of_licenses          = $request->number_of_licenses;
            $import_shipment->number_of_present           = $request->number_of_present;
            $import_shipment->gate                        = $request->gate;
            $import_shipment->production_facilities       = $request->production_facilities;
            $import_shipment->facility_provided           = $request->facility_provided;
            $import_shipment->save();
        }
       
        return redirect()->route('admin.shipment.index')->with('ok','Cập nhật lô hàng thành công!');
    }

    public function status($id)
    {
        $shipment = Shipments::find($id);
        return view('backend.shipment.status',compact('shipment'));
    }

    public function post_status(Request $request, $id)
    {
        
        $this->validate($request,[
           
            'feature_image'                          => 'required',
           
        ],[
            'feature_image.required'                 => 'Ảnh không được để trống',
            
        ]);

        $shipment = Shipments::find($id);
        $shipment->status = $request->status;
        $shipment->save();

        if($request->feature_image !== ''){
            $arr_img            = [];
            $search             = ['[',']','"'];
            $replace            = '';
            $feature_image      = str_replace($search,$replace,$request->feature_image);
            $arr                = explode(',',$feature_image);
            
            foreach ($arr as $key => $value) {
                $arr_img[$key]  = str_replace(asset(''),'',$value);
            }
            $json_img           = json_encode($arr_img);
            
            $info_confirm                = new InfoConfirms;
            $info_confirm->id_shipment   = $id;
            $info_confirm->status        = $request->status;
            $info_confirm->list_image    = $json_img;
            $info_confirm->save();
        }

        return redirect()->route('admin.shipment.index')->with('ok','Cập nhật trạng thái thành công!');
    }

    public function detached(Request $request)
    {
        $total          = [];
        $code_child     = json_decode($request->code_shipment_child);
        $quantity_child = json_decode($request->quantity);

        foreach ($code_child as $key => $value) {
            $total[$key]['code'] = $value; 
        }
        foreach ($quantity_child as $key => $value) {
            $total[$key]['quantity'] = $value; 
        }

        
        foreach ($total as $key => $value) {
            $shipment_dev = new ShipmentDevs;
            $shipment_dev->code_shipment_child = $value['code'];
            $shipment_dev->id_shipment = $request->id;
            $shipment_dev->number = substr($value['code'], -1);
            $shipment_dev->quantity = $value['quantity'];
            $shipment_dev->save();
        }
        
        return redirect()->route('admin.shipment.index')->with('ok','Tách lô hàng thành công!');
     
    }

    public function delete($id)
    {
        Shipments::find($id)->delete();
        return redirect()->route('admin.shipment.index')->with('ok','Xóa lô hàng thành công!');
    }
}
