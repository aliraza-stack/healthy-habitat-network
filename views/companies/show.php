<h1><?php echo htmlspecialchars($company->name); ?></h1>
<div class="card">
    <div class="card-body">
        <?php $contact = json_decode($company->contact_info); ?>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($contact->email); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($contact->phone); ?></p>
        <a href="/companies" class="btn btn-secondary">Back to Companies</a>
    </div>
</div>