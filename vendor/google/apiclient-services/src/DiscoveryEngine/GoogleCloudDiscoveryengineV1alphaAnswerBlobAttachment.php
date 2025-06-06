<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\DiscoveryEngine;

class GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachment extends \Google\Model
{
  /**
   * @var string
   */
  public $attributionType;
  protected $dataType = GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachmentBlob::class;
  protected $dataDataType = '';

  /**
   * @param string
   */
  public function setAttributionType($attributionType)
  {
    $this->attributionType = $attributionType;
  }
  /**
   * @return string
   */
  public function getAttributionType()
  {
    return $this->attributionType;
  }
  /**
   * @param GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachmentBlob
   */
  public function setData(GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachmentBlob $data)
  {
    $this->data = $data;
  }
  /**
   * @return GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachmentBlob
   */
  public function getData()
  {
    return $this->data;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachment::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1alphaAnswerBlobAttachment');
