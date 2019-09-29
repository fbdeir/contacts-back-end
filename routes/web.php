<?php
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('user/{id}', function ($id) {
    //$contact = DB::select('select * from contacts where id=?', [$id]);
    //Using the below instead to protect agains SQL injection:
    $contact = DB::table('contacts')->where('id', $id)->get();
    return $contact;
});
Route::get('user', function () {
    $contacts = DB::table('contacts')->get();
    return $contacts;
});

Route::post('user', function (Request $request) {
    $contact =(object) $request->json()->all();
    $firstName=$contact->firstName;
    $lastName=$contact->lastName;
    $email=$contact->email;
    $phoneNumber=$contact->phoneNumber;
    $id =DB::table('contacts')->insertGetId(
      ['firstName'=> $firstName, 'lastName'=>$lastName, 'phoneNumber'=>$phoneNumber, 'email' => $email]
    );
    return $id;
});
