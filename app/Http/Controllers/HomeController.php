<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function show()
     {
      $suppliers = Supplier::latest()->paginate(5);
      return view('show',compact('suppliers'));

     }
    public function index()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin =  $characters[rand(0, strlen($characters) - 1)]. mt_rand(10000, 99999) ;
        // shuffle the result
        $string = str_shuffle($pin);
       //  dd($string);
        $countries = Country::get();
        // dd($countries);
       return view('home',compact(['string','countries']));
    }

        public function store(Request $request)
        {

            $validator = Validator::make($request->all(),[
                'supplier_group' => 'required',
                'company_name' => 'required|min:3|max:100',
                'address_1'      => 'required',
                'name' => 'required|unique:suppliers|min:4|max:15',
                'email'        => 'required|email|unique:suppliers',
                'number' => 'required|min:9',
                'country' => 'required|integer',
                'state' => 'required|integer',
                'city' => 'required|integer',
                'postal_code' => 'required|integer',
                'gst_number' =>  'required|integer',
            ]);
        
            $product = new Supplier();
            $product->supplier_code=$request->supplier_code;
            $product->supplier_group=$request->supplier_group;
            $product->company_name=$request->company_name;
        
            $product->details = [
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'country' => $request->country,
                'state' => $request->state,
                'city'  => $request->city,
                'postal_code' => $request->postal_code,
                'period'  => $request->period,
                'number' => $request->number,
                'gst' => $request->gst,
                'gst_number' => $request->gst_number,
                'url' => $request->url,
                'email'=> $request->email
            ];

            $product->contact_person = [
                'saluation' => $request->saluation,
                'name_1' => $request->name_1,
                'designation' => $request->designation,
                'department' => $request->department,
                'email_1'  => $request->email_1,
                'mobile_number' => $request->mobile_number,
            ];
            $product->save();

            return redirect('/show')->with('success','Saved data successfully');
            
        }
    public function fetchState(Request $request)
    {
        $data = State::where("country_id", $request->country_id)
                                ->get(["name", "id"]);
        // print_r($data);
        // die;
        return response()->json($data);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function fetchCity(Request $request)
    {
        $data= City::where("state_id", $request->state_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }
    public function delete(Request $request,$id)
    {
        $suppliers=Supplier::find($id);
        $suppliers->delete();
    
        return redirect()->route('show')
                        ->with('success','Suppliers deleted successfully');
    }

    Public function edit($id)
    {
        $suppliers = Supplier::find($id);
        $country = Country::get();
        $states = State::get();
        $cities = City::get();
        // print_r($suppliers['details']['gst']);
        // die;
        return view('edit',compact(['suppliers','country','states','cities']));
    }


    Public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
        'supplier_group' => 'required',
        'company_name' => 'required|min:3|max:100',
        'address_1'      => 'required',
        'name' => 'required|unique:suppliers|min:4|max:15',
        'email'        => 'required|email|unique:suppliers',
        'number' => 'required|min:9',
        'country' => 'required|integer',
        'state' => 'required|integer',
        'city' => 'required|integer',
        'postal_code' => 'required|integer',
        'gst_number' =>  'required|integer',
    ]);

        $product = Supplier::find($id);
        $product->supplier_code=$request->supplier_code;
        $product->supplier_group=$request->supplier_group;
        $product->company_name=$request->company_name;
    
        $product->details = [
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'country' => $request->country,
            'state' => $request->state,
            'city'  => $request->city,
            'postal_code' => $request->postal_code,
            'period'  => $request->period,
            'number' => $request->number,
            'gst' => $request->gst,
            'gst_number' => $request->gst_number,
            'url' => $request->url,
            'email'=> $request->email
        ];

        $product->contact_person = [
            'saluation' => $request->saluation,
            'name_1' => $request->name_1,
            'designation' => $request->designation,
            'department' => $request->department,
            'email_1'  => $request->email_1,
            'mobile_number' => $request->mobile_number,
        ];
        $product->save();

        return redirect('/show')->with('success','Update data successfully');
    }
}
