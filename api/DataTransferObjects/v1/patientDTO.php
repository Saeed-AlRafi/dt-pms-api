<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
class patientDTO
{
    public function __construct(
    
    public int $id,
    
    public patientinfoDTO $patientinfo,

    public vitalsDTO $vitals,

    public caretakerinfoDTO $caretakerinfo

    ) {}

}