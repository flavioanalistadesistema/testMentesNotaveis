<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\AddressUser;
use App\Models\StateUser;
use App\Models\Address;
use App\Models\Cities;
use App\Models\States;
use App\Models\User;
use Exception;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    /**
     * @var $userService
     */
    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

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
        $data = $request->only([
            'name',
            'email',
            'password'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->userService->saveUserData($data);
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'error' => $th->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

        // DB::beginTransaction();

        // $reqUser = $request->all();
        // $user = new User();
        // $user->name = $reqUser['name'];
        // $user->email = $reqUser['email'];
        // $user->password = $reqUser['password'];

        // if ($user->save()) {
        //     $userId = $user->id;

        //     $state = States::where('uf', $reqUser['uf'])->get();
        //     $arrayState = json_decode($state, true);
        //     $stateId = $arrayState[0]['id'];
        //     if ($stateId) {
        //         $city = new Cities();
        //         $city->user_id = $userId;
        //         $city->state_id = $stateId;
        //         $city->city = $reqUser['city'];
        //         $city->district = $reqUser['district'];

        //         if ($city->save()) {
        //             $cityId = $city->id;

        //             $address = new Address();
        //             $address->user_id = $userId;
        //             $address->state_id = $stateId;
        //             $address->city_id = $cityId;
        //             $address->address = $reqUser['address'];
        //             $address->number = $reqUser['number'];

        //             if ($address->save()) {
        //                 $addressId = $address->id;
        //                 $addressUser = new AddressUser();
        //                 $addressUser->user_id  = $userId;
        //                 $addressUser->state_id  = $stateId;
        //                 $addressUser->city_id   = $cityId;
        //                 $addressUser->address_id = $addressId;
        //                 $resp = $addressUser->save();
        //                     if (isEmpty($resp)) {
        //                         throw new Exception('Seu registro foi cadastro com sucesso!!!');
        //                     } else {
        //                         DB::rollBack();
        //                         throw new Exception('Não foi possivel registrar seu cadastro');
        //                     }
        //             } else {
        //                 DB::rollBack();
        //                 throw new Exception('Não foi possivel cadastrar o endereço');
        //             }
        //         } else {
        //             DB::rollBack();
        //             throw new Exception('Não foi possivel gravar a cidade');
        //         }
        //     }else {
        //         DB::rollBack();
        //         throw new Exception('Estado não existe');
        //     }
        // }
        // else {
        //     throw new Exception('Não foi possivel cadastrar Usuário');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StateUser  $stateUser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = AddressUser::with('user')->findOrFail(1);

        $result = json_decode($user, true);
        var_dump($result);
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
