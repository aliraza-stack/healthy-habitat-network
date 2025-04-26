<h1>Add New Company</h1>
<form id="companyForm" method="POST" action="/companies/create" onsubmit="return confirm('Are you sure you want to add this company?');">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="contact_email" class="form-label">Contact Email</label>
        <input type="email" class="form-control" id="contact_email" name="contact_info[email]" required>
    </div>
    <div class="mb-3">
        <label for="contact_phone" class="form-label">Contact Phone</label>
        <input type="text" class="form-control" id="contact_phone" name="contact_info[phone]" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Company</button>
</form>