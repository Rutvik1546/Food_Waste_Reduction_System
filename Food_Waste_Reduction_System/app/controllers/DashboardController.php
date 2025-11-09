<?php
class DashboardController {
    public function donorAction() {
        require_once __DIR__.'/../view/dashboard/donor_dashboard.php';
    }

    public function receiverAction() {
        require_once __DIR__ . '/../view/dashboard/receiver_dashboard.php';
    }

    public function adminAction() {
        require_once __DIR__ . '/../view/dashboard/admin_dashboard.php';
    }

}

?>