<h1>Add New Product</h1>
<form id="productForm" method="POST" action="/products/create" onsubmit="return confirm('Are you sure you want to add this product?');">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="size_quantity" class="form-label">Size/Quantity</label>
        <input type="text" class="form-control" id="size_quantity" name="size_quantity" required>
    </div>
    <div class="mb-3">
        <label for="health_benefits" class="form-label">Health Benefits</label>
        <textarea class="form-control" id="health_benefits" name="health_benefits" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price_category" class="form-label">Price Category</label>
        <select class="form-select" id="price_category" name="price_category" required>
            <option value="">Select...</option>
            <option value="affordable">Affordable</option>
            <option value="moderate">Moderate</option>
            <option value="premium">Premium</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="company_id" class="form-label">Company</label>
        <select class="form-select" id="company_id" name="company_id" required>
            <option value="">Select a company...</option>
            <?php foreach ($companies as $company): ?>
                <option value="<?php echo $company->id; ?>"><?php echo htmlspecialchars($company->name); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="certifications" class="form-label">Certifications (comma-separated)</label>
        <input type="text" class="form-control" id="certifications" name="certifications">
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>