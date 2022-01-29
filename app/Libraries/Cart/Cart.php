<?php


namespace App\Libraries\Cart;


use App\Models\DistributorProduct\DistributorProduct;

class Cart
{
    /**
     * @return boolean
     */
    public static function isEmpty()
    {
        return empty(self::cartGet());
    }

    /**
     * @return float
     */
    public static function totalPrice()
    {
        $total = 0;

        if (self::isEmpty()) {
            return $total;
        }

        $cart = self::cartGet();

        if (!is_array($cart)) {
            return $total;
        }

        foreach ($cart as $product) {
            $total += $product['price'] * $product['quantity'];
        }

        return $total;
    }

    /**
     * @return array
     */
    public static function getCart()
    {
        $cart = self::cartGet();

        return is_array($cart) ? $cart : [];
    }

    /**
     * @return void
     */
    public static function clearCart()
    {
        self::cartPut([]);
    }

    /**
     * @param integer $productId
     * @return boolean
     */
    public static function addProduct($productId)
    {
        $productId = (int)$productId;

        return !self::hasProduct($productId) ? self::createProduct($productId) : self::incrementProduct($productId);
    }

//    /**
//     * @param integer $productId
//     * @param integer $quantity
//     * @return boolean
//     */
//    public static function updateProduct($productId, $quantity)
//    {
//        $productId = (int)$productId;
//        $quantity = (int)$quantity;
//
//        if (!self::hasProduct($productId)) {
//            return false;
//        }
//
//        $cart = self::getCart();
//        $cart[$productId]['quantity'] = $quantity;
//        self::cartPut($cart);
//
//        session()->flash('success', 'Cart updated successfully');
//
//        return true;
//    }

    /**
     * @param integer $productId
     * @return boolean
     */
    public static function removeProduct($productId)
    {
        $productId = (int)$productId;

        if (!self::hasProduct($productId)) {
            return false;
        }

        $cart = self::getCart();
        unset($cart[$productId]);
        self::cartPut($cart);

        session()->flash('success', 'Product removed successfully');
        return true;
    }

    /**
     * @param integer $productId
     * @return boolean
     */
    private static function hasProduct($productId)
    {
        $cart = self::getCart();

        return array_key_exists($productId, $cart);
    }

    /**
     * @param integer $productId
     * @return boolean
     */
    private static function createProduct($productId)
    {
        $distributorProduct = DistributorProduct::find($productId);

        if (!$distributorProduct) {
            session()->flash('danger', 'Product has not been found!');
            return false;
        }

        $cart = self::getCart();
        $cart[$distributorProduct->id] = self::prepareProduct($distributorProduct);

        self::cartPut($cart);

        session()->flash('success', 'Product added to cart successfully!');
        return true;
    }

    /**
     * @param integer $productId
     * @return boolean
     */
    private static function incrementProduct($productId)
    {
        $cart = self::getCart();
        $cart[$productId]['quantity']++;

        self::cartPut($cart);

        session()->flash('success', 'Product incremented in cart successfully!');
        return true;
    }

    /**
     * @param DistributorProduct $distributorProduct
     * @return array
     */
    private static function prepareProduct($distributorProduct)
    {
        $articleDetails = $distributorProduct->articleDetails();
        $articleThumbnail = $articleDetails->thumbnails()->first();

        return [
            'id' => $distributorProduct->id,
            'articleId' => $articleDetails->articleId,
            'title' => $articleDetails->articleName,
            'price' => $distributorProduct->price,
            'quantity' => 1,
            'thumbnail' => $articleThumbnail
                ? asset('assets/articles/' . $articleThumbnail->assetDocumentName)
                : asset('images/products/product-1-245x245.jpg')
        ];
    }

    /**
     * @return array
     */
    private static function cartGet()
    {
        return session()->get('cart');
    }

    /**
     * @param array $cart
     * @return void
     */
    private static function cartPut($cart)
    {
        session()->put('cart', $cart);
    }
}
