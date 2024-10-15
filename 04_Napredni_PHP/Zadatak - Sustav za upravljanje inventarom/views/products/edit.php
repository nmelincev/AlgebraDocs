<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="/products/edit/submit" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label>Name: <input type="text" name="name" value="<?php echo $product['name']; ?>" required></label><br>
        <label>Quantity: <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required></label><br>
        <label>Price: <input type="text" name="price" value="<?php echo $product['price']; ?>" required></label><br>
        <button type="submit">Edit</button>
    </form>
    <a href="/products">Back to product list</a>
</body>
</html>
