<?php
class Email {
    public function sendConfirmationEmail($recipient, $order_id) {
        $subject = "Order Confirmation";
        $message = "Thank you for your order. Your order ID is: $order_id";
        mail($recipient, $subject, $message);
    }

    public function sendPaymentReceivedEmail($recipient, $order_id) {
        $subject = "Payment Received";
        $message = "Payment for order $order_id has been received. You can now download the PDF.";
        mail($recipient, $subject, $message);
    }

    public function sendOrderNotificationEmail($order_id) {
        $recipient = 'publisher@example.com'; // Publisher's email
        $subject = "New Order";
        $message = "New order received. Order ID: $order_id";
        mail($recipient, $subject, $message);
    }
}
