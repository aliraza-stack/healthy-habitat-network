<h1>Register</h1>
<form id="registerForm" method="POST" action="/register">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <select class="form-select" id="location" name="location" required>
            <option value="">Select an area...</option>
            <?php foreach ($areas as $area): ?>
                <option value="<?php echo $area->id; ?>"><?php echo htmlspecialchars($area->name); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="age_group" class="form-label">Age Group</label>
        <select class="form-select" id="age_group" name="age_group" required>
            <option value="">Select...</option>
            <option value="18-25">18-25</option>
            <option value="26-35">26-35</option>
            <option value="36-50">36-50</option>
            <option value="51+">51+</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender" required>
            <option value="">Select...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Interests</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interests[]" value="Nutrition" id="nutrition">
            <label class="form-check-label" for="nutrition">Nutrition</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interests[]" value="Fitness" id="fitness">
            <label class="form-check-label" for="fitness">Fitness</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interests[]" value="Mental Health" id="mental_health">
            <label class="form-check-label" for="mental_health">Mental Health</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interests[]" value="Sustainable Living" id="sustainable_living">
            <label class="form-check-label" for="sustainable_living">Sustainable Living</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>