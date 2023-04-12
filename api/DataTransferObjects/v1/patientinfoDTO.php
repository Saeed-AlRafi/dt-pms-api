<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
/**
 * Summary of MamlukSultan
 */
class patientinfoDTO
{
    /**
     * Summary of __construct
     * @param int $id
     * @param int $age
     * @param string $gender
     * @param string $name
     */
    public function __construct(

    public int $id,

    public int $age,

    public string $gender,

    public string $name,

    public patientDTO $patient,

    public contactinfoDTO $contactinfo
    ) {}

}