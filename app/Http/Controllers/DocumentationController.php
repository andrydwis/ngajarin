<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function code()
    {
        $button1 = '<button class="btn btn-primary"> Primary </button>';
        $svg = '<svg class="w-6 h-6 inline-block" fill="none" 
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" 
                stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>';
        $svgNote = '// ambil di https://heroicons.dev //';
        $button2 = '<button class="btn btn-success"> //insert link svg// success </button>';
        $button3 = '<button class="btn btn-outline-primary"> Masuk </button>';

        return view('documentation', compact('button1', 'button2', 'svg', 'svgNote', 'button3'));
    }
}
