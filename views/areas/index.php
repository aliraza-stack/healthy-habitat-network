<h1>Areas</h1>
<a href="/areas/create" class="btn btn-primary mb-3">Add New Area</a>
<?php if (empty($areas)): ?>
    <p>No areas available.</p>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Council ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($areas as $area): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($area->name); ?></td>
                        <td><?php echo htmlspecialchars($area->council_id); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>