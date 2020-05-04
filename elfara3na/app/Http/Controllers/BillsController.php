<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Bills;
use App\Customer;
use App\Sub_bills;


class BillsController extends Controller
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


        session()->put('bills', []);
        $ids=session('bills');
        // get all subsections 
        $subs = DB::table('sections')->
        join('components', 'sections.id', '=', 'components.section_id')->
        select("components.*" , "sections.name as section_name")->orderBy("sections.id")->whereNotIn('components.id', $ids)->get();


        return view('bills.index',[
                                'subs' => $subs,
                                ]);
        
    }

    public function getBills()
    {

     $bills = Bills::join('customers', 'bills.customer_id', '=', 'customers.id')->
     select("bills.*"  , "customers.name","customers.payment as wallet" )->get();

        return view('bills.show',[
                                'bills' => $bills,
                                ]);
        
    }

    public function addSectionToBill($sub_id){
        $ids=session('bills');
        array_push($ids , $sub_id);
        session()->put('bills', $ids);
        
        $subs = DB::table('sections')->
        join('components', 'sections.id', '=', 'components.section_id')->
        select("components.*" , "sections.name as section_name")->
        orderBy("sections.id")->whereNotIn('components.id', $ids)->get();
        
        return view('bills.index',[
                                'subs' => $subs,
                                ]);   
 
        
    }



    public function createBill()
    {
        $ids=session('bills');
//        $subs = DB::table('components')->whereIn('id', $ids)->get();
        $subs = DB::table('sections')->
        join('components', 'sections.id', '=', 'components.section_id')->
        select("components.*" , "sections.name as section_name" )->
        orderBy("sections.id")->whereIn('components.id', $ids)->get();
        
        
        $customers = Customer::get();
        return view('bills.bill',[
                                'subs' => $subs,
                                'customers'=>$customers
                                ]);

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

        DB::beginTransaction();

        try {
            $ids=session('bills');
        $subs = DB::table('components')->whereIn('id', $ids)->get();

        $bill = Bills::create (['customer_id' => $request ['customer_id'] ,
             'transport' => $request ['transport'] 
            ]);
        $bill_id = $bill->id;
        // total price of bill start with transportation 
        $total_bill_price = $request ['transport'] ;

        foreach($subs as $sub){
            $color =  $request ["color$sub->id"];
            $weight =  $request ["weight$sub->id"];
            $price =  $request ["price$sub->id"];

            // total price is per section 
            // section has more components 
            // total price is the price of some components in 1 section
            if(empty($weight) || empty($price)){
                $total_price =  NULL ;
            }
            else{
                $total_price =  $weight * $price ;
                // some all total_price in total_bill_price
                $total_bill_price = $total_bill_price + $total_price;
            }
            $quantity = $request ["quantity$sub->id"];
            Sub_bills::create (['color' => $color , 
                                'weight' =>$weight ,
                                'price'=>$price ,
                                'total_price'=>$total_price ,
                                'quantity'=>$quantity,
                                'sub_id'=>$sub->id,
                                'section_id'=>$sub->section_id,
                                'bill_id'=>$bill->id
                                ]);
            DB::table('components')->where("id",$sub->id)->
                                      decrement('quantity', $quantity);                               
        }

        Bills::where('id', $bill_id)->update(array('total_bill_price' => $total_bill_price));
        
        session()->put('print_bill', true);
        

        DB::commit();
        // all good
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e);
            // something went wrong
        }

        

	    
        
        return redirect ( "/bills/print/$bill_id" ); 
        
	}

    public function printBill($bill_id)
    {

        $bool=session('print_bill');

        $bill = DB::table('bills')->where('id',$bill_id )->first();

        $customer = Customer::where("id",$bill->customer_id)->first();

        $sub_bills = DB::table('sub_bills')->where('sub_bills.bill_id',$bill_id )->
        join('components', 'components.id', '=', 'sub_bills.sub_id')->
        join('sections', 'sections.id', '=', 'sub_bills.section_id')->
        select("sub_bills.*" , "components.name as sub_name" , "sections.name as section_name")->
        orderBy("sections.id")->
        orderByRaw('ISNULL(sub_bills.price)')->
        get();

        $old_wallet = $customer->payment;

        if($bool){
           session()->put('old_wallet', $old_wallet);
        }
/*
        $total_price = 0 ;

        foreach ( $sub_bills as $sub){
            $total_price = $total_price + $sub->total_price ;
        }
 
    
    //  get the all bills not include the current bill bill_print
    $customer_all_bills = Bills::where([
        ["customer_id" , '=',  $customer->id]
    ] )->get();

    $total_bills_price = 0 ;
    $total_customer_payment = 0 ;
    foreach($customer_all_bills as $b ) {
        $total_bills_price = $total_bills_price + $b->total_bill_price;
        $total_customer_payment= $total_customer_payment + $b->payments;
    }
    
    if( $total_bills_price > $total_customer_payment ){
        $diff = $total_bills_price - $total_customer_payment ;
        $new_wallet = -$diff;         
    } else {
        $diff = $total_customer_payment - $total_bills_price  ;
        $new_wallet =  $diff;
    }
*/
    // new wallet ==> الحساب  النهائي من الفواتير
    // update customer set payment = payment + new_wallet

    
    if($bool){
        Customer::where('id', $customer->id)->increment('payment' , -$bill->total_bill_price );
        $customer = Customer::where("id",$bill->customer_id)->first();
        session()->put('print_bill', false);
    }

        return view('bills.bill_print',[
            'bill' => $bill,
            'customer'=>$customer,
            'sub_bills' => $sub_bills,
            'total'=>$bill->total_bill_price , // without transport
            'new_wallet'=>$customer->payment,
            'old_wallet'=>session('old_wallet'),
            "show"=>"any value"
            ]);

    }


    public function printBill2($bill_id)
    {

        $bill = DB::table('bills')->where('id',$bill_id )->first();

        $customer = Customer::where("id",$bill->customer_id)->first();

        $sub_bills = DB::table('sub_bills')->where('sub_bills.bill_id',$bill_id )->
        join('components', 'components.id', '=', 'sub_bills.sub_id')->
        join('sections', 'sections.id', '=', 'sub_bills.section_id')->
        select("sub_bills.*" , "components.name as sub_name" , "sections.name as section_name")->
        orderBy("sections.id")->
        orderByRaw('ISNULL(sub_bills.price)')->
        get();
 
        return view('bills.bill_print',[
            'bill' => $bill,
            'customer'=>$customer,
            'sub_bills' => $sub_bills,
            'total'=>$bill->total_bill_price 
            ]);

    }




public function pymentPage()
{
    // not paid bills
    $bills = Bills::get();
    $customers = Customer::get();

    return view('bills.pay',[
        'bills' => $bills,
        'customers'=>$customers,
        ]);
}
 
public function createPayment(Request $request)
{
    $customer_id = $request ['customer_id'];
    $payment = $request ['payment'];
    Customer::where('id', $customer_id)->increment('payment' , $payment);
    return redirect ( "/customer/details/$customer_id" ); 

}

public function deleteBill($bill_id , $customer_id){
//////////////////////////
DB::beginTransaction();

        try {
            DB::table('sub_bills')->where('bill_id', $bill_id)->delete();
            $bill = Bills::find($bill_id);
            $bill->delete();
        
        DB::commit();
        // all good
        } catch (\Exception $e) {
            DB::rollback();
            var_dump($e);
            // something went wrong
        }
/////////////////////////

return redirect ( "/customer/details/$customer_id" );





}

}
