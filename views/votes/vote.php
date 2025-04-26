<h1>Vote for <?php echo htmlspecialchars($product->name); ?></h1>
<div class="card">
    <div class="card-body">
        <p><?php echo htmlspecialchars($product->description); ?></p>
        <form method="POST" action="/vote/<?php echo $product->id; ?>" onsubmit="return confirm('Are you sure you want to submit this vote?');">
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="vote" id="voteYes" value="1" required>
                    <label class="form-check-label" for="voteYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="vote" id="voteNo" value="0">
                    <label class="form-check-label" for="voteNo">No</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit Vote</button>
            <a href="/products" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>