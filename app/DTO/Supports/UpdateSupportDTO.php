<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateRequest;
use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ) {}

    public static function makeFromRequest(StoreUpdateRequest $request, string $id = null): self
    {
        return new self(
            $id ?? $request->support ?? $request->id,
            $request->subject,
            SupportStatus::A,
            $request->body
        );
    }
}
