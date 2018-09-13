<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $account = Account::where("id",aid())->first();
        return view("modules.settings.company_profile.index",compact('account'));
    }

    public function update(Request $request)
    {

        $account_id = aid();
        $this->validate(request(),[
            "company_name"    =>  "required|max:100",
            "tax_office"    =>  "max:100",
            "tax_id"    =>  "max:100",
            "address"    =>  "max:100",
            "city"    =>  "max:100",
            "town"    =>  "max:100",
            "phone"    =>  "max:100",
            "fax"    =>  "max:100",
            "web"    =>  "max:100",
            "email"    =>  "max:100",
        ]);

        $data=[];

        if(request()->hasFile("logo"))
        {
            $this->validate($request,[
                "logo"    =>  "image|mimes:jpg,png,jpeg|max:2048"
            ]);
            $logo = $request->file('logo');
            $data['logo'] = sha1(time()) . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('/images/account/' . aid() . '/logo/');
            if(is_dir($destinationPath)){
                $account = Account::where('id',aid())->firstOrFail();
                $filePath = public_path('/images/account/' . aid() . '/logo/'.$account->logo);
                unlink($filePath);
                $logo->move($destinationPath, $data['logo']);
            }else {
                $logo->move($destinationPath, $data['logo']);
            }
        }

        $data['company_name'] = $request->company_name;
        $data['tax_office'] = $request->tax_office;
        $data['tax_id'] = $request->tax_id;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['town'] = $request->town;
        $data['phone'] = $request->phone;
        $data['fax'] = $request->fax;
        $data['web'] = $request->web;
        $data['email'] = $request->email;

        $account = Account::where('id',aid())->firstOrFail();
        $account->update($data);
        $account->save();

        return redirect()->route('company_profile',aid());
    }
}
