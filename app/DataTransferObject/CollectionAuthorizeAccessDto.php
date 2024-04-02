<?php

namespace App\DataTransferObject;

class CollectionAuthorizeAccessDto
{
    public function __construct(public $userCollectionId, public $modelType,public $modelId)
    {

    }
}
