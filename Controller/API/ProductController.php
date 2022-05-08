<?php
class ProductController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new ProductModel();
 
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
 
                $arrUsers = $userModel->getProducts($intLimit);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function createAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if($requestMethod == 'POST'){

        $userModel = new ProductModel();
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $jsonReqUrl  = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $reqjsonDecode = json_decode($reqjson, true);

        $arrUsers= $userModel->createProduct($reqjsonDecode["name"],$reqjsonDecode["image"],$reqjsonDecode["price"]);

        $this->sendOutput($arrUsers);

        // $responseData = json_encode($arrUsers);
 
    
    }
}

    public function deleteAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if($requestMethod == 'DELETE') {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
        $userModel = new ProductModel();
        $userModel->deleteProduct((int)$uri[5]);

        }
    
    }

    public function updateAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == 'PUT') {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
        $userModel = new ProductModel();
        $jsonReqUrl  = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $reqjsonDecode = json_decode($reqjson, true);
        $userModel->updateProduct((int)$uri[5],$reqjsonDecode["name"],$reqjsonDecode["image"],$reqjsonDecode["price"]);

        }
    
    }
  
}