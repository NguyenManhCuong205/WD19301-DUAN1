<?
    include_once ROOT_DIR . "views/clients/header.php";

// Kiểm tra nếu form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    // Kiểm tra các trường bắt buộc
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Địa chỉ email của quản trị viên
        $to = "admin@example.com";
        $subject = "Liên hệ từ $name";
        $body = "Tên: $name\nEmail: $email\nSố điện thoại: $phone\n\nTin nhắn:\n$message";
        $headers = "From: $email";

        // Gửi email
        if (mail($to, $subject, $body, $headers)) {
            $successMessage = "Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm.";
        } else {
            $errorMessage = "Có lỗi xảy ra khi gửi email. Vui lòng thử lại sau.";
        }
    } else {
        $errorMessage = "Vui lòng điền đầy đủ thông tin vào các trường bắt buộc.";
    }
}
?>
