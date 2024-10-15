<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="/products/add/submit" method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Quantity: <input type="number" name="quantity" required></label><br>
        <label>Price: <input type="text" name="price" required></label><br>
        <button type="submit">Add</button>
    </form>
    <a href="/products">Back to product list</a>
</body>
</html>
