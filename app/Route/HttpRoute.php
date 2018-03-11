<?php
  
namespace App\Route; 

use PG\MSF\Route\NormalRoute; 

class HttpRoute extends NormalRoute
{  

     /**
     * HTTP请求解析
     *
     * @param \swoole_http_request $request 请求对象
     */
    public function handleHttpRequest($request)
    { 
        $this->routeParams->file  = '';
        $host = $request->header['host'] ?? '';
        if ($host) {
            $host = explode(':', $host)[0] ?? '';
        }
        //默认执行app/Controllers/Index.php中的actionIndex方法
        if(empty($request->server['path_info']) || $request->server['path_info'] == '/'){
            $request->server['path_info'] = 'index'; 
        }
        $this->routeParams->host = $host;
        $this->routeParams->path = rtrim($request->server['path_info'], '/');
        $this->routeParams->verb = $this->parseVerb($request);
        $this->setParams($request->get ?? []); 

        if (isset($request->header['x-rpc']) && $request->header['x-rpc'] == 1) {
            $this->routeParams->isRpc          = true;
            $this->routeParams->params         = $request->post ?? $request->get ?? [];
            $this->routeParams->controllerName = 'Rpc';
            $this->routeParams->methodName     = 'Index';
            $this->controllerClassName         = '\PG\MSF\Controllers\Rpc';
            $this->routeParams->path           = '/Rpc/Index';
        } else {
            if ($this->routeParams->path) {
                $this->parsePath($this->routeParams->path);
            }
        }
         
    } 
}
