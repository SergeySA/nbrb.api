<?php


namespace Fwork;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Core
{

    /**
     * @var RouteCollection
     */
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }


    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try{
            $attributes = $matcher->match($request->getPathInfo());
            $request->attributes->add($attributes);
            $controller = $attributes['controller'];
//            print_r($attributes);
//            unset($attributes['controller']);
//            $response = call_user_func_array($controller, $attributes);
//            var_dump($request->attributes->all());

            $controller = (new ControllerResolver())->getController($request);
            $arguments = (new ArgumentResolver())->getArguments($request, $controller);

//            $response = call_user_func_array($controller, array($attributes['id']));
            $response = call_user_func_array($controller, $arguments);

        } catch (ResourceNotFoundException $exception){
            $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
        }
        return $response;
    }

    public function map($path,\Closure $controller){
        $route = new Route(
            $path,
            array('controller'=> $controller)
        );
        $this->routes->add($path, $route);
    }
    public function mapContr($path, $controller){
        $route = new Route(
            $path,
            $controller
        );
        $this->routes->add($path, $route);
    }
}