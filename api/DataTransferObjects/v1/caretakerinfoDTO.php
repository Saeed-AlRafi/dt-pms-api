<?php

namespace Api\DataTransferObjects\v1;

use OpenApi\Attributes as OA;

#[OA\Schema()]
/**
 * Summary of MamlukSultan
 */
class caretakerinfoDTO
{
    /**
     * Summary of __construct
     * @param int $id
     * @param string $ctphone
     * @param string $ctname
     * @param string $ctemail
     */
    public function __construct(
    
    public string $ctname,

    public string $ctphone,
    
    public string $ctemail,
    ) {}

}