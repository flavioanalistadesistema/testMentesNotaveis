<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\AddressUser;
use App\Models\Cities;
use App\Models\States;
use App\Models\StateUser;
use App\Models\User;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqUser = $request->all();
        $user = new User();
        $user->name = $reqUser['name'];
        $user->email = $reqUser['email'];
        $user->password = $reqUser['password'];
        $user->save();
        $userId = $user->id;

        $state = States::where('uf', $reqUser['uf'])->get();
        $arrayState = json_decode($state, true);
        $stateId = $arrayState[0]['id'];

        $city = new Cities();
        $city->users_id = $userId;
        $city->city = $reqUser['city'];
        $city->district = $reqUser['district'];
        $city->save();
        $cityId = $city->id;

        $address = new Address();
        $address->users_id = $userId;
        $address->address = $reqUser['address'];
        $address->number = $reqUser['number'];
        $address->save();
        $addressId = $address->id;

        $addressUser = new AddressUser();
        $addressUser->users_id  = $userId;
        $addressUser->state_id  = $stateId;
        $addressUser->city_id   = $cityId;
        $addressUser->address_id = $addressId;
        $addressUser->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function show(StateUser $stateUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function edit(StateUser $stateUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StateUser $stateUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(StateUser $stateUser)
    {
        //
    }
}
