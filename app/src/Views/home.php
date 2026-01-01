<?php

 /** @var \App\ViewModels\ProductsViewModel $vm */

require __DIR__ . '/partials/header.php';
require __DIR__ . '/partials/search.php';
?>

<div class="container my-4">


    <div class="row g-4">
        <?php foreach ($vm->products as $product) { ?>

            <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3 col-xxl-2" style="width: 18rem;">
                <div class="card h-100">
                    <img src="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top"
                        alt="...">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex w-100 justify-content-between align-items-start mb-2">
                            <span
                                class="badge bg-secondary"><?php echo htmlspecialchars($product->category ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            <p class="card-text text-end text-primary">
                                <?php echo htmlspecialchars('$' . number_format((float) $product->price, 2), ENT_QUOTES, 'UTF-8'); ?>
                            </p>
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="#" class="btn btn-primary btn-lg w-100 mt-auto">Buy</a>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>