<?php

namespace App\Http\Controllers;

use App\Services\ShortenerService;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UrlController extends Controller
{

    /**
     * Create short url and store it in DB.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {

        $fullUrl = $request->get('full_url');
        $shortener = new ShortenerService($fullUrl);

        try {
            $shortUrl = $shortener->getShort();
        } catch (\Exception $ex) {
            return view('error', ['message' => $ex->getMessage()]);
        }

        if ($shortener->isNew()) {
            $url = new Url();
            $url->full = $fullUrl;
            $url->short = $shortUrl;
            $url->save();
        }

        $viewParams = [
            'fullUrl' => $fullUrl,
            'shortUrl' => App::make('url')->to('/' . $shortUrl)
        ];
        return view('result', $viewParams);
    }

    /**
     * Redirect short url to real if they exist in DB. In other case show error message.
     *
     * @param $short
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function redirectShort($short)
    {
        $url = Url::where('short', $short)->first();
        if ($url && $url->full) {
            return redirect($url->full);
        } else {
            return view(
                'error',
                ['message' => 'Short URL ' .  App::make('url')->to('/' . $short) . ' does not exist']
            );
        }
    }

}
