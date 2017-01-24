<?php

namespace App\Repositories\Mail;

use App\Models\Mail\MailModel;

/**
 * Class MailRepository
 * @package App\Repositories\Mail
 */
class MailRepository
{
    /**
     * Method for saving mail sent from contact form.
     *
     * @param $params array
     */
    public function saveMail($params)
    {
        $mail = new MailModel();

        $mail->name     = $params['name'];
        $mail->email    = $params['email'];
        $mail->phone    = $params['phone'];
        $mail->address   = $params['address'];
        $mail->message  = $params['message'];

        $mail->save();

    }
}