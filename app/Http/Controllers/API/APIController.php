<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerGroup;
use App\Contact;
use DB;

class APIController extends Controller
{
    
    public function signin(Request $request){
        try{
            $mobile = $request['mobile'];
            $password = $request['password'];
            $contact = DB::table('contacts')
                ->where('mobile',$mobile)
                ->where('type','customer')
                ->select([
                    'id',
                    'name',
                    'mobile',
                    'email',
                    'password',
                    'member_from',
                    'renewal_count',
                    'custom_field4 as area',
                    'city as block',
                    'state as street',
                    'country as apartment',
                    'landmark',
                    'customer_group_id',
                    'custom_field1 as subscription_cost',
                    'custom_field2 as used_balance',
                    'custom_field3 as available_balance'
                ])
                ->first();
            if($contact){
                if(Hash::check($password, $contact->password)){
                    $response = [
                        "code"=>200,
                        "status"=>true,
                        "data"=>$contact,
                    ];
                }else{
                    $response = [
                        "code"=>403,
                        "status"=>false,
                        "msg"=>"invalid_credentials",
                    ];
                }
            }else{
                $response = [
                    "code"=>403,
                    "status"=>false,
                    "msg"=>"invalid_credentials",
                ];
            }
            return response()->json($response, 200);
        }catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }

    public function subscriptions(){
        try {
            $subscriptions = DB::table('customer_groups')->select(['id','name','subscription_cost','subscription_pieces'])->get();
            return response()->json($subscriptions, 200);
        }catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }

    public function signup(Request $request){
        try {
            $gid = $request['subscription_id'];
            $cg = CustomerGroup::find($gid);
            $contact = new Contact();
            $contact->business_id = 1;
            $contact->created_by=1;
            $contact->type = 'customer';
            $contact->contact_id = $request['mobile'];
            $contact->name=$request['name'];
            $contact->mobile=$request['mobile'];
            $contact->email=$request['email'];
            $contact->password=Hash::make($request['password']);
            $contact->member_from=date('Y-m-d');
            $contact->city = $request['block'];
            $contact->state = $request['street'];
            $contact->country = $request['apartment'];
            $contact->landmark = $request['landmark'];
            $contact->customer_group_id = $request['subscription_id'];
            $contact->custom_field1 = $cg->subscription_cost;
            $contact->custom_field2 = 0;
            $contact->custom_field3 = $cg->subscription_cost;
            $contact->custom_field4 = $request['area'];
            $contact->save();
            $response = [
                'code'=>201,
                'status'=> true,
                'msg' => 'accout_created',
            ];
            return response()->json($response, 200);
        }catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }

    public function categories(){
        try {
            $categories = DB::table('categories')->select(['id','name','OEX_name_ar','short_code'])->get();
            return response()->json($categories, 200);
        }catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }

    public function products(){
        try {
            $products = DB::table('products')->select(['id','name','type','category_id','sku','image'])->get();
            foreach($products as $product){
                $variations[] = [
                    'product'=> $product,
                    'variations' => DB::table('variations')->where('product_id',$product->id)->get(),
                ];
            }
            return response()->json($variations, 200);
        }catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }
}