<?php
class PageController {
    public function about() {
        $title = "About Us";
        ob_start();
        require_once __DIR__ . '/../views/about-us.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function contact($data = null) {
        $title = "Contact Us";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Here you can handle form submission, e.g., send email or store message
            $success = 'Thank you for contacting us! We will get back to you soon.';
        }
        ob_start();
        require_once __DIR__ . '/../views/contact-us.php';
        $content = ob_get_clean();
        require_once __DIR__ . '/../views/layouts/main.php';
    }
}
