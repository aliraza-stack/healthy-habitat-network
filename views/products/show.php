<h1><?php echo htmlspecialchars($product->name); ?></h1>
<div class="card">
    <div class="card-body">
        <p><strong>Description:</strong> <?php echo htmlspecialchars($product->description); ?></p>
        <p><strong>Size/Quantity:</strong> <?php echo htmlspecialchars($product->size_quantity); ?></p>
        <p><strong>Health Benefits:</strong> <?php echo htmlspecialchars($product->health_benefits); ?></p>
        <p><strong>Price Category:</strong> <?php echo htmlspecialchars($product->price_category); ?></p>
        <p><strong>Company:</strong> <?php echo htmlspecialchars($company->name); ?></p>
        <p><strong>Certifications:</strong> <?php echo htmlspecialchars(implode(', ', json_decode($product->certifications ?? '[]'))); ?></p>
        <p><strong>Votes:</strong> Yes: <?php echo $votes['yes_votes'] ?? 0; ?> | No: <?php echo $votes['no_votes'] ?? 0; ?></p>
        <a href="/products" class="btn btn-secondary">Back to Products</a>
    </div>
</div>