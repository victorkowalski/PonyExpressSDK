<?php


namespace PE\Parser;


use PE\Entity\Response\Error;
use PE\Entity\Response\Package;
use PE\Entity\Response\ReferenceRecord;
use PE\Entity\Response\ResultCalculator;
use PE\Entity\Response\ResultDocument;
use PE\Entity\Response\ResultReference;
use PE\Entity\Response\ResultTracking;
use PE\Entity\Response\ResultTrackingDocument;
use PE\Entity\Response\Tariff;
use PE\Entity\Response\TrackingEvent;

/**
 * JsonParser
 * @package PE\Parser
 */
class JsonParser extends AbstractParser
{
  /**
   * @return ResultCalculator|Error
   */
  protected function getCalculatorResponse()
  {
    $resultCalculator = new ResultCalculator();
    $resultCalculator
      ->setMinPeriod($this->getRawResponse()['minPeriod'])
      ->setMaxPeriod($this->getRawResponse()['maxPeriod']);

    foreach ($this->getRawResponse()['tariffs'] as $rawTariff)
    {
      $tariff = new Tariff();
      $tariff
        ->setName($rawTariff['name'])
        ->setTotal($rawTariff['total']);
      $resultCalculator->addTariff($tariff);
    }

    return $resultCalculator;
  }

  /**
   * @return ResultTracking|Error
   */
  protected function getTrackingResponse()
  {
    $resultTracking = new ResultTracking();
    foreach ($this->getRawResponse()['documents'] as $rawDocument)
    {
      $resultTrackingDocument = new ResultTrackingDocument();
      $resultTrackingDocument
        ->setNumber($rawDocument['number'])
        ->setName($rawDocument['name'])
        ->setClientNumber($rawDocument['clientNumber']);

      foreach ($rawDocument['packages'] as $rawPackage)
      {
        $package = new Package();
        $package
          ->setHeight($rawPackage['height'])
          ->setLength($rawPackage['lenght'])
          ->setWidth($rawPackage['width'])
          ->setWeight($rawPackage['weight'])
          ->setPackageID($rawPackage['packageID'])
          ->setPackageQty($rawPackage['packageQty']);
        $resultTrackingDocument->addPackage($package);
      }

      foreach ($rawDocument['history'] as $rawEvent)
      {
        $trackingEvent = new TrackingEvent();
        $trackingEvent
          ->setEventComment($rawEvent['eventComment'])
          ->setEventDateTime(new \DateTime($rawEvent['eventComment']))
          ->setEventName($rawEvent['eventName'])
          ->setEventState($rawEvent['eventState']);
        $resultTrackingDocument->addEvent($trackingEvent);
      }
      $resultTracking->addDocument($resultTrackingDocument);
    }

    return $resultTracking;
  }

  /**
   * @return ResultDocument|Error
   */
  protected function getSaveOrderResponse()
  {
    $resultDocument = new ResultDocument();
    $resultDocument->setNumber($this->getRawResponse()['number']);

    return $resultDocument;
  }

  /**
   * @return ResultReference|Error
   */
  protected function getReferenceResponse()
  {
    $resultReference = new ResultReference();
    foreach ($this->getRawResponse()['items'] as $rawRecord)
    {
      $referenceRecord = new ReferenceRecord();
      $referenceRecord
        ->setName($rawRecord['name'])
        ->setCode($rawRecord['code']);

      $resultReference->addItem($referenceRecord);
    }

    return $resultReference;
  }

  /**
   * @return bool
   */
  protected function checkError()
  {
    if ($this->getRawResponse()['error'] == 'true')
    {
      return new Error($this->getRawResponse()['errorInfo']);
    }

    return false;
  }
}