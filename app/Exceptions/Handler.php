<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PrettyPageHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     *
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        if (config('app.debug')) {
            $whoops = new \Whoops\Run;
            if (
                $request->isJson() ||
                $request->wantsJson() ||
                $request->ajax()
            ) {
                $whoops->pushHandler(new JsonResponseHandler);

                if ($e instanceof \App\Exceptions\ValidationException) {
                    return Response::apiResponse(null, 400, null, $e->getMessages());
                }

            } else {
                $whoops->pushHandler(new PrettyPageHandler);
            }

            return response($whoops->handleException($e),
                $e->getStatusCode(),
                $e->getHeaders()
            );
        }
        return parent::render($request, $e);
    }
}
