<?php
/*
 * Copyright 2013 Imre Toth <tothimre at gmail> Licensed under the Apache
 * License, Version 2.0 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0 Unless required by applicable law
 * or agreed to in writing, software distributed under the License is
 * distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied. See the License for the specific language
 * governing permissions and limitations under the License.
 */

/**
 * This calss gives your calsses a unique identifier, here you can define what
 * factor will define the different states of your application, in other words
 * The cache key will be generated out of this variables.
 *
 * @author Imre Toth
 *
 */
namespace Poc\Cache\Filtering;

class Hasher
{

    private $distinguishVariables = array();

    private $key;

    public function getKey ()
    {
        if (! $this->key) {
            $this->key = $this->toHash();
        }

        return $this->key;
    }

    public function addDistinguishVariable ($var)
    {
        $this->distinguishVariables[] = $var;
    }

    public function toHash ()
    {
        return md5(serialize($this->distinguishVariables));
    }

}
