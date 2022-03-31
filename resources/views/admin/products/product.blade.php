<h1>Product Page</h1>

<div class="container">
    <div class="row">
        <div class="col-12"><?= $product->name ?></div>
        <div class="col-12"><?= $product->info ?></div>
        <div class="col-12"><?= $product->price ?></div>
        <div class="col-12"><?= $product->description ?></div>
        <div class="col-12"><?= $product->stock ?></div>
        <div class="col-12"><a href="/admin/products/edit/<?= $product->id ?>">Edit</a></div>

    </div>
</div>