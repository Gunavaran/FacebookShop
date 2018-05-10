<?php
/**
 * Created by PhpStorm.
 * User: Start
 * Date: 5/10/2018
 * Time: 7:23 PM
 */

namespace Tests\Unit;


use App\Http\Controllers\ShopController;
use App\Http\Models\Category;
use App\Http\Models\Product;
use App\Http\Models\Shop;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ProductTest extends TestCase
{

    use DatabaseTransactions;

    public function test_storeCategory_removeCategory()
    {
        Event::fake();
        Session::put('username', 'gunavaran');
        $request = Request::create('/store', 'POST', [
            'shop_name' => 'gunasShop',
            'description' => 'blah',
            'contact_no' => '0775469856',
            'email' => 'guna@gmail.com',
            'resid-no' => '56',
            'street' => 'kaladdy',
            'city' => 'jaffna',
            'country' => 'japan',
            'zip-code' => '40000',
        ]);

        $controller = new ShopController();
        $controller->saveShopData($request);

        $request2 = Request::create('/store', 'POST', [
            'category_name' => 'test category',
        ]);

        $productcontroller = new ProductController();

        $productcontroller->storeCategory($request2);

        $this->assertDatabaseHas('category', [
            'category_name' => 'test category',
        ]);
        $shop = new Shop();
        $shopId = $shop->getShopDetails(Session::get('username'), 'shop_id');
        $category = new Category();
        $categories = $category->getCategories($shopId);

        foreach ($categories as $category) {
            $this->assertEquals('test category', $category->category_name);
        }

        $productcontroller->removeCategory($request2);
        $this->assertDatabaseMissing('category', [
            'category_name' => 'test category'
        ]);


    }

    public function test_getProducts_getProductDetails()
    {
        $product = new Product();

        $product->product_name = 'test product';
        $product->product_category = 'test category';
        $product->description = 'test description';
        $product->size = '10';
        $product->price = '56.00';
        $product->currency_type = 'test currency';
        $product->items_available = '10';
        $product->availability = 'yes';
        $product->file_name = 'test.jpg';
        $product->keywords = 'test,keywords';
        $product->shop_id = '1';

        $product->save();

        $products = $product->getProducts(1);
        foreach ($products as $product) {
            $this->assertEquals('test product', $product->product_name);

            $productId = $product->product_id;

            $newProduct = new Product();
            $productName = $newProduct->getProductDetails($productId, 'product_name');
            $this->assertEquals('test product', $productName);

        }

    }


}