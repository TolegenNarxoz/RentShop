<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{

    use HandlesAuthorization;

    public function rent(User $user, Product $product): bool
    {
        $productSub = $user->productsSubscribed()->where('product_id', $product->id)->first();
        $nowTime = Carbon::now()->addHours(6);
        return
              $productSub != null
              &&
              $productSub->pivot->created_at->addMinutes($productSub->pivot->day)->gte($nowTime);

//        return $user->productsSubscribed->contains($product->id);
    }
    public function viewAny(User $user): bool
    {

    }


    public function view(User $user, Product $product): bool
    {

    }


    public function create(User $user): bool
    {
        return $user->role->name != 'user';
    }


    public function update(User $user, Product $product): bool
    {
        return ($user->role->name !=  'user');
    }


    public function delete(User $user, Product $product): bool
    {
        return ($user->role->name == 'admin');
    }


    public function restore(User $user, Product $product): bool
    {

    }


    public function forceDelete(User $user, Product $product): bool
    {

    }
}
