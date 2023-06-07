<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\company;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{

        // this will make the payment and return the approprate information to the user
        public function pay($user_id,$company_id,Request $request){
            try{
                DB::beginTransaction();
                $user=User::find($user_id);
                $company=company::find($company_id);
                $ammount=$request->validate([
                    'ammount'=>['required','min:0']
                ]);
                if($user->status=='baned'){
                    return Redirect::route('user.menu')->with(['warning'=>'sorry your account is forbeden! consolt the admin!']);
                }
                if($ammount['ammount']>$user->balance){
                    return back()->withErrors(['ammount'=>'insuffisent balance!'])->onlyInput('ammount');
                }
                $userNewBalance['balance']=$user->balance-$ammount['ammount'];
                $companyNewBalance['balance']=$company->balance+$ammount['ammount'];
                $user->update($userNewBalance);
                $company->update($companyNewBalance);
                // the transaction fild must be filled now
                $transaction['user_id']=$user->id;
                $transaction['transactionTime']=date('Y/m/d h:i:s');
                $transaction['ammount']=$ammount['ammount'];
                $transaction['type']='payment';
                $transaction['destinationOrFrom']=$company->accountNumber;
                transaction::create($transaction);
                DB::commit();
                return Redirect::route('user.payment')->with(['success'=>'the payment is done successfully']);
            }catch(\Exception $e){
                DB::rollBack();
                return Redirect::route('c5rogers')->with('warning','unable to handle the payment system due to internal problem');
            }
            
        }
    
        // this is private function used to make some randome acount
        private function makeAccount($number){
            $string='0123456789';
            $array=str_split($string);
            $length=sizeof($array)-1;
            $flag=false;
            $generated="";
            do{
                for($i=0;$i<=$number;$i++){
                    $randome=rand(0,$length);
                    $generated+=$array[$randome];
                }
                $user=DB::table('companies')->where('accountNumber',$generated)->first();
                if(!empty($user)){
                    $flag=true;
                }
            }while($flag);
            $generated="COMP".$generated;
            return $generated;
           }
}
