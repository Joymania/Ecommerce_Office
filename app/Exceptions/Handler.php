<?php

namespace App\Exceptions;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $Throwable)
    {
        parent::report($Throwable);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $Throwable)
    {
        return parent::render($request, $Throwable);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    //  redirect respective login page if not authenticated
    protected function unauthenticated($request, AuthenticationException $exception)
    { // dd($exception);
        if($request->expectsJson()){
            response()->json(['message' => $exception->getMessage()], 401);
        }

        $guard = Arr::get( $exception->guards(), 0 );

        $route = '';
        if($guard == 'admin'){
            $route = route('admin.login');
        }
        else $route = '/login';

        return redirect($route);

        // return $request->expectsJson()
        //             ? response()->json(['message' => $exception->getMessage()], 401)
        //             : redirect()->guest($exception->redirectTo() ?? route('login'));
    }
}
