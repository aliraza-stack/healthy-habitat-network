<h1>Products</h1>
<a href="/products/create" class="btn btn-primary mb-3">Add New Product</a>
<?php if (empty($products)): ?>
    <p>No products available.</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price Category</th>
                    <th>Votes (Yes/No)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $productData): ?>
                    <?php $product = $productData['product']; ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product->name); ?></td>
                        <td><?php echo htmlspecialchars($product->description); ?></td>
                        <td><?php echo htmlspecialchars($product->price_category); ?></td>
                        <td><?php echo $productData['votes']['yes_votes'] ?? 0; ?>/<?php echo $productData['votes']['no_votes'] ?? 0; ?></td>
                        <td>
                            <a href="/products/<?php echo $product->id; ?>" class="btn btn-info btn-sm">View</a>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="/vote/<?php echo $product->id; ?>" class="btn btn-secondary btn-sm">Vote</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>