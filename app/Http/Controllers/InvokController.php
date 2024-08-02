<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvokController extends Controller
{
    /**
     * Handle the incoming request.
     */

     // IN Single action controller only one method will be called is invoke method, other will not be worked in this controller
     
    public function __invoke(Request $request)
    {
        //__Data collect from Database__//

        return "This in invoke method from Single action Controller";
    }
}
