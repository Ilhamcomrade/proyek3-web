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

class GoogleCloudDiscoveryengineV1ChunkStructuredContent extends \Google\Model
{
  /**
   * @var string
   */
  public $content;
  /**
   * @var string
   */
  public $structureType;

  /**
   * @param string
   */
  public function setContent($content)
  {
    $this->content = $content;
  }
  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * @param string
   */
  public function setStructureType($structureType)
  {
    $this->structureType = $structureType;
  }
  /**
   * @return string
   */
  public function getStructureType()
  {
    return $this->structureType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1ChunkStructuredContent::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1ChunkStructuredContent');
