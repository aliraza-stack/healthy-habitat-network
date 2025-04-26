<h1>Add New Area</h1>
<form id="areaForm" method="POST" action="/areas/create" onsubmit="return confirm('Are you sure you want to add this area?');">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="council_id" class="form-label">Council ID</label>
        <input type="number" class="form-control" id="council_id" name="council_id" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Area</button>
</form>