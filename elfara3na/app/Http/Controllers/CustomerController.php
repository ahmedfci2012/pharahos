<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\Bills;
use App\Sub_bills;

class CustomerController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('customer.show' , ['customers' => $customers]);

    }

    public function add()
    {
        return view('customer.create');

    }


    public function create(Request $request) {
		/*$rules = [ 
				'title' => 'required|max:255',
				'short_desc' => 'required|max:255',
				'points' => 'required|numeric|min:0',
				'category' => 'required|numeric|exists:categories,id',
				'brand' => 'required|numeric|exists:brands,id' 
        ];
        */
		//$this->validate ( $request, $rules );
		// Save in Database
		$section = Customer::create ( [ 
                'name' => $request ['name'],
                'phone' => $request ['phone'],
                'address' => $request ['address'],
                'payment' => 0,
			] );
		        
        session()->flash('message', 'تم أضافة العميل بنجاح');
        session()->flash('type', 'success');

		return redirect ( "/customer/add" );

//return view('section.create');
	}

    public function editGet($customer_id){
        $customer = DB::table('customers')->where('id', '=',$customer_id)->first();
        return view('customer.edit',[
                                'customer' => $customer
                                ]);
        
    }
    
    public function editPost(Request $request){
        $customer_id = $request ['customer_id'];
        $customer_name = $request ['name'];
        $customer_phone = $request ['phone'];
        $customer_address = $request ['address'];
        DB::table('customers')
            ->where('id', $customer_id)
            ->update([  'name' => $customer_name ,
                        'phone' => $customer_phone,
                        'address' => $customer_address
                    ]);
		        
        session()->flash('message', 'تم تعديل العميل بنجاح');
        session()->flash('type', 'success');

		return redirect ( "/customer/edit/$customer_id" );
    }
    
    public function delete($customer_id){
        
//////////////////////////
DB::beginTransaction();

        try {
        
        $bills_ids = [];
        $customer_bills = Bills::where("customer_id" ,$customer_id )->get();
        foreach ($customer_bills as $bill){
            array_push($bills_ids , $bill->id);
        }
        DB::table('sub_bills')->whereIn('bill_id', $bills_ids)->delete() ;
        DB::table('bills')->whereIn('id', $bills_ids)->delete() ;
        $customer = Customer::find($customer_id);
        $customer->delete();

        DB::commit();
        // all good
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e);
            // something went wrong
        }

        return redirect ( "/customers/index");
    }
    
    public function customerDetails($customer_id){
    
         // get all bills of the customer 

    $customer_all_bills = Bills::where("customer_id" , $customer_id )->get();
/*
    $total_bills_price = 0 ;
    $total_customer_payment = 0 ;
    foreach($customer_all_bills as $b ) {
        $total_bills_price = $total_bills_price + $b->total_bill_price;
        $total_customer_payment= $total_customer_payment + $b->payments;
    }

    if( $total_bills_price > $total_customer_payment ){
        $diff = $total_bills_price - $total_customer_payment ;
        Customer::where('id', $customer_id)->update(array('payment' => -$diff));
    } else {
        $diff = $total_customer_payment - $total_bills_price  ;
        Customer::where('id', $customer_id)->update(array('payment' => $diff));
    }
*/
    $customer = Customer::where("id" ,$customer_id )->first();

    return view('customer.details',[
        'customer' => $customer,
        'customer_all_bills'=>$customer_all_bills
        ]);
    }

}
