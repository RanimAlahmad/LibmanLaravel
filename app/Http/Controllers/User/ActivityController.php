<?php

namespace App\Http\Controllers\User;
;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\CreateFilterRequest;
use App\Http\Requests\Activity\FavoriteActivateRequest;
use App\Http\Requests\Activity\GetSearchItemsRequest;
use App\Http\Requests\Activity\updateOrCreateRateRequest;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

//Ranim
class ActivityController extends Controller
{
    private $favorite, $rate, $order, $user, $book, $auhor;

    public function __construct(Favorite $favorite, Rate $rate, Order $order, User $user, Book $book, Author $auhor)
    {
        $this->favorite = $favorite;
        $this->rate = $rate;
        $this->order = $order;
        $this->user = $user;
        $this->book = $book;
        $this->auhor = $auhor;
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

    public function getOrderUser()
    {
        $user = $this->user->findData(['id' => Auth::id()], '*', ['orders.book']);
        return ResponseHelper::select($user);
    }

    public function getOrder()
    {
        $user = $this->user->getData([], ['orders.book']);
        return ResponseHelper::select($user);
    }

    public function filter(CreateFilterRequest $request)
    {
        $data = $request->validated();
        $lowPrice = $request->get('lowPrice');
        $highPrice = $request->get('highPrice');
        $rate = $request->get('rate');
        $authorId = $request->get('author_id');
        $category = $request->get('category');

        $books = $this->book->filterBooks($lowPrice, $highPrice, $rate, $authorId, $category);

        if ($books == null) {
            return ResponseHelper::insertingFail();
        }
        return ResponseHelper::select($books);
    }

    public function searchItemsNoAuth(GetSearchItemsRequest $request)
    {
        $data = $request->validated();


        $books = $this->book->getData(function ($query) use ($data) {
            return $query
                ->where('name', 'like', '%' . $data['name'] . '%')
                ->orWhereHas('authors', function ($query) use ($data) {
                    return $query->where('name', 'like', '%' . $data['name'] . '%');
                });
        }, ['rates', 'categories', 'authors']);

        $books = collect($books)->each(function ($book) {
            $book['rate_avg'] = collect($book['rates'])->avg('rate');
            unset($book['rates']);
        });
        if ($books == null) {
            return ResponseHelper::insertingFail();
        }

        return ResponseHelper::select($books);

    }
}
