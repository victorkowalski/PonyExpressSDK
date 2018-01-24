<?php


namespace PE\Parser;


use PE\Client;
use PE\Entity\AbstractRequest;
use PE\Entity\AbstractResponse;
use PE\Entity\Request\CalculatorRequest;
use PE\Entity\Request\GetReferenceRequest;
use PE\Entity\Request\SaveOrderRequest;
use PE\Entity\Request\TrackingRequest;
use PE\Entity\Response\Error;
use PE\Entity\Response\IObject;
use PE\Entity\Response\ResultCalculator;
use PE\Entity\Response\ResultDocument;
use PE\Entity\Response\ResultReference;
use PE\Entity\Response\ResultTracking;
use GuzzleHttp\Message\ResponseInterface;

abstract class AbstractParser implements IParser
{
  /**
   * @var self[]
   */
  public static $processorsMap = [
    Client::API_JSON => JsonParser::class,
    Client::API_XML  => XmlParser::class,
  ];

  /**
   * TODO При добавлении новых методов API добавлять protected абстратные методы
   * @var array
   */
  public static $formatMap = [
    GetReferenceRequest::class => 'getReferenceResponse',
    SaveOrderRequest::class    => 'getSaveOrderResponse',
    TrackingRequest::class     => 'getTrackingResponse',
    CalculatorRequest::class   => 'getCalculatorResponse',
  ];

  /**
   * @var AbstractResponse
   */
  protected $response;
  /**
   * @var mixed
   */
  protected $rawResponse;

  /**
   * @param ResponseInterface           $rawResponse
   * @param \PE\Entity\AbstractRequest $request
   * @param string                      $apiUrl
   *
   * @return AbstractResponse
   */
  public static function parseResponse(ResponseInterface $rawResponse, AbstractRequest $request, $apiUrl)
  {
    if ($rawResponse->getStatusCode() != 200)
    {
      return new Error(Error::CONNECTION_FAIL);
    }
    /**
     * @var self $parser
     * Установка класса парсера в зависимости от формата работы с API (XML или JSON)
     */
    $parser = new self::$processorsMap[$apiUrl]($rawResponse, $request);

    return $parser->getResponse();

  }

  protected function __construct(ResponseInterface $rawResponse, AbstractRequest $request)
  {
    $this->setRawResponse($rawResponse);
    /**
     * Установка тела ответа в соответствие с мапой по классам запросов и методам в парсинг-процессоре,
     * описанных в self::$formatMap[];
     * @var IObject $body
     */
    $body = $this->checkError() ? $this->checkError() : $this->{self::$formatMap[get_class($request)]}();
    $this->setResponse(new AbstractResponse($body));
  }

  /**
   * @return bool
   */
  abstract protected function checkError();

  //TODO добавлять сюда при обновлении набора методов API
  /**
   * @return ResultCalculator|Error
   */
  abstract protected function getCalculatorResponse();

  /**
   * @return ResultTracking|Error
   */
  abstract protected function getTrackingResponse();

  /**
   * @return ResultDocument|Error
   */
  abstract protected function getSaveOrderResponse();

  /**
   * @return ResultReference|Error
   */
  abstract protected function getReferenceResponse();

  /**
   * @param \PE\Entity\AbstractResponse $response
   *
   * @return self
   */
  protected function setResponse(AbstractResponse $response)
  {
    $this->response = $response;

    return $this;
  }

  /**
   * @param \GuzzleHttp\Message\ResponseInterface $rawResponse
   *
   * @throws \Exception
   * @return self
   */
  public function setRawResponse(ResponseInterface $rawResponse)
  {
    switch (get_class($this))
    {
      case
      XmlParser::class :
        $this->rawResponse = $rawResponse->xml();
        break;
      case JsonParser::class :
        $this->rawResponse = $rawResponse->json();
        break;
      default:
        throw new \Exception("Неизвестный класс парсера");
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getRawResponse()
  {
    return $this->rawResponse;
  }

  /**
   * @return \PE\Entity\AbstractResponse
   */
  public function getResponse()
  {
    return $this->response;
  }
}