<?php

namespace Api\DataTransferObjects\v1;

use DateTime;
use OpenApi\Attributes as OA;

#[OA\Schema()]
/**
 * Summary of MamlukSultan
 */
class vitalsDTO
{
    /**
     * Summary of __construct
     * @param int $id
     * @param float $bloodsugar
     * @param float $o2
     * @param float $heartrate
     * @param float $temperature
     * @param float $bloodpressure
     * @param DateTime $date
     */
    public function __construct(

    public int $id,

    public float $bloodsugar,

    public float $o2,

    public float $heartrate,

    public float $temperature,

    public float $bloodpressure,

    public datetime $date,
    
    public patientDTO $patient
    ) {}

}