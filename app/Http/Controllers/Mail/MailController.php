<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    /**
     * Method for getting books by search term.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $params = $request->all();

        $result = $this->mailHandle->searchMails($params['term']);

        if ($result->isEmpty())
        {
            request()->session()->flash('message', 'There is no search result for the requested term.');

            return redirect()->route('admin.mails');
        }

        return view('admin.mails')->with('mails', $result);
    }

}
