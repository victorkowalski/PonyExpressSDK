<?php


namespace PE\Entity\Response;


class ResultTracking implements IObject
{
  /**
   * @var ResultTrackingDocument[]
   */
  protected $documents;

  /**
   * @param \PE\Entity\Response\ResultTrackingDocument $document
   *
   * @return self
   */
  public function addDocument(ResultTrackingDocument $document)
  {
    $this->documents[] = $document;

    return $this;
  }

  /**
   * @return \PE\Entity\Response\ResultTrackingDocument[]
   */
  public function getDocuments()
  {
    return $this->documents;
  }


}