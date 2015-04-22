<?php  namespace App\AlexaApp\Request; 

use Illuminate\Http\Request;

abstract class BaseAlexaRequest implements AlexaRequest
{
    private $data = [];

    function __construct(Request $request)
    {
        $this->data = $this->extractRequestData($request);

        $this->setupRequest($this->data);

    }

    /**
     * Return an array of
     *
     * @param array $data
     * @return mixed
     */
    protected abstract function setupRequest(array $data);

    /**
     * @param $request
     */
    private function extractRequestData($request)
    {
        //todo: remove this after testing
        return json_decode($request->input('content'), true);

        return $request->getContent();
    }

    /**
     * returns the request type, i.e. IntentRequest
     *
     * @return string
     */
    public function getRequestType()
    {
        return array_get($this->data, 'request.type');
    }

} 