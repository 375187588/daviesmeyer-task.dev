<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMailRequest;
use App\Repositories\Mail\MailRepository;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Mapper::map(53.997852, 10.781322,['zoom' => 18, 'type' => 'SATELLITE', 'marker' => false]);

        return view('index');
    }

    /**
     * @param SaveMailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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