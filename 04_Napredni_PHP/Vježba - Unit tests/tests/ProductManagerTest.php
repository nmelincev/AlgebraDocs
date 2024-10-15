<?php

use PHPUnit\Framework\TestCase;
use Tkescec\Vjezba\ProductManager;

class ProductManagerTest extends TestCase
{
    private $productManager;

    protected function setUp(): void
    {
        $this->productManager = new ProductManager();
    }

    // testovi sa predavanja

    public function testGetAllProducts()
    {
        $this->productManager->addProduct('A1', 'Product 1', 10.0);
        $this->productManager->addProduct('A2', 'Product 2', 20.0);
        $products = $this->productManager->getAllProducts();

        $this->assertCount(2, $products);
        $this->assertArrayHasKey('A1', $products);
        $this->assertArrayHasKey('A2', $products);
    }

    public function testAddProduct()
    {
        $this->productManager->addProduct('A1', 'Product 1', 10.0);

        $this->assertArrayHasKey('A1', $this->productManager->getAllProducts());
        $this->assertIsArray($this->productManager->getProduct('A1'));

    }

    public function testAddProductWithExistingId()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Product with this ID already exists.');

        $this->productManager->addProduct('A1', 'Product 1', 10.0);
        $this->productManager->addProduct('A1', 'Product 2', 20.0);
    }

    // novo dodani testovi

    public function testUpdateProduct(){
        $this->productManager->addProduct('1', 'Proizvod', 50);
        $this->productManager->updateProduct('1', 'Ažurirani proizvod', 100);
        $proizvod = $this->productManager->getProduct('1');

        $this->assertNotNull($proizvod);
        $this->assertEquals('Ažurirani proizvod', $proizvod['name']);
        $this->assertEquals(100, $proizvod['price']);
    }

    public function testUpdateProductThrowsExceptionIfProductNotFound(){
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Product not found');

        $this->productManager->updateProduct('1', 'Ažurirani proizvod', 100);
    }

    public function testRemoveProduct(){
        $this->productManager->addProduct('1', 'Proizvod', 50);
        $this->productManager->removeProduct('1');
        $proizvod = $this->productManager->getProduct('1');

        $this->assertNull($proizvod);
    }

    public function testRemoveProductThrowsExceptionIfProuctNotFound()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Product not found.");

        $this->productManager->removeProduct('1');
    }

    public function testGetProduct(){
        $this->productManager->addProduct('1', 'Proizvod', 50);
        $proizvod = $this->productManager->getProduct('1');

        $this->assertNotNull($proizvod);
        $this->assertEquals('Proizvod', $proizvod['name']);
        $this->assertEquals(50, $proizvod['price']);
    }

    public function testGetProductReturnsNullIfNotFound() {
        $proizvod = $this->productManager->getProduct('1');
        $this->assertNull($proizvod);
    }

    public function testGetAllProductsReturnsEmptyArrayIfNoProducts()
    {
        $proizvodi = $this->productManager->getAllProducts();
        $this->assertEmpty($proizvodi);
    }
}