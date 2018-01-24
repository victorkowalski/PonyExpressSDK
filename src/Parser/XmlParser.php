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
 * XmlParser
 * @package CSE\Parser
 * @method \SimpleXMLElement getRawResponse
 */
class XmlParser extends AbstractParser
{

  /**
   * @return ResultCalculator
   */
  protected function getCalculatorResponse()
  {
    $resultCalculator = new ResultCalculator();
    $resultCalculator
      ->setMinPeriod((string)$this->getRawResponse()->minPeriod)
      ->setMaxPeriod((string)$this->getRawResponse()->maxPeriod);

    foreach ($this->getRawResponse()->tariffs->Tariff as $rawTariff)
    {
      $tariff = new Tariff();
      $tariff
        ->setName((string)$rawTariff->name)
        ->setTotal((string)$rawTariff->total);
      $resultCalculator->addTariff($tariff);
    }

    return $resultCalculator;
  }

  /**
   * @return ResultTracking
   */
  protected function getTrackingResponse()
  {
    $resultTracking = new ResultTracking();
    foreach ($this->getRawResponse()->documents->ResultTrackingDocument as $rawDocument)
    {
      $resultTrackingDocument = new ResultTrackingDocument();
      $resultTrackingDocument
        ->setNumber((string)$rawDocument->number)
        ->setName((string)$rawDocument->name)
        ->setClientNumber((string)$rawDocument->clientNumber);

      foreach ($rawDocument->packages->Package as $rawPackage)
      {
        $package = new Package();
        $package
          ->setHeight((string)$rawPackage->height)
          ->setLength((string)$rawPackage->lenght)
          ->setWidth((string)$rawPackage->width)
          ->setWeight((string)$rawPackage->weight)
          ->setPackageID((string)$rawPackage->packageID)
          ->setPackageQty((string)$rawPackage->packageQty);
        $resultTrackingDocument->addPackage($package);
      }

      foreach ($rawDocument->history->TrackingEvent as $rawEvent)
      {
        $trackingEvent = new TrackingEvent();
        $trackingEvent
          ->setEventComment((string)$rawEvent->eventComment)
          ->setEventDateTime(new \DateTime((string)$rawEvent->eventComment))
          ->setEventName((string)$rawEvent->eventName)
          ->setEventState((string)$rawEvent->eventState);
        $resultTrackingDocument->addEvent($trackingEvent);
      }
      $resultTracking->addDocument($resultTrackingDocument);
    }

    return $resultTracking;
  }

  /**
   * @return ResultDocument
   */
  protected function getSaveOrderResponse()
  {
    $resultDocument = new ResultDocument();
    $resultDocument->setNumber((string)$this->getRawResponse()->number);

    return $resultDocument;
  }

  /**
   * @return ResultReference
   */
  protected function getReferenceResponse()
  {
    $resultReference = new ResultReference();
    foreach ($this->getRawResponse()->items->ReferenceRecord as $rawRecord)
    {
      $referenceRecord = new ReferenceRecord();
      $referenceRecord
        ->setName((string)$rawRecord->name)
        ->setCode((string)$rawRecord->code);

      $resultReference->addItem($referenceRecord);
    }

    return $resultReference;
  }

  /**
   * @return bool
   */
  protected function checkError()
  {
    if ((string)$this->getRawResponse()->error == 'true')
    {
      return new Error((string)$this->getRawResponse()->errorInfo);
    }

    return false;
  }
}