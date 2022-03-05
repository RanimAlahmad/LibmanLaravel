<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;
use Kouja\ProjectAssistant\Traits\ModelTrait;
use Illuminate\Support\Facades\DB;
use App\Models\BookCategorie;
use App\Models\BookAuthor;

//mais mahrouseh
class Book extends BaseModel
{
    use HasFactory, SoftDeletes, ModelTrait;

    protected $fillable = ['id', 'name', 'picture', 'describe', 'price',];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at',];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'book_categories', 'book_id', 'categorie_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }

    public function bookauthors()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function bookcategories()
    {
        return $this->hasMany(BookCategorie::class);
    }

    public function addBook($request)
    {
        $picture = $request->file('picture');
        if ($request->hasFile('picture')) {
            $picturename = rand() . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path('images/BookImages'), $picturename);
            $created = $this->create([
                'name' => $request->name,
                'picture' => $picturename,
                'describe' => $request->describe,
                'price' => $request->price,
            ]);
        }
        return $created;
    }

    public function allBook()
    {
        $books = $this->select('id', 'name', 'picture', 'price')
            ->with(['bookcategories' => function ($q) {
                $q->join('categories', 'categories.id', '=', 'book_categories.categorie_id')
                    ->select('categories.name', 'book_id');
            }])->get();

        return collect($books)->each(function ($book) {
            $book['rate'] = collect($book['rates'])->avg('rate');
            unset($book['rates']);
        });

    }

    //Created By Ranim

    public function filterBooks($lowPrice, $highPrice, $rate, $authorId, $category)
    {
        $books = $this->getData(
            function ($query) use ($lowPrice, $highPrice, $authorId, $category) {
                return $query
                    ->when($lowPrice, function ($query) use ($lowPrice) {
                        return $query->where('price', '>=', $lowPrice);
                    })
                    ->when($highPrice, function ($query) use ($highPrice) {
                        return $query->where('price', '<=', $highPrice);
                    })
                    ->when($authorId, function ($query) use ($authorId) {
                        return $query->whereHas('bookauthors', function ($query) use ($authorId) {
                            return $query->where('author_id', $authorId);
                        });
                    })
                    ->when($category, function ($query) use ($category) {
                        return $query->whereHas('bookcategories', function ($query) use ($category) {
                            return $query->whereIn('categorie_id', $category);
                        });
                    });
            }, ['rates', 'categories', 'authors']);

        collect($books)->each(function ($book) {
            $book['rate_avg'] = collect($book['rates'])->avg('rate');
            unset($book['rates']);
        });

        if ($rate) {
            $books = collect($books)->filter(function ($book) use ($rate) {
                return $book['rate_avg'] >= $rate;
            });
        }

        return $books->values();
    }

   public function addBookWith($request){
    $picture = $request->file('picture');
    if($request->hasFile('picture')){
        $picturename = rand().'.'.$picture->getClientOriginalExtension();
        $picture->move(public_path('images/BookImages'),$picturename);
        $created = $this->create([
            'name' => $request->name,
            'picture' => $picturename,
            'describe' => $request->describe,
            'price' => $request->price,
        ]);}
        $bookID = $created->id;
        $categories = $request->categories;
        $authors = $request->authors;
        foreach($categories as $categorie){
            BookCategorie::create([
                'book_id' => $bookID,
                'categorie_id' => $categorie,
            ]);
        }
        foreach($authors as $author){
            BookAuthor::create([
                'book_id' => $bookID,
                'author_id' => $author,
            ]);
        }
        return $created;
   }

   public function specificBook($id){
   $books =  $this->select('id','name','picture','price','describe')->where('id', $id)
    ->with(['bookcategories' => function($q){
        $q ->join('categories', 'categories.id', '=', 'book_categories.categorie_id')
           ->select('categories.name','book_id');
    }])
    ->with(['bookauthors' => function($q){
        $q ->join('authors', 'authors.id', '=', 'book_authors.author_id')
           ->select('authors.name','book_id');
    }])->get();

    return collect($books)->each(function($book){
        $book['rate'] = collect($book['rates'])->avg('rate');
        unset($book['rates']);
    });
   }


}
