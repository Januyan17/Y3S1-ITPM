<?php
class AppointmentController extends BaseController
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
                $userModel = new AppointmentModel();
 
                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
 
                $arrUsers = $userModel->getAppointments($intLimit);
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

        $userModel = new AppointmentModel();
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $jsonReqUrl  = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $reqjsonDecode = json_decode($reqjson, true);

        $arrUsers= $userModel->createAppointment($reqjsonDecode["name"],$reqjsonDecode["time"],$reqjsonDecode["mobile"],$reqjsonDecode["problem"],$reqjsonDecode["address"],$reqjsonDecode["date"],$reqjsonDecode["doctorId"]);

        $this->sendOutput($arrUsers);

 
    
    }
}

    public function deleteAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if($requestMethod == 'DELETE') {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
        $userModel = new AppointmentModel();
        $userModel->deleteAppointment((int)$uri[5]);

        }
    
    }

    public function updateAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == 'PUT') {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
        $userModel = new AppointmentModel();
        $jsonReqUrl  = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $reqjsonDecode = json_decode($reqjson, true);
       $userModel->updateAppointment($reqjsonDecode["name"],$reqjsonDecode["time"],$reqjsonDecode["mobile"],$reqjsonDecode["problem"],$reqjsonDecode["address"],$reqjsonDecode["date"],(int)$uri[5]);


        }
    
    }
  
}