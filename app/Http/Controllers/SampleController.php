<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SampleController extends Controller
{
    public function download1()
    {
        return view('sample.download');
    }

    public function download2(Request $request, Response $response)
    {
        $this->sendHeader($response, 'sample.txt', 'text/plain');

        for ($row = 0; $row < 100; $row++) {

            $line = '';
            for ($col = 0; $col < 10; $col++) {
                $line .= $col;
                $line .= "\t";
            }
            $line .= "\n";

            $this->sendContentBody($line);

        }

        $this->sendContentEnd();

        exit;
    }

    private function sendHeader($response, $fileName, $mimeType){

        $response->setProtocolVersion('1.1');
        $response->headers->replace([
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Transfer-Encoding' => 'chunked'
        ]);
        $response->sendHeaders();

        ob_flush();
        flush();

    }

    private function sendContentBody($line){

        echo dechex(strlen($line));
        echo "\r\n";
        echo $line;
        echo "\r\n";

        ob_flush();
        flush();
    }

    private function sendContentEnd(){

        echo '0';
        echo "\r\n";
        echo "\r\n";

        ob_flush();
        flush();

    }
    
}