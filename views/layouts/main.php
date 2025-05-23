<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Home'; ?> - Healthy Habitat Network </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- /* views/shared/header.php */ -->
    <?php include '../views/shared/header.php'; ?>
    <!-- /* views/shared/header.php */ -->

    <!-- /* views/layouts/main.php */ -->
    <div class="mx-auto">
        <?php if (isset($success)): ?>
            <?php require_once __DIR__ . '/../alerts/success.php'; ?>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <?php require_once __DIR__ . '/../alerts/error.php'; ?>
        <?php endif; ?>
        <?php echo $content; ?>
    </div>
    <!-- /* views/layouts/main.php */ -->


    <!-- /* views/shared/footer.php */ -->
    <?php include '../views/shared/footer.php'; ?>
    <!-- /* views/shared/footer.php */ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/auth.js"></script>
</body>
</html>