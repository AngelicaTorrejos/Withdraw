<?php

//  <-- CONTROLLER - THE MIDDLE MAN

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request; // <-- handling http request in lumen
use App\Models\User; // <-- The model
use App\Traits\ApiResponser; // <-- use to standardized our code for api response

// use DB;  // <---if you're not using lumen eloquent you can use DB component in lumen

class UserController extends Controller
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
// GET

    public function all()
    {
        // eloquent style
        $users = User::all();

        // sql string as parameter (if nag use og DB)
        // $user = DB::connection('mysql')
        // ->select("Select * from tbluser");
        return response()->json($users, 200); // <-- before
        // return $this->successResponse($users);
    }

// GET (ID)
public function show($id)
{ 
    $user = User::findOrFail($id);
    return $this->successResponse($user);

}

// ADD
public function add(Request $request)
{
    
    $rules = [
        'Fullname' => 'required|max:20',
        'AccNum'=> 'required|numeric',
        'TransNum' => 'required|numeric|max:20',
        'Amount' => 'required|numeric',
        'Date'=> 'required',
        'Mode of Transaction' => 'required|max:20',
        'TransFees'=> 'required|numeric|max:20',
    ];
    $this->validate($request, $rules);

    $user = User::create($request->all());

    return $this->successResponse($user, Response::HTTP_CREATED);
}

// UPDATE
public function up(Request $request, $id)
{
    $rules = [
        'FullName' => 'required|max:20',
        'AccNum'=> 'required|numeric|max:20',
        'Balance' => 'required|numeric|max:20',
        'TransNum' => 'required|numeric|max:20',
        'Amount' => 'required|numeric|max:20',
        'Date and Time'=> 'required|numeric|max:20',
        'Mode of Transaction' => 'required|max:20',
        'TransFee'=> 'required|numeric|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);


    $user->fill($request->all());

    $user->save();

    return $user;
}

// DELETE

public function del($id)
{
    $user = User::findOrFail($id);
    $user->delete();
}

    // Index

public function index()
    {
        $users = User::all();

        return $this->successResponse($users);
    }
    
}