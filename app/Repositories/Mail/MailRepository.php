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

    /**
     * Get all mails from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllMails()
    {
        return MailModel::all();
    }

    /**
     * Get mail by id from db.
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getMailById($id)
    {
        return MailModel::findOrFail($id);
    }

    /**
     * Delete mail from db.
     *
     * @param $id
     */
    public function deleteMail($id)
    {
        $mail = MailModel::findOrFail($id);

        $mail->delete();
    }

    /**
     * Method for getting mails from bd by search term.
     *
     * @param $term
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchMails($term)
    {
        return MailModel::where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('email', 'LIKE', '%'.$term.'%')
            ->get();
    }

}