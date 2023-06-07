<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\contact;
use App\Models\deposite;
use App\Models\withdraw;
use GuzzleHttp\Middleware;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index($id){
        if($id!=auth()->id()){
            abort(403,'Unauthorized access!');
        }
        return view('admin.menu',['users'=>User::latest()->get()]);
    }
    public function authonticate(Request $request){
       $fild= $request->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ]);
        if(auth()->attempt($fild)){
            $user=User::find(auth()->id());
            if(!empty($user->auth&&$user->auth=='admin')){
                $request->session()->regenerate();
                return Redirect::route('admin.menu',auth()->id())->with(['success'=>'welcome back ser!']);
            }else{
                return back()->withErrors(['email'=>'invalid credentials'])->onlyInput('email');
            }
        }
        return back()->withErrors(['email'=>'invalid creadentials'])->onlyInput('email');
       
    }

    public function transactions($id){
        if(auth()->id()!=$id){
            abort(403,'Unauthorized access');
        }
        $user=User::latest()->get();
        $transaction=transaction::latest()->get();
        return view('admin.transaction',['users'=>$user,'transactions'=>$transaction]);
    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();
        
        return Redirect::route('welcome')->with('warning','you are now loged out!');
    }

    public function deposite($id){
        if(auth()->id()!=$id){
            abort(403,'Unauthorized access!');
        }
        $users=User::latest()->get();
        $deposite=deposite::latest()->get();
        return view('admin.deposite',['users'=>$users,'deposites'=>$deposite]);
    }

    public function withdrawals($id){
        if(auth()->id()!=$id){
            abort(403,'Unauthorized access');
        }
        $users=User::latest()->get();
        $withdraws=withdraw::latest()->get();
        return view('admin.withdrawals',['users'=>$users,'withdraws'=>$withdraws]);
    }

    public function banUser($adminId,$userId){
        try{
            DB::beginTransaction();
            if(auth()->id()!=$adminId){
                abort(403,'Unauthorized access');
            }
            $fild['status']='baned';
            $user=User::find($userId);
            $user->update($fild);
            DB::commit();
            return back()->with(['success'=>'the user is baned from now on!']);
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with(['warning'=>'unable to handle the request due to internal error!']);
        }
    }

    public function allow($adminId, $userId){
        try{
            DB::beginTransaction();
            if(auth()->id()!=$adminId){
                abort(403,'Unauthorized access!');
            }
            $fild['status']='active';
            $user=User::find($userId);
            $user->update($fild);
            DB::commit();
            return back()->with(['success'=>'the user account is now allowed!']);
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with(['warning'=>'unable to handle the request due to internal error!']);
        }
    }

    public function transactionDelete($adminId,$tId){
        $transaction=transaction::find($tId);
        if(auth()->id()!=$adminId){
            abort(403,'unauthorized access!');
        }
        $transaction->delete();
        return back()->with(['success'=>'the transaction is deleted successfully']);
    }

    public function deleteWithdraw($adminId,$wId){
        try{
            DB::beginTransaction();
            $witdraw=withdraw::find($wId);
            if(auth()->id()!=$adminId){
                abort(403,'Unauthorized access!');
            }
            $user=User::find($witdraw->user_id);
            $newUserBalance['balance']=$user->balance+$witdraw->ammount;
            $user->update($newUserBalance);
            $witdraw->delete();
            DB::commit();
            return back()->with(['success'=>'the user withdraw is deleted successfully']);
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with(['warning'=>'unable to handle the request due to internal problem!']);
        }
    }

    public function grantDeposite($adminId,$dId){
        try{
            DB::beginTransaction();
            $deposite=deposite::find($dId);
            if(auth()->id()!=$adminId){
                abort(403,'Unauthorized access!');
            }
            $user=User::find($deposite->user_id);
            $userNewBalance['balance']=$user->balance+$deposite->ammount;
            $user->update($userNewBalance);
            $deposite->delete();
            DB::commit();
            return back()->with(['success'=>'the deposition process is done correctly!']);
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with(['warning'=>'unable to handle the request due to internal problem!']);
        }
    }
    

    public function revockDeposite($adminId,$dId){
        try{
            DB::beginTransaction();
            if(auth()->id()!=$adminId){
                abort(403,'Unauthorized access!');
            }
            $depostie=deposite::find($dId);
            $depostie->delete();
            DB::commit();
            return back()->with(['success'=>'the deposite is forbiden successfully!']);
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with(['warning'=>'unable to handle the request due to internal problem!']);
        }
    }

    public function issues($id){
        if($id!=auth()->id()){
            abort(403,'Unauthorized access!');
        }
        $contacts=contact::latest()->get();
        return view('admin.adminComments',['conmments'=>$contacts]);
    }

    public function show($adminId,$cId){
        if($adminId!=auth()->id()){
            abort(403,'Unauthorized access!');
        }
        $comment=contact::find($cId);
        return view('admin.commentDetails',['comment'=>$comment]);
    }
    public function addressIssue($adminId,$issueId){
        if($adminId!=auth()->id()){
            abort(403,'Unauthorized access!');
        }
        $issue=contact::find($issueId);
        $issue->delete();
        return Redirect::route('admin.issues',auth()->user()->id)->with(['success'=>'user issue addressed!']);
    }
}
