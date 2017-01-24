<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMailRequest;
use App\Repositories\Mail\MailRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class HomeController
 * @package App\Http\Controllers\Home
 */
class HomeController extends Controller
{
    /**
     * @var MailRepository
     */
    protected $mailHandler;

    /**
     * HomeController constructor.
     *
     * @param MailRepository $mailRepository
     */
    public function __construct(MailRepository $mailRepository)
    {
        $this->mailHandler = new $mailRepository;
    }

    public function index()
    {
        return view('index');
    }

    public function mail(SaveMailRequest $request)
    {
        $params = $request->all();

        try {
            $this->mailHandler->saveMail($params);
        } catch (\Exception $e) {
            Log::error('Error while saving the record: ', ['message' => $e->getMessage()]);
            request()->session()->flash('message', trans('home.error'));

            return redirect()->route('home.index');
        }
        request()->session()->flash('message', trans('home.saved'));

        return redirect()->route('home.index');

    }
}