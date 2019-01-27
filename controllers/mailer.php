<?php
require '../vendor/autoload.php';

class Mailer{

    public function sendMessage($to,$subject,$corp)
    {
        try{
            // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.eu.mailgun.net/v3/mg.lecosyvendeen.fr/messages');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'from' => 'reservation@lecosyvendeen.fr',
                'to' => $to,
                'subject' => $subject,
                'html' => $corp,
            ]);

            curl_setopt($ch, CURLOPT_USERPWD, 'api' . ':' . 'PUT_MAILGUN_KEY_HERE');

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close ($ch);

        } catch (\Exception $exception) {
            var_dump($exception); die;
        }
    }

}
