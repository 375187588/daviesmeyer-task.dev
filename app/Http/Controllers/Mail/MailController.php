<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Repositories\Mail\MailRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class MailController
 * @package App\Http\Controllers\Mail
 */
class MailController extends Controller
{
    /**
     * @var MailRepository
     */
    protected $mailHandle;

    /**
     * CompanyController constructor.
     *
     * @param MailRepository $mail
     */
    public function __construct(MailRepository $mail)
    {
        $this->mailHandle = new $mail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try {
            $mails = $this->mailHandle->getAllMails();
        } catch (\Exception $e) {
            Log::error('Error while fetching records: ', ['message' => $e->getMessage()]);

            request()->session()->flash('message', 'Records could not be found.');

            return redirect()->route('admin');
        }

        return view('admin.mails')->with('mails', $mails);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        try {
            $mail = $this->mailHandle->getMailById($id);
        } catch (\Exception $e) {
            Log::error('Error while fetching the record: ', ['message' => $e->getMessage()]);

            request()->session()->flash('message', 'Record could not be found.');

            return redirect()->route('admin.mails');
        }

        return view('admin.mail')->with('mail', $mail);
    }

    /**
     * Delete the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $this->mailHandle->deleteMail($id);
        } catch (\Exception $e) {
            Log::error('Error while deleting record: ', ['message' => $e->getMessage()]);

            request()->session()->flash('message', 'Record could not be deleted. Please try again.');

            return redirect()->route('admin.mails');
        }
        request()->session()->flash('message', 'Record successfully deleted!');

        return redirect()->route('admin.mails');
    }

}
