<?php

class UserController extends BaseController
{
    /**
     * Get data from Database
     * @return array<array<string>>
     */
    public function getListOfUser(): array
    {
        $arrUsers = [];
        $arrQueryStringParams = $this->getQueryStringParams();

        try {
            $userModel = new UserModel();

            $intLimit = 10;
            if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                $intLimit = $arrQueryStringParams['limit'];
            }

            $arrUsers = $userModel->getAllUser($intLimit);
        } catch (Error $e) {
            // Write error message to log
            // $arrUsers = null;
        }

        return $arrUsers;
    }

    /**
     * "/users" Endpoint - Get list of users
     */
    public function getAPIListOfUser()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $arrUsers = $this->getListOfUser();
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
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
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}
