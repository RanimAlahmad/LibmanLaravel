<?php

namespace App\Http\Controllers\User;
;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\FavoriteActivateRequest;
use App\Http\Requests\Activity\updateOrCreateRateRequest;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

//Ranim
class ActivityController extends Controller
{
    private $favorite, $rate, $order, $user;

    public function __construct(Favorite $favorite, Rate $rate, Order $order, User $user)
    {
        $this->favorite = $favorite;
        $this->rate = $rate;
        $this->order = $order;
        $this->user = $user;
    }

    public function favorite(FavoriteActivateRequest $request)
    {
        $data = $request->validated();
        $favorite = $this->favorite->favoriteActivate($data);
        if ($favorite == null) {
            return ResponseHelper::creatingFail();
        }
        return ResponseHelper::create();
    }

    public function getFavorite()
    {
        $user = $this->user->getData(['id' => Auth::id()], ['favorites']);
        return ResponseHelper::select($user);
    }

    public function rate(updateOrCreateRateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $filter = $data;
        unset($filter['rate']);
        $Rate = $this->rate->updateOrCreateData($filter, $data);
        if ($Rate == null) {
            return ResponseHelper::creatingFail();
        }
        return ResponseHelper::create();
    }

    public function createOrder(CreateOrderRequest $request)
    {
        $data = $request->validated();

        $user = $this->user->findData(['id' => Auth::id()]);
        if ($user['lat'] == null || $user['lang'] == null)
            return ResponseHelper::authorizationFail();

        $order = $this->order->orderActivate($data);
        if ($order == null) {
            return ResponseHelper::insertingFail();
        }
        return ResponseHelper::insert();
    }

    public function getOrder()
    {
        $user = $this->user->getData(['id' => Auth::id()], ['orders.book']);
        return ResponseHelper::select($user);
    }
}
