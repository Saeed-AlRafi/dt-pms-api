<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
/**
 * Summary of MamlukSultan
 */
class patientDTO
{
    /**
     * Summary of __construct
     * @param int $id
     * @param int $yearTo
     * @param string $name
     */
    public function __construct(

    public int $id,
    
    public patientinfoDTO $patientinfo,

    public vitalsDTO $vitals,

    public contactinfoDTO $contactinfo

    ) {}

}