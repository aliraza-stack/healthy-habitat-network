<h1>Companies</h1>
<a href="/companies/create" class="btn btn-primary mb-3">Add New Company</a>
<?php if (empty($companies)): ?>
    <p>No companies available.</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($companies as $company): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($company->name); ?></td>
                        <td><?php echo htmlspecialchars(json_encode(json_decode($company->contact_info))); ?></td>
                        <td>
                            <a href="/companies/<?php echo $company->id; ?>" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>