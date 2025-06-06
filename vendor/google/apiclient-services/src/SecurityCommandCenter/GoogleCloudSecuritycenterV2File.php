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

namespace Google\Service\SecurityCommandCenter;

class GoogleCloudSecuritycenterV2File extends \Google\Collection
{
  protected $collection_key = 'operations';
  /**
   * @var string
   */
  public $contents;
  protected $diskPathType = GoogleCloudSecuritycenterV2DiskPath::class;
  protected $diskPathDataType = '';
  /**
   * @var string
   */
  public $hashedSize;
  protected $operationsType = GoogleCloudSecuritycenterV2FileOperation::class;
  protected $operationsDataType = 'array';
  /**
   * @var bool
   */
  public $partiallyHashed;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $sha256;
  /**
   * @var string
   */
  public $size;

  /**
   * @param string
   */
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  /**
   * @return string
   */
  public function getContents()
  {
    return $this->contents;
  }
  /**
   * @param GoogleCloudSecuritycenterV2DiskPath
   */
  public function setDiskPath(GoogleCloudSecuritycenterV2DiskPath $diskPath)
  {
    $this->diskPath = $diskPath;
  }
  /**
   * @return GoogleCloudSecuritycenterV2DiskPath
   */
  public function getDiskPath()
  {
    return $this->diskPath;
  }
  /**
   * @param string
   */
  public function setHashedSize($hashedSize)
  {
    $this->hashedSize = $hashedSize;
  }
  /**
   * @return string
   */
  public function getHashedSize()
  {
    return $this->hashedSize;
  }
  /**
   * @param GoogleCloudSecuritycenterV2FileOperation[]
   */
  public function setOperations($operations)
  {
    $this->operations = $operations;
  }
  /**
   * @return GoogleCloudSecuritycenterV2FileOperation[]
   */
  public function getOperations()
  {
    return $this->operations;
  }
  /**
   * @param bool
   */
  public function setPartiallyHashed($partiallyHashed)
  {
    $this->partiallyHashed = $partiallyHashed;
  }
  /**
   * @return bool
   */
  public function getPartiallyHashed()
  {
    return $this->partiallyHashed;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setSha256($sha256)
  {
    $this->sha256 = $sha256;
  }
  /**
   * @return string
   */
  public function getSha256()
  {
    return $this->sha256;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSecuritycenterV2File::class, 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV2File');
