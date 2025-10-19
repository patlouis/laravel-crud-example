<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Product</h1>
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        @method('post')
        <div>
            <label>Name:</label>
            <input type="text" name="name" placeholder="Product Name" required></input>
        </div>
                <div>
            <label>Description:</label>
            <input type="text" name="description" placeholder="Name"></input>
        </div>
        <div>
            <label>Category:</label>
            <input type="text" name="category" placeholder="Category" required></input>
        </div>
        <div>
            <label>Price:</label>
            <input type="number" name="price" placeholder="Price" required></input>
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" name="stock" placeholder="Stock" required></input>
        </div>
        <div>
            <button type="submit">Save</button>
    </form>
</body>
</html>