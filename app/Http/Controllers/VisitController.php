<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Url;

class VisitController extends Controller
{
    public function urls() {
        $urls = Url::all();
        $host = request()->getHost();

        // dd($visits);

        /* echo "<pre>";
        print_r($visits);
        echo "<pre>"; */

        return view('urls', ['urls' => $urls, 'host' => $host]);
    }

    public function visits($shorturl) {
        $visits = Visit::where('shorturl', $shorturl)->get();
        $quantity = count($visits);
        $host = request()->getHost();

        return view('visits', [ 'visits' => $visits,
                                'host' => $host,
                                'quantity' => $quantity,
                                'shorturl' => $shorturl
                                ]);
    }
}
