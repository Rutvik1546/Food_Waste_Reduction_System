<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../../core/Connection.php';
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
                Utility::setFlashMessage("error_message","Expire date can't be earlier than today!");
                Utility::getFlashMessage('error_message');
                // header("Refresh:0.01;url=index.php?controller=item&action=donate");
                // exit;
            }

            $add_item = $itemModel->addItem($name, $quantity, $address, $expire_date, $email);
            $add_item_admin = $itemModel->addItemAdmin($name, $quantity, $address, $expire_date, $email);

            if ($add_item_admin) {
                $receiver_result = $itemModel->getReceiverEmail();

                $receiver_subject = "New Food is available Near to you!";
                $receiver_message = "Hello Receiver,\n\nSomeone just posted new food for donation!\nLogin to your dashboard to view and request the available food.\n\nLogin here: http://localhost/Food_Waste_Reduction_System/index.php?controller=auth&action=login\n\nRegards,\nFood Waste Reduction Team";
                $receiver_headers = "From: rutvikmistry8642@gmail.com";
                $all_sent = true;

                while ($receiver = $receiver_result->fetch_assoc()) {
                    $mail_sent = mail($receiver['email'], $receiver_subject, $receiver_message, $receiver_headers);
                    if (!$mail_sent) $all_sent = false;
                }

                if ($all_sent) {
                    Utility::setFlashMessage("success_message",'Emails sent successfully to all receivers!');
                    // Utility::getFlashMessage("success_message",'index.php?controller=item&action=displayDonate');
                } else {
                    Utility::setFlashMessage("error_message",'Some emails could not be sent!');
                    Utility::getFlashMessage('error_message');
                    // header("Refresh:0.01;url=index.php?controller=item&action=donate");
                }
                

                $donor_subject = "Thank you for Donating Food!";
                $donor_message =  "Hello Donor,\n\nThank You for donating food to the Local Food Waste Reduction System.\n\nDonor Details : \nFood: $name\nQuantity: $quantity\nPick-up Address: $address\nExpire Date: $expire_date\n\nWe appreciate your contribution towards reducing food waste!\n\nRegards,\nFood Waste Reduction Team";
                $donor_headers = "From:rutvikmistry8642@gmail.com";

                if (mail($email, $donor_subject, $donor_message, $donor_headers)) {
                    Utility::setFlashMessage('success_message','Food Added successfully!');
                    Utility::getFlashMessage('success_message',"index.php?controller=item&action=displayDonate");
                    // header("Refresh:0.01;url=index.php?controller=item&action=displayDonate");
                    // exit;
                }
            } else {
                Utility::setFlashMessage('error_message','Failed to add food!');
                Utility::getFlashMessage('error_message');
                // header("Refresh:0.01;url=index.php?controller=item&action=donate");
                // exit;
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