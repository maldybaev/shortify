<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use App\Http\Requests\UrlRequest;
use App\Http\Requests\VisitRequest;
use App\Models\Visit;
use mysqli;

class UrlController extends Controller
{
    public function store(UrlRequest $request) {

        $url = new Url();
        $shorturl = Str::random(5, 'alpha');
        $host = request()->getHost();

        $url->originalurl = request('originalurl');
        $url->shorturl = $shorturl;
        $url->ip = request()->ip();
        $url->useragent = $request->header('User-Agent');

        $url->save();

        return view('welcome', ['shorturl' => $url->shorturl, 'originalurl' => $url->originalurl, 'host' => $host]);

    }

    public function show(VisitRequest $request, $shorturl) {

        //getting data from db
        $urls = Url::where('shorturl', $shorturl)->first();
        $originalurl = $urls->originalurl;

        //Saving redirects' quantity
        $visit = new Visit();

        $visit->shorturl = $shorturl;
        $visit->ip = request()->ip();
        $visit->useragent = $request->header('User-Agent');

        if ($visit->shorturl != 'statistics') {
            $visit->save();
        }

        return redirect($originalurl);
    }

}
