<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
/**
 * Summary of MamlukSultan
 */
class contactinfoDTO
{
    /**
     * Summary of __construct
     * @param int $id
     * @param string $phone
     * @param string $email
     * @param string $address
     */
    public function __construct(

    public string $phone,

    public string $email,

    public string $address,
    
    ) {}

}