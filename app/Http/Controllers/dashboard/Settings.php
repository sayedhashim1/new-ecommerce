<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\shippingSettingRequest;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Settings extends Controller
{

    function editShippingMethod($type)
    {
          if($type=="free")
               $Setting=  Setting::where('key','free shipping_label')->first();

          elseif ($type==="internal")
              $Setting= Setting::where('key','local label')->first();

          elseif ($type==="external")
              $Setting= Setting::where('key','outer label')->first();

        return view('dashboard.settings.shippings.edit',compact('Setting'));

    }
    function updateShippingMethod(shippingSettingRequest $req)
    {
        try {
            $shipping_method = Setting::find($req->id);

            DB::beginTransaction();
            $shipping_method->update(['plain_value' => $req->plain_value]);
            //save translations
            $shipping_method->value =$req->value;
            $shipping_method->save();

            DB::commit();
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
            DB::rollback();
        }
    }

}
