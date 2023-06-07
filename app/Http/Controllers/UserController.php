<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\company;
use App\Models\deposite;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Validation\Rule;
use App\Models\withdraw;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class UserController extends Controller
{
    //


    // this will return the signup page for the user
    public function signup(){
        return view('user.signup');
    }

    public function login(){
        return view('user.login');
    }


    // this will return the menu page for the user
    public function menu(){
        $user=User::find(auth()->user()->id);
        return view('pages.menu',['user'=>$user]);
    }


    // this will store the new user information and let the user login to tha website
    public function store(Request $request){
        $fild=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>['required','min:8','confirmed'],
            'phoneNumber'=>['required','unique:users,phoneNumber','min:0'],
            'sex'=>'required',
            'location'=>'required'
        ]);

        $fild['accountNumber']=$this->makeAccount(12);
        $fild['password']=bcrypt($fild['password']);
        if($request->hasFile('profile')){
            $fild['profile']=$request->file('profile')->hashName();
            $request->file('profile')->store('users','public');
        }
        $fild['status']="active";
        $fild['auth']='user';
        $user= User::create($fild);
        auth()->login($user);
        // return redirect('/c5rogers')->with(['success'=>'you are sign up and loged in now!','user'=>$user]);
        return Redirect::route('c5rogers')->with(['success'=>'you are sing up and loged in now']);
    }

    // this will authonticate the user to login
    public function authonticate(Request $request){
        $fild=$request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(auth()->attempt($fild)){
            $request->session()->regenerate();
            return Redirect::route('c5rogers')->with(['success'=>'welcome back ser!']);
        }
        return back()->withErrors(['email'=>'invallid creadentials'])->onlyInput('email');
    }

    // this will logut the user form the session
    public function logout(Request $request){
        $user=User::find(auth()->user()->id);
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();
        
        return Redirect::route('c5rogers')->with('warning','you are now loged out!');
    }


    // this will return the payment menu page to the user
    public function paymentMenu(){
        return view('user.paymentMenu');
    }


    // this will accept the auth id and return his transaction histry to it in table form
    public function histry($id){
        $user=User::find($id);
        return view('user.histry',['transactions'=>$user->transaction()->get(),'user'=>$user]);
    }

    //this will return the profile page for the user
    public function profile($id){
        $user=User::find($id);
        return view('user.profile',['user'=>$user]);
    } 

    // this will return the edit value of the user 
    public function profileEdit($id){
        $user=User::find($id);
        return view('user.edit',['user'=>$user]);
    }


    // this will update the user information
    public function updateProfile(Request $request,$id){
        $user=User::find($id);
        $request->validate([
            'name'=>'required'
        ]);
        $fild['name']=$request['name'];
        if($user->email!=$request['email']){
            $request->validate([
                'email'=>'required|email|unique:users,email'
            ]);
            $fild['email']=$request['email'];
        }
        if($user->phoneNumber!=$request['phoneNumber']){
            $request->validate([
                'phoneNumber'=>['required','unique:users,phoneNumber']
            ]);
            $fild['phoneNumber']=$request['phoneNumber'];
        }
        $request->validate([
            'location'=>'required'
        ]);
        $fild['location']=$request['location'];
        if($request->hasFile('profile')){
            $fild['profile']=$request->file('profile')->hashName();
            if($request->file('profile')->getError()!=0){
                return back()->withErrors(['profile'=>'unable to upload the image']);
            }
            if(!empty($user->profile)){
                File::delete(public_path('storage/users/'.$user->profile));
            }
            $request->file('profile')->store('users','public');
        }
        $user->update($fild);
        return Redirect::route('user.personalInfo',$user->id)->with(['user'=>$user,'success'=>'profile information is updated successfully!']);
    }


    // this will delete the transaction
    public function distroy($id){
        $transaction=transaction::find($id);
        if($transaction->user_id!=auth()->user()->id){
            abort(403,'Unauthorized activity');
        }
        // dd($transaction->user_id);
        $transaction->delete();
        return back()->with('success','transaction deleted successfully!');
    }

    // the followings are the payment page and there handles will as follows
    public function electriccity(User $user){
        $electric=company::where('serviceName','=','electric service provider')->first();
        return view('user.userPayment.electriccity',['user'=>$user,'company'=>$electric]);
    }
    public function dstv(User $user){
        $dstv=company::where('serviceName','=','dstv service provider')->first();
        return view('user.userPayment.dstv',['user'=>$user,'company'=>$dstv]);
    }
    public function internet(User $user){
        $internet=company::where('serviceName','=','internet service provider')->first();
        return view('user.userPayment.internet',['user'=>$user,'company'=>$internet]);
    }
    public function school(User $user){
        $school=company::where('serviceName','=','school service provider')->first();
        return view('user.userPayment.school',['user'=>$user,'company'=>$school]);
    }
    public function shoping(User $user){
        $shoping=company::where('serviceName','=','shoping service provider')->first();
        return view('user.userPayment.shoping',['user'=>$user,'company'=>$shoping]);
    }
    public function water(User $user){
        $water=company::where('serviceName','=','water service provider')->first();
        return view('user.userPayment.water',['user'=>$user,'company'=>$water]);
    }

    // this will return the withdraw page to the user
    public function withdraw($id){
        $user=User::find($id);
        return view('user.withdraw',['user'=>$user]);
        }

   //this will send the user the deposite ui
   public function deposite($id){
    $user=User::find($id);
    return view('user.deposite',['user'=>$user]);
   }
   

