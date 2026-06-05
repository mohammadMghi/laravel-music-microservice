<?php

namespace App\Repositories\Music\Contracts;

use App\Domain\Search\DTOs\SearchMusicData;

interface IMusicRepo
{
    public function search(SearchMusicData $data);
}