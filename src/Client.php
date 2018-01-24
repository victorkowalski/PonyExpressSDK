<?php

namespace PE;


use PE\Entity\AbstractRequest;
use PE\Entity\AbstractResponse;
use PE\Parser\AbstractParser;

class Client
{

  const API_XML  = "https://service.cse-cargo.ru/XMLWebService.asmx";
  const API_JSON = "https://service.cse-cargo.ru/JSONWebService.asmx";

  /**
   * @var  AbstractRequest
   */
  protected $request;
  /**
   * @var  string
   */
  protected $apiUrl;

  public function __construct(AbstractRequest $request, $apiUrl = self::API_XML)
  {
    $this->request = $request;
    $this->apiUrl  = $apiUrl;
  }

  /**
   * @return AbstractResponse
   */
  public function getResponse()
  {
    $client   = new \GuzzleHttp\Client();
    $response = $client->get($this->getApiUrl(), ['query' => $this->getRequest()->asArray()]);

    return AbstractParser::parseResponse($response, $this->getRequest(), $this->apiUrl);
  }

  /**
   * @return string
   */
  public function getApiUrl()
  {
    return $this->apiUrl . DIRECTORY_SEPARATOR . AbstractRequest::$requestNameMap[get_class($this->getRequest())];
  }

  /**
   * @return \PE\Entity\AbstractRequest
   */
  public function getRequest()
  {
    return $this->request;
  }


}