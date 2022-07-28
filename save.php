 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = new PHPMailer();
$email->SetFrom('you@example.com', 'Your Name'); //Name is optional
$email->Subject   = 'Message Subject';
$email->Body      = $bodytext;
$email->AddAddress( 'destinationaddress@example.com' );

$file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

$email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );

return $email->Send();

    $filename = 'myfile';
    $path = 'your path goes here';
    $file = $path . "/" . $filename;

    $mailto = 'savebase@mail.com';
    $subject = 'Subject';
    $message = 'My message';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: name <test@test.com>" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }
Edit 14-June-2018

for more readability in some of email provider use

$body .= $eol . $message . $eol . $eol; and $body .= $eol . $content . $eol . 