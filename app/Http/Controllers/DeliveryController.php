<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\FreeShip;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = City::OrderBy('matp','asc')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','asc')->get();
                $output.='<option value="">---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province)
                {
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderBy('xaid','asc')->get();
                $output.='<option value="">---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward)
                {
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new FreeShip();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }
    public function select_feeship(){
        $feeship = FreeShip::orderBy('fee_id','desc')->get();
        $output = '';
        $output.='<div class="table-responsive">
            <table class="table table-bordered">
            <thread>
                <tr>
                    <th>Tên thành phố</th>
                    <th>Tên quận huyện</th>
                    <th>Tên xã phường</th>
                    <th>Phí ship (VND)</th>
                </tr>
            </thread>
            <tbody>
            ';
                foreach($feeship as $key => $fee){
                    $output.='
                    <tr>
                        <td>'.$fee->city->name_city.'</td>
                        <td>'.$fee->province->name_quanhuyen.'</td>
                        <td>'.$fee->wards->name_xaphuong.'</td>
                        <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship).'</td>
                    </tr>
                    ';
                }
            $output.='
            </tbody>
            </table>
            </div>
            ';
                echo $output;
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = FreeShip::findOrFail($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $data['fee_value'];
        $fee_ship->save();
    }
}
