<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>
    <p>Are you sure you want to delete the product "<?php echo $product['name']; ?>"?</p>
    <form action="/products/delete/submit" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <button type="submit">Yes, Delete</button>
    </form>
    <a href="/products">No, Go Back</a>
</body>
</html>
