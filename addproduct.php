<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Add New Product</h1>
    <form action="process_product.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control <?php if(isset($errors['name'])) echo 'is-invalid'; ?>" id="name" name="name" required>
            <?php if(isset($errors['name'])) echo '<div class="invalid-feedback">' . $errors['name'] . '</div>'; ?>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control <?php if(isset($errors['description'])) echo 'is-invalid'; ?>" id="description" name="description" required></textarea>
            <?php if(isset($errors['description'])) echo '<div class="invalid-feedback">' . $errors['description'] . '</div>'; ?>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control <?php if(isset($errors['price'])) echo 'is-invalid'; ?>" id="price" name="price" required>
            <?php if(isset($errors['price'])) echo '<div class="invalid-feedback">' . $errors['price'] . '</div>'; ?>
        </div>
        <div class="form-group">
            <label for="icon">Product Image:</label>
            <input type="file" class="form-control-file <?php if(isset($errors['icon'])) echo 'is-invalid'; ?>" id="icon" name="icon" required>
            <?php if(isset($errors['icon'])) echo '<div class="invalid-feedback">' . $errors['icon'] . '</div>'; ?>
        </div>
        <div class="form-group">
            <label for="gameplay">Gameplay:</label>
            <textarea class="form-control" id="gameplay" name="gameplay"></textarea>
        </div>
        <div class="form-group">
            <label for="engine">Engine:</label>
            <input type="text" class="form-control" id="engine" name="engine">
        </div>
        <div class="form-group">
            <label for="platform">Platform:</label>
            <input type="text" class="form-control" id="platform" name="platform">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