//   this will make the deposite happen 
   public function makeDeposite(Request $request,$id){
    try{
        DB::beginTransaction();
        $request->validate([
            'accountNumber'=>'required',
            'ammount'=>'required'
        ]);
        $user=User::find($id);
        if($user->status=='baned'){
            return Redirect::route('user.menu')->with(['warning'=>'sorry your account is forbeden! consolt the admin!']);
        }
        if($user->accountNumber!=$request['accountNumber']){
            return Redirect::route('user.menu')->with(['warning'=>'unauthorized activity!']);
        }
        $fild['user_id']=$user->id;
        $fild['ammount']=$request['ammount'];
        $transaction['user_id']=$fild['user_id'];
        $transaction['transactionTime']=date('Y/m/d h:i:s');
        $transaction['ammount']=$fild['ammount'];
        $transaction['type']='deposite';
        $transaction['destinationOrFrom']=$user->accountNumber;
        $deposite=deposite::create($fild);
        $t=transaction::create($transaction);
        DB::commit();
        return Redirect::route('user.menu')->with(['success'=>'deposite is successeded must be approved by the admin letter!']);
    }catch(\Exception $e){
        DB::rollBack();
        return Redirect::route('c5rogers')->with(['warning'=>'unable to make deposite due to internal error!']);
    }
   }
   


    // this will make the cashout and return with success message or warning message
    public function cashOut(Request $request,$id){
        try{
            DB::beginTransaction();
            $user=User::find($id);
            if(auth()->user()->id!=$user->id){
                abort(403,'Unauthorized access!');
            }
            $request->validate([
                'accountNumber'=>'required',
                'ammount'=>['required','min:0']
            ]);
            if($user->status=='baned'){
                return Redirect::route('user.menu')->with(['warning'=>'sorry your account is forbeden! consolt the admin!']);
            }
            if($request['accountNumber']!=$user->accountNumber){
                abort(403,'Unauthorized access!');
            }
            $fild['user_id']=$user->id;
            $fild['accountNumber']=$request['accountNumber'];
            $fild['ammount']=$request['ammount'];
            $fild['token']=$this->makeTooken(15);
            if($user->balance<$fild['ammount']){
                return back()->withErrors(['ammount'=>'inseficcent balance!'])->onlyInput('ammount');
            }
            $userNewBalance['balance']=$user->balance-$fild['ammount'];
            $user->update($userNewBalance);
            $transaction['user_id']=$fild['user_id'];
            $transaction['transactionTime']=date('Y/m/d h:i:s');
            $transaction['ammount']=$fild['ammount'];
            $transaction['type']='withdrawal';
            $transaction['destinationOrFrom']=$user->accountNumber;
            $t=transaction::create($transaction);
            $withdraw=withdraw::create($fild);
            DB::commit();
            return Redirect::route('user.menu')->with(['withdrawMessage'=>'token NB:'.$fild['token'].' can cash out it any where']);
        }catch(\Exception $e){
            DB::rollBack();
            return Redirect::route('user.menu')->with(['warning'=>'unable to handle the withdraw request due to internal error!']);
        }
    }


    // this one will return the transfer page to the user
    public function transfer($id){
        $user=User::find($id);
        return view('user.transfer',['user'=>$user]);
    }

    // this will make the transfer logic done
    public function makeTransfer(Request $request,$id){
        try{
        $request->validate([
            'destinationAccount'=>'required',
            'ammount'=>['required','min:0']
        ]);
        $user=User::find($id);
        if(auth()->user()->id!=$user->id){
            abort(403,'Unauthorized access!');
        }
        if($user->status=='baned'){
            return Redirect::route('user.menu')->with(['warning'=>'sorry your account is forbeden! consolt the admin!']);
        }
        if($user->balance<$request['ammount']){
            return back()->withErrors(['ammount'=>'insufficent balance!'])->onlyInput('ammount');
        }
        $for=DB::table('users')->where('accountNumber','=',$request['destinationAccount'])->first();
        if(empty($for)){
            return back()->withErrors(['destinationAccount'=>'Unrecognized Account!'])->onlyInput('destinationAccount');
        }
        if($user->id==$for->id){
            return Redirect::route('user.menu')->with(['warning'=>'Wrong operation']);
        }
        $userNewBalance['balance']=$user->balance-$request['ammount'];
        $antherUserNewBalance['balance']=$for->balance+$request['ammount'];

        // making transaction
        $transaction['user_id']=$user->id;
        $transaction['transactionTime']=date('Y/m/d h:i:s');
        $transaction['ammount']=$request['ammount'];
        $transaction['type']='transfer';
        $transaction['destinationOrFrom']=$for->accountNumber;
        $user->update($userNewBalance);
        $user2=User::find($for->id);
        $user2->update($antherUserNewBalance);
        $t=transaction::create($transaction);
        DB::commit();
        return Redirect::route('user.menu')->with(['success'=>'transfer complited successfully!']);
        }catch(\Exception $e){
            DB::rollBack();
            return Redirect::route('user.menu')->with(['warning'=>'unable to transfer due to internal server!']);
        }
    }

    // this will generate tooken used to make some withdraw
    private function makeTooken($number){
        $string='0123456789';
        $array=str_split($string);
        $leng=sizeof($array)-1;
        $flag=false;
        $generated="";
        do{
            for($i=0;$i<=$number;$i++){
                $randome=rand(0,$leng);
                $generated.=$array[$randome];
            }
            $withdraw=DB::table('withdraws')->where('token',$generated)->first();
            if(!empty($withdraw)){
                $flag=true;
            }
        }while($flag);
        return $generated;
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
                $generated.=$array[$randome];
            }
            $user=DB::table('users')->where('accountNumber',$generated)->first();
            if(!empty($user)){
                $flag=true;
            }
        }while($flag);
        $generated="USR".$generated;
        return $generated;
       }
}
