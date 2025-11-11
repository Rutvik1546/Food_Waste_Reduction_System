<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../../core/Connection.php';
require_once __DIR__ . '/../../core/Config.php';
require_once __DIR__ . '/../../common/Utility.php';
require_once __DIR__ . '/../model/Item.php';

class ItemController extends Controller
{
    public function donateAction() {
        $this->view('items/createItem');
    }

    public function updateDonateAction() {
        $this->view('items/updateItem');
    }

    public function deleteDonateAction() {
        $this->view('items/deleteItem');
    }

    public function displayDonateAction() {
        $this->view('items/displayItem');
    }

    // ✅ NEW: avoids "Action not found!" error
    // public function displayItemAction() {
    //     $this->view('items/displayItem');
    // }

    public function donatePostAction() {
    $current_date = date("Y-m-d");
    $itemModel = new Item();

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['Donate'])) {
        $name = $this->validate($_POST['name'], '');
        $quantity = $this->validate($_POST['quantity']);
        $address = $this->validate($_POST['address']);
        $expire_date = $_POST['expire_date'];
        $email = $_SESSION['email'];

        if ($expire_date < $current_date) {
            Utility::setFlashMessage("error_message", "Expire date can't be earlier than today!");
            Utility::getFlashMessage('error_message');
            return;
        }

        $add_item = $itemModel->addItem($name, $quantity, $address, $expire_date, $email);
        $add_item_admin = $itemModel->addItemAdmin($name, $quantity, $address, $expire_date, $email);

        if ($add_item_admin) {
            $receiver_result = $itemModel->getReceiverEmail();
			$login_link = Config::get('BASE_URL') . "index.php?controller=auth&action=login";

            $receiver_subject = "New Food is Available Near You!";
            $receiver_message = "
                <p>Hello Receiver,</p>
                <p>Someone just posted new food for donation!</p>
                <p>
                    <a href=$login_link>
                        Click here to log in and view available food
                    </a>
                </p>
                <p>Regards,<br>Food Waste Reduction Team</p>
            ";

            $all_sent = true;
            require_once __DIR__ . '/../core/Mailer.php';

            while ($receiver = $receiver_result->fetch_assoc()) {
                $mail_sent = Mailer::send($receiver['email'], $receiver_subject, $receiver_message);
                if (!$mail_sent) $all_sent = false;
            }

            if ($all_sent) {
                Utility::setFlashMessage("success_message", "Emails sent successfully to all receivers!");
            } else {
                Utility::setFlashMessage("error_message", "Some emails could not be sent!");
                Utility::getFlashMessage('error_message');
            }

            // Donor email
            $donor_subject = "Thank You for Donating Food!";
            $donor_message = "
                <p>Hello Donor,</p>
                <p>Thank you for donating food to the Local Food Waste Reduction System.</p>
                <h4>Donation Details:</h4>
                <ul>
                    <li><strong>Food:</strong> {$name}</li>
                    <li><strong>Quantity:</strong> {$quantity}</li>
                    <li><strong>Pick-up Address:</strong> {$address}</li>
                    <li><strong>Expire Date:</strong> {$expire_date}</li>
                </ul>
                <p>We appreciate your contribution toward reducing food waste!</p>
                <p>Regards,<br>Food Waste Reduction Team</p>
            ";

            if (Mailer::send($email, $donor_subject, $donor_message)) {
                Utility::setFlashMessage('success_message', 'Food added successfully!');
                Utility::getFlashMessage('success_message', "index.php?controller=item&action=displayDonate");
            }
        } else {
            Utility::setFlashMessage('error_message', 'Failed to add food!');
            Utility::getFlashMessage('error_message');
        }
    }
}


    public function updatePostAction() {
        $itemModel = new Item();
        $current_date = date("Y-m-d");

        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['UpdateDonate'])) {
            $id = $_POST['id'];
            $name = $this->validate($_POST['name']);
            $quantity = $this->validate($_POST['quantity']);
            $address = $this->validate($_POST['address']);
            $expire_date = $_POST['expire_date'];

            if ($expire_date < $current_date) {
                Utility::setFlashMessage("error_message","Expire date can't be earlier than today!");
                Utility::getFlashMessage('error_message');
                // header("Refresh:0.01;url=index.php?controller=item&action=updateDonate&id=$id");
                // exit;
            }

            $food_update = $itemModel->updateItem($name, $quantity, $address, $expire_date, $id);
            $food_update_admin = $itemModel->updateItemAdmin($name, $quantity, $address, $expire_date, $id);

            if ($food_update) {
                Utility::setFlashMessage("success_message","Data Updated Successfully!");
                Utility::getFlashMessage("success_message","index.php?controller=item&action=displayDonate");
                // header("Location:index.php?controller=item&action=displayDonate");
                // exit;
            } else {
                Utility::setFlashMessage("error_message","Failed to update data!");
                Utility::getFlashMessage('error_message');
                // header("Location:index.php?controller=item&action=updateDonate&id=$id");
                // exit;
            }
        }
    }
}
?>
