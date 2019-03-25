<?php
/**
 * Created by PhpStorm.
 * User: dwany
 * Date: 4/13/2017
 * Time: 20:19
 */

namespace App\Observers;

use Hashids\Hashids;
use App\Product;


class ProductObserver
{



    /**
     * Listen to the Product created event.
     *
     * @param  Product $product
     * @return void
     */
    public function created(Product $product)
    {
        $hashids = new Hashids('', 8);
        $product->hash = $hashids->encode($product->id, rand(1, 2000));
        $product->save();
    }

    /**
     * Listen to the Product deleting event.
     *
     * @param  Product $product
     * @return void
     */
    public function deleting(Product $product)
    {
        //
    }

    /**
     * Listen to the Product deleting event.
     *
     * @param  Product $product
     * @return void
     */
    public function creating(Product $product)
    {
        //
    }

    /**
     * Listen to the Product deleting event.
     *
     * @param  Product $product
     * @return void
     */
    public function updating(Product $product)
    {
        //dd($product->getDirty());
    }

    /**
     * Listen to the Product deleting event.
     *
     * @param  Product $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }
}