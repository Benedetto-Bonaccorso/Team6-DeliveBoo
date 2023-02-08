<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Restaurant;
use App\Models\Tipology;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $tipologies = Tipology::orderBYDesc('id')->get();

        return view('auth.register',compact('tipologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

     
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name_restaurant' => ['required', 'string', 'max:100'],
            'phone' => ['string', 'max:15'],
            'address' => ['string', 'max:150']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       $restaurant= Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->name_restaurant,
            'slug' => Str::slug($request->name_restaurant),
            'phone_number' => $request->phone,
            'piva' => $request->piva,
            'address' => $request->address,
            'cover_image' => ''
        ]);

        $types_ids = array();
        foreach ($request->types as $type =>$value) {
       
            $types_ids[$type]= $value;
          }

        foreach ($types_ids as $type_id) {
            
            DB::table('restaurant_tipology')->insert([
                'id_restaurant' =>  $restaurant->id,
                'id_tipology' =>$type_id
            ]);
        }
      
     

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}