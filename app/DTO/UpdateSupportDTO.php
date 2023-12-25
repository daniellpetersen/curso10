<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateRequest;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body
    ){}

    public static function makeFromRequest(StoreUpdateRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->subject,
            'a',
            $request->body
        );
    }
}
