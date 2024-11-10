<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Recurso no encontrado',
                'message' => 'El recurso solicitado no existe en la base de datos.',
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => 'Datos de validación incorrectos',
                'message' => 'La validación de los datos proporcionados ha fallado.',
                'errors' => $exception->errors(),
            ], 422);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'error' => 'Error de consulta en la base de datos',
                'message' => 'Hubo un problema al intentar obtener los datos de la base de datos:' . $exception->getMessage(),
            ], 500);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => 'Página no encontrada',
                'message' => 'La ruta solicitada no existe.' . $exception->getMessage(),
            ], 404);
        }

        if ($exception instanceof PlanificacionEnCursoException) {
            return response()->json([
                'error' => 'Planificación en curso',
                'message' => $exception->getMessage(),
            ], 400);
        }

        if ($exception instanceof PorcentajePlaniCompException) {
            return response()->json([
                'error' => 'Porcentaje de objetivo inválido para planificación',
                'porcentajeIncorrecto' => $exception->getPorcentajeIncorrecto(),
                'porcentajeComparacion' => $exception->getPorcentajeComparacion(),
                'message' => $exception->getMessage(),
            ], 400);
        }

        if ($exception instanceof FechaObjetivoInválidaException) {
            return response()->json([
                'error' => 'Fecha de objetivo inválida',
                'fechaIncorrecta' => $exception->getFechaIncorrecta(),
                'fechaComparacion' => $exception->getFechaComparacion(),
                'message' => $exception->getMessage(),
            ], 400);
        }

        if ($exception instanceof DuplicidadNombrePlantillaException) {
            return response()->json([
                'errors' => [
                    "nombre" => [$exception->getMessage()],
                ]
            ], 422);
        }

        if ($exception instanceof \Exception) {
            return response()->json([
                'error' => 'Error del servidor',
                'message' => $exception->getMessage(),
            ], 500);
        }

        return parent::render($request, $exception);
    }


    public function report(Throwable $exception)
    {
        // Registrar excepciones específicas con mensajes personalizados
        if ($exception instanceof PlanificacionEnCursoException) {
            Log::error('Error de planificación en curso: ' . $exception->getMessage());
        }

        if ($exception instanceof PorcentajePlaniCompException) {
            Log::warning('Error de porcentaje en planificación: ' . $exception->getMessage());
        }

        if ($exception instanceof FechaObjetivoInválidaException) {
            Log::notice('Error de fecha en objetivo: ' . $exception->getMessage());
        }

        if ($exception instanceof DuplicidadNombrePlantillaException) {
            Log::info('Error de duplicidad en nombre de plantilla: ' . $exception->getMessage());
        }

        // Llama al método padre para que otras excepciones sean registradas automáticamente
        parent::report($exception);
    }
}
